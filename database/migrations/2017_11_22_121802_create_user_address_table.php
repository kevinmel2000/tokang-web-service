<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_address', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street', 50);
            $table->string('rt', 10);
            $table->string('rw', 10);
            $table->string('kelurahan', 30);
            $table->string('kecamatan', 30);
            $table->string('city', 30);
            $table->string('province', 30);
            $table->string('country', 30);
            $table->string('longitude', 30);
            $table->string('latitude', 30);
            $table->string('address_detail');            
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
        Schema::dropIfExists('user_address');
    }
}
