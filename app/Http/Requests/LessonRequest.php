<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
            'name' => 'required|min:3|max:50',
            'text' => 'required',
            'role' => 'required',
            'level_id' => 'required',
            'course_id' => 'required',
            'vocabularies_id' => 'required',
            'exercises_id' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:4096',
            'video' => 'required|url',
        ];
    }
}
