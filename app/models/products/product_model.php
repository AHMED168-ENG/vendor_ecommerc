<?php

namespace App\models\products;

use Illuminate\Database\Eloquent\Model;

class product_model extends Model
{
    protected $guarded = ["id"];
    protected $hidden = ["created_at","updated_at"];
    protected $table = "product_models";

    /* ------------------- scope active -------------------*/
    public function scopeActive($query) {
        return $query -> where("active" , "1");
    }
    /* ------------------- scope active -------------------*/

    /* ------------------- scope active -------------------*/
    public function scopeProduct_Default_lange($query) {
        return $query -> where("shourtcut" , git_default_language());
    }
    /* ------------------- scope active -------------------*/


    /*  -------------------------------------relation 5 --------------------------------------------*/
    public function get_catigory()
    {
        return $this -> belongsTo("App\models\main_catigory\catigors_models" , "catigory");
    }
    /*  -------------------------------------relation 5 --------------------------------------------*/

    /*  -------------------------------------relation 5 --------------------------------------------*/
    public function get_kind_car()
    {
        return $this -> belongsTo("App\models\kind_of_car\kind_of_car_model" , "kind_car");
    }
    /*  -------------------------------------relation 5 --------------------------------------------*/
}
