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
        if ($this->is('dashboard/user/create')) {
            return $this->createRules();
        } elseif ($this->is('dashboard/user/edit/*')) {
            return $this->updateRules();
        } else {
            return $this->registrationRules();
        }
    }

    public function createRules()
    {
        return [
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'username' => 'required|string|unique:users|max:30',
            'email' => 'required|email|unique:users|min:5|max:40',
            'password' => 'required|min:6|max:40',
            'pin_code' => 'integer',
            'country' => 'required|string|max:32',
        ];
    }

    public function updateRules()
    {
        return [
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'username' => 'required|string|max:30',
            'password' => 'sometimes|max:40',
            'pin_code' => 'integer',
            'country' => 'required|string|max:32',
        ];
    }

    public function registrationRules()
    {
        return [
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'username' => 'required|string|unique:users|max:30',
            'email' => 'required|email|unique:users|min:5|max:40',
            'password' => 'required|min:6|max:40|confirmed|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/',
            'pin_code' => 'integer',
            'country' => 'required|string|max:32',
        ];
    }
}
