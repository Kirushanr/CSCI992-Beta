<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ISBN;

class UpdateAdvert extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'price' => 'numeric',
            'photos.*' => 'image|mimes:png,jpeg,jpg',
            'author'=>'sometimes|required',
            'ISBN'=>['sometimes', new ISBN],
            'subjectcode' =>'sometimes',
            'edition'=>'sometimes',
            'type'=>'string',
            'model'=>'sometimes',
            'devicetype'=>'sometimes',
            'haswarranty'=>'sometimes'
        ];
    }
    /**
     * Get the error messages that apply to the request
     * @return array
     * 
     */
    public function messages(){
        return [
            'title.required' => 'Title is required',
            'description.required' => 'Description is required!',
            'price.numeric' =>'Price should be a number',
            'photos.*.required' => 'You haven\'t choose a photo.',
            'photos.*.max' => 'Your photo is too large, must be less than :max kb.',
            'photos.*.mimes' => 'We only accept :values.',
            'author.required'=>'Author name is required',
            'haswarranty.required'=>'Required'
        ];
    }
}
