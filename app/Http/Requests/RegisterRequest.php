<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
                 'first_name' => 'required',
                 'last_name' => 'required',
                 'user_name' => 'required|unique:users|email',
                 'password'  =>  'required|min:6',
                 'confirm_password' => 'required|min:6|same:password',
                  'company_name' => 'required',
                  'contact_no' => 'required|numeric|max:10',

        ];
    }
}
