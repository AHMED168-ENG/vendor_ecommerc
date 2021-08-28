<?php

namespace App\Http\Controllers\admin\language;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\language\Validat_language;
use App\models\languages\language;
use Exception;
use Illuminate\Http\Request;

class add_language extends Controller
{
    public function show_page() {
        return view("admin/languages/add_language");
    }
    public function save_language(Validat_language $request) {
        try { /*-------------  تستخدم عندما يحدث ايرور تستخدم حتي لا يظهر الايرور امام المستخدم  ------------- */
            $active = isset($request->active) ? 1 : 0;
            $language = new language();
            $language -> name = filter_var($request -> name , FILTER_SANITIZE_STRING);
            $language -> shourtcut = filter_var($request -> shourtcut , FILTER_SANITIZE_STRING);
            $language -> direction = filter_var($request -> direction , FILTER_SANITIZE_STRING);
            $language -> active = $active;
            $language->save();
            return redirect()->back()->with(["message" => "تم تسجيل اللغه بنجاح" , "type" => "success"]);
        } catch (\Exception $es) {
            return redirect()->back()->with(["message" => "هناك خطا محتمل تواصل مع الدعم الفني" , "type" => "danger"]);
        }
    }
}
