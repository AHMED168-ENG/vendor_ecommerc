<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();
            $table -> string("shourtcut" , 10)->collation("utf8_general_ci")->nullable();
            $table -> string("local" , 225)->collation("utf8_general_ci")->nullable();
            $table -> string("name" , 225)->collation("utf8_general_ci")->unique();
            $table -> enum("direction" , ["ltr" , "rtl"])->default("rtl");
            $table -> tinyInteger("active")->collation("utf8_general_ci")->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
