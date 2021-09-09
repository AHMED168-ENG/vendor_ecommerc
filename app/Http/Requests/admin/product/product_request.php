<?php

namespace App\Http\Requests\admin\product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class product_request extends FormRequest
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
        return
            [
                "products.*.name" => ["required","min:3","max:40","string"],
                "products.*.description" => "required|min:10|max:400|string",
                "products.*.price" => "required|numeric",
                "products.*.kind_car" => "required|numeric",
                "products.*.model_cars" => "required|numeric",
                "products.*.pices" => "required|numeric",
                "products.*.numper_screen" => "required|numeric",
                "products.*.security" => "required|numeric",
                "products.*.main_catigory_id.0" => "required_without:hidden_description_photo",
                "products.*.active" => "in:0,1",
                "product_photo" => "array|required_without:hidden_description_photo",
                "description_photo" => "array|required_without:hidden_description_photo",
                "product_photo.*" => "mimes:png,jpg,jpeg,gif,svg|file|between:0,10000",
                "description_photo.*" => "mimes:png,jpg,jpeg,gif,svg|file|between:0,10000",
            ];
    }
    public function messages()
    {
        return [
            "products.*.price.required" => "يجب عليك ادخال السعر",
            "products.*.price.numeric" => "يجب ان يكون الحقل رقمي",
            "products.*.kind_car.required" => "يجب عليك ادخال نوع السياره",
            "products.*.kind_car.numeric" => "يجب ان يكون الحقل رقمي",
            "products.*.model_cars.required" => "يجب عليك ادخال الموديل",
            "products.*.model_cars.numeric" => "يجب ان يكون الحقل رقمي",
            "products.*.pices.required" => "يجب عليك ادخال القطع",
            "products.*.pices.numeric" => "يجب ان يكون الحقل رقمي",
            "products.*.numper_screen.required" => "يجب عليك ادخال رقم الشاشه",
            "products.*.numper_screen.numeric" => "يجب ان يكون الحقل رقمي",
            "products.*.security.required" => "يجب عليك ادخال الضمان",
            "products.*.security.numeric" => "يجب ان يكون الحقل رقمي",
            "products.*.name.required" => "يجب عليك ادخال الاسم",
            "products.*.name.string" => "اسم القسم يجب ان يكون نصي",
            "products.*.name.min" => "اسم القسم صغير",
            "products.*.name.max" => "اسم القسم كبير",
            "products.*.description.required" => "يجب عليك ادخال الوصف",
            "products.*.description.string" => "وصف القسم يجب ان يكون نصي",
            "products.*.description.min" => "وصف القسم صغير",
            "products.*.description.max" => "وصف القسم كبير",
            "product_photo.*.string" => "هذه الصوره يجب ان تكون نصا",
            "product_photo.*.mimes" => "امتداد الصوره يجب ان يكون في نطاق [jpg , png , jpeg , svg , gif]",
            "product_photo.*.between" => "يجب ان يكون مساحه الصوره صغيره",
            "description_photo.*.string" => "هذه الصوره يجب ان تكون نصا",
            "description_photo.*.mimes" => "امتداد الصوره يجب ان يكون في نطاق [jpg , png , jpeg , svg , gif]",
            "description_photo.*.between" => "يجب ان يكون مساحه الصوره صغيره",
            "description_photo.required_without" => "يجب ادخال صور وصف المنتج",
            "product_photo.required_without" => "يجب ادخال صور المنتج",
            "products.*.main_catigory_id.0.required_without" => "القسم مطلوب",
            "products.*.active.in" => "هذا الحقل يجب ان يكون بين * , 1",
        ];
    }
}
