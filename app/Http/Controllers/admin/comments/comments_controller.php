<?php

namespace App\Http\Controllers\admin\comments;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\comments\comment_request;
use App\models\product_comment\product_comment_model;
use App\models\products\product_model;
use App\models\vindoers\vindoers_model;
use Illuminate\Http\Request;

class comments_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $comments = product_comment_model::with(["get_product" => function($query) {
                return $query -> select("name" , "id");
            } , "get_sender" => function($query) {
                return $query -> select("f_name" , "l_name" , "id" , "email");
            }])->paginate(bagination_count);
            return view("admin/product_comment/all_product_comment" , compact("comments"));
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
            $all_product = product_model::Product_Default_lange() -> Active()->get();
            return view("admin/product_comment/add_product_comment" , compact("all_product"));
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
    static function store(comment_request $request)
    {
        try {
            $active = "0";
            if($request -> url() == route("store_comment_user")) {
                $sender =  auth()->guard("web") -> user() -> id;
                $is_admin =  "0";
                $email = auth()->guard("web") -> user() -> email;
            } else if ($request -> url() == route("store_comment_admin")) {
                $sender =  auth()->guard("admins") -> user() -> id;
                $is_admin =  "1";
                $email = auth()->guard("admins") -> user() -> email;
                $active = isset($request -> active) ? "1" : "0";
            }
            $product = product_model::find($request -> product);
            if($product -> is_admin == "1") {
                $shop = "0";
            } else {
                $shop = $product -> created_id;
            }
            product_comment_model::create([
                "comment" => filter_var($request -> comment , FILTER_SANITIZE_STRING),
                "product_id" => filter_var($request -> product , FILTER_SANITIZE_NUMBER_INT),
                "active" => $active,
                "email" => $email,
                "sender" => $sender,
                "is_admin" => $is_admin,
                "shop" => $shop,
            ]);
            return errorMassage("تم تسجيل الكومنت بنجاح" , "success");
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
            $comment = product_comment_model::find($id);
            if(!$comment) {
                return errorMassage("هذا الكومنت غير موجود" , "danger");
            }
            $all_product = product_model::Product_Default_lange() -> Active()->get();
            return view("admin/product_comment/edit_product_comment" , compact("comment" , "all_product"));
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
    public function update(comment_request $request, $id)
    {
        try {
            $comment = product_comment_model::find($id);
            if(!$comment) {
                return errorMassage("هذا الكومنت ليس موجود" , "danger");
            }
            $active = isset($request -> active) ? "1" : "0";
            $comment -> update([
                "comment" => filter_var($request -> comment , FILTER_SANITIZE_STRING),
                "product_id" => filter_var($request -> product , FILTER_SANITIZE_NUMBER_INT),
                "active" => $active,
            ]);
            return errorMassage("تم تعديل الكومنت بنجاح" , "success");
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
