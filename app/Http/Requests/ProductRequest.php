<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>[
                'required',
                Rule::unique('products')->ignore($this->route('product')),
                'min:3',
                'max:50'
            ],
            'cat_id'=>[
                'required',
                Rule::exists("categories", "id"),
            ],
            // 'subcat_id' =>[
            //    'nullable'
            // ],
            'slug'=>[
                'required',
                'max:255'
            ],
            'small_description'=>[
                'required',
                'max:1000'
            ],
            'description'=>[
                'required',
                'max:1000'
            ],
            'regular_price'=>[
                'required',
                'max:255'
            ],
            'seller_price'=>[
                'required',
                'max:255'
            ],
            'product_quantity'=>[
                'required',
                'max:255'
            ],
            'cover'=>[
                'nullable',
                'image:jpg,jpeg,png'
            ],
            'hover'=>[
                'nullable',
                'image:jpg,jpeg,png'
            ],
            'images'=>[
                'nullable',
                'image:jpg,jpeg,png'
            ]
        ];
    }
}
