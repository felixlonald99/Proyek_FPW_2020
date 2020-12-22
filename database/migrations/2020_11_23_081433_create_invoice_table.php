<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->integer('invoice_number')->primary();
            $table->integer('booking_number'); //fk
            $table->string('guest_email'); //fk
            $table->integer('total_price'); //service price
            $table->string('payment_method')->nullable();
            $table->integer('payment_status');
            $table->datetime('payment_datetime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice');
    }
}
