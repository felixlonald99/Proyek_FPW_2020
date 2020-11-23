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
    }
}
