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
                return route("login");
            } else {
                return route("login");
            }
        } catch (\Throwable $th) {
            return errorMassage("" , "danger");
        }
    }



    public function all_product_vindoer()
    {
        try {
            $product_vindoer = product_model::where([["created_id" , "=" , auth() -> guard("vindoers") -> user() ->id ] , ["shourtcut" , "=" , git_default_language()]])->with(["get_kind_car" => function($query) {
                return $query -> select("car_logo_photo" , "id");
            }])->limit(12);

            $kind_car_logo_img = collect($product_vindoer-> get())->unique("kind_car");
            $product_vindoer_catigory = collect($product_vindoer-> get())->unique("catigory");
            $product_vindoer = $product_vindoer -> orderBy("id" , "desc")->get();
            return view("frontEnd/vindoers/main_page_vindoer" , compact("kind_car_logo_img" , "product_vindoer" , "product_vindoer_catigory"));
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
            $all_my_product = product_model::Active()->where("created_id" , auth() -> guard("vindoers") -> user()->id)->paginate(bagination_count);
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
            return route("login_vindoer");
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
