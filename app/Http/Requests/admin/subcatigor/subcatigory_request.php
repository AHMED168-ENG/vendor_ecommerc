<?php

namespace App\Http\Requests\admin\subcatigor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class subcatigory_request extends FormRequest
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
        if(isset(request() -> subcatigory[0]["id"])) {
            foreach (request() -> subcatigory as $key => $value) {
                $GLOBALS["name"][] = ["id" , "!=" , $value["id"]];
            }
        }
        return
            [
                "subcatigory.*.description" => "required|min:10|max:400|string",
                "subcatigory.*.main_catigory_id.0" => "required_without:hidden_photo",
                "subcatigory.*.active" => "in:0,1",
                "photo" => "mimes:png,jpg,jpeg,gif,svg|file|between:0,10000|required_without:hidden_photo",
                "subcatigory.*.name" => ["required","min:3","max:40","string",Rule::unique("main_catigories" ,
                "name") -> where(function($query ) {
                    return $query -> where($GLOBALS["name"]);
                }) ],
            ];
    }
    public function messages()
    {
        return [
            "subcatigory.*.name.required" => "يجب عليك ادخال الاسم",
            "subcatigory.*.name.string" => "اسم القسم يجب ان يكون نصي",
            "subcatigory.*.name.unique" => "اسم القسم يجب ان يكون وحيد",
            "subcatigory.*.name.min" => "اسم القسم صغير",
            "subcatigory.*.name.max" => "اسم القسم كبير",
            "subcatigory.*.description.required" => "يجب عليك ادخال الوصف",
            "subcatigory.*.description.string" => "وصف القسم يجب ان يكون نصي",
            "subcatigory.*.description.min" => "وصف القسم صغير",
            "subcatigory.*.description.max" => "وصف القسم كبير",
            "photo.required_without" => "هذه الصوره مطلوبه",
            "photo.string" => "هذه الصوره يجب ان تكون نصا",
            "photo.mimes" => "امتداد الصوره يجب ان يكون في نطاق [jpg , png , jpeg , svg , gif]",
            "photo.between" => "يجب ان يكون مساحه الصوره صغيره",
            "subcatigory.*.main_catigory_id.0.required_without" => "القسم مطلوب",
            "subcatigory.*.active.in" => "هذا الحقل يجب ان يكون بين 0 , 1",
        ];
    }
}
