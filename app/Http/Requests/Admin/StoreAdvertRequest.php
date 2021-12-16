<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdvertRequest extends FormRequest
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
            'title'             => ['required'],
            'type'              => ['required'],
            'description'       => ['required'],
            'city'              => ['required', 'exists:cities,id'],
            'location'          => ['required'],
            'period'            => ['required'],
            'price'             => ['required', 'integer'],
            'categories'        => ['required', 'array'],
            'status'            => ['required'],
            'moderation_status' => ['required'],
            'account'           => ['required', 'exists:users,id']

        ];
    }
}
