<?php

namespace App\models\vindoers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class vindoers_model extends Model
{
    use Notifiable;
    public $guarded = ["id"];
    public $hidden = ["created_at" , "updated_at" , "catigory_id"];
    protected $table = "vindoers_models";


    public function scopeSelection($query) {
        return $query -> select("id" , "name" , "mobil" , "email" , "addres" , "photo" , "active");
    }

    public function scopeActive($query) {
        return $query -> where("active" , "1");
    }

    /* ---------------------------------------- start relation one to meny ----------------------------- */
    public function catigory() {
        return $this->belongsTo("App\models\main_catigory\\catigors_models" , "catigory_id" , "id");
    }
    /* ---------------------------------------- start relation one to meny ----------------------------- */


}
