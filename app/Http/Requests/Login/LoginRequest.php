<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'name'=>['required','min:3','max:15'],
            'email'=>['required','email'],
            'password'=>['required','min:8','max:15'],
        ];
    }

    public function messages()
    {
        return [

                'name.required'=>'The name is required',
                'name.min'=>'The name is minimum 3 letters',
                'name.max'=>'The name is maximum 15 letters',

                'email.required'=>'The email is required',
                'email.email'=>'please enter a valid email address',

                'password.required'=>'The password is required',
                'password.min'=>'The password is minimum 8 letters',
                'password.max'=>'The password is maximum 15 letters',
        ];
    }
}
