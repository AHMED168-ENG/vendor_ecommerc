<?php

namespace App\Http\Requests\admin\language;

use Illuminate\Foundation\Http\FormRequest;

class sign_admin_validation extends FormRequest
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
            "email" => "required|email",
            "password" => "required|string|min:10|max:20"
        ];
    }
    public function messages()
    {
        return [
            "email.email" => "your email should be email",
            "email.required" => "enter your email please",
            "password.required" => "enter your password please",
            "password.string" => "your password should be string",
            "password.min" => "your password is small",
            "password.max" => "your password is long",
        ];
    }
}
