<?php

namespace App\Http\Controllers\admin\subCatigory;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\subcatigor\subcatigory_request;
use App\Http\Requests\admin\vindoer\vindoer_validation;
use App\models\main_catigory\catigors_models;
use Illuminate\Http\Request;

class subCatigory_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = catigors_models::SupCatigoryDefault()->paginate(bagination_count);
            $mainCatigory_model = catigors_models::class;
        return view("admin/subCatigory/all_subCatigory" , compact("data" , "mainCatigory_model"));
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
            $mainCatigory_model = catigors_models::class;
            return view("admin/subCatigory/add_subCatigory" , compact("mainCatigory_model"));
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
    public function store(subcatigory_request $request)
    {
        try {
            $photo = uploud_img($request -> photo , "public\asset\admin\images\subCatigory_photo");
            $subcatigory_default = collect($request -> subcatigory);
            $subcatigory_default = $subcatigory_default -> filter(function($element ,$key) {
                return $element["shourtcut"] == git_default_language();
            });
            $data = $subcatigory_default[0];
            $data["photo"] = $photo;
            $data["translation_of"] = 0;
            $data["active"] = isset($data["active"]) ? "1" : "0";

            $default_subCat = catigors_models::insertGetId($data);
            $subcatigory_normal = collect($request -> subcatigory);
            $subcatigory_normal = $subcatigory_normal -> filter(function($element ,$key) {
                return $element["shourtcut"] != git_default_language();
            });
            $subcatigory_normal = array_values($subcatigory_normal->all());
            $arr = [];
            foreach ($subcatigory_normal as $key => $val) {
                $arr[] = [
                    "name" => $val["name"],
                    "shourtcut" => $val["shourtcut"],
                    "translation_of" => $default_subCat,
                    "description" => $val["description"],
                    "main_catigory_id" => $val["main_catigory_id"],
                    "photo" => $photo,
                    "active" => key_exists("active" , $val) ? "1" : "0",
                ];
            }
            catigors_models::insert($arr);
            return errorMassage("تم تسجيل العنصر الفرعي بنجاح" , "success");
        } catch (\Exception $th) {
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
            $subCatigory = catigors_models::select("id" , "name" , "description" , "active" , "main_catigory_id" , "shourtcut" , "photo")->find($id) ;
            $mainCatigory_model = catigors_models::class;
            if(!$subCatigory) {
                return errorMassage("هذا العنصر غير موجود" , "danger");
            }
            $language = getAllLanguageOfCatigory(catigors_models::class , 143);
            return view("admin/subCatigory/edit_subCatigory" , compact("subCatigory" , "mainCatigory_model" , "language"));
        } catch (\Throwable $th) {
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
    public function update(subcatigory_request $request, $id)
    {
        try {
            $subCatigory = catigors_models::find($id);
            if(!$subCatigory) {
                return errorMassage("هذا العنصر غير موجود" , "danger");
            }
            $photo = $request -> hidden_photo;
            if($request -> photo) {
                deletePhoto($request -> hidden_photo , "public/asset/admin/images/subCatigory_photo");
                $photo = uploud_img($request -> photo , "public/asset/admin/images/subCatigory_photo");
            }
            foreach ($request -> subcatigory as $key => $value) {
                catigors_models::find($value["id"]) -> update([
                    "name" => filter_var($value["name"] , FILTER_SANITIZE_STRING),
                    "description" => filter_var($value["description"] , FILTER_SANITIZE_STRING),
                    "main_catigory_id" => filter_var($value["main_catigory_id"] , FILTER_SANITIZE_NUMBER_INT),
                    "active" => isset($value["active"]) ? filter_var($value["active"] , FILTER_SANITIZE_NUMBER_INT) : "0",
                    "photo" => $photo,
                ]);
            }
            return errorMassage("تم التعديل بنجاح" , "success");


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
        //
    }
}