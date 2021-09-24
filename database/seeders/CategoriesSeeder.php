<?php

namespace Database\Seeders;

use App\categories;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */ 
    public function run()
    {
        categories::create([
            'name' => 'transferencia',
            'description' => 'transferencia',
            'type' => 'add',
        ]);
        categories::create([
            'name' => 'Afiliados y publicidad',
            'description' => 'Comisiones recibidas por sistemas de afiliados y publicidad',
            'type' => 'add',
        ]);
        categories::create([
            'name' => 'Pago de reservación de tour',
            'description' => 'Pago',
            'type' => 'add',
        ]);
        categories::create([
            'name' => 'Reservaciones de hoteles',
            'description' => 'Reservas de hoteles para publico en general',
            'type' => 'add',
        ]);
        categories::create([
            'name' => 'Reservaciones de vuelos',
            'description' => 'Reservaciones de vuelos para publico en general',
            'type' => 'add',
        ]);
        categories::create([
            'name' => 'Venta de articulos',
            'description' => 'Venta de articulos de inventario',
            'type' => 'add',
        ]);
        categories::create([
            'name' => 'Seguros de viaje',
            'description' => 'Seguros de viaje para publico en general',
            'type' => 'add',
        ]);
        categories::create([
            'name' => 'Reembolsos',
            'description' => 'Reembolso de tours o servicios adquiridos',
            'type' => 'out',
        ]);
        categories::create([
            'name' => 'Nóminas',
            'description' => 'Pago de nominas',
            'type' => 'out',
        ]);
        categories::create([
            'name' => 'Gastos de oficina',
            'description' => 'Gastos fijos y variables de oficina',
            'type' => 'out',
        ]);
        categories::create([
            'name' => 'Honorarios externos',
            'description' => 'Pago de colaboradores',
            'type' => 'out',
        ]);
        categories::create([
            'name' => 'Gastos financieros',
            'description' => 'Comisiones e intereses de plataformas y bancos',
            'type' => 'out',
        ]);
        categories::create([
            'name' => 'Gastos operativos',
            'description' => 'Gastos operativos',
            'type' => 'out',
        ]);
        categories::create([
            'name' => 'Publicidad',
            'description' => 'Pago de publicidad',
            'type' => 'out',
        ]);
        categories::create([
            'name' => 'Gastos de tour',
            'description' => 'Pagos para planeación y logística de tour',
            'type' => 'out',
        ]);
        categories::create([
            'name' => 'Pago a operadores',
            'description' => 'Pago de reservas a público en general',
            'type' => 'out',
        ]);
        categories::create([
            'name' => 'Herramientas online',
            'description' => 'Pago de herramientas online',
            'type' => 'out',
        ]);
        categories::create([
            'name' => 'Proyectos en desarrollo',
            'description' => 'Pago de herramientas y servicios para proyectos en desarrollo',
            'type' => 'out',
        ]);
        categories::create([
            'name' => 'Mobiliario y equipo de oficina',
            'description' => 'Compra o gasto de reparación en equipo y mobiliario de oficina',
            'type' => 'out',
        ]);
        categories::create([
            'name' => 'Otros gastos',
            'description' => 'Pago de gastos imprevistos',
            'type' => 'out',
        ]);
        categories::create([
            'name' => 'Impuestos',
            'description' => 'Pago de impuestos',
            'type' => 'out',
        ]);
        categories::create([
            'name' => 'Saldo inicial',
            'description' => 'Saldo de cuentas mes de junio',
            'type' => 'add',
        ]);
        categories::create([
            'name' => 'Desconocidos',
            'description' => 'Cargos a cuenta desconocidos',
            'type' => 'out',
        ]);
        categories::create([
            'name' => 'Reembolsos (ingreso)',
            'description' => 'Reembolsos varios',
            'type' => 'out',
        ]);
        categories::create([
            'name' => 'Transferencia de saldos',
            'description' => 'Transferencias de una cuenta a otra',
            'type' => 'out',
        ]);
        categories::create([
            'name' => 'Recepción de saldo',
            'description' => 'Recepción de saldo por transferencia',
            'type' => 'add',
        ]);
        categories::create([
            'name' => 'Accesorios',
            'description' => 'Compra de regalos.',
            'type' => 'out',
        ]);
        categories::create([
            'name' => 'IMSS',
            'description' => 'Cuotas de imss',
            'type' => 'out',
        ]);
        categories::create([
            'name' => 'Comisiones',
            'description' => 'Comisiones de operadores',
            'type' => 'add',
        ]);
        categories::create([
            'name' => 'ComproPago',
            'description' => 'ComproPago',
            'type' => 'out',
        ]);

        categories::create([
            'name' => 'Compra de articulos',
            'description' => 'Compra para abastecimiento de inventario',
            'type' => 'out',
        ]);
    }
}
