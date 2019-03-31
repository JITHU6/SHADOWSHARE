<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPanchayathTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_panchayath', function (Blueprint $table) {
            
            $table->increments('panchayath_id');
            $table->string('pname');
            $table->integer('district_id')->unsigned();
            $table->foreign('district_id')->references('district_id')->on('tbl_district');
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
        Schema::dropIfExists('tbl_panchayath');
    }
}