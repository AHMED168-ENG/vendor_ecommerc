<?php

namespace App\Http\Controllers\admin\sliders;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\slider_request;
use App\models\sliders\slider_model;
use Illuminate\Http\Request;

class slider_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $sliders = slider_model::DefaultLanguage()->paginate(bagination_count);
            return view("admin/sliders/all_sliders_view" , compact("sliders"));
        } catch (\Throwable $th) {
            return $th;
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
            return view("admin/sliders/add_sliders_view");
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
    public function store(slider_request $request)
    {
        try {
            $sliders_photo = uploud_img($request -> slider_photo ,"public/asset/admin/images/sliders_photo");
            $default_language_slider = collect($request -> sliders) -> filter(function($query) {
                return $query["shourtcut"] == git_default_language();
            });
            $default_language_slider = array_values($default_language_slider -> all());
            $data = $default_language_slider[0];
            $data["img"] = $sliders_photo;
            $data["translation_of"] = 0;
            $data["active"] = isset($default_language_slider["active"]) ? "1" : "0";
            $dfault_lang_slider_id = slider_model::insertGetId($data);

            $default_language_slider = collect($request -> sliders) -> filter(function($query) {
                return $query["shourtcut"] != git_default_language();
            });
            $default_language_slider = array_values($default_language_slider -> all());
            $arr = [];
            foreach ($default_language_slider as $key => $value) {
                $data = $value;
                $data["img"] = $sliders_photo;
                $data["translation_of"] = $dfault_lang_slider_id;
                $arr[] = $data;
            }
            slider_model::insert($data);
            return errorMassage("تم اضافه اسليدر جديد للموقع" , "success");
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
    public function active($id)
    {
        try {
            $slider = slider_model::find($id);
            if(!$slider) {
                return errorMassage("هذا الاسليدر غير موجود للتفعيل" , "danger");
            };
            $slider->update([
                "active" => $slider->active == "1" ? "0" : "1",
            ]);
            $message = $slider -> active == "1" ? "تم تفعيل الاسليدر بنجاح " : "تم الغاء تفعيل الاسليدر بنجاح";
            return errorMassage($message, "success");
        } catch (\Throwable $th) {
            //throw $th;
        }
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
            if(!slider_model::find($id)) {
                return errorMassage("هذا الاسليدر غير موجود", "danger");
            };
            $slider = slider_model::find($id);
            $other_lang_slider = getAllLanguageOfCatigory(slider_model::class , $id);
            return view("admin/sliders/edit_slider_view" , compact("slider" , "other_lang_slider"));
        } catch (\Throwable $th) {
            return errorMassage("", "danger");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(slider_request $request, $id)
    {
        try {
            if(!slider_model::find($id)) {
                return errorMassage("هذا الاسليدر غير موجود", "success");
            }
            $slider_img = $request -> hidden_img;
            if($request -> has("slider_photo")) {
                deletePhoto($request -> hidden_img ,                "public/asset/admin/images/sliders_photo");
                $slider_img = uploud_img($request -> slider_photo , "public/asset/admin/images/sliders_photo");
            }
            foreach ($request -> sliders as $key => $value) {
                $data = $value;
                $data["img"] = $slider_img;
                $data["active"] = isset($value["active"]) ? "1" : "0";
                slider_model::find($value["id"])->update($data);
            }
            return errorMassage("تم التعديل بنجاح", "success");
        } catch (\Throwable $th) {
            return $th;
            return errorMassage("", "danger");
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
            $slider = slider_model::find($id);
            if(!$slider) {
                return errorMassage("هذا الاسليدر غير موجود", "danger");
            }
            $other_sliders = getAllLanguageOfCatigory(slider_model::class, $id);
            foreach ($other_sliders as $key => $value) {
                slider_model::find($value -> id)->delete();
            }
            $slider->delete();
            return errorMassage("تم حذف الاسليدر بنجاح", "success");
        } catch (\Throwable $th) {
            return errorMassage("", "danger");
        }
    }
}
