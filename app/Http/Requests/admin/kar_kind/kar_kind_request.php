<?php

namespace App\Http\Requests\admin\kar_kind;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class kar_kind_request extends FormRequest
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
        $GLOBALS["name"] =  [];
        if(isset(request() -> car_kind[0]["id"])) {
            foreach (request() -> car_kind as $key => $value) {
                $GLOBALS["name"][] = ["id" , "!=" , $value["id"]];
            }
        }
        return [
            "car_kind.*.name" => ["required","string","max:40","min:3"],
            "car_photo" => "required_without:car_photo_old|mimes:jpg,jpeg,png,gif,svg|file|between:0,10000",
            "car_logo_photo" => "required_without:car_photo_old|mimes:jpg,jpeg,png,gif,svg|between:0,10000",
            "car_kind.*.active" => "in:0,1",
        ];
    }

    public function messages() {
        return [
            "car_kind.*.name.required" => "يجب عليك ادخال اسم النوع",
            "car_kind.*.name.string" => "يجب ان يكون الاسم نصي",
            "car_kind.*.name.max" => "الاسم الذي ادخلته كبير",
            "car_kind.*.name.min" => "الاسم الذي ادخلته صغير",
            "car_photo.mimes" => "امتداد الصوره يجب ان يكون في نطاق [jpg , png , jpeg , svg , gif]",
            "car_photo.between" => "يجب ان يكون مساحه الصوره صغيره",
            "car_photo.required" => "يجب ادخال صوره السياره",
            "car_logo_photo.mimes" => "امتداد الصوره يجب ان يكون في نطاق [jpg , png , jpeg , svg , gif]",
            "car_logo_photo.between" => "يجب ان يكون مساحه الصوره صغيره",
            "car_logo_photo.required" => "يجب ادخال شعار السياره",
        ];
    }
}
