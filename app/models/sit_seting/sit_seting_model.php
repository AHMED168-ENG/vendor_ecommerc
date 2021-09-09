<?php

namespace App\models\sit_seting;

use Illuminate\Database\Eloquent\Model;

class sit_seting_model extends Model
{
    protected $guarded = ["id"];
    protected $hidden = ["created_at" , "updated_at"];
}
