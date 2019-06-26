<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sponsors', function (Blueprint $table) {
            $table->increments('sponsor_id');
            $table->integer('login_id')->unsigned();
            $table->foreign('login_id')->references('id')->on('tbl_login');
            $table->string('occupation');
            $table->string('Motto');  
            $table->boolean('sstatus');        
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
        Schema::dropIfExists('tbl_sponsors');
    }
}