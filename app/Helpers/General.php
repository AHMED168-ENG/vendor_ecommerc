<?php

use App\models\main_catigory\catigors_models;
use Illuminate\Support\Str;

function show_active_language() {
    return App\models\languages\language::where("active" , 1)->get();
}

/* ------------------------- get default language ---------------------------*/
function git_default_language() {
    return Illuminate\Support\Facades\Config::get('app.locale');
};
/* ------------------------- get default language ---------------------------*/

/* ------------------------- dave language ---------------------------*/
function save_language($folder , $imges) {
    $imges -> store('/' , $folder);
    $filename = $imges->hashName();
    $path = "catigory" . $folder . "/" . $filename;
    return $path;
};
/* ------------------------- get default language ---------------------------*/


/* ------------------------- start update photo ---------------------------*/
function uploud_img($img , $path) {
    if(is_array($img)) {
        $filesName = "";
    foreach ($img as $key => $value) {
        $file_extension = $value -> getClientOriginalExtension();
        $fileName = rand(10000000,90000000) . "." . $file_extension;
        $path = $path;
        $value -> move($path , $fileName);
        $filesName .= ($fileName . "__");
    }
    return $filesName;
    }
    /*---------------------------- الخطوه الاولي اجيب نوع الصوره سواء كانت jpeg , jpg .. ---------------*/
    $file_extension = $img -> getClientOriginalExtension();
    /*---------------------------- الخطوه الاولي اجيب نوع الصوره سواء كانت jpeg , jpg .. ---------------*/

    /*---------------------------- الخطوه الثانيه اجيب اسم الصوره  ---------------*/
    $fileName = time() . "." . $file_extension;
    /*---------------------------- الخطوه الثانيه اجيب اسم الصوره  ---------------*/

    /*----------------------------  الخطوه الثالثه ارفع الصوره ---------------*/
    $path = $path;
    $img -> move($path , $fileName);
    return $fileName;
    /*----------------------------  الخطوه الثالثه ارفع الصوره ---------------*/
}
/* ------------------------- end update photo ---------------------------*/

function errorMassage($message , $type) {
    $message = $message == null ? "يوجد خطا فني يرجي الرجوع الي صانع الموقع" : $message;
    return redirect() -> back() -> with(["message" => $message , "type" => $type]);
}


/* -------------------------------------------- delete photo after edit ---------------------------------*/
function deletePhoto($photoName, $path) {
    if(str_contains($photoName , "__")) {
        $photos = explode("__" , $photoName);
        foreach ($photos as $key => $value) {
            if($value != "") {
                unlink(base_path("public/".Str::after($path . "/", 'public/')) . $value);
            }
        }
    } else {
        unlink(base_path("public/".Str::after($path . "/", 'public/')) . $photoName);

    }
}
/* -------------------------------------------- delete photo after edit ---------------------------------*/

/* -------------------------------------------- delete photo after edit ---------------------------------*/
function getAllLanguageOfCatigory($model, $id) {
    $translation_of = $model::find($id) -> translation_of;
    if($translation_of == 0) {
        $allLanguage = $model::where("translation_of" , $id)->get();
    } else {
        $translation_of = $translation_of;
        $allLanguage = $model::where("translation_of" , $translation_of)->where("id" , "!=" , $id)->Orwhere("id" , $translation_of)->get() ;
    }
    return $allLanguage;
}
/* -------------------------------------------- delete photo after edit ---------------------------------*/

/* -------------------------------------------- get catigory name from supcatigory ---------------------------------*/
function get_catigory_name_from_supcatigory($supCat) {
    $GLOBALS["path"] = "";
    $test = true;
    $id = $supCat;
    for ($i = 0 ; $test != false ; $i++) {
        $catigory = catigors_models::find($id) -> main_catigory_id;
        if($catigory != 0) {
            $GLOBALS["path"] .= catigors_models::find($id) -> name . "---";
            $id = $catigory;
        } else {
            $GLOBALS["path"] .= catigors_models::find($id) -> name;
            $test = false;
            return $GLOBALS["path"];
        }
    }


}
/* -------------------------------------------- get catigory name from supcatigory ---------------------------------*/
