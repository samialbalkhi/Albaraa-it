<?php

namespace App\Http\Requests\dashbord;

use Illuminate\Foundation\Http\FormRequest;

class product_request extends FormRequest
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
            'name'=>'required|max:15',
            'title'=>'required',
            'list_of_details'=>'required',
            'price'=>'required',
            'discount'=>'nullable',
            'brand_id'=>'required',
            'image'=>'required|image'
        ];
    }

    public function messages()
    {
        return [

            'name.required'=>'The name is required',
            'name.max'=>'name must be at least 15 characters',
            'list_of_details.required'=>'The list of details is required',
            'price.required'=>'The price is required',
            'brand_id.required'=>'The brand is required',
            'image.required'=>'The image is required',
            'image.image'=>'Please insert a photo'

        ];
    }
}
