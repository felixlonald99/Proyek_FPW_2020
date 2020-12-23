<?php

use Illuminate\Database\Seeder;
use App\GuestModel;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\GuestModel::class, 20)->create();
        $guest = new GuestModel();
        $guest->email = "guest@guest.com";
        $guest->name = "guest";
        $guest->phone = 1234567890;
        $guest->password = "guest";
        $guest->saldo = 0;
        $guest->status = 0;
        $guest->birthdate = "1500-08-19";
        $guest->save();
    }
}
