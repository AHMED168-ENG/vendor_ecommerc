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
            "email" => "required|min:6|max:100|email|unique:vindoers_models,email," . $this -> id,
            "password" => "required_without:password2|unique:vindoers_models,password," . $this -> id,
            "age" => "required",
            "mobil" => "required|min:11|max:11|unique:vindoers_models,mobil," . $this -> id,
            "addres" => "required|min:10|string",
            "photo" => "mimes:png,jpg,jpeg,gif,svg|file|between:0,10000|required_without:password2",
            "catigory" => "required|numeric|exists:main_catigories,id", /* معناها انها موجوده في الجدول ده */
        ];
    }

    public function messages() {
        return [
            "name.required" => "يجب عليك ادخال الاسم",
            "name.min" => "الاسم صغير",
            "name.max" => "الاسم كبير",
            "name.string" => "الاسم يجب ان يكون نصي",
            "email.required" => "يجب عليك ادخال الايميل",
            "email.min" => "الايميل صغير",
            "email.max" => "الايميل كبير",
            "email.unique" => "يجب ان يكون الايميل وحيد",
            "email.email" => "هذا الحقل لا يستقبل غير ايميل",
            "email.unique" => "هذا الحقل يجب ان يكون وحيدا",
            "password.required_without" => "يجب عليك ادخال الرقم السري",
            "password.min" => "الرقم السري صغير",
            "password.max" => "الرقم السري كبير",
            "password.unique" => "يجب ان يكون الرقم السري وحيد",
            "age.required" => "يجب عليك ادخال العمر",
            "age.numeric" => "العمر يجب ان يكون رقمي",
            "mobil.required" => "يجب عليك ادخال الموبيل",
            "mobil.min" => "الرقم صغير",
            "mobil.max" => "الرقم كبير",
            "mobil.numeric" => "الرقم يجب ان يكون ارقام",
            "mobil.unique" => "هذا الحقل يجب ان يكون وحيدا",
            "addres.required" => "يجب عليك ادخال الموبيل",
            "addres.min" => "العنوان صغير",
            "addres.string" => "يجب ان يكون الموبيل رقمي",
            "photo.required_without" => "هذه الصوره مطلوبه",
            "photo.string" => "هذه الصوره يجب ان تكون نصا",
            "photo.mimes" => "امتداد الصوره يجب ان يكون في نطاق [jpg , png , jpeg , svg , gif]",
            "photo.between" => "يجب ان يكون مساحه الصوره صغيره",
            "catigory.required" => "يجب ادخال القسم",
            "catigory.numeric" => "القسم يجب ان يكون رقمي",
            "catigory.exists" => "القسم يجب ان يكون في الاقسام",
        ];
    }
}
