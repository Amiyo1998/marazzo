<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'cat_id'=>[
                'required',
                Rule::exists("categories", "id"),
            ],
            'name'=>[
                'required',
                Rule::unique('sub_categories')->ignore($this->route('subCategory')),
                'min:5',
                'max:50'
            ]
        ];
    }
}
