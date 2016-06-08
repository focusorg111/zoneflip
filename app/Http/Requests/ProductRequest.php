<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
{
    /**
     * Determine if the index is authorized to make this request.
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
            'product_name' => 'required',
            'product_description' => 'required',
            'price' => 'required|numeric|min:1',
            'quantity' =>'required|numeric|min:1',
            'discount' => 'required|numeric',
            'category_id'=>'required',
            'subcategory_id'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'category_id.required'=>'Please select category',
            'subcategory_id.required'=>'Please select subcategory'
        ];

    }
}
