<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Services\VocabularyService;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Response;

class CreateVocabularyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vocabulary' => 'required|regex:/[^-0-9\/]+/',
            'means' => 'required|regex:/[^-0-9\/]+/',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'vocabulary.regex' => 'Vocabulary can not enter numeric.',
            'means.regex' => 'Means can not enter numeric.',
        ];
    }

     /**
     * Configure the validator instance.
     *
     * @param \Illuminate\Validation\Validator $validator validator
     *
     * @return void
     */
    public function withValidator($validator)
    {
        // dd($validator);
        $response = app(Client::class)->request('GET', sprintf(config('define.oxford.get_api').$this->all()['vocabulary']), [
            'headers' => [
                'app_id'  => config('define.oxford.app_id'),
                'app_key' => config('define.oxford.app_key')
            ],
            'http_errors' => false
        ]);
        $validator->after(function ($validator) use ($response) {
            if ($response->getStatusCode() == Response::HTTP_NOT_FOUND) {
                $validator->errors()->add('vocabulary', 'Vocabulary is wrong');
            }
        });
        return;
    }
}
