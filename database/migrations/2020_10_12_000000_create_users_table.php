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
            $table->id();
            $table->unsignedBigInteger('district_id');
            //$table->unsignedBigInteger('category_id')->nullable();
            $table->string('name');
            $table->string('number')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['user','admin'])->default('user');
            $table->string('isApprove')->nullable();
            $table->string('isFoodDelar')->nullable();
            $table->string('isPlaceUploder')->nullable();
            $table->rememberToken();
            $table->foreign('district_id')->references('id')->on('districts');
            //$table->foreign('category_id')->references('id')->on('categories');
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
