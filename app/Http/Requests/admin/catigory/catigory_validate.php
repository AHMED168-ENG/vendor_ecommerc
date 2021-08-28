<?php

namespace App\Http\Requests\admin\catigory;

use Illuminate\Foundation\Http\FormRequest;

class catigory_validate extends FormRequest
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
        $one = request() -> url() == route("save_data") ? "|unique:main_catigories" : "";
        return
            [
                "catigory.*.name" => "required|min:3|max:40|string" . $one,
                "catigory.*.description" => "required|min:10|max:400|string" . $one,
                "catigory.*.slug" => "required|string",
                "catigory.*.active" => "in:0,1",
                "photo" => "mimes:png,jpg,jpeg,gif,svg|file|between:0,10000|required_without:id",
            ];
    }
    public function messages()
    {
        return [
            "catigory.*.name.required" => "يجب عليك ادخال الاسم",
            "catigory.*.name.string" => "اسم القسم يجب ان يكون نصي",
            "catigory.*.name.unique" => "اسم القسم يجب ان يكون وحيد",
            "catigory.*.name.min" => "اسم القسم صغير",
            "catigory.*.name.max" => "اسم القسم كبير",
            "catigory.*.description.required" => "يجب عليك ادخال الوصف",
            "catigory.*.description.string" => "وصف القسم يجب ان يكون نصي",
            "catigory.*.description.unique" => "وصف القسم يجب ان يكون وحيد",
            "catigory.*.description.min" => "وصف القسم صغير",
            "catigory.*.description.max" => "وصف القسم كبير",
            "photo.required_without" => "هذه الصوره مطلوبه",
            "photo.string" => "هذه الصوره يجب ان تكون نصا",
            "photo.mimes" => "امتداد الصوره يجب ان يكون في نطاق [jpg , png , jpeg , svg , gif]",
            "photo.between" => "يجب ان يكون مساحه الصوره صغيره",
            "catigory.*.translation_lang.required" => "هذا الحقل مطلوب",
            "catigory.*.translation_lang.string" => "هذا الحقل يجب ان يكون نصي",
            "catigory.*.translation_lang.min" => "هذا الحقل صغير",
            "catigory.*.translation_lang.max" => "هذا الحقل كبير",
            "catigory.*.slug.required" => "الشعار مطلوب",
            "catigory.*.slug.string" => "الشعار يجب ان يكون نصي",
            "catigory.*.active.in" => "هذا الحقل يجب ان يكون بين 0 , 1",
        ];
    }
}
