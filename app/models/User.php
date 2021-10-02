<?php

namespace App\models;

use App\Observers\regist_notification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ["id"];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token' , "updated_at" , "created_at"];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /*----------------------- start relation --------------------- */
    public function user_phone() {
        return $this -> hasOne("App\models\\telephon" , "forign_key");
    }
    /*----------------------- start relation --------------------- */
    /*  -------------------------------------الربط بين observer والجول --------------------------------------------*/
    protected static function boot()
    {
        parent::boot();
        User::observe(regist_notification::class);
    }
    /*  -------------------------------------الربط بين observer والجول --------------------------------------------*/

        /* ----------------------------- start relation2 between comment and sender -----------------------------*/
        public function get_comment() {
            return $this -> hasMany("App\models\product_comment\product_comment_model" , "sender");
        }
        /* ----------------------------- start relation2 between comment and sender -----------------------------*/
}

