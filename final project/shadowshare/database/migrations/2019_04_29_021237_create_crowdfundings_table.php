<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrowdfundingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_crowdfundings', function (Blueprint $table) {
            
            $table->increments('d_id');
            $table->integer('fevent_id')->unsigned();
            $table->foreign('fevent_id')->references('fid')->on('tbl_fundraises');
            $table->string('country');
            $table->string('city');
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')->references('state_id')->on('tbl_state');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('occupation');
            $table->integer('phone');
            $table->string('add1');
            $table->string('add2');
            $table->integer('amount');
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
        Schema::dropIfExists('tbl_crowdfundings');
    }
}