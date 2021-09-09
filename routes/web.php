<?php

use App\Http\Requests\admin\language\Validat_language;
use App\models\Admin_user;
use App\models\cars_model\cars_model;
use App\models\kind_of_car\kind_of_car_model;
use App\models\languages\language;
use App\models\main_catigory\catigors_models;
use App\models\products\product_model;
use App\models\User;
use App\models\vindoers\vindoers_model;
use GuzzleHttp\Middleware;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\Environment\Console;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*-------------------------- pagination numper -------------------------------- */
define("bagination_count" , 10);
/*-------------------------- pagination numper -------------------------------- */
Route::get("ff" , function() {
    $user = Admin_user::create([
        "name" => "asma",
        "email" => "asma@dddd222.com",
        "password" => bcrypt("01024756410"),
    ]);
    $user->attachRole("user");
});

Route::get("rr" , function() {
    auth()->guard("admins")->logout();
    return redirect() -> route("show_admin");
});
/* --------------------------    admin pages   ------------------------------ */
Route::group(["namespace" => "admin" , "prefix" => "admin"] , function() {
Route::group(["middleware" => "auth:admins"] , function() {
Route::get("/dashpored" , "dashpored@show")->name("dashpored");

/* --------------------------    language pages   ------------------------------ */
Route::group(["prefix" => "language","namespace" => "language"] , function() {
    Route::get("all_language" , "all_language@show_all")->name("all_lang");
    Route::get("add_language" , "add_language@show_page")->name("show_page");
    Route::post("add_language" , "add_language@save_language")->name("add_language");
    Route::get("edit_language/{id}" , "all_language@edit_language")->name("edit_language");
    Route::post("edit_language/{id}" , "all_language@save_language")->name("save_language");
    Route::get("delete_language/{id}" , "all_language@delete_language")->name("delete_language");
    Route::get("active_language/{id}" , "all_language@active_language")->name("active_language");
});
/* --------------------------    language pages   ------------------------------ */

/* --------------------------    main catigory pages   ------------------------------ */
Route::group(["prefix" => "main_catigory","namespace" => "main_catigory"] , function() {
    Route::get("all_catigors" , "catigors_controller@show_all")->name("all_catigory");
    Route::get("add_catigory" , "catigors_controller@create")->name("add_catigory");
    Route::post("add_catigory" , "catigors_controller@save_data")->name("save_data");
    Route::get("edit_catigory/{id}" , "catigors_controller@show_edit_page")->name("show_edit_page");
    Route::post("edit_catigory/{id}" , "catigors_controller@save_catigory")->name("save_catigory");
    Route::get("delete_catigory/{id}" , "catigors_controller@destroy")->name("delete_catigory");
    Route::get("active_catigory/{id}" , "catigors_controller@active")->name("active_catigory");
});
/* --------------------------    main catigory pages   ------------------------------ */

/* --------------------------    main vindoers pages   ------------------------------ */
Route::group(["prefix" => "vindoers","namespace" => "vindor"] , function() {
    Route::get("all_vindoers" , "VindoersController@index")->name("all_vindoer");
    Route::get("create_vindoer" , "VindoersController@create")->name("create_vindoer");
    Route::post("create_vindoer" , "VindoersController@store")->name("store_vindoer");
    Route::get("edit_vindoer/{id?}" , "VindoersController@edit")->name("edit_vindoer");
    Route::post("update_vindoer/{id?}" , "VindoersController@update")->name("update_vindoer");
    Route::get("active_vindoer/{id?}" , "VindoersController@active")->name("active_vindoer");
    Route::get("delete_vindoer/{id?}" , "VindoersController@destroy")->name("delete_vindoer");

});
/* --------------------------   main vindoers pages   ------------------------------ */

/* --------------------------    sup catigory pages   ------------------------------ */
Route::group(["prefix" => "subCatigory","namespace" => "subCatigory"] , function() {
    Route::get("all_subCatigory" , "subCatigory_controller@index")->name("all_subCatigory");
    Route::get("add_subCatigory" , "subCatigory_controller@create")->name("add_subCatigory");
    Route::post("add_subCatigory" , "subCatigory_controller@store")->name("store_subCatigory");
    Route::get("edit_subCatigory/{id?}" , "subCatigory_controller@edit")->name("edit_subCatigory");
    Route::post("edit_subCatigory/{id?}" , "subCatigory_controller@update");
    Route::get("active_vindoer/{id?}" , "subCatigory_controller@active")->name("active_vindoer");
    Route::get("delete_vindoer/{id?}" , "subCatigory_controller@destroy")->name("delete_vindoer");
    Route::post("ajax_Get_supcatigory/{id?}" , "subCatigory_controller@ajax_Get_supcatigory")->name("ajax_Get_supcatigory");

});
/* --------------------------    sup catigory pages   ------------------------------ */

/* --------------------------   kind_car pages   ------------------------------ */
Route::group(["prefix" => "kind_car","namespace" => "kind_car"] , function() {
    Route::get("all_kind_car" , "kind_car_controller@index")->name("all_kind_car");
    Route::get("add_kind_car" , "kind_car_controller@create")->name("add_kind_car");
    Route::post("add_kind_car" , "kind_car_controller@store");
    Route::get("edit_kind_car/{id?}" , "kind_car_controller@edit")->name("edit_kind_car");
    Route::post("edit_kind_car/{id?}" , "kind_car_controller@update");
    Route::get("active_kind_car/{id?}" , "kind_car_controller@active")->name("active_kind_car");
    Route::get("delete_kind_car/{id?}" , "kind_car_controller@destroy")->name("delete_kind_car");
    Route::post("ajax_Get_kar_kind/{id?}" , "kind_car_controller@ajax_Get_kar_kind")->name("ajax_Get_kar_kind");

});
/* --------------------------   kind_car pages   ------------------------------ */

/* --------------------------   kind_car pages   ------------------------------ */
Route::group(["prefix" => "cars_models","namespace" => "cars_models"] , function() {
    Route::get("all_model_car" , "cars_modesl_controller@index")->name("all_model_car");
    Route::get("add_model_car" , "cars_modesl_controller@create")->name("add_model_car");
    Route::post("add_model_car" , "cars_modesl_controller@store");
    Route::get("edit_model_car/{id?}" , "cars_modesl_controller@edit")->name("edit_model_car");
    Route::post("edit_model_car/{id?}" , "cars_modesl_controller@update");
    Route::get("active_model_car/{id?}" , "cars_modesl_controller@active")->name("active_model_car");
    Route::get("delete_model_car/{id?}" , "cars_modesl_controller@destroy")->name("delete_model_car");

});
/* --------------------------   kind_car pages   ------------------------------ */

/* --------------------------   products pages   ------------------------------ */
Route::group(["prefix" => "product","namespace" => "product"] , function() {
    Route::get("all_products" , "product_controller@index")->name("all_products");
    Route::get("add_products" , "product_controller@create")->name("add_products");

    Route::get("active_product/{id?}" , "product_controller@active")->name("active_product");
    Route::get("delete_product/{id?}" , "product_controller@destroy")->name("delete_product");

});
/* --------------------------   products pages   ------------------------------ */
});


Route::group(["middleware" => "guest:admins"] , function() {
    Route::get("/admin_sign" , "sign@show_admin")->name("show_admin");
    Route::post("/admin_sign" , "sign@validat_admin") -> name("validat_admin");
});
});
/* --------------------------    admin pages   ------------------------------ */





