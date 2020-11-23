<?php

use App\FacilityModel;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //wifi
        $roomtype = new FacilityModel();
        $roomtype->facility_name = "Wifi";
        $roomtype->roomtype_id = 1; //select where facility.roomtype_id<room.roomtype_id
        $roomtype->save();

        //shower
        $roomtype = new FacilityModel();
        $roomtype->facility_name = "Shower";
        $roomtype->roomtype_id = 1;
        $roomtype->save();

        //tv
        $roomtype = new FacilityModel();
        $roomtype->facility_name = "Room service";
        $roomtype->roomtype_id = 1;
        $roomtype->save();

        //breakfast
        $roomtype = new FacilityModel();
        $roomtype->facility_name = "Breakfast";
        $roomtype->roomtype_id = 1;
        $roomtype->save();

        //ac
        $roomtype = new FacilityModel();
        $roomtype->facility_name = "Air Conditioning";
        $roomtype->roomtype_id = 1;
        $roomtype->save();

        // ============ 3 ==============
        //desk
        $roomtype = new FacilityModel();
        $roomtype->facility_name = "Work Desk";
        $roomtype->roomtype_id = 3;
        $roomtype->save();

        //hairdryer
        $roomtype = new FacilityModel();
        $roomtype->facility_name = "Hairdryer";
        $roomtype->roomtype_id = 3;
        $roomtype->save();

        //tea set
        $roomtype = new FacilityModel();
        $roomtype->facility_name = "Tea and Coffee maker set";
        $roomtype->roomtype_id = 3;
        $roomtype->save();

        // ============ 4 ==============
        //fridge
        $roomtype = new FacilityModel();
        $roomtype->facility_name = "Fridge";
        $roomtype->roomtype_id = 4;
        $roomtype->save();

        //couch
        $roomtype = new FacilityModel();
        $roomtype->facility_name = "Couch";
        $roomtype->roomtype_id = 4;
        $roomtype->save();

        //couch
        $roomtype = new FacilityModel();
        $roomtype->facility_name = "Mini Bar";
        $roomtype->roomtype_id = 4;
        $roomtype->save();

        // ============ 5 ==============
        //kitchen
        $roomtype = new FacilityModel();
        $roomtype->facility_name = "Kitchen Set";
        $roomtype->roomtype_id = 5;
        $roomtype->save();

        //dining table
        $roomtype = new FacilityModel();
        $roomtype->facility_name = "Dining Table";
        $roomtype->roomtype_id = 5;
        $roomtype->save();

        //Home Theatre
        $roomtype = new FacilityModel();
        $roomtype->facility_name = "Home Theatre Set";
        $roomtype->roomtype_id = 5;
        $roomtype->save();

        //Balcony
        $roomtype = new FacilityModel();
        $roomtype->facility_name = "Balcony";
        $roomtype->roomtype_id = 5;
        $roomtype->save();

        //couch
        $roomtype = new FacilityModel();
        $roomtype->facility_name = "Bathtub";
        $roomtype->roomtype_id = 5;
        $roomtype->save();
    }
}
