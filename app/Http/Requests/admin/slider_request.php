<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class slider_request extends FormRequest
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
            "sliders.*.title" => "required|string",
            "sliders.*.info" => "required_without:hidden_img|string",
            //"sliders.*.page" => "required|numeric",
            "slider_photo" => "required_without:hidden_img|between:0,10000|mimes:jpg,jpeg,png,svg,gif",
        ];
    }
    public function messages()
    {
        return [
            "sliders.*.title.required" => "يجب ادخال عنوان الاسليدر",
            "sliders.*.title.string" => "يجب ان يكون العنوان نصا",
            "sliders.*.info.required" => "يجب ادخال نص الاسليدر",
            "sliders.*.info.string" => "يجب ان يكون النص نصا",
            "sliders.*.page.required" => "يجب ادخال الصفحه الخاصه الاسليدر",
            "sliders.*.page.string" => "يجب عدم اللعب في محتوي الموقع",
            "slider_photo.required" => "يجب ادخال صوره الاسليدر",
            "slider_photo.between" => "يجب ان تكون الصوره صغيره",
            "slider_photo.mimes" => "يجب ان يكون امتداد الصوره واحد من التالي [jpg , jpeg , png , gif , svg]",
        ];
    }
}
