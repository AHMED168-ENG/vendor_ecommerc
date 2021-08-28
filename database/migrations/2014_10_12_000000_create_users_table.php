<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('f_name')->collation("utf8_general_ci");
            $table->string('l_name')->collation("utf8_general_ci");
            $table->string('email')->unique()->collation("utf8_general_ci");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table -> integer("age") -> nullable();
            $table->text('addres')->collation("utf8_general_ci");
            $table->string('phone')->collation("utf8_general_ci");
            $table->enum("active" , ["0" , "1"]);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
