<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class Admin_user extends Authenticatable
{
    use LaratrustUserTrait;

    protected $guarded = ["id"];
    protected $table = "users_admin";
}
