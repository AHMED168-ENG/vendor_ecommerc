<?php

namespace App\Http\Requests\admin\language;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class Validat_language extends FormRequest
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
        $unique = request()->is("admin/language/add_language") ? "unique:languages" : "";
        return [
            "name" => "required|string|min:3|max:15|$unique",
            "shourtcut" => "required|string|min:1|max:4|$unique",
            "direction" => "required|string|in:ltr,rtl",
            "active" => "in:0,1",
        ];
    }

    public function messages() {
        return [
            "name.required" => "your name is required",
            "name.string" => "your name should be string",
            "name.unique" => "your name should be unique",
            "name.min" => "your name is small",
            "name.max" => "your name is max",
            "shourtcut.required" => "your shourtcut is required",
            "shourtcut.string" => "your shourtcut should be string",
            "shourtcut.unique" => "your shourtcut should be unique",
            "shourtcut.min" => "your shourtcut is small",
            "shourtcut.max" => "your shourtcut is max",
            "direction.required" => "your direction is required",
            "direction.string" => "your direction should be string",
        ];
    }
}
