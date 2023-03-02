<?php

namespace App\Http\Requests\dashbord;

use Illuminate\Foundation\Http\FormRequest;

class login_request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            
            'email'=>'required|email',
            'password'=>'required|min:6',
        ];
    }

    public function messages()
    {
            return [
                'email.required'=>'The email is required',
                'email'=>'insted the email',
                'password.required'=>'the password is required',
                'password.min'=>'the password is must be at least 6 characters',

            ];
    }
}
