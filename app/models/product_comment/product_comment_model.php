<?php

namespace App\models\product_comment;

use App\models\Admin_user;
use Illuminate\Database\Eloquent\Model;

class product_comment_model extends Model
{
    protected $hidden = ["created_at" , "updated_at"];
    protected $table = "product_comment_models";
    protected $guarded = ["id"];

    /*------------------------- scope1 active comment -----------------------------*/
    public function scopeActive($query) {
        return $query -> where("active" , "1");
    }
    /*------------------------- scope1 active comment -----------------------------*/

    /* ----------------------------- start relation1 between comment and product -----------------------------*/
    public function get_product() {
        return $this -> belongsTo("App\models\products\product_model" , "product_id");
    }

    /* ----------------------------- start relation1 between comment and product -----------------------------*/

    /* ----------------------------- start relation2 between comment and sender -----------------------------*/
    public function get_sender() {
        return $this -> belongsTo("App\models\User" , "sender");
    }
    /* ----------------------------- start relation2 between comment and sender -----------------------------*/
}
