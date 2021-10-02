<?php

namespace App\Http\Requests\admin\comments;

use Illuminate\Foundation\Http\FormRequest;

class comment_request extends FormRequest
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
            "comment" => "required",
            "product" => "required_without:id|numeric",
        ];
    }
    public function messages()
    {
        return [
            "comment.required" => "يجب ادخال كومنت اولا",
            "product.required_without" => "يجب اختيار المنتج الذي تريد وضع الومنت عليه",
            "product.numeric" => "يجب عدم محاوله الاختراق",
        ];
    }
}
