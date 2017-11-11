<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('user_id');
            $table->string('email', 50)->unique();
            $table->string('name', 30);
            $table->string('password',60);
            $table->integer('user_address_id');
            $table->string('phone_number', 20);
            $table->string('mobile_number1', 20);
            $table->string('mobile_number2', 20);
            $table->string('api_token',60)->unique();
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
