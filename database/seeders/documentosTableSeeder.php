<?php
namespace Database\Seeders;

use App\documento;
use Illuminate\Database\Seeder;

class documentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        documento::create([
            'tipoDocumento' => 'Cedula de Ciudadania',
            'estado' => '1',
        ]);

        documento::create([
            'tipoDocumento' => 'Cedula Extranjera',
            'estado' => '1',
        ]);

        documento::create([
            'tipoDocumento' => 'Nit',
            'estado' => '1',
        ]);

        documento::create([
            'tipoDocumento' => 'Pasaporte',
            'estado' => '1',
        ]);
    }
}
