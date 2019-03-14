<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSystemRequest extends FormRequest
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
            'whyus' => 'required',
            'aboutus' => 'required',
            'phone' => 'required|min:10',
            'email' => 'required|email',
            'web' => 'required|url',
            'address' => 'required',
        ];
    }
}
