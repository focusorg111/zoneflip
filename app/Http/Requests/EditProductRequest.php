<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditProductRequest extends Request
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
            'product_name' => 'required|alpha_spaces',
            'product_description' => 'required',
            'price' => 'required|numeric',
            'quantity' =>'required|numeric',
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
