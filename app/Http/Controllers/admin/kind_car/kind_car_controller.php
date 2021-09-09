<?php

namespace App\Http\Controllers\admin\kind_car;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\kar_kind\kar_kind_request;
use App\models\kind_of_car\kind_of_car_model;
use App\models\main_catigory\catigors_models;
use Illuminate\Http\Request;

class kind_car_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $kind_car = kind_of_car_model::Car_kind_default_language()->paginate(bagination_count);
            return view("admin/kind_car/all_kind_car" , compact("kind_car"));
        } catch (\Throwable $th) {
            return $th;
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
            return view("admin/kind_car/add_kind_car");
        } catch (\Throwable $th) {
            return errorMassage("" , "danger");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(kar_kind_request $request)
    {

        try {
            $car_photo = uploud_img($request -> car_photo , "public/asset/admin/images/products_image/car_photo");
            $car_logo_photo = uploud_img($request -> car_logo_photo , "public/asset/admin/images/products_image/car_logo_photo");
            $kind_car = collect($request -> car_kind) -> filter(function($query) {
                return $query["shourtcut"] == git_default_language();
            });
            $kind_car = array_values($kind_car -> all());
            $kind_car_id = kind_of_car_model::insertGetId([
                "name" => filter_var($kind_car[0]["name"] , FILTER_SANITIZE_STRING),
                "car_photo" => $car_photo,
                "car_logo_photo" => $car_logo_photo,
                "active" => filter_var(isset($kind_car[0]["active"]) ? "1" : "0" , FILTER_SANITIZE_NUMBER_INT),
                "shourtcut" => filter_var($kind_car[0]["shourtcut"] , FILTER_SANITIZE_STRING),
                "translation_of" => 0,
            ]);
            $kind_car = collect($request -> car_kind) -> filter(function($query) {
                return $query["shourtcut"] != git_default_language();
            });
            $kind_car = array_values($kind_car -> all());
            foreach ($kind_car as $key => $value) {
                kind_of_car_model::create([
                    "name" => filter_var($value["name"] , FILTER_SANITIZE_STRING),
                    "car_photo" => $car_photo,
                    "car_logo_photo" => $car_logo_photo,
                    "active" => filter_var(isset($value["active"]) ? "1" : "0" , FILTER_SANITIZE_NUMBER_INT),
                    "shourtcut" => filter_var($value["shourtcut"] , FILTER_SANITIZE_STRING),
                    "translation_of" => $kind_car_id,
                ]);
            }
            return errorMassage("تم تسجيل نوع جديد" , "success");
        } catch (\Throwable $th) {
            return $th;
            return errorMassage("" , "danger");
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
            if(!kind_of_car_model::find($id)) {
                return errorMassage("هذا العنصر غير موجود" , "danger");
            }
            $car_kind = kind_of_car_model::find($id);
            $other_car_kind = getAllLanguageOfCatigory(kind_of_car_model::class , $id);
            return view("admin/kind_car/edit_car_kind" , compact("car_kind" , "other_car_kind"));
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
    public function update(kar_kind_request $request, $id){
    try {
        if(!kind_of_car_model::find($id)) {
            return errorMassage("هذا العنصر غير موجود" , "danger");
        }

            $car_photo =  $request -> car_photo_old;
            $car_logo_photo =  $request -> car_logo_photo_old;
            if(isset($request -> car_photo)) {
                deletePhoto($request -> car_photo_old , "public/asset/admin/images/products_image/car_photo");
                $car_photo = uploud_img($request -> car_photo , "public/asset/admin/images/products_image/car_photo");
            }
            if(isset($request -> car_logo_photo)) {
                deletePhoto($request -> car_logo_photo_old , "public/asset/admin/images/products_image/car_logo_photo");
                $car_logo_photo = uploud_img($request -> car_logo_photo , "public/asset/admin/images/products_image/car_logo_photo");
            }
        foreach ($request -> car_kind as $key => $value) {

            kind_of_car_model::find($value["id"])->update([
                "name" => filter_var($value["name"] , FILTER_SANITIZE_STRING),
                "car_logo_photo" => $car_logo_photo,
                "car_photo" => $car_photo,
                "active" => filter_var( isset($value["active"]) ? "1" : "0" , FILTER_SANITIZE_STRING),
            ]);
        }
    return errorMassage("تم التحديث بنجاح" , "success");
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
        try {
            $ele = kind_of_car_model::find($id);
            if($ele) {
                $ele->delete();
            }
            return errorMassage("تم الحذف بنجاح" , "danger");
        } catch (\Throwable $th) {
            return errorMassage("" , "danger");
        }
    }

}
