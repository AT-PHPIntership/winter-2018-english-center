<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdateUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email,'. $this->user->id,
            // 'password' => 'min:6',
            // 'confirm_password' => 'same:password',
            'age' => 'required|numeric|min:5|max:100',
            'birthday' => 'required|date|before:today',
            'phone' => 'required|min:10',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param \Illuminate\Validation\Validator $validator validator
     *
     * @return void
     */
    // public function withValidator($validator)
    // {
        // checks user old password
        // before making changes
        // $validator->after(function ($validator) {
            // if (!empty($this->old_password) && !Hash::check($this->old_password, $this->user->password)) {
                // $validator->errors()->add('old_password', __('user.edit_user.message'));
            // }
        // });
        // return;
    // }
}
