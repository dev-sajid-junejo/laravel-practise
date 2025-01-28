<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
           'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|min:10|max:15',
            'address1' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'pincode' => 'required|digits:5',
        ];
    }
    public function messages()
    {
        return [
            'fname.required' => 'First name is required.',
            'lname.required' => 'Last name is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'phone.required' => 'Phone number is required.',
            'phone.min' => 'Phone number must be at least 10 characters.',
            'address1.required' => 'Address line 1 is required.',
            'city.required' => 'City is required.',
            'state.required' => 'State is required.',
            'country.required' => 'Country is required.',
            'pincode.required' => 'Pincode is required.',
            'pincode.digits' => 'Pincode must be exactly 5 digits.',
        ];
    }
}
