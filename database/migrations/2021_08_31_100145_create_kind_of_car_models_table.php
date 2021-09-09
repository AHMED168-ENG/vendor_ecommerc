<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKindOfCarModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kind_of_car_models', function (Blueprint $table) {
            $table->id();
            $table -> string("name" , 255)->collation("utf8_general_ci");
            $table -> string("car_photo" , 255);
            $table -> string("car_logo_photo" , 255);
            $table -> enum("active" , ["0" , "1"]);
            $table -> string("shourtcut" , 255);
            $table -> integer("translation_of");
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
        Schema::dropIfExists('kind_of_car_models');
    }
}
