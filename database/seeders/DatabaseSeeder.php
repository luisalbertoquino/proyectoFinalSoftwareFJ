<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $this->call(permisosTableSeeder::class);
        $this->call(rolTableSeeder::class);
        $this->call(documentosTableSeeder::class);
        $this->call(usersTableSeeder::class);
        $this->call(BusinessSeeder::class);
        //modulo contable
        $this->call(AccountSeeder::class);
        $this->call(AttachedSeeder::class);
        $this->call(Attr_ValuesSeeder::class);
        $this->call(BitacoraSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(SumarySeeder::class);
        $this->call(Tours_attrSeeder::class);
        $this->call(ToursSeeder::class);
    }
}
