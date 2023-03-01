<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Section_request extends FormRequest
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

            'name'=>'required|max:20|unique:sections,name',
            

        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'The name of required',
            'name.unique'=>'the Section unique',
            'name.max'=>'the maximum number of letters',
           
        ];
    }
}
