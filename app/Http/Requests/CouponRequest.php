<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'coupon_name'=>[
                'required',
                Rule::unique('coupons')->ignore($this->route('coupon')),
                'min:3',
                'max:8'
            ],
            'coupon_discount'=>[
                'required',
                'max:8'
            ],
        ];
    }
}
