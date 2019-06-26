<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFundraisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_fundraises', function (Blueprint $table) {
            $table->increments('fid');
            $table->string('casetitle');
            $table->string('discription');
            $table->string('image');
            $table->integer('amount');
            $table->string('city');
            $table->string('address');
            $table->string('account');
            $table->boolean('status'); 
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
        Schema::dropIfExists('tbl_fundraises');
    }
}