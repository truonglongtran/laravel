<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users|string|max:191',
            'password' => 'required|string|min:6|max:20',
            're-password' => 'required|same:password',
            'user_catalogue_id'=> 'required|integer|gt:0',
            'name' => 'required|string',
            'birthday' => 'required|date|before:today',
            'avartar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'string',
            'phone' => 'required|string|regex:/^\+?[0-9]{10,15}$/',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'This email is already taken.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 6 characters.',
            'password.max' => 'The password may not be greater than 20 characters.',
            're-password.required' => 'The password confirmation is required.',
            're-password.same' => 'The password confirmation does not match.',
            'user_catalogue_id.required' => 'The user catalogue ID is required.',
            'user_catalogue_id.gt' => 'The user catalogue ID must be greater than 0.',
            'name.required' => 'The fullname field is required.',
            'birthday.required' => 'The birthday field is required.',
            'birthday.date' => 'The birthday must be a valid date.',
            'birthday.before' => 'The birthday must be a date before today.',
            'avartar.image' => 'The avatar must be an image.',
            'avartar.mimes' => 'The avatar must be a file of type: jpeg, png, jpg, gif.',
            'avartar.max' => 'The avatar may not be greater than 2048 kilobytes.',
            'address.string' => 'The address must be a string.',
            'phone.required' => 'The phone field is required.',
            'phone.regex' => 'The phone number format is invalid.',
        ];
    }
}
