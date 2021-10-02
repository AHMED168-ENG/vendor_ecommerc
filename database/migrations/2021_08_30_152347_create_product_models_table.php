<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_models', function (Blueprint $table) {
            $table->id();
            $table -> string("name" , 255)->collation("utf8_general_ci");
            $table -> integer("price");
            $table -> integer("descount") -> default(0);
            $table -> integer("catigory");
            $table -> string("kind_car" , 255)->collation("utf8_general_ci");
            $table -> string("model_car" , 255)->collation("utf8_general_ci");
            $table -> integer("pices");
            $table -> integer("numper_screen");
            $table -> enum("state" , ["0" , "1"]) ->comment("'0' meens state is new '1' meen that state is used");
            $table -> enum("active" , ["0" , "1"]) ->comment("'0' meens close is new '1' meen open");
            $table -> integer("security");
            $table -> text("description")->collation("utf8_general_ci");
            $table -> text("description_photo")->collation("utf8_general_ci");
            $table -> text("product_photo")->collation("utf8_general_ci");
            $table -> text("tages")->collation("utf8_general_ci");
            $table -> string("shourtcut")->collation("utf8_general_ci");
            $table -> integer("transition_of")->default(0);
            $table -> integer("created_id");
            $table -> enum("is_admin" , ["0" , "1"]) -> default("1") -> comment("1 meen admin , 0 meen vindoer");
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
        Schema::dropIfExists('product_models');
    }
}
