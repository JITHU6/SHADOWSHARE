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
        Schema::create('tbl_register', function (Blueprint $table) {
            $table->increments('reg_id');
            $table->string('name');
            $table->string('addressline1');
            $table->string('addressline2');
            $table->integer('panchayath_id')->unsigned();
            $table->foreign('panchayath_id')->references('panchayath_id')->on('tbl_panchayath');
            $table->integer('pincode');
            $table->string('phonenumber');
            $table->string('image')->nullable();
            $table->boolean('status');
            //$table->timestamp('email_verified_at')->nullable();
            //$table->string('password');
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('tbl_register');
    }
}