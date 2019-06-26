<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCasestoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_casestory', function (Blueprint $table) {
            $table->increments('case_id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('category_id')->on('tbl_category');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('tbl_login');
            $table->integer('amount')->nullable();
            $table->integer('equipmentid')->nullable();
            $table->string('casetitle');
            $table->string('caseimage');
            $table->integer('question');
            $table->integer('answer');
            $table->integer('status');
            
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
        Schema::dropIfExists('tbl_casestory');
    }
}