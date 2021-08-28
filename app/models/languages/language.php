<?php

namespace App\models\languages;

use Illuminate\Database\Eloquent\Model;

class language extends Model
{
    protected $table = "languages";
    protected $hidden = ["created_at" , "updated_at"];
    protected $guarded = ["id"];
}
