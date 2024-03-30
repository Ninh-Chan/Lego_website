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
            'customer_name' => ['required'],
            'customer_phone_number' => ['required'],
            'customer_email' => ['required'],
            'customer_password' => ['required'],
            'customer_address' => ['required'],
            'status' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => 'Name is required',
            'customer_name.regex' => 'Name is not correct format',
            'customer_phone_number.required' => 'Phone is required',
            'customer_phone_number.regex' => 'Phone is not correct format',
            'customer_email.required' => 'Email is required',
            'customer_password.required' => 'Password is required',
            'customer_address.required' => 'Address is required',
            'status.required' => 'Status is required',
        ];
    }
}
