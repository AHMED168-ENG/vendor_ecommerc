<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\product\product_request;
use App\models\Admin_user;
use App\models\cars_model\cars_model;
use App\models\kind_of_car\kind_of_car_model;
use App\models\main_catigory\catigors_models;
use App\models\products\product_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class product_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products = product_model::select("id" , "active", "name" , "price" , "product_photo" , "catigory")->Product_Default_lange()->paginate(bagination_count);
            return view("admin/products/all_products" , compact("products"));
        } catch (\Throwable $th) {
            return errorMassage("","danger");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $mainCatigory_model = catigors_models::class;
            $kinds_cars = kind_of_car_model::class;
            $cars_model = cars_model::all();
            return view("admin/products/add_products" , compact("mainCatigory_model" , "cars_model" , "kinds_cars"));
        } catch (\Throwable $th) {
            return $th;
            return errorMassage("","danger");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(product_request $request)
    {
        try {
            $is_admin = "";
            if(auth() -> guard("admins") -> check() && !auth() -> guard("vindoers") -> check()) {
                $is_admin = "1";
            } else if(!auth() -> guard("admins") -> check() && auth() -> guard("vindoers") -> check()) {
                $is_admin = "0";
            } else if(auth() -> guard("admins") -> check() && auth() -> guard("vindoers") ->check()) {
                if(request() -> is("admin/*")) {
                    $is_admin = "1";
                } else if(request() -> is("add_products")) {
                    $is_admin = "0";
                }
            }
            $created_id = $is_admin == "1" ? auth() -> guard("admins") -> user() -> id : auth() -> guard("vindoers") -> user() -> id;
            $product_photo = uploud_img($request ->  product_photo , "public/asset/admin/images/products_image");
            $description_photo = uploud_img($request -> description_photo , "public/asset/admin/images/products_image/description_photo");
            $default_lang_product = collect($request -> products) -> filter(function($query) {
                return $query["shourtcut"] == git_default_language();
            });
            $default_lang_product = array_values($default_lang_product -> all());

            $count_catigory = count($default_lang_product[0]["main_catigory_id"]);
            $catigory = $default_lang_product[0]["main_catigory_id"] ;
            $catigory = end($catigory) == null ? $catigory[$count_catigory - 2] : $catigory[$count_catigory - 1];
            $active = isset($default_lang_product[0]["active"]) ? $default_lang_product[0]["active"] : "0";
            $descount = $default_lang_product[0]["descount"];

            $product_id = product_model::insertGetId([
                "name" => filter_var($default_lang_product[0]["name"] , FILTER_SANITIZE_STRING),
                "price" => filter_var($default_lang_product[0]["price"] , FILTER_SANITIZE_NUMBER_INT),
                "catigory" => filter_var($catigory , FILTER_SANITIZE_NUMBER_INT),
                "kind_car" => filter_var($default_lang_product[0]["kind_car"] , FILTER_SANITIZE_NUMBER_INT),
                "model_car" => filter_var(implode("___",$default_lang_product[0]["model_cars"]) , FILTER_SANITIZE_NUMBER_INT),
                "pices" => filter_var($default_lang_product[0]["pices"] , FILTER_SANITIZE_NUMBER_INT),
                "descount" => filter_var(isset($default_lang_product[0]["descount"]) ? $descount : 0 , FILTER_SANITIZE_NUMBER_INT),
                "numper_screen" => filter_var($default_lang_product[0]["numper_screen"] , FILTER_SANITIZE_NUMBER_INT),
                "state" => filter_var($default_lang_product[0]["state"] , FILTER_SANITIZE_NUMBER_INT),
                "active" => filter_var($active, FILTER_SANITIZE_NUMBER_INT),
                "security" => filter_var($default_lang_product[0]["security"] , FILTER_SANITIZE_NUMBER_INT),
                "description" => filter_var($default_lang_product[0]["description"] , FILTER_SANITIZE_STRING),
                "description_photo" => filter_var($description_photo , FILTER_SANITIZE_STRING),
                "product_photo" => filter_var($product_photo , FILTER_SANITIZE_STRING),
                "shourtcut" => filter_var($default_lang_product[0]["shourtcut"] , FILTER_SANITIZE_STRING),
                "translation_of" => 0,
                "is_admin" => $is_admin,
                "created_id" => $created_id,
                "tages" => "aa"
            ]);
            $default_lang_product = collect($request -> products) -> filter(function($query) {
                return $query["shourtcut"] != git_default_language();
            });
            $default_lang_product = array_values($default_lang_product -> all());
            $arr = [];
            foreach ($default_lang_product as $key => $value) {
                $active = isset($value["active"]) ? $value["active"] : "0";
                $count_catigory = count($value["main_catigory_id"]);
                $catigory = $value["main_catigory_id"] ;
                $catigory = end($catigory) == null ? $catigory[$count_catigory - 2] : $catigory[$count_catigory - 1];
                $descount = $value["descount"];
                $arr[] =
                [
                    "name" => filter_var($value["name"] , FILTER_SANITIZE_STRING),
                    "price" => filter_var($value["price"] , FILTER_SANITIZE_NUMBER_INT),
                    "catigory" => filter_var($catigory , FILTER_SANITIZE_NUMBER_INT),
                    "kind_car" => filter_var($value["kind_car"] , FILTER_SANITIZE_NUMBER_INT),
                    "model_car" => filter_var($value["model_cars"] , FILTER_SANITIZE_NUMBER_INT),
                    "pices" => filter_var($value["pices"] , FILTER_SANITIZE_NUMBER_INT),
                    "descount" => filter_var(isset($value["descount"]) ? $descount : 0 , FILTER_SANITIZE_NUMBER_INT),
                    "numper_screen" => filter_var($value["numper_screen"] , FILTER_SANITIZE_NUMBER_INT),
                    "state" => filter_var($value["state"] , FILTER_SANITIZE_NUMBER_INT),
                    "active" => filter_var($active, FILTER_SANITIZE_NUMBER_INT),
                    "security" => filter_var($value["security"] , FILTER_SANITIZE_NUMBER_INT),
                    "description" => filter_var($value["description"] , FILTER_SANITIZE_STRING),
                    "description_photo" => filter_var($description_photo , FILTER_SANITIZE_STRING),
                    "product_photo" => filter_var($product_photo , FILTER_SANITIZE_STRING),
                    "shourtcut" => filter_var($value["shourtcut"] , FILTER_SANITIZE_STRING),
                    "translation_of" => $product_id,
                    "is_admin" => $is_admin,
                    "created_id" => $created_id,
                    "tages" => "aa"
                ];
            }
            product_model::insert($arr);
            return errorMassage("تم تسجيل منتج جديد " , "success");
        } catch (\Throwable $th) {
            return $th;
            return errorMassage("","danger");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            $product = product_model::find($id);
            if(!$product) {
                return errorMassage("" , "danger");
            }
            $product = $product;
            $other_product_language = getAllLanguageOfCatigory(product_model::class , $id);
            $mainCatigory_model = catigors_models::class;
            $kinds_cars = kind_of_car_model::class;
            $cars_model = cars_model::all();
            $mainCatigory_model = catigors_models::class;
            return view("admin/products/show_edit_product" , compact( "kinds_cars" ,"cars_model" , "product" , "other_product_language" , "mainCatigory_model"));
        } catch (\Throwable $th) {
            return $th;
            return errorMassage("" , "danger");
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(product_request $request, $id)
    {
        try {

            if(!product_model::find($id)) {
                return "";
            }
            if(isset($request -> description_photo)) {
                deletePhoto($request -> hidden_description_photo ,              "public/asset/admin/images/products_image/description_photo");
                $description_photo = uploud_img($request -> description_photo , "public/asset/admin/images/products_image/description_photo");
            } else {
                $description_photo = $request -> hidden_description_photo;
            }
            if(isset($request -> product_photo)) {
                deletePhoto($request -> hidden_product_photo ,           "public/asset/admin/images/products_image");
                $product_photo = uploud_img($request ->  product_photo , "public/asset/admin/images/products_image");
            } else {
                $product_photo = $request -> hidden_product_photo;
            }

            foreach ($request -> products as $key => $value) {
                $active = isset($value["active"]) ? "1" : "0";
                $count_catigory = count($value["main_catigory_id"]);
                $catigory = $value["main_catigory_id"] ;
                $descount = $value["descount"];
                $catigory = $catigory[0] == null ? product_model::find($value["id"]) -> catigory :  (end($catigory) == null ? $catigory[$count_catigory - 2] : $catigory[$count_catigory - 1]);
                product_model::find($value["id"])->update([
                    "name" => filter_var($value["name"] , FILTER_SANITIZE_STRING),
                    "price" => filter_var($value["price"] , FILTER_SANITIZE_NUMBER_INT),
                    "catigory" => filter_var($catigory , FILTER_SANITIZE_NUMBER_INT),
                    "kind_car" => filter_var( implode("___",$value["kind_car"]) , FILTER_SANITIZE_STRING),
                    "model_car" => filter_var($value["model_cars"] , FILTER_SANITIZE_NUMBER_INT),
                    "pices" => filter_var($value["pices"] , FILTER_SANITIZE_NUMBER_INT),
                    "descount" => filter_var(isset($value["descount"]) ? $descount : 0 , FILTER_SANITIZE_NUMBER_INT),
                    "numper_screen" => filter_var($value["numper_screen"] , FILTER_SANITIZE_NUMBER_INT),
                    "state" => filter_var($value["state"] , FILTER_SANITIZE_NUMBER_INT),
                    "active" => filter_var($active, FILTER_SANITIZE_NUMBER_INT),
                    "security" => filter_var($value["security"] , FILTER_SANITIZE_NUMBER_INT),
                    "description" => filter_var($value["description"] , FILTER_SANITIZE_STRING),
                    "description_photo" => filter_var($description_photo , FILTER_SANITIZE_STRING),
                    "product_photo" => filter_var($product_photo , FILTER_SANITIZE_STRING),
                    "tages" => "aa"
                ]);
            };
            return errorMassage("تم التعديل بنجاح" , "success");
        } catch (\Throwable $th) {
            return $th;
            return errorMassage("" , "danger");        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function ajax_Get_supcatigory($id)
    {
        $data_arr = [];
        $data_arr[] = catigors_models::find($id)->get_supcatigory;
        return $data_arr;
    }
}
