<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidation extends FormRequest
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
            'first_name' => 'required|string|max:30',
            'last_name'  => 'required|string|max:30',
            'username'   => 'required|string|unique:users|max:30',
            'email'      => 'required|email|unique:users|min:5|max:40',
            'password'   => 'required|min:6|max:40|confirmed|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/',
            'pin_code'   => 'integer|max:35',
            'country'    => 'required|string|max:32',
        ];
    }
}
