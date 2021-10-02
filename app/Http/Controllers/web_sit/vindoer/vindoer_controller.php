<?php

namespace App\Http\Controllers\web_sit\vindoer;

use App\Http\Controllers\Controller;
use App\models\cars_model\cars_model;
use App\models\kind_of_car\kind_of_car_model;
use App\models\main_catigory\catigors_models;
use App\models\products\product_model;
use Illuminate\Http\Request;

class vindoer_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_regist_vindoer()
    {
        try {
            return view("frontEnd/vindoers/vindoer_register");
        } catch (\Throwable $th) {
            return errorMassage("" , "danger");
        }
    }

    public function show_login_vindoer()
    {
        try {
            return view("frontEnd/vindoers/vindoer_login");
        } catch (\Throwable $th) {
            return errorMassage("" , "danger");
        }
    }


    public function login_vindoer(Request $request)
    {
        try {
            $rmemper_me = isset($request -> rememper_me) ? true : false;
            if(auth()->guard('vindoers') ->attempt(["mobil" => $request -> phone , "password" => $request -> password] , $rmemper_me)) {
                return redirect()-> route("all_product_vindoer");
            } else {
                return redirect()->route("login_vindoer") -> with(["message" => "هناك خطا في البيانات", "type" => "danger"]);
            }
        } catch (\Throwable $th) {
            return errorMassage("" , "danger");
        }
    }



    public function all_product_vindoer()
    {
        try {
            $product_vindoer = product_model::where([["created_id" , "=" , auth() -> guard("vindoers") -> user() ->id ]])-> Product_Default_lange() -> Active()->limit(12);
            $all_cars_mark = [];
            foreach ($product_vindoer -> get() as $key => $value) {
                foreach (explode("___" , $value["kind_car"]) as $key => $value) {
                    $all_cars_mark[] = $value;
                }
            }
            $GLOBALS["all_cars_mark"] = array_unique($all_cars_mark);
            $GLOBALS["all_cars_mark"] = $all_cars_mark;
            $all_cars_mark =  kind_of_car_model::where(function($query) {
                return  $query -> whereIn("id" , $GLOBALS["all_cars_mark"]);
            })->paginate(bagination_count);

            $product_vindoer_catigory = collect($product_vindoer-> get())->unique("catigory");
            $product_vindoer = $product_vindoer -> orderBy("id" , "desc")->get();
            return view("frontEnd/vindoers/main_page_vindoer" , compact("product_vindoer" , "product_vindoer_catigory" , "all_cars_mark"));
        } catch (\Throwable $th) {
            return $th;
            return errorMassage("" , "danger");
        }
    }


    public function all_my_mark_vindoer() {
        try {
            $product_vindoer = product_model::where([["created_id" , "=" , auth() -> guard("vindoers") -> user() ->id ]]) -> Product_Default_lange() -> Active() -> get();
            $all_cars_mark = [];
            foreach ($product_vindoer  as $key => $value) {
                foreach (explode("___" , $value["kind_car"]) as $key => $value) {
                    $all_cars_mark[] = $value;
                }
            }
            $GLOBALS["all_cars_mark"] = array_unique($all_cars_mark);
            $GLOBALS["all_cars_mark"] = $all_cars_mark;
            $all_cars_mark =  kind_of_car_model::where(function($query) {
                return  $query -> whereIn("id" , $GLOBALS["all_cars_mark"]);
            })->paginate(bagination_count);
            return view("frontEnd/vindoers/all_my_mark_vindoer" , compact("all_cars_mark"));
        } catch (\Throwable $th) {
            return $th;
            return errorMassage("" , "danger");
        }
    }

    public function show_siting() {
        try {
            $vindoer_data = auth() -> guard("vindoers") -> user();
            return view("frontEnd/vindoers/siting_vindoers" , compact("vindoer_data"));
        } catch (\Throwable $th) {
            return errorMassage("" , "danger");
        }
    }
    public function show_financial_transactions() {
        try {
            return view("frontEnd/vindoers/Financial_transactions");
        } catch (\Throwable $th) {
            return errorMassage("" , "danger");
        }
    }

    public function all_my_product() {
        try {
            $all_my_product = product_model::Active()->Product_Default_lange()->where("created_id" , auth() -> guard("vindoers") -> user()->id)->paginate(bagination_count);
            return view("frontEnd/vindoers/all_my_product" , compact("all_my_product"));
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
            $kinds_cars = kind_of_car_model::class;
            $cars_model = cars_model::all();
            return view("frontEnd/vindoers/add_product_vindoer" , compact("mainCatigory_model" , "cars_model" , "kinds_cars"));
        } catch (\Throwable $th) {
            return errorMassage("" , "danger");
        }
    }

    public function logout()
    {
        try {
            auth()->guard("vindoers")->logout();
            return redirect()->route("login_vindoer");
        }
            catch (\Throwable $th) {

            return errorMassage("" , "danger");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            return view("frontEnd/vindoers/edit_product_vindoer" , compact( "kinds_cars" ,"cars_model" , "product" , "other_product_language" , "mainCatigory_model"));
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
