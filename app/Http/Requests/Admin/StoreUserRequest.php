<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'     => ['required'],
            'username' => ['required', 'unique:users,username'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'role'     => ['required'],
            'phone'    => ['required', 'regex:/^6[5679][0-9]{7}$/'],
            'password' => ['required', 'min:5', 'confirmed']
        ];
    }
}
