<?php

namespace Database\Seeders;

use App\permissionsi;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        permissionsi::create([
            'id_user' => '1',
            'saldo' => '1',
            'movimientos' => '1',
            'categoria' => '1',
            'cuentas' => '1',
            'usuario' => '1',
            'transferencia' => '1',
            'tours' => '1',
            'm_futuros' => '1',
            'bitacora' => '1',
            'adjuntos' => '1',
            'pdf' => '1',
        ]);

        permissionsi::create([
            'id_user' => '9',
            'saldo' => '11',
            'movimientos' => '1',
            'categoria' => '1',
            'cuentas' => '1',
            'usuario' => '1',
            'transferencia' => '1',
            'tours' => '1',
            'm_futuros' => '1',
            'bitacora' => '1',
            'adjuntos' => '1',
            'pdf' => '8',
        ]);

        permissionsi::create([
            'id_user' => '10',
            'saldo' => '12',
            'movimientos' => '1',
            'categoria' => '1',
            'cuentas' => '1',
            'usuario' => '1',
            'transferencia' => '1',
            'tours' => '1',
            'm_futuros' => '1',
            'bitacora' => '1',
            'adjuntos' => '3',
            'pdf' => '8',
        ]);

        permissionsi::create([
            'id_user' => '11',
            'saldo' => '13',
            'movimientos' => '1',
            'categoria' => '1',
            'cuentas' => '1',
            'usuario' => '1',
            'transferencia' => '1',
            'tours' => '1',
            'm_futuros' => '1',
            'bitacora' => '1',
            'adjuntos' => '1',
            'pdf' => '8',
        ]);

        permissionsi::create([
            'id_user' => '12',
            'saldo' => '14',
            'movimientos' => null,
            'categoria' => null,
            'cuentas' => null,
            'usuario' => null,
            'transferencia' => null,
            'tours' => null,
            'm_futuros' => null,
            'bitacora' => null,
            'adjuntos' => null,
            'pdf' => null,
        ]);

        permissionsi::create([
            'id_user' => '13',
            'saldo' => '15',
            'movimientos' => null,
            'categoria' => null,
            'cuentas' => null,
            'usuario' => null,
            'transferencia' => null,
            'tours' => null,
            'm_futuros' => null,
            'bitacora' => null,
            'adjuntos' => null,
            'pdf' => null,
        ]);

        permissionsi::create([
            'id_user' => '14',
            'saldo' => '16',
            'movimientos' => null,
            'categoria' => null,
            'cuentas' => null,
            'usuario' => null,
            'transferencia' => null,
            'tours' => null,
            'm_futuros' => null,
            'bitacora' => null,
            'adjuntos' => null,
            'pdf' => null,
        ]);

        permissionsi::create([
            'id_user' => '15',
            'saldo' => '17',
            'movimientos' => null,
            'categoria' => null,
            'cuentas' => null,
            'usuario' => null,
            'transferencia' => null,
            'tours' => null,
            'm_futuros' => null,
            'bitacora' => null,
            'adjuntos' => null,
            'pdf' => null,
        ]);
    }
}
