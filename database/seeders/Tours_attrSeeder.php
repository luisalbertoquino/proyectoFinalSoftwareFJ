<?php

namespace Database\Seeders;

use App\attributestours;
use Illuminate\Database\Seeder;

class Tours_attrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        attributestours::create([
            'date' => '2017-10-19 00:00:00',
            'price' => '1',
            'id_tours' => '12',
        ]);
        attributestours::create([
            'date' => '2018-07-02 00:00:00',
            'price' => '1',
            'id_tours' => '14',
        ]);
        attributestours::create([
            'date' => '2017-09-20 00:00:00',
            'price' => '1',
            'id_tours' => '18',
        ]);
        attributestours::create([
            'date' => '2018-07-09 00:00:00',
            'price' => '1',
            'id_tours' => '14',
        ]);
        attributestours::create([
            'date' => '2017-09-25 00:00:00',
            'price' => '1',
            'id_tours' => '18',
        ]);
        attributestours::create([
            'date' => '2018-09-20 00:00:00',
            'price' => '1',
            'id_tours' => '18',
        ]);
        attributestours::create([
            'date' => '2018-10-19 00:00:00',
            'price' => '1',
            'id_tours' => '12',
        ]);
        attributestours::create([
            'date' => '2017-12-14 00:00:00',
            'price' => '1',
            'id_tours' => '17',
        ]);
        attributestours::create([
            'date' => '2018-12-17 00:00:00',
            'price' => '1',
            'id_tours' => '17',
        ]);
        attributestours::create([
            'date' => '2018-12-18 00:00:00',
            'price' => '1',
            'id_tours' => '17',
        ]);
        attributestours::create([
            'date' => '2018-09-25 00:00:00',
            'price' => '1',
            'id_tours' => '18',
        ]);
    }
}
