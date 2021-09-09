<?php

namespace App\models\cars_model;

use Illuminate\Database\Eloquent\Model;

class cars_model extends Model
{
    protected $hidden = ["created_at" , "updated_at"];
    protected $guarded = ["id"];
    protected $table = "cars_models";

    public function scopeCar_Model_active($query) {
        return $query -> where("active" , 1);
    }

    /* ------------------------------------ start scope all kind_car_with_default lange -----------------------------*/
    public function scopeCar_kind_default_language($query) {
        return $query -> where("shourtcut" , git_default_language());
    }
    /* -- ---------------------------------- ------------------------------*/





}
