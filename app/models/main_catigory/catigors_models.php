<?php

namespace App\models\main_catigory;

use App\Observers\mainCatigoryObserver;
use Illuminate\Database\Eloquent\Model;

class catigors_models extends Model
{
    protected $guarded = ["id"];
    protected $table = "main_catigories";
    protected $hidden = ["created_at" , "updated_at"];

    public function scopeActive($query) {
        return $query -> where("active" , 1);
    }
    public function scopeMainCatigoryDefault($query) {
        return $query -> where([["main_catigory_id" , "==", 0] ,["shourtcut" , "=" , git_default_language()] , ["active" , "=" , "1"]]);
    }
    public function scopeSupCatigoryDefault($query) {
        return $query -> where([["main_catigory_id" , "!=", 0] ,["shourtcut" , "=" , git_default_language()] , ["active" , "=" , "1"]]);
    }

    /*  -------------------------------------relation 2 --------------------------------------------*/
    public function get_otherLang()
    {
        return $this->hasMany(self::class , "translation_of" , "id");
    }
    /*  -------------------------------------relation 2 --------------------------------------------*/

    /*  -------------------------------------relation 3 --------------------------------------------*/
    public function get_supcatigory()
    {
        return $this->hasMany(self::class , "main_catigory_id" , "id");
    }
    /*  -------------------------------------relation 3 --------------------------------------------*/

    /*  -------------------------------------relation 4 --------------------------------------------*/
    public function get_Kind_of_car()
    {
        return $this -> hasMany("App\models\kind_of_car\kind_of_car_model" , "catigory");
    }
    /*  -------------------------------------relation 4 --------------------------------------------*/

    /*  -------------------------------------relation 5 --------------------------------------------*/
    public function get_product()
    {
        return $this -> hasMany("App\models\products\product_model" , "catigory");
    }
    /*  -------------------------------------relation 5 --------------------------------------------*/

    /*  -------------------------------------scope 3 --------------------------------------------*/

    public function scopeActive_catigory($query , $shourtcut)
    {
        return $query -> where([["shourtcut" ,"=" , $shourtcut] , ["active" , "=" , "1"] , ["main_catigory_id" , "=" , 0]]);
    }
    /*  -------------------------------------scope 3 --------------------------------------------*/
}
