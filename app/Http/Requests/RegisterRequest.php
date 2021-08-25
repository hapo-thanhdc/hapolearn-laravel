<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:4 ', 'max:255'],
            'email' => ['required','email','unique:users,email'],
            'password_register' => ['required', 'string'],
            'password_confirmation' => ['required', 'same:password_register']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Username filed is required",
            'password_register.required' => "Password field is required.",
            'password_confirmation.same' => "Password does not match."
        ];
    }
}
