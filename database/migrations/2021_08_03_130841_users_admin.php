<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_admin', function (Blueprint $table) {
            $table-> id()->autoIncrement();
            $table-> string('name')->collation("utf8_general_ci")->nullable();
            $table-> string('email')->unique()->collation("utf8_general_ci");
            $table-> string('password' , 255)->collation("utf8_general_ci");
            $table -> string("admin_img" , 225)->nullable()->collation("utf8_general_ci");
            $table->rememberToken()->default(0)->collation("utf8_general_ci");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_admin');
    }
}
