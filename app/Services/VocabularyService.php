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

    public function filterVoca($data)
    {
        $collection = collect($data->pluck('vocabulary'));
        $vocabularies = Vocabulary::pluck('vocabulary');
        $diff = $collection->diff($vocabularies);

        return $data->whereIn('vocabulary', $diff);
    }
    
    public function import($request)
    {
        try {
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
        })->get();
            $lineError = 0;
            $vocabularies = $this->filterVoca($data);
            if ($vocabularies->count()) {
                foreach ($vocabularies as $key => $value) {
                    $arr[$key] = ['vocabulary' => $value->vocabulary, 'word_type' => $value->word_type, 'means' => $value->means];
                    $lineError = $key + 2;
                    $vocabularyContent = $this->getVocabularyContent($value->vocabulary);

                    // dd($vocabularyContent);
                    dd(collect($vocabularyContent->results)->flatten(2)->values()->all());
                    if ($vocabularyContent == false) {
                        unset($vocabularies->$key);
                        continue;
                    }
                    $value = $vocabularies->get('audioFile');

                    $arr[$key]['sound'] = $vocabularyContent->results[0]->lexicalEntries[0]->pronunciations[0]->audioFile;
                }
                if (!empty($arr)) {
                    Vocabulary::insert($arr);
                }
            }
        } catch (\Exception $e) {
            dd($e->getMessage(), $lineError);
        }
    }

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
            // throw new \InvalidArgumentException("Vocabulary not found !");//false
            return false;
        }

        return json_decode($response->getBody()->getContents());
    }
}
