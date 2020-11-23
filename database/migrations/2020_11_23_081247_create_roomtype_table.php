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
<<<<<<< HEAD:database/migrations/2020_11_23_081247_create_roomtype_table.php
            $table->integer('roomtype_id')->autoIncrement();
            $table->string('roomtype_name');
            $table->string('roomtype_description');
=======
            $table->increments('roomtype_id');
            $table->string('name');
>>>>>>> 42191e1d27d677c7297dac080875afcd72c8d218:database/migrations/2020_11_23_081247_create_roomtype_migration.php
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
