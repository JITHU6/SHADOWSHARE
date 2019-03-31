<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_login', function (Blueprint $table) {
            $table->increments('login_id');
            $table->integer('reg_id')->unsigned();
            $table->foreign('reg_id')->references('reg_id')->on('tbl_register')->onDelete('cascade');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('type');
            $table->boolean('status');
            $table->string('remember_token');
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
        Schema::dropIfExists('tbl_login');
    }
}