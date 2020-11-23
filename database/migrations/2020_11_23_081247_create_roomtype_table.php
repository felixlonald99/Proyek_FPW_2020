<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomtypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomtype', function (Blueprint $table) {
            $table->integer('roomtype_id')->autoIncrement();
            $table->string('roomtype_name');
            $table->string('roomtype_description');
            $table->integer('roomtype_capacity');
            $table->integer('roomtype_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roomtype');
    }
}
