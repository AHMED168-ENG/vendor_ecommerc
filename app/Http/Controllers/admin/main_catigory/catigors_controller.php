<?php

namespace App\Http\Controllers\admin\main_catigory;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\catigory\catigory_validate;
use App\models\languages\language;
use Illuminate\Http\Request;
use App\models\main_catigory\catigors_models;
use App\models\vindoers\vindoers_model;

class catigors_controller extends Controller
{
    public function show_all() {
        try {
            $data = catigors_models::select("id" , "name"  , "slug" , "photo" , "active")->where("main_catigory_id" , 0)->where("shourtcut" , git_default_language())->paginate(bagination_count);
            return view("admin/main_catigory/main_category_view" , compact("data"));
        } catch (\Exception $ex) {
            return redirect() -> back() -> with(["message" => "هناك خطا في البيانات ويجب عليك الرجوع الي صانع الموقع او الدعم الفني" , "type" => "danger"]);
        }
    }
    public function create() {
        try {
            return view("admin/main_catigory/add_main_catigory_view");
        } catch(\Exception $ex) {
            return redirect() -> back() -> with(["message" => "هناك خطا في البيانات ويجب عليك الرجوع الي صانع الموقع او الدعم الفني" , "type" => "danger"]);
        }
    }

    public function save_data(catigory_validate $request) {
        try {
                $catigory = collect($request -> catigory);
                $val = $catigory -> filter(function($value , $key) {
                    return $value["shourtcut"] == git_default_language();
                });
                $val = array_values($val->all());
                $photo = uploud_img($request -> photo , "public/asset/admin/images/categoris_photo");
                $default_language_id = catigors_models::insertGetId([
                    "name" => $val[0]["name"],
                    "shourtcut" => $val[0]["shourtcut"],
                    "translation_of" => 0,
                    "description" => $val[0]["description"],
                    "slug" => $val[0]["slug"],
                    "photo" => $photo,
                    "active" => isset($val[0]["active"]) ? "1" : "0",
                ]);
                $val = $catigory -> filter(function($value , $key) {
                    return $value["shourtcut"] != git_default_language();
                });
                $val =  array_values($val -> all());
                $arr = [];
                foreach (language::where("active" , 1) -> where("shourtcut" ,"!=", git_default_language()) -> get()  as $key => $value) {
                    $arr[] = [
                        "name" => $val[$key]["name"],
                        "shourtcut" => $val[$key]["shourtcut"],
                        "translation_of" => $default_language_id,
                        "description" => $val[$key]["description"],
                        "slug" => $val[$key]["slug"],
                        "photo" => $photo,
                        "active" => isset($val[$key]["active"]) ? "1" : '0',
                    ];
                }
                catigors_models::insert($arr); /* هذه الطريقه افضل من اجل الجوده */
                return redirect() -> back() -> with(["message" => "تمت اضافه القسم بنجاح" , "type" => "success"]);
        } catch (\Exception $th) {
            return errorMassage("" , "danger");
       }
    }

    public function show_edit_page($id) {
        try {
            if(!catigors_models::find($id)) {
                return redirect()->route("all_catigory") -> with(["message" => "هذا القسم غير موجود" , "type" => "danger"]);
            }
            $data = catigors_models::select("id" , "name" , "slug" , "photo" , "active" , "description" , "shourtcut")->where("id" , $id)->get()[0];
            $data2 = getAllLanguageOfCatigory(catigors_models::class , $id);

            return view("admin/main_catigory/edit_maincatigory" , compact(["data" , "data2"]));

        } catch (\Exception $ex) {
            return redirect() -> back() -> with(["message" => "يوجد عطل فني هنا " , "type" => "danger"]);
        }
    }
    public function save_catigory(catigory_validate $request , $id) {
        try {
            $photo = $request -> hidden_photo;
            if(isset($request -> photo)) {
                deletePhoto($photo , "public/asset/admin/images/categoris_photo");
                $photo = uploud_img($request -> photo , "public/asset/admin/images/categoris_photo");
            }
            foreach ($request -> catigory as $key => $value) {
                catigors_models::find($value["id"])->update([
                    "name" => $value["name"],
                    "description" => $value["description"],
                    "slug" => $value["slug"],
                    "active" => isset($value["active"]) ? "1" : "0",
                    "photo" => $photo,
                ]);
            }
            return errorMassage("تم تحديث القسم بنجاح" , "success");
        } catch(\Exception $ex) {
            return $ex;
            return errorMassage("" , "danger");
        }
    }
    public function active($id) {
        $catigory = catigors_models::find($id);
        $active = $catigory -> active;
        if(!$catigory) {
            return errorMassage("هذا العنصر غير موجود" , "danger");
        }
        $catigory -> update([
            "active" => $active == "0" ? "1" : "0"
        ]);
        $active = $active == "0" ? "تم تفعيل القسم" : "تم الغاء تفعيل القسم";
        return errorMassage($active , "success");
    }


    public function destroy($id) {
        $catigory = catigors_models::find($id);
        if(!$catigory) {
            return errorMassage("هذا القسم غير موجود" , "danger");
        }

        $catigory = catigors_models::where("translation_of" , $id) -> orWhere("id" , "=" , $id)->get();
        if($catigory->count() == show_active_language() -> count() ) {
            foreach ($catigory as $key => $value) {

            }
            foreach ($catigory as $key => $value) {
                catigors_models::find($value->id)->delete();
            }
        } else {
            $trans_of = catigors_models::find($id)->translation_of;
            $catigory = catigors_models::where("id" , $trans_of)->orWhere("translation_of" , "=" , $trans_of)->get();

            foreach ($catigory as $key => $value) {
                catigors_models::find($value->id)->delete();
            }

        }
        return errorMassage("تم مسح القسم بنجاح" , "success");
    }

}
