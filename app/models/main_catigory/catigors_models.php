<?php

namespace App\models\main_catigory;

use App\Observers\mainCatigoryObserver;
use Illuminate\Database\Eloquent\Model;

class catigors_models extends Model
{
    protected $guarded = ["id"];
    protected $table = "main_catigories";
    protected $hidden = ["created_at" , "updated_at"];

    /* ---------------------------------------- start relation one to meny ----------------------------- */
    public function vindower() {
        return $this->hasMany("App\models\\vindoers\\vindoers_model" , "catigory_id" , "id");
    }
    /* ---------------------------------------- start relation one to meny ----------------------------- */
    public function scopeActive($query) {
        return $query -> where("active" , 1);
    }
    public function scopeMainCatigoryDefault($query) {
        return $query -> where("shourtcut" , git_default_language())->where("main_catigory_id" , 0);
    }
    public function scopeSupCatigoryDefault($query) {
        return $query -> where("shourtcut" , git_default_language())->where("main_catigory_id" , "!=", 0);
    }

    /*  -------------------------------------الربط بين observer والجول --------------------------------------------*/
    protected static function boot()
    {
        parent::boot();
        catigors_models::observe(mainCatigoryObserver::class);
    }
    /*  -------------------------------------الربط بين observer والجول --------------------------------------------*/

    /*  -------------------------------------relation 2 --------------------------------------------*/
    public function get_otherLang()
    {
        return $this->hasMany(self::class , "translation_of" , "id");
    }
    /*  -------------------------------------relation 2 --------------------------------------------*/

    /*  -------------------------------------scope 3 --------------------------------------------*/

    public function scopeActive_catigory($query , $shourtcut)
    {
        return $query -> where([["shourtcut" ,"=" , $shourtcut] , ["active" , "=" , "1"]]);
    }
    /*  -------------------------------------scope 3 --------------------------------------------*/
}
