<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_models', function (Blueprint $table) {
            $table->id();
            $table->string("title")->collation("utf8_general_ci");
            $table->string("info" , 255)->collation("utf8_general_ci");
            $table->string("img" , 255)->collation("utf8_general_ci");
            $table->integer("page");
            $table->enum("active" , ["0" , "1"])->default("0");
            $table->string("shourtcut" , 255)->collation("utf8_general_ci");
            $table->integer("translation_of");
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
        Schema::dropIfExists('slider_models');
    }
}
