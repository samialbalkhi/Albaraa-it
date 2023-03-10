<?php

namespace App\Http\Requests\dashbord;

use Illuminate\Foundation\Http\FormRequest;

class BnarsRecuest extends FormRequest
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
        if($this->routeIs('create_bnars')){
            
            return [
                'image'=>['required','image'],
            ];
        }else{
            return [
                'image'=>['required','image'],
            ];
        }
    }
    public function messages()
    {
        if($this->routeIs('create_bnars')){

            return [
    
                'image.required'=>'the image is required',
                'image.image'=>'please enter the image',
            ];
        }else{
            return [
    
                'image.required'=>'the image is required',
                'image.image'=>'please enter the image',
            ];
        }
    }
}
