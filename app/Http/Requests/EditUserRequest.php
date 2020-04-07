<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && Auth::user()->user_role == 0;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'user_email' => 'required|unique:users,user_email,'.$this->get('id'),
            'user_status' => 'required|between:0,2',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages() {
        return [
            'id.required' => 'Cannot find user\'s id. Please contact the developer.',
            'id.exists' => 'User does not exists in database.',
            'user_email.required' => 'The email field is required.',
            'user_email.unique' => 'This email has already been registered in our website.',
            'first_name.required' => 'The first name field is required.',
            'last_name.required' => 'The last name field is required.',
        ];
    }
}
