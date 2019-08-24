<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST':
                return [
                    'name' => 'required|min:3|max:50',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|min:6',
                    'confirm_password' => 'required|same:password',
                    'birthday' => 'required|date|before:5 years ago',
                    'phone' => 'required|numeric|digits:10',
                    'role_id' => 'required',
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'name' => 'required|min:3|max:50',
                    'email' => 'required|email|unique:users,email,'. $this->user->id,
                    'birthday' => 'required|date|before: 5 years ago',
                    'phone' => 'required|numeric|digits:10',
                ];
            default:
                break;
        }
    }
}
