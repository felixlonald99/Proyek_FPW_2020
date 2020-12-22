<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->integer('booking_number')->primary();
            $table->string('guest_email');
            $table->string('guest_name');
            $table->integer('roomtype_id');
            $table->string('roomtype_name');
            $table->string('room_number');
            $table->date('check_in')->nullable();
            $table->date('check_out')->nullable();
            $table->integer('nights')->nullable();
            $table->integer('total_price');
            $table->integer('booking_status');
            $table->string('payment_method')->nullable();
            $table->integer('payment_status');
            $table->datetime('payment_datetime')->nullable();
            $table->integer('use_promo')->nullable();
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
        Schema::dropIfExists('booking');
    }
}
