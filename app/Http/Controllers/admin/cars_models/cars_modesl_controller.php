<?php

namespace App\Http\Controllers\admin\cars_models;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\model_car\model_car_request;
use App\models\cars_model\cars_model;
use App\models\kind_of_car\kind_of_car_model;
use App\models\main_catigory\catigors_models;
use Illuminate\Http\Request;

class cars_modesl_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $models = cars_model::select("model" , "active" , "id")->paginate(bagination_count);
            return view("admin/cars_models/all_cars_models" , compact("models"));
        } catch (\Throwable $th) {
            return errorMassage("" , "danger");
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
            return view("admin/cars_models/add_cars_models");
        } catch (\Throwable $th) {
            return $th;
            return errorMassage("" , "danger");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(model_car_request $request)
    {
        try {
            cars_model::create([
                "model" => filter_var($request -> model , FILTER_SANITIZE_NUMBER_INT),
                "active" => filter_var($request -> active ? "1" : "0" , FILTER_SANITIZE_NUMBER_INT),
            ]);
            return errorMassage("تم تسجيل موديل جديد" , "success");
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
            $ele = cars_model::find($id);
            if(!$ele) {
                return errorMassage("هذا الموديل غير موجود" , "danger");
            }
            $model = $ele;
            return view("admin/cars_models/edit_cars_models" , compact("model"));
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
    public function update(model_car_request $request, $id)
    {
        try {
            if(!cars_model::find($id)) {
                return errorMassage("" , "danger");
            }
            cars_model::find($request["id"])->update([
                "model" => filter_var($request["model"] , FILTER_SANITIZE_NUMBER_INT),
                "active" => filter_var(isset($request["active"]) ? "1" : "0" , FILTER_SANITIZE_NUMBER_INT),
            ]);
            return errorMassage("تم التعديل بنجاخ" , "success");
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
            if(!cars_model::find($id)) {
                return errorMassage("" , "danger");
            }
            cars_model::find($id)->delete();
            return errorMassage("تم الحذف بنجاخ" , "success");
        } catch (\Throwable $th) {
            return errorMassage("" , "danger");
        }
    }

    public function active($id)
    {
        try {
            $ele = cars_model::find($id);
            if(!$ele) {
                return errorMassage("" , "danger");
            }
            $ele->update([
                "active" => $ele -> active == "1" ? "0" : "1",
            ]);
            $message = $ele -> active == 1 ? "تم التفعيل بنجاح" : "تم الغاء التفعيل بنجاح";
            return errorMassage($message , "success");
        } catch (\Throwable $th) {
            return errorMassage("" , "danger");
        }
    }
}
