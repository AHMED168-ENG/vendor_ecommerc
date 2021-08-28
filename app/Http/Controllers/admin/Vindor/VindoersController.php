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
            $photo = uploud_img($request -> photo , "public/asset/admin/images/vindoer_image/" );
            $vindoer = vindoers_model::create([
                "name" => filter_var($request -> name , FILTER_SANITIZE_STRING),
                "email" => filter_var($request -> email , FILTER_SANITIZE_EMAIL),
                "password" => bcrypt(filter_var($request -> password , FILTER_SANITIZE_STRING)),
                "age" => filter_var($request -> age , FILTER_SANITIZE_NUMBER_INT),
                "addres" => filter_var($request -> addres , FILTER_SANITIZE_STRING),
                "photo" => $photo,
                "catigory_id" => filter_var($request -> catigory , FILTER_SANITIZE_NUMBER_INT),
                "mobil" => filter_var($request -> mobil , FILTER_SANITIZE_NUMBER_INT),
                "active" => $request -> has("active") ? '1' : "0",
            ]);
            Notification::send($vindoer , new vindowers($vindoer));
            return errorMassage("تم اضافه تاجر جديد" , "success");
        } catch(\Exception $ex) {
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
            if($request -> has("photo")) {
                deletePhoto($request -> hidden_photo , asset("public/asset/admin/images/vindoer_image/"));
                $photo = uploud_img($request -> photo , "public/asset/admin/images/vindoer_image/");
            } else {
                $photo = $request -> hidden_photo;
            }
            $password = $request -> has("password") ? bcrypt($request -> password) : bcrypt($request -> password2);
            $data ["password"] = $password;
            $data ["photo"] = $photo;
        vindoers_model::find($id)->update($data);
        return errorMassage("تم تعديل بيانات التاجر " , "success");
        } catch (\Throwable $th) {
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
