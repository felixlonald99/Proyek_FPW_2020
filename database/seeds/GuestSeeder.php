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
        $seeds= [
            [
                'nama' => 'andika',
                'email' => 'andika@gmail.com',
                'mobilenumber' => "082250499603",
                'password' => "asdasdASD",
                'saldo' => 0,
                'status' => 0,
            ],

            [
                'nama' => 'aucky',
                'email' => 'aucky@gmail.com',
                'mobilenumber' => "082250499604",
                'password' => "asdasdASD",
                'saldo' => 0,
                'status' => 0,
            ],

            [
                'nama' => 'farrell',
                'email' => 'farrell@gmail.com',
                'mobilenumber' => "082250499605",
                'password' => "asdasdASD",
                'saldo' => 0,
                'status' => 0,
            ],

            [
                'nama' => 'felix',
                'email' => 'felix@gmail.com',
                'mobilenumber' => "082250499602",
                'password' => "asdasdASD",
                'saldo' => 0,
                'status' => 0,
            ]
        ];

        foreach ($seeds as $key => $seed) {
            GuestModel::create($seed);
        }
    }
}
