<?php

namespace App\Http\Requests\dashbord;

use Illuminate\Foundation\Http\FormRequest;

class ProfelRequest extends FormRequest
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
            'image_profile'=>['image','required'],
            'text_About'=>['required','alpha','min:30'],
            'image'=>['image','required'],
            'text_mission'=>['required','alpha','min:30'],
            'text_vision'=>['required','alpha','min:30'],
        ];
    }
    public function messages()
    {
        return [
          'image_profile.image'=>'please entre your image',
          'image_profile.require'=>'the image is required',
          'text_About.required'=>'the text is required',
          'text_About.alpha'=>'please entre your character',
          'text_About.min'=>'please entre your text min is 30 character',
          'image.image'=>'please entre your image',
          'image.require'=>'the image is required',

          'text_mission.required'=>'the text is required',
          'text_mission.alpha'=>'please entre your character',
          'text_mission.min'=>'please entre your text min is 30 character',


          'text_vision.required'=>'the text is required',
          'text_vision.alpha'=>'please entre your character',
          'text_vision.min'=>'please entre your text min is 30 character',
        ];
    }
}