/* --------------------------    start websit pages   ------------------------------ */
Route::post("/regist_vindoer" , "admin\\vindor\\VindoersController@store")->middleware("guest:vindoers")->name("store_vindoer_from_user_regist");

Route::group(["prifex" => "vindoer_create_product_without_authonticat"] , function() {
    Route::post("ajax_Get_supcatigory/{id?}" , "admin\\product\\product_controller@ajax_Get_supcatigory")->name("ajax_Get_supcatigory");
    Route::post("add_products" , "admin\\product\\product_controller@store")->name("store_products");
    Route::get("edit_products/{id?}" , "admin\\product\\product_controller@edit")->name("show_edit_product");
    Route::post("edit_products/{id?}" , "admin\\product\\product_controller@update")->name("update_product");
});

Route::group(["namespace" => "web_sit" , "prefix" => "web_sit"] , function() {
Route::get("/home" , "HomeController@index")->name("home");
Route::group(["middleware" => "auth"] , function() {
    Route::get("/activ_acount_notification" , "HomeController@activ_acount_notification")->name("activ_acount_notification");
    Route::get("/active/{id}" , "HomeController@active_acount")->name("active");
});

/* --------------------------  start vindoers login and regist  ------------------------------ */
Route::group(["namespace" => "vindoer" , "prefix" => "vindoer" , "middleware" => "guest:vindoers"] , function() {
    Route::get("/regist_vindoer" , "vindoer_controller@show_regist_vindoer") -> name("regist_vindoer");
    Route::get("/login_vindoer" , "vindoer_controller@show_login_vindoer") -> name("login_vindoer");
    Route::post("/login_vindoer" , "vindoer_controller@login_vindoer");
});
/* --------------------------    end vindoers login and regist  ------------------------------ */


Route::group(["namespace" => "vindoer" , "prefix" => "vindoer" , "middleware" => "check_vindoer_active_or_no"] , function() {

    Route::get("/all_product_vindoer" , "vindoer_controller@all_product_vindoer")->name("all_product_vindoer");
    Route::get("/add_product_vindoer/{id?}" , "vindoer_controller@create")->name("add_product_vindoer");
    Route::get("/edit_product_vindoer/{id?}" , "vindoer_controller@edit")->name("edit_product_vindoer");
    Route::get("/vindoers_siting" , "vindoer_controller@show_siting")->name("vindoers_siting");
    Route::get("/financial_transactions/{id?}" , "vindoer_controller@show_financial_transactions")->name("show_financial_transactions");
    Route::get("/all_my_product" , "vindoer_controller@all_my_product")->name("all_my_product");
    Route::post("logout_vindoers" , "vindoer_controller@logout")->name("logout_vindoers");
});


});

/* --------------------------    end websit pages   ------------------------------ */





Route::get("ts" , function() {
    return catigors_models::find(44)->get_supcatigory->where("id" , "!=" , 48);
})->name("ts");




Route::get("test" , function() {
    $user = new Admin_user();
    $user->name = "ahmed";
    $user -> email = "ahmedReda@gmail.com";
    $user -> password = bcrypt("01024756410");
    $user->save();
});
