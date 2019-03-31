<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_equipments', function (Blueprint $table) {
            $table->increments('equipment_id');
            $table->integer('seller_id')->unsigned();
            $table->foreign('seller_id')->references('seller_id')->on('tbl_sellers');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('category_id')->on('tbl_category');
            $table->integer('price')->nullable();
            $table->string('condition');
            $table->string('description');
            $table->string('image');
            $table->string('pickupaddress');
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
        Schema::dropIfExists('tbl_equipments');
    }
}