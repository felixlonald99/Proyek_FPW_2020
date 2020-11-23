<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest', function (Blueprint $table) {
<<<<<<< HEAD:database/migrations/2020_11_23_081212_create_guest_table.php
=======
            $table->string('name');
>>>>>>> 42191e1d27d677c7297dac080875afcd72c8d218:database/migrations/2020_11_23_081212_create_guest_migration.php
            $table->string('email')->unique()->primary();
            $table->string('name');
            $table->string('phone');
            $table->string('password');
<<<<<<< HEAD:database/migrations/2020_11_23_081212_create_guest_table.php
            $table->date('birthdate');
=======
            $table->integer('status');
>>>>>>> 42191e1d27d677c7297dac080875afcd72c8d218:database/migrations/2020_11_23_081212_create_guest_migration.php
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
        Schema::dropIfExists('guest');
    }
}
