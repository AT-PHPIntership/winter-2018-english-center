<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourseRequest extends FormRequest
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
            'name' => 'required|string',
            'parent_id' => 'nullable|exists:courses,id',
            'content' => 'required_with:parent_id|nullable|min:3',
            'image' => 'required|mimes:jpg,jpeg,png',
        ];
    }
    
    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'parent_id.exists' => 'Not exists course parent in courses',
        ];
    }
}
