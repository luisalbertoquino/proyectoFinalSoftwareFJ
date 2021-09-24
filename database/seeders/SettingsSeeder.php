<?php

namespace Database\Seeders;


use App\settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        settings::create([
            'name' => 'divisa',
            'value' => 'COP',
        ]);
    }
}
