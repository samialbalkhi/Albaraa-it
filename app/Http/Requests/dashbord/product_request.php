<?php

namespace App\Http\Requests\dashbord;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class Product_request extends FormRequest
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
        if ($this->routeIs('create_product')) {
            
            return [
                'name' => ['required','max:15', 'min:3', 'alpha','unique:prodacts,name'],
                'title' => ['required', 'alpha', 'min:3', 'max:15'],
                'details' => ['required', 'min:3', 'max:15', 'alpha'],
                'price' => ['required', 'numeric'],
                'discount' => ['nullable', 'numeric'],
                'brand_id' => ['required', 'exists:brands,id'],
                'image' => ['required', 'image'],
            ];
        } else {
            
            return [
                'name' => ['required','max:15', 'min:3', 'alpha', Rule::unique('prodacts','name')->ignore($this->route()->id)],
                'title' => ['required', 'alpha', 'min:3', 'max:20'],
                'details' => ['required', 'min:3', 'max:30', 'alpha'],
                'price' => ['required', 'numeric'],
                'discount' => ['nullable', 'numeric'],
                'brand_id' => ['required', 'exists:brands,id'],
                'image' => ['required', 'image'],
            ];
        }
    }

    public function messages()
    {
        if ($this->routeIs('create_product')) {
            return [
                /////    name       /////
                
                'name.required' => 'The name is required',
                'name.max' => 'name must be at least 15 characters',
                'name.min' => 'The name must be at least 3characters',
                'name.alpha' => 'the name must be alpha',

                ///////  title    ///////////

                'title.required' => 'the title is required',
                'title.alpha' => 'the title must be characters',
                'title.min' => 'the title must be at least 3 characters',
                'title.max' => 'the title must be at least max 20 characters',

                //////////////   Details          ////////////
                'details.required' => 'The Details of details is required',
                'details.min' => 'the Details is must be at least 3characters',
                'details.max' => 'the Details is must be at least max 30  characters',
                'details.alpha'=>'the Details is characters',
                

                /////////    price       ///////////////
                'price.required' => 'The price is required',
                'price.numeric' => 'The price is numeric',
                'price.max' => 'the Price is must be at least max 10 numbers',
                'price.min' => 'the Price is must be at least 1 number',

                ////////// /        brands          /////
                'brand_id.required' => 'The brand is required',
                ///////////     image    ////////////
                'image.required' => 'The image is required',
                'image.image' => 'Please insert a photo',
            ];
        } else {
            return [
                /////    name       /////
                
                'name.required' => 'The name is required',
                'name.max' => 'name must be at least 15 characters',
                'name.min' => 'The name must be at least 3characters',
                'name.alpha' => 'the name must be characters',

                ///////  title    ///////////

                'title.required' => 'the title is required',
                'title.alpha' => 'the title must be alpha',
                'title.min' => 'the title must be at least 3 characters',
                'title.max' => 'the title must be at least max 20 characters',

                //////////////   Details          ////////////
                'details.required' => 'The Details of details is required',
                'details.min' => 'the Details is must be at least 3characters',
                'details.max' => 'the Details is must be at least max 30  characters',
                'details.alpha', 'the Details is characters characters',
               

                /////////    price       ///////////////
                'price.required' => 'The price is required',
                'price.numeric' => 'The price is numeric',
                'price.max' => 'the Price is must be at least max 10 numbers',
                'price.min' => 'the Price is must be at least 1 number',

                ////////// /        brands          /////
                'brand_id.required' => 'The brand is required',
                ///////////     image    ////////////
                'image.required' => 'The image is required',
                'image.image' => 'Please insert a photo',
            ];
        }
    }
}
