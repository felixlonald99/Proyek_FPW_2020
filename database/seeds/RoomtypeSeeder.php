<?php

use App\RoomtypeModel;
use Illuminate\Database\Seeder;

class RoomtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // single standard
        $roomtype = new RoomtypeModel();
        $roomtype->roomtype_name = "Single Standard Room";
        $roomtype->roomtype_description = "a standard room with one single bed";
        $roomtype->roomtype_capacity = 1;
        $roomtype->roomtype_price = 300000;
        $roomtype->save();

        // standard twin
        $roomtype = new RoomtypeModel();
        $roomtype->roomtype_name = "Standard Twin Room";
        $roomtype->roomtype_description = "a standard room with one double bed or two twin bed";
        $roomtype->roomtype_capacity = 2;
        $roomtype->roomtype_price = 450000;
        $roomtype->save();

        // deluxe
        $roomtype = new RoomtypeModel();
        $roomtype->roomtype_name = "Deluxe Room";
        $roomtype->roomtype_description = "bigger room with one queen-sized bed";
        $roomtype->roomtype_capacity = 2;
        $roomtype->roomtype_price = 600000;
        $roomtype->save();


        // Luxury
        $roomtype = new RoomtypeModel();
        $roomtype->roomtype_name = "Luxury Room";
        $roomtype->roomtype_description = "spacious room with one king-sized bed";
        $roomtype->roomtype_capacity = 2;
        $roomtype->roomtype_price = 750000;
        $roomtype->save();

        // suite
        $roomtype = new RoomtypeModel();
        $roomtype->roomtype_name = "Family Suite";
        $roomtype->roomtype_description = "spacious room with two rooms (1 king-sized bed and 1 twin bed) with additional living room and kitchen";
        $roomtype->roomtype_capacity = 4;
        $roomtype->roomtype_price = 1200000;
        $roomtype->save();
    }
}
