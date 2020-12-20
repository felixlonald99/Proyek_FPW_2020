<?php

use App\RoomModel;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //101-120 single standard
        for ($i = 1; $i <= 20; $i++) {
            $room = new RoomModel();
            if ($i<10) {
                $room->room_number = "10".$i;
            } else {
                $room->room_number = "1".$i;
            }
            $room->roomtype_id = 1;
            $room->room_status = 0;
            $room->save();
        }

        //201-220 standard twin bed
        for ($i = 1; $i <= 20; $i++) {
            $room = new RoomModel();
            if ($i<10) {
                $room->room_number = "20".$i;
            } else {
                $room->room_number = "2".$i;
            }
            $room->roomtype_id = 2;
            $room->room_status = 0;
            $room->save();
        }

        //301-320 deluxe room
        for ($i = 1; $i <= 20; $i++) {
            $room = new RoomModel();
            if ($i<10) {
                $room->room_number = "30".$i;
            } else {
                $room->room_number = "3".$i;
            }
            $room->roomtype_id = 3;
            $room->room_status = 0;
            $room->save();
        }

        //401-415 luxury room
        for ($i = 1; $i <= 15; $i++) {
            $room = new RoomModel();
            if ($i<10) {
                $room->room_number = "40".$i;
            } else {
                $room->room_number = "4".$i;
            }
            $room->roomtype_id = 4;
            $room->room_status = 0;
            $room->save();
        }

        //501-510 family suite
        for ($i = 1; $i <= 10; $i++) {
            $room = new RoomModel();
            if ($i<10) {
                $room->room_number = "50".$i;
            } else {
                $room->room_number = "5".$i;
            }
            $room->roomtype_id = 5;
            $room->room_status = 0;
            $room->save();
        }
    }
}
