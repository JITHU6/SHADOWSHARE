<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_transaction', function (Blueprint $table) {
            $table->increments('tid');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('tbl_login');
            $table->integer('sponsor_id')->unsigned();
            $table->foreign('sponsor_id')->references('id')->on('tbl_login');
            $table->integer('case_id')->unsigned();
            $table->foreign('case_id')->references('case_id')->on('tbl_casestory');
            $table->integer('amount');
            $table->boolean('tstatus');  
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
        Schema::dropIfExists('tbl_transaction');
    }
}