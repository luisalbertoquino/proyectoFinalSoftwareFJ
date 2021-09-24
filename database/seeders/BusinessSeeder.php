<?php
namespace Database\Seeders;

use App\negocio;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        negocio::create([
            'nombreEmpresa'=>'Empresa XYZ',
            'razonSocial'=>'Sociedad S.A.S',
            'nit'=>'1226457489',
            'telefono'=>'8755897',
            'email'=>'empresaxyzasociados@gmail.com ',
            'paginaWeb'=>'empresaxyzasociados.com',
            'ivaActual'=>'16%',
            'impuestos'=>'0%',
            'otros'=>'Empresa dedicada al comercio de elementos electronicos, vigilada por camara de comercio',
            'logo'=>'/storage/',
            'nombreLogo'=>'/storage/',
        ]);

        
    }
}
