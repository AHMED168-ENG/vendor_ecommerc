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

/*--------------------------------- start relation with product table -------------------------------------------*/
public function get_vindoer() {
    return $this -> belongsTo("App\models\\vindoers\\vindoers_model" , "created_id");
}
/*--------------------------------- start relation with product table -------------------------------------------*/


/* ----------------------------- start relation1 between comment and product -----------------------------*/
public function get_comment() {
    return $this -> hasMany("App\models\product_comment\product_comment_model" , "product_id");
}
/* ----------------------------- start relation1 between comment and product -----------------------------*/
}
