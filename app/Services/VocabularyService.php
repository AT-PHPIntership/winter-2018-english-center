<?php
namespace App\Services;

use App\Models\Vocabulary;
use Excel;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Response;

class VocabularyService
{
    /**
     * Function index get all vocabulary
     *
     * @return App\Services\VocabularyService
    **/
    public function index()
    {
        return Vocabulary::orderBy('created_at', config('define.courses.order_by_desc'))->paginate(config('define.courses.limit_rows'));
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
        try {
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path)->get();
            $lineError = config('define.import_file.line_defaul');
            $vocabularies = $this->filterVoca($data);
            if ($vocabularies->count()) {
                foreach ($vocabularies as $key => $value) {
                    $arr = [];
                    $arr[$key] = ['vocabulary' => $value->vocabulary, 'means' => $value->means];
                    $lineError = $key + config('define.import_file.line_error');
                    $vocabularyContent = $this->getVocabularyContent($value->vocabulary);
                    $arr[$key]['word_type'] = collect($vocabularyContent->results[0]->lexicalEntries[0])->get('lexicalCategory');
                    $arr[$key]['sound'] = collect($vocabularyContent->results[0]->lexicalEntries)->pluck('pronunciations')->filter()->first()[0]->audioFile;
                }
                Vocabulary::insert($arr);
            }
            session()->flash('success', __('common.success'));
            // return true;
        } catch (\Exception $e) {
            session()->flash('error', __('common.error', ['attribute' => $e->getMessage(), 'line' => $lineError]));
            // return false;
        }
    }

    /**
     * Function getVocabularyContent get data vocabulary
     *
     * @param Vocabulary $vocabulary get data api
     *
     * @return App\Services\VocabularyService
    **/
    protected function getVocabularyContent(string $vocabulary)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://od-api.oxforddictionaries.com/api/v1/entries/en/'. $vocabulary, [
            'headers' => [
                'app_id'  => config('define.oxford.app_id'),
                'app_key' => config('define.oxford.app_key')
            ],
            'http_errors' => false
        ]);

        if ($response->getStatusCode() == Response::HTTP_NOT_FOUND) {
            throw new \InvalidArgumentException("Vocabulary is wrong");
        }

        return json_decode($response->getBody()->getContents());
    }
}
