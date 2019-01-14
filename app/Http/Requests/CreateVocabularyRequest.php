<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'vocabulary.regex' => 'Can not enter numeric.',
            'means.regex' => 'Can not enter numeric.',
        ];
    }
}
