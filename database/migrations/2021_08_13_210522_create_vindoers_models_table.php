<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVindoersModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vindoers_models', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table -> string("name" , 255)->collation("utf8_general_ci");
            $table -> string("mobil" , 15)->collation("utf8_general_ci")->unique();
            $table -> string("email" , 255)->collation("utf8_general_ci")->unique();
            $table -> string("password" , 255)->collation("utf8_general_ci")->unique();
            $table -> integer("age");
            $table -> text("addres" , 300)->collation("utf8_general_ci");
            $table -> integer("catigory_id")->collation("utf8_general_ci");
            $table -> enum("active" , [0 , 1])->default(0);
            $table -> string("photo" , 255)->collation("utf8_general_ci");
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
        Schema::dropIfExists('vindoers_models');
    }
}
