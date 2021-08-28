<?php
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
    unlink(base_path("public/".Str::after($path . "/", 'public/')) . $photoName);
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
