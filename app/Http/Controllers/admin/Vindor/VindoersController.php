<?php

namespace App\Http\Controllers\admin\Vindor;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\vindoer\vindoer_validation;
use App\models\main_catigory\catigors_models;
use App\models\vindoers\vindoers_model;
use App\Notifications\vindowers;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use PhpParser\Node\Expr\Include_;

class VindoersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vindoer = vindoers_model::Selection()->paginate(bagination_count);
        return view("admin/Vindors/all_vindor_view" , compact("vindoer"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catigory = catigors_models::Active()-> where("shourtcut" , git_default_language()) -> get();
        return view("admin/Vindors/create_vindoer_view" , compact("catigory"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(vindoer_validation $request)
    {
        try {
            $img = uploud_img($request -> shop_img , "public/asset/admin/images/vindoer_image");
            $file = uploud_img($request -> Commercial_Register , "public/asset/admin/files/vindoers_files/" );
            $is_admin = "";
            if(request() -> url() == route("store_vindoer")) {
                    $created_id = auth() -> guard("admins") -> user() -> id;
                } else if(request() -> url() == route("store_vindoer_from_user_regist")) {
                    $created_id = "0";
                }
            $vindoer = vindoers_model::create([
                "name" => filter_var($request -> name , FILTER_SANITIZE_STRING),
                "shop_name" => filter_var($request -> shop_name , FILTER_SANITIZE_STRING),
                "email" => filter_var($request -> email , FILTER_SANITIZE_EMAIL),
                "password" => bcrypt(filter_var($request -> password , FILTER_SANITIZE_STRING)),
                "age" => filter_var($request -> age , FILTER_SANITIZE_NUMBER_INT),
                "addres" => filter_var($request -> addres , FILTER_SANITIZE_STRING),
                "Commercial_Register" => $file,
                "shop_img" => $img,
                "created_id" => $created_id,
                "mobil" => filter_var($request -> mobil , FILTER_SANITIZE_NUMBER_INT),
                "active" => $request -> has("active") ? '1' : "0",
            ]);
            Notification::send($vindoer , new vindowers($vindoer));
            if(auth() -> guard("admins") -> check()) {
                $message = " تم تسجيلك كتاجر جديد انتظر حتي يتم الموافقه عليك";
            } else if(auth() -> guard("web") -> check() && !auth() -> guard("admins") -> check()) {
                $message = "تم تسجيل الحساب بنجاح وتم انشاء متجرك انظر حتي يتم تفعيل المتجر من عند الادمن";
            }
            return errorMassage($message , "success");
        } catch(\Exception $ex) {
            return $ex;
            return errorMassage("", "danger");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $active = vindoers_model::find($id);
        vindoers_model::find($id)->update([
            "active" => $active->active == "0" ? "1" : "0",
        ]);
        $active = $active -> active == "0" ? "التفعيل" : "الغاء التفعيل";
        return errorMassage("تم  $active بالفعل" , "success");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $vindor = vindoers_model::find($id);
            if(!$vindor) {
                return redirect()->route("all_vindoer")->with(["message" => "هذا العنصر غير موجود", "type" => "danger"]);
            }
            $catigory = catigors_models::Active()->where("shourtcut" , git_default_language())->get();
            return view("admin/vindors/edit_vindor_view" , compact("vindor" , "catigory"));
        } catch (\Exception $ex) {
            return errorMassage("", "danger");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(vindoer_validation $request, $id)
    {
        try {
            $vindor = vindoers_model::find($id);
            if(!$vindor) {
                return redirect()->route("all_vindoer")->with(["message" => "هذا العنصر غير موجود", "type" => "danger"]);
            }
            $data=  $request -> except("_token" , "id" , "password" , "password2" , "hidden_photo");
            if($request -> has("shop_img")) {
                deletePhoto($request -> hidden_photo , asset("public/asset/admin/images/vindoer_image/"));
                $photo = uploud_img($request -> shop_img , "public/asset/admin/images/vindoer_image/");
            } else {
                $photo = $request -> hidden_photo;
            }
            if($request -> has("Commercial_Register")) {
                deletePhoto($request -> hidden_Commercial_Register , asset("public\asset\admin\\files\\vindoers_files"));
                $Commercial_Register = uploud_img($request -> Commercial_Register , "public\asset\admin\\files\\vindoers_files");
            } else {
                $Commercial_Register = $request -> hidden_Commercial_Register;
            }
            $password = $request -> has("password") ? bcrypt($request -> password) : bcrypt($request -> password2);
            $data ["password"] = $password;
            $data ["shop_img"] = $photo;
            $data ["Commercial_Register"] = $Commercial_Register;
        vindoers_model::find($id)->update($data);
        return errorMassage("تم تعديل بيانات التاجر " , "success");
        } catch (\Throwable $th) {
            return $th;
            return errorMassage("" , "danger");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vindoer = vindoers_model::find($id);
        $photo = vindoers_model::find($id) -> photo;
        if(!$vindoer) {
            return errorMassage("هذا العنصر غير موجود" , "danger");
        };
        vindoers_model::destroy($id);
        deletePhoto($photo , asset("public/asset/admin/images/vindoer_image/"));
        return errorMassage("تم الحذف بنجاح" , "success");
    }
}
