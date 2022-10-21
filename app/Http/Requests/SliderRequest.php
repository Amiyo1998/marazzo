<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'title'=>[
                'required',
                Rule::unique('sliders')->ignore($this->route('slider')),
                'min:5',
                'max:20'
            ],
            'sub_title'=>[
                'required',
                'min:5',
                'max:20'
            ],
            'description'=>[
                'required',
                'min:5',
                'max:100'
            ],
            'url'=>[
                'required',
                'min:5',
                'max:200'
            ],
            'image'=>[
                'nullable',
                'image:jpg,jpeg,png'
            ],
        ];
    }
}
