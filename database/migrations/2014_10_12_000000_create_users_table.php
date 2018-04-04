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
            $table->increments('id')->unsigned();
            $table->string('name', 255);
            $table->string('surname', 255);
            $table->date('birthday')->nullable();
            $table->string('email')->unique();
            $table->string('phone', 255);
            $table->string('password', 255);
            $table->string('address', 255);
            $table->string('city', 255);
            $table->string('zipcode', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('role', 255)->default('user');
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
