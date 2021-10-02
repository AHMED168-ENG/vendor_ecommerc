<?php

namespace App\models\vindoers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class vindoers_model extends Authenticatable
{
    use Notifiable;
    public $guarded = ["id"];
    public $hidden = ["created_at" , "updated_at"];
    protected $table = "vindoers_models";


    public function scopeSelection($query) {
        return $query -> select("id" , "name" , "shop_img" , "mobil" , "email" , "addres" , "Commercial_Register" , "active");
    }

    public function scopeActive($query) {
        return $query -> where("active" , "1");
    }

/*--------------------------------- start relation with product table -------------------------------------------*/
public function get_product() {
    return $this -> hasMany("App\models\products\product_model" , "created_id");
}
/*--------------------------------- start relation with product table -------------------------------------------*/


}
