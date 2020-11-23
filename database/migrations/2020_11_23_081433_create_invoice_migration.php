<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_migration', function (Blueprint $table) {
            $table->integer('invoice_number')->primary();
            $table->integer('booking_number');
            $table->integer('total_price');
            $table->string('payment_method');
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
        Schema::dropIfExists('invoice_migration');
    }
}
