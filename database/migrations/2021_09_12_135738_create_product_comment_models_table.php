<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCommentModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_comment_models', function (Blueprint $table) {
            $table->id();
            $table -> integer("product_id");
            $table -> text("comment") -> collation("utf8_general_ci");
            $table -> enum("active" , ["0" , "1"]) -> default("0")->comment("[1] meen that comment is open to see , [0] meen that comment isnt open to see");
            $table -> bigInteger("sender");
            $table -> string("email");
            $table -> bigInteger("shop") -> default("0") -> comment("if he has shop tha value will be more than 1 if else tha value will be 0");
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
        Schema::dropIfExists('product_comment_models');
    }
}
