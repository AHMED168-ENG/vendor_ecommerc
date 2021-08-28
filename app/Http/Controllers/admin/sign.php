<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\admin_validate;
use App\Http\Requests\admin\language\sign_admin_validation;
use App\models\Admin_user;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use UsersAdmin;
auth::attempt();



class sign extends Controller
{
    public function show_admin() {
        return view("admin//admin-login-page");
    }
    public function validat_admin(sign_admin_validation $request) {
        $remmper_me = $request -> has("remember_me") ? "true" : "false";
        if(auth()->guard('admins')->attempt(["email" => $request -> input("email") , "password" => $request -> input("password")] , $remmper_me)){
            return redirect("admin/dashpored");
        }
        return redirect()->back()->with(["error" => "هناك خطا في بيانات الدحول"]);
    }
}

