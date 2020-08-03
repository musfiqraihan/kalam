<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersregitrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersregistration', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->string('username',128);
            $table->string('email',128)->unique();
            $table->string('password',96);
            $table->string('mobile_number',16)->unique();
            $table->string('address',128);
            $table->string('userimage')->nullable;
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
        Schema::dropIfExists('usersregistration');
    }
}
