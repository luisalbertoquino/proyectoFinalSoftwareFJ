<?php

namespace Database\Seeders;

use App\Rol;
use App\User;
use App\Permiso;
use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {
    
        $usuario=User::create([
                'nombre' => 'Pedro',
                'apellido' => 'Perez',
                'username' => 'AdminFJ',
                'idDocumento' => '1',
                'numeroDocumento' => '1076352171',
                'email' => 'AdminFJ@gmail.com',
                'telefono' => '123456789',
                'direccion' => 'cra2-24 west California',
                'password' => bcrypt('C0rhu1l42o2i'),
                'foto' => ("/storage/"),
                'level' => '1',
                'estado' => '1',
            ]);
            $usuario->permissions()->attach("1");
            $usuario->save();
            $usuario->roles()->attach("1");
            $usuario->save();
    
            $usuario2=User::create([
                'nombre' => 'Julanito',
                'apellido' => 'Cual',
                'username' => 'Cliente1',
                'idDocumento' => '1',
                'numeroDocumento' => '1076352172',
                'email' => 'Cliente1@gmail.com',
                'telefono' => '123456789',
                'direccion' => 'cra2-24 west Florida',
                'password' =>  bcrypt('C0rhu1l4'),
                'foto' => ("/storage/"),
                'level' => '1',
                'estado' => '1',
            ]);
            
            $usuario2->permissions()->attach("2");
            $usuario2->save();
            $usuario2->roles()->attach("2");
            $usuario2->save();
            
        
    }
}
