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
            $table -> string("shop_name" , 255)->collation("utf8_general_ci");
            $table -> string("shop_img" , 255)->collation("utf8_general_ci");
            $table -> string("mobil" , 15)->collation("utf8_general_ci")->unique();
            $table -> string("email" , 255)->collation("utf8_general_ci")->unique();
            $table -> string("password" , 255)->collation("utf8_general_ci")->unique();
            $table -> integer("age");
            $table -> text("addres" , 300)->collation("utf8_general_ci");
            $table -> enum("active" , ["0" , "1"])->default(0)->comment("0 meen not active , 1 meen active");
            $table -> enum("accept_ruls" , ["0" , "1"])->default(0)->comment("0 meen not accept , 1 meen accept");
            $table -> string("Commercial_Register" , 255)->collation("utf8_general_ci");
            $table -> integer("created_id");
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
