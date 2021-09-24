<?php

namespace Database\Seeders;

use App\tours;
use Illuminate\Database\Seeder;

class ToursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tours::create([
            'name' => 'Exploración Perú',
            'description' => 'Tour Exploración Perú',
        ]);
        tours::create([
            'name' => 'Mega Tour de Verano',
            'description' => '26 días, 15 ciudades y 10 Países por Europa',
        ]);
        tours::create([
            'name' => 'Invierno en Europa',
            'description' => '17 días, 9 ciudades y 6 Países por Europa',
        ]);
        tours::create([
            'name' => 'Oktoberfest',
            'description' => '17 días, 6 ciudades y países por Europa',
        ]);
    }
}
