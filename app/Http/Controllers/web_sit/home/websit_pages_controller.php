<?php

namespace App\Http\Controllers\web_sit\home;

use App\Http\Controllers\admin\comments\comments_controller;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\comments\comment_request;
use App\models\cars_model\cars_model;
use App\models\kind_of_car\kind_of_car_model;
use App\models\main_catigory\catigors_models;
use App\models\product_comment\product_comment_model;
use App\models\products\product_model;
use App\models\sliders\slider_model;
use App\models\User;
use App\models\vindoers\vindoers_model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class websit_pages_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $sliders = slider_model::DefaultLanguage()->Active()->get();
            $main_catigory = catigors_models::MainCatigoryDefault() -> limit(4) -> orderBy("id" , "desc") ->get();
            $special_vindoer = vindoers_model::limit(4) -> get();

            $product_vindoer = product_model::Product_Default_lange() -> Active() -> paginate(bagination_count);
            $all_cars_mark = [];
            foreach ($product_vindoer as $key => $value) {
                foreach (explode("___" , $value["kind_car"]) as $key => $value) {
                    $all_cars_mark[] = $value;
                }
            }
            $GLOBALS["all_cars_mark"] = array_unique($all_cars_mark);
            $GLOBALS["all_cars_mark"] = $all_cars_mark;
            $all_cars_mark =  kind_of_car_model::where(function($query) {
                return  $query -> whereIn("id" , $GLOBALS["all_cars_mark"]);
            })->paginate(bagination_count);


            return view('frontEnd\\home' , compact("sliders" , "main_catigory" , "all_cars_mark" , "special_vindoer"));
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
    public function all_product_home()
    {
        try {
            $all_catigors = catigors_models::MainCatigoryDefault()->paginate(bagination_count);
            return view('frontEnd/home_page/all_catigory_view' , compact("all_catigors"));
        } catch (\Throwable $th) {
            return errorMassage("" , "danger");
        }
    }
    public function all_cars_mark()
    {
        try {
            $product_vindoer = product_model::Product_Default_lange() -> Active() -> paginate(bagination_count);
            $all_cars_mark = [];
            foreach ($product_vindoer as $key => $value) {
                foreach (explode("___" , $value["kind_car"]) as $key => $value) {
                    $all_cars_mark[] = $value;
                }
            }
            $GLOBALS["all_cars_mark"] = array_unique($all_cars_mark);
            $GLOBALS["all_cars_mark"] = $all_cars_mark;
            $all_cars_mark =  kind_of_car_model::where(function($query) {
                return  $query -> whereIn("id" , $GLOBALS["all_cars_mark"]);
            })->paginate(bagination_count);
            return view('frontEnd/home_page/all_cars_mark' , compact("all_cars_mark"));
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
    public function all_product_on_websit()
    {
        try {
            $product = product_model::Product_Default_lange() -> Active() ->paginate(bagination_count);
            $all_catigors = catigors_models::with(["get_supcatigory" => function($query) {
                return  $query -> select("main_catigory_id" , "id" , "name");
            }])->MainCatigoryDefault() -> get();
            $catigoryClass = catigors_models::class;
            return view("frontEnd/all_product_on_websit/all_product_on_websit" , compact("catigoryClass" , "product" , "all_catigors"));
        } catch (\Throwable $th) {
            return errorMassage("" , "danger");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function product_details($id)
    {
        try {
            $product = product_model::find($id);
            if(!product_model::find($id)) {
                return errorMassage("هذا المنتج غير موجود هنا" , "danger");
            }
            $product = product_model::with(["get_catigory" => function($query) {
                return $query -> select("id" , "name");
            }, "get_vindoer" => function($query) {
                return $query -> select ("id" , "shop_name");
            } , "get_comment" => function($query) {
                return $query -> select ("product_id" , "comment" , "is_admin" , "sender");
            }])->find($id);
            $kind_of_car_model = kind_of_car_model::class;
            $related_product = product_model::where("catigory" , $product -> catigory) -> get();
            return view("frontEnd/all_product_on_websit/product_details" , compact("product" , "related_product" , "kind_of_car_model"));
        } catch (\Throwable $th) {
            return $th;
            return errorMassage("" , "danger");
        }
    }

    public function ajax_add_comment(comment_request $request)
    {
        return comments_controller::store($request);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
