<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
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
            'name' => ['required'],
            'phone_number' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'address' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.regex' => 'Name is not correct format',
            'phone_number.required' => 'Phone is required',
            'phone_number.regex' => 'Phone is not correct format',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'address.required' => 'Address is required',
            //'status.required' => 'Status is required',
        ];
    }
}
