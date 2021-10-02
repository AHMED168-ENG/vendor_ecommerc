<?php

namespace App\Http\Requests\frontEnd\user_siting;

use Illuminate\Foundation\Http\FormRequest;

class user_siting_request extends FormRequest
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
            "f_name" => "required|string",
            "l_name" => "required|string",
            "addres" => "required|string",
            "age" => "required|numeric",
            "phone" => "required|string|min:11|max:11",
            "email" => "required|email",
            "user_photo" => "required_without:hidden_photo",
        ];
    }
    public function messages()
    {
        return [
            "f_name.required" => "ادخل الاسم الاول",
            "f_name.string" => "يجب ان يكون الاسم نصي",
            "l_name.required" => "ادخل الاسم الاخير",
            "l_name.string" => "يجب ان يكون الاسم نصي",
            "addres.required" => "ادخل العنوان",
            "addres.string" => "يجب ان يكون العنوان نصي",
            "age.required" => "ادخل العمر ",
            "age.string" => "يجب ان يكون العمر نصي",
            "phone.required" => "ادخل رقم  الهاتف  مكون من 11 رقم الاول",
            "phone.string" => "يجب ان يكون العمر نصي",
            "phone.max" => "الرقم يجب ان يكون 11 رقم",
            "phone.min" => "الرقم يجب ان يكون 11 رقم",
            "email.required" => "ادخل الايميل",
            "email.string" => "يجب ان يكون نوع الحقل ايميل",
            "user_photo.required_without:hidden_photo" => "الايميل يجب ان يكون نصي",
        ];
    }
}
