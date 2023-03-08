<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
        if ($this->routeIs('createsection')) {
            return [
                'name' => ['required','max:20','alpha','unique:sections,name'],
            ];
        }else{
            return [

                'name'=>['required','max:20','alpha','unique:sections,name',Rule::unique('Sections','name')->ignore($this->route()->id)],
            ];
        }
    }
    public function messages()
    {
        if($this->routeIs('createsection')) {

            
            return [
                'name.required' => 'The name of required',
                'name.unique' => 'the Section unique',
                'name.alpha'=>'the name in chractres',
                'name.max' => 'the maximum number of letters',
            ];
        }else{
            return [
                'name.required' => 'The name of required',
                'name.alpha'=>'the name in chractres',
                'name.max' => 'the maximum number of letters',
            ];
        }
    
    }
}
