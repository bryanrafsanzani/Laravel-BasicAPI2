<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lokasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasi', function (Blueprint $table) {            
            $table->increments('id_lokasi');     
            $table->string('provinsi', 64);    
            $table->string('nama', 64);    
            $table->integer('id_invoice')->unsigned()->nullable();
        });

        Schema::table('lokasi', function($table){
            $table->foreign('id_invoice')->references('id_invoice')->on('invoice')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
