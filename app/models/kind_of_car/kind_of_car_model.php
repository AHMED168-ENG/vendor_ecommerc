<?php

namespace App\models\kind_of_car;

use Illuminate\Database\Eloquent\Model;

class kind_of_car_model extends Model
{
    protected $guarded = ["id"];
    protected $hidden = ["created_at" , "updated_at"];
    protected $table = "kind_of_car_models";


    public function scopeCar_kind_active($query) {
        return $query -> where("active" , "1");
    }


    /* ------------------------------------ start scope all kind_car_with_default lange -----------------------------*/
    public function scopeCar_kind_default_language($query) {
        return $query -> where("shourtcut" , git_default_language());
    }
    /* ------------------------------------ start scope all kind_car_with_default lange -----------------------------*/



}
