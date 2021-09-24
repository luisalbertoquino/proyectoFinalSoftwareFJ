<?php
namespace Database\Seeders;

use App\Permiso;
use Illuminate\Database\Seeder;

class permisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permiso::create([
            'nombre' => 'Administrador-Main',
            'slug' => 'administrador-main',
        ]);

        Permiso::create([
            'nombre' => 'Administrador',
            'slug' => 'administrador',
        ]);

        Permiso::create([
            'nombre' => 'Productos',
            'slug' => 'productos',
        ]);

        Permiso::create([
            'nombre' => 'Ventas',
            'slug' => 'ventas',
        ]);

        Permiso::create([
            'nombre' => 'Compras',
            'slug' => 'compras',
        ]);
        Permiso::create([
            'nombre' => 'Proveedores',
            'slug' => 'proveedores',
        ]);

        Permiso::create([
            'nombre' => 'Clientes',
            'slug' => 'clientes',
        ]);

        Permiso::create([
            'nombre' => 'Informes',
            'slug' => 'informes',
        ]);

        Permiso::create([
            'nombre' => 'Contabilidad',
            'slug' => 'contabilidad',
        ]);

        Permiso::create([
            'nombre' => 'Sistema',
            'slug' => 'sistema',
        ]);

        Permiso::create([
            'nombre' => 'Usuarios',
            'slug' => 'usuarios',
        ]);

        Permiso::create([
            'nombre' => 'ActualizarCuenta',
            'slug' => 'actualizarcuenta',
        ]);
    }
}
