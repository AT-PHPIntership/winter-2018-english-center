<?php
namespace App\Services;

use App\Models\Vocabulary;
use Excel;
use GuzzleHttp\Client;
// use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\Response;

class VocabularyService
{
    protected $client;

    /**
     * Function construct new Client
     *
     * @return App\Services\VocabularyService
    **/
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Function index get all vocabulary
     *
     * @return App\Services\VocabularyService
    **/
    public function index()
    {
        return Vocabulary::orderBy('created_at', config('define.courses.order_by_desc'))->paginate(config('define.page_site'));
    }

    /**
     * Function filterVoca check vocabulary
     *
     * @param Excel $data get data file csv
     *
     * @return App\Services\VocabularyService
    **/
    public function filterVoca($data)
    {
        $fileData = collect($data->pluck('vocabulary'));
        $vocabularies = Vocabulary::pluck('vocabulary');
        $compare = $fileData->diff($vocabularies);

        return $data->whereIn('vocabulary', $compare);
    }
    
    /**
     * Function importFile import file csv vocabulary
     *
     * @param CreateVocabularyRequest $request get data file csv
     *
     * @return App\Services\VocabularyService
    **/
    public function importFile($request)
    {
        // dd($request);
        try {
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path)->get();
            // dd($data);
            $lineError = config('define.import_file.line_defaul');
            $vocabularies = $this->filterVoca($data);
            // dd($vocabularies);
            $arr = [];
            foreach ($vocabularies as $key => $value) {
                // dd($value);
                $arr[$key] = ['vocabulary' => $value->vocabulary, 'phonetic_spelling' => $value->phonetic_spelling, 'means' => $value->means];
                $lineError = $key + config('define.import_file.line_error');
                $vocabularyContent = $this->getVocabularyContent($value->vocabulary);
                // dd($vocabularyContent);
                $parseVocabulary = $this->parseVocabularyContent($vocabularyContent);
                $arr[$key]['word_type'] = $parseVocabulary['word_type'];
                $arr[$key]['sound'] = $parseVocabulary['sound'];
                $arr[$key]['phonetic_spelling'] = $parseVocabulary['phonetic_spelling'];
                // dd($arr[$key]['phonetic_spelling']);
            }
            Vocabulary::insert($arr);
            session()->flash('success', __('common.success'));
        } catch (\Exception $e) {
            session()->flash('error', __('common.error', ['attribute' => $e->getMessage(), 'line' => $lineError]));
            throw $e;
        }
    }

    /**
     * Function getVocabularyContent get data vocabulary
     *
     * @param Vocabulary $vocabulary get data api
     *
     * @return App\Services\VocabularyService
    **/
    public function getVocabularyContent(string $vocabulary)
    {
        $response = $this->client->request('GET', sprintf(config('define.oxford.get_api').$vocabulary), [

            'headers' => [
                'app_id'  => config('define.oxford.app_id'),
                'app_key' => config('define.oxford.app_key'),
            ],
            'http_errors' => false
        ]);
        // dd($response);
        if ($response->getStatusCode() == Response::HTTP_NOT_FOUND) {
            throw new \InvalidArgumentException(config('define.import_file.file_error'));
        }

        return json_decode($response->getBody()->getContents());
    }

    /**
     * Function parseVocabularyContent pasrse vocabulary
     *
     * @param Vocabulary $vocabularyContent parse api
     *
     * @return VocabularyContent array
    **/
    protected function parseVocabularyContent($vocabularyContent)
    {
        return [
            'phonetic_spelling' => collect($vocabularyContent->results[0]->lexicalEntries)->pluck('pronunciations')->filter()->first()[0]->phoneticSpelling,
            'word_type'  => collect($vocabularyContent->results[0]->lexicalEntries[0])->get('lexicalCategory'),
            'sound'      => collect($vocabularyContent->results[0]->lexicalEntries)->pluck('pronunciations')->filter()->first()[0]->audioFile,
        ];
    }

    /**
     * Function store create data vocabulary
     *
     * @param ValidationVocabulary $data create data api
     *
     * @return void
    **/
    public function store($data)
    {
        $vocabularyContent = $this->getVocabularyContent($data['vocabulary']);
        $parseVocabulary = $this->parseVocabularyContent($vocabularyContent);
        $data['phonetic_spelling'] = $parseVocabulary['phonetic_spelling'];
        $data['word_type'] = $parseVocabulary['word_type'];
        $data['sound'] = $parseVocabulary['sound'];
        Vocabulary::create($data);
    }

    /**
     * Function update vocabulary
     *
     * @param ValidationVocabulary $data       requestVocabulary
     * @param Vocabulary           $vocabulary vocabulary
     *
     * @return void
    **/
    public function update($data, $vocabulary)
    {
        $vocabularyContent = $this->getVocabularyContent($data['vocabulary']);
        $parseVocabulary = $this->parseVocabularyContent($vocabularyContent);
        $data['word_type'] = $parseVocabulary['word_type'];
        $data['sound'] = $parseVocabulary['sound'];
        $data['phonetic_spelling'] = $parseVocabulary['phonetic_spelling'];
        $vocabulary->update($data);
    }

    /**
     * Function destroy vocabulary
     *
     * @param Vocabulary $vocabulary vocabulary
     *
     * @return void
    **/
    public function destroy($vocabulary)
    {
        $vocabulary->delete();
    }
}
