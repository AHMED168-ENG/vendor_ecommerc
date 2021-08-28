<?php

namespace App\Http\Controllers\admin\language;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\language\Validat_language;
use App\models\languages\language;
use Illuminate\Http\Request;

class all_language extends Controller
{
    public function show_all() {
        $data = language::select("id" , "name" , "shourtcut" , "direction" , "active")->paginate(bagination_count);
        return view("admin/languages/allLanguage" , compact("data" , "data"));
    }

    public function edit_language($id) {
        if(empty(language::find($id))) {
            return redirect() -> route("all_lang") -> with(["message" => " هذه اللغه غير موجوده للتعديل" , "type" => "danger"]);
        }
        $language = language::select("id" , "name" , "shourtcut" , "direction" , "active")->where("id" , $id)->get()[0];
        return view("admin/languages/edit_language" , compact("language" , $language));
    }
/*---------------------      validate and save language ---------------------*/
    public function save_language(Validat_language $request , $id) {
        try {
            request()->has("active") ? "" : $request -> request->add(["active" => 0]);
            language::find($id)->update($request -> all());
            return redirect() -> back() -> with(["message" => "تم تعديل بيانات اللغه بنجاح" , "type" => "success"]);
        } catch (\Throwable $th) {
             return redirect() -> back() -> with(["message" => "هناك خطا محتمل يجب ان تتواصل مع الدعم الفني" , "type" => "danger"]);
        };
    }
/*---------------------      validate and save language ---------------------*/


/*---------------------      delete language ---------------------*/
public function delete_language($id) {
    if(empty(language::find($id))) {
        return redirect() -> route("all_lang") -> with(["message" => " هذه اللغه غير موجوده للحذف" , "type" => "danger"]);
    }
    language::find($id) -> delete();
    return redirect() -> route("all_lang") -> with(["message" => " تم الحذف بنجاح" , "type" => "success"]);

}
/*---------------------      delete language ---------------------*/

/*---------------------      delete language ---------------------*/
public function active_language($id) {
    try {
        if(!language::find($id)) {
            return redirect() -> route("all_lang") -> with(["message" => " هذه اللغه غير موجوده للحذف" , "type" => "danger"]);
        }
        $element = language::find($id);
        $element->update([
            "active" => $element -> active == 1 ? "0" : 1,
        ]);
        $letter = $element -> active == 1 ? "تم التفعيل بنجاح" : "تم الغاء التعيل بنجاح";
        return redirect() -> route("all_lang") -> with(["message" => $letter , "type" => "success"]);
    } catch (\Throwable $th) {
        return errorMassage("" , "danger");
    }


}
/*---------------------      delete language ---------------------*/

}
