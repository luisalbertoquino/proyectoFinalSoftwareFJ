<?php
namespace Database\Seeders;

use App\Rol;
use App\User;
use App\Permiso;
use Illuminate\Database\Seeder;


class rolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol= Rol::create([
            'nombre' => 'Administrador-Main',
            'slug' => 'administrador-main',
            'estado' => '1',
        ]);
        $rol->permissions()->attach("1");
        $rol->save();


        $rol2=Rol::create([
            'nombre' => 'Administrador',
            'slug' => 'administrador',
            'estado' => '1',
        ]);
        $rol2->permissions()->attach("2");
        $rol2->save();

        
        $rol3=Rol::create([
            'nombre' => 'Usuario',
            'slug' => 'usuario',
            'estado' => '1',
        ]);
        $rol3->permissions()->attach("3");
        $rol3->save();

        $rol4=Rol::create([
            'nombre' => 'Contador',
            'slug' => 'contador',
            'estado' => '1',
        ]);
        $rol4->permissions()->attach("9");
        $rol4->save();

    }
}
