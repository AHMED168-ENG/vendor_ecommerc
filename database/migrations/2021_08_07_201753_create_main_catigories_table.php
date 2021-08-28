<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainCatigoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_catigories', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table -> string("shourtcut" , 4)->collation("utf8_general_ci");
            $table -> integer("translation_of");
            $table -> string("name" , 150)->collation("utf8_general_ci")->unique();
            $table -> text("description")->collation("utf8_general_ci")->unique();
            $table -> string("slug" , 150)->collation("utf8_general_ci")->nullable();
            $table -> string("photo" , 150)->collation("utf8_general_ci");
            $table -> enum("active" , [0 , 1])->default(1);
            $table -> integer("main_catigory_id")->default(0);
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
        Schema::dropIfExists('main_catigories');
    }
}
