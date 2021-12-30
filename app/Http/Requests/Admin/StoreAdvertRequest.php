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
            'description'       => ['required', 'max:255'],
            'city'              => ['required', 'exists:cities,id'],
            'location'          => ['required'],
            'period'            => ['required'],
            'price'             => ['required', 'integer'],
            'categories'        => ['required', 'array'],
            'features'          => ['nullable', 'array'],
            'status'            => ['required'],
            'moderation_status' => ['required'],
            'visit_fees'        => ['nullable', 'integer'],
            'commission'        => ['nullable', 'integer'],
            'account'           => ['required', 'exists:users,id'],
            'latitude'          => ['nullable', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'longitude'         => ['nullable', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],

        ];
    }
}
