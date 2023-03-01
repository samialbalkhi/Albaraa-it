<?php

namespace App\Http\Requests\dashbord;

use Illuminate\Foundation\Http\FormRequest;

class brand_request extends FormRequest
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
            'section_id'=>'required',
            'name'=>'required|max:20|unique:sections,name',
        ];
    }

    public function messages()
    {
        return [

            'section_id.required'=>'The Section of required',
            'name.required'=>'The name of required',
            'name.unique'=>'The name of unique',
        ];
    }
}
