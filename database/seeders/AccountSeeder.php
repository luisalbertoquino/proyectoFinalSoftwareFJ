<?php

namespace Database\Seeders;

use App\account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        account::create([
            'name' => 'Caja Grande',
            'number' => '2',
            'type'=>'corriente',
        ]);

        account::create([
            'name' => 'Caja Chica',
            'number' => '3',
            'type'=>'corriente',
        ]);

        account::create([
            'name' => 'Stripe España',
            'number' => '1',
            'type'=>'corriente',
        ]);

        account::create([
            'name' => 'Compropago',
            'number' => '1',
            'type'=>'corriente',
        ]);

        account::create([
            'name' => 'MercadoPago',
            'number' => '5',
            'type'=>'corriente',
        ]);
    } 
}
