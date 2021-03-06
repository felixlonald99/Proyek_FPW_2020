<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyFacility extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facility', function (Blueprint $table) {
            $table->foreign("roomtype_id")->references("roomtype_id")->on("roomtype");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facility', function (Blueprint $table) {
            $table->dropForeign(["roomtype_id"]);
        });
    }
}
