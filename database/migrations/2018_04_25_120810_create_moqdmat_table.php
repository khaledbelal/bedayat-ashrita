<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoqdmatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moqdmat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable(); 
            $table->string('path'); 
            $table->string('image_path')->nullable(); 
            $table->integer('total_views')->default(0); 
            $table->tinyInteger('active')->default(1); 
            $table->unsignedInteger('sheikh_id');
            $table->foreign('sheikh_id')->references('id')->on('sheikhs');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('moqdmat');
    }
}
