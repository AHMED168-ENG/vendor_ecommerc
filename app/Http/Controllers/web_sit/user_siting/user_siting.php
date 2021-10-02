<?php

namespace App\Http\Controllers\web_sit\user_siting;

use App\Http\Controllers\Controller;
use App\Http\Requests\frontEnd\user_siting\user_siting_request;
use App\models\User;
use Illuminate\Http\Request;

class user_siting extends Controller
{
    public function user_seting() {
        try {
            $user_data = auth() -> guard("web") -> user();
            return view("frontEnd/user_seting/user_seting" , compact("user_data"));
        } catch (\Throwable $th) {
            return errorMassage("" , "danger");
        }
    }
    public function update_user_seting(user_siting_request $request , $id) {
        try {
            $user = User::find($id);
            if(!$user) {
                return errorMassage("هذا المستخدم غير موجود" , "danger");
            }
            if(!empty($user -> user_photo)) {
                if($request -> user_photo) {
                    deletePhoto($request -> hidden_photo , "public/asset/admin/images/users_photo");
                    $user_photo = uploud_img($request -> user_photo , "public\asset\admin\images\users_photo");
                } else {
                    $user_photo = $request -> hidden_photo;
                }
            } else {
                if($request -> user_photo) {
                    $user_photo = uploud_img($request -> user_photo , "public\asset\admin\images\users_photo");
                } else {
                    $user_photo = null;
                }
            }

            $user->update([
                "f_name" => filter_var($request -> f_name , FILTER_SANITIZE_STRING),
                "l_name" => filter_var($request -> l_name , FILTER_SANITIZE_STRING),
                "addres" => filter_var($request -> addres , FILTER_SANITIZE_STRING),
                "age" => filter_var($request -> age , FILTER_SANITIZE_NUMBER_INT),
                "email" => filter_var($request -> email , FILTER_SANITIZE_EMAIL),
                "phone" => filter_var($request -> phone , FILTER_SANITIZE_NUMBER_INT),
                "user_photo" => $user_photo,
            ]);
            return errorMassage("تم التعديل بنجاح" , "success");
        } catch (\Throwable $th) {
            return $th;
            return errorMassage("" , "danger");
        }
    }

    public function update_password(Request $request) {
        try {
            if(!User::where("email" , $request -> email)) {
                return redirect() -> back() -> with(["email" => "هذا الايميل غير موجود"] , "message");
            }
            if(!User::where("password" , bcrypt($request -> email))) {
                return redirect() -> back() -> with(["password" => "هذا الباسورد خاطي"]);
            } else {
                User::where("email" , $request -> email)->update([
                    "password" => bcrypt($request -> password),
                ]);
                return redirect() -> back() -> with(["password" => "تم تعديل الباسورد بنجاح" ], "message");
            }
        } catch (\Throwable $th) {
            return errorMassage("" , "danger");
        }
    }
}
