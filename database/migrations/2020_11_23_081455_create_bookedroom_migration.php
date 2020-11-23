<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookedroomMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookedroom_migration', function (Blueprint $table) {
            $table->integer('booking_number');
            $table->string('guest_email');
            $table->string('guest_name');
            $table->datetime('check_in');
            $table->datetime('check_out');
            $table->integer('room_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookedroom_migration');
    }
}
