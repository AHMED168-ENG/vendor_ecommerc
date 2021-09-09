<?php

namespace App\Http\Requests\admin\vindoer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class vindoer_validation extends FormRequest
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
    public function rules(Request $request )
    {
        $unique = Request() -> url() == route("create_vindoer") ? "" : "";

        return [
            "name" => "required|min:6|max:20|string",
            "shop_name" => "required|min:6|max:20|string",
            "email" => "required|min:6|max:100|email|unique:vindoers_models,email," . $this -> id,
            "password" => "required_without:password2",
            "age" => "required",
            "mobil" => "required|min:11|max:11|unique:vindoers_models,mobil," . $this -> id,
            "addres" => "required|min:10|string",
            "Commercial_Register" => "mimes:pdf|file|between:0,10000|required_without:password2",
            "shop_img" => "mimes:jpg,jpeg,gif,png,svg|file|between:0,10000|required_without:password2",
            "accept_ruls" => "required_without:check_if_admin_enter_or_no",
        ];
    }

    public function messages() {
        return [
            "name.required" => "يجب عليك ادخال الاسم",
            "name.min" => "الاسم صغير",
            "name.max" => "الاسم كبير",
            "name.string" => "الاسم يجب ان يكون نصي",
            "shop_name.required" => "يجب عليك ادخال الاسم",
            "shop_name.min" => "الاسم صغير",
            "shop_name.max" => "الاسم كبير",
            "shop_name.string" => "الاسم يجب ان يكون نصي",
            "email.required" => "يجب عليك ادخال الايميل",
            "email.min" => "الايميل صغير",
            "email.max" => "الايميل كبير",
            "email.unique" => "هذا الايميل موجود بالفعل",
            "email.email" => "هذا الحقل لا يستقبل غير ايميل",
            "email.unique" => "هذا الحقل يجب ان يكون وحيدا",
            "password.required_without" => "يجب عليك ادخال الرقم السري",
            "age.required" => "يجب عليك ادخال العمر",
            "age.numeric" => "العمر يجب ان يكون رقمي",
            "mobil.required" => "يجب عليك ادخال الموبيل",
            "mobil.min" => "الرقم صغير",
            "mobil.max" => "الرقم كبير",
            "mobil.numeric" => "الرقم يجب ان يكون ارقام",
            "mobil.unique" => "هذا الحقل يجب ان يكون وحيدا",
            "addres.required" => "يجب عليك ادخال العنوان",
            "addres.min" => "العنوان صغير",
            "addres.string" => "يجب ان يكون الموبيل رقمي",
            "Commercial_Register.required_without" => "هذه الملف مطلوبه",
            "Commercial_Register.string" => "هذه الملف يجب ان تكون نصا",
            "Commercial_Register.mimes" => "امتداد الملف يجب ان يكون في نطاق pdf",
            "Commercial_Register.between" => "يجب ان يكون مساحه الملف صغيره",
            "shop_img.required_without" => "هذه الملف مطلوبه",
            "shop_img.string" => "هذه الملف يجب ان تكون نصا",
            "shop_img.mimes" => "امتداد الملف يجب ان يكون في نطاق [jpg , jpeg , png , gif , svg]",
            "shop_img.between" => "يجب ان يكون مساحه الملف صغيره",
            "accept_ruls.required_without" => "يجب عليك الموافقه علي الشروط اولا",
        ];
    }
}
