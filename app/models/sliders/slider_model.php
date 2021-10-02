<?php

namespace App\models\sliders;

use Illuminate\Database\Eloquent\Model;

class slider_model extends Model
{
    protected $guarded = ["id"];
    protected $hidden = ["created_at" , "updated_at"];
    protected $table = "slider_models";

    /*------------------------------- start scope active row -------------------------------*/
    public function scopeActive($query) {
        return $query -> where("active" , "1");
    }
    /*------------------------------- end scope active row -------------------------------*/

    /*------------------------------- start scope active row -------------------------------*/
    public function scopeDefaultLanguage($query) {
        return $query -> where("shourtcut" , git_default_language());
    }
    /*------------------------------- end scope active row -------------------------------*/

}
