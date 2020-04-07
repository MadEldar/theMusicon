<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'user_email' => 'required|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'confirm' => 'required|same:password',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages() {
        return [
            'user_email.required' => 'The email field is required.',
            'user_email.unique' => 'This email has already been registered in our website.',
            'password.required' => 'The password field is required.',
            'confirm.required' => 'Password and confirmation fields do not match.',
            'confirm.same' => 'Password and confirmation fields do not match.'
        ];
    }
}
