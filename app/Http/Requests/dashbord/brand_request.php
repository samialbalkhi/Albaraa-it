<?php

namespace App\Http\Requests\dashbord;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        if ($this->routeIs('create_brand')) {
            return [
                'section_id' => ['required', 'exists:sections,id'],
                'name' => ['required', 'alpha','max:20', 'min:3',  'unique:sections,name'],
            ];
        } else {
            
            return [
                'section_id' => ['required', 'exists:sections,id'],
                'name' => ['required','alpha', 'max:20', 'min:3',Rule::unique('brands','name')->ignore($this->route()->id)],
            ];
        }
    }

    public function messages()
    {
        if ($this->routeIs('create_brand')) {
            return [
                'section_id.required' => 'The Section of required',
                'section_id' => 'The Section is unavailable',
                'name.required' => 'The name of required',
                'name.max' => 'the name os the 20 cracter',
                'name.min' => 'the name os the 3 cracter',
                'name.string' => 'The name must be string',
                'name.unique' => 'The name of unique',
            ];
        } else {
            return [
                'section_id.required' => 'The Section of required',
                'section_id' => 'The Section is unavailable',
                'name.required' => 'The name of required',
                'name.max' => 'the name os the 20 cracter',
                'name.min' => 'the name os the 3 cracter',
                'name.string' => 'The name must be string',
                'name.unique' => 'The name of unique',
            ];
        }
    }
}
