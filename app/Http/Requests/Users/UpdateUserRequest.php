<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('users')->ignore($this->request->get('id')),
            ],
            'email' => 'required|email',
            'password' => 'required|max:10',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'This field is required',
            'name.unique' => 'This name is existed',

            'email.required' => 'This field is required',
            'email.email' => 'This field is email',

            'password.required' => 'This field is required',
            'password.max' => 'This field is max 10',

            'phone.required' => 'This field is required',
            'address.required' => 'This field is required',
            'gender.required' => 'This field is required'
        ];
    }
}
