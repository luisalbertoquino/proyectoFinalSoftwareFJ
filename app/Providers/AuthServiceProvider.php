<?php

namespace App\Providers;
use App\Models\User;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //administrador fj
        Gate::define('adminfj', function (User $user) {
            return $user->permissions->first()->slug =='administrador-main';
        });
        //administrador regular
        Gate::define('admin', function (User $user) {
            return $user->permissions->first()->slug =='administrador' || $user->permissions->first()->slug =='administrador-main';
        });
        //Productos
        Gate::define('productos', function (User $user) {
            return $user->permissions->first()->slug =='productos' || $user->permissions->first()->slug =='administrador' || $user->permissions->first()->slug =='administrador-main' ;
        });
        //Ventas
        Gate::define('ventas', function (User $user) {
            return $user->permissions->first()->slug =='ventas' || $user->permissions->first()->slug =='administrador' || $user->permissions->first()->slug =='administrador-main' ;
        });
        //Compras
        Gate::define('compras', function (User $user) {
            return $user->permissions->first()->slug =='compras' || $user->permissions->first()->slug =='administrador' || $user->permissions->first()->slug =='administrador-main' ;
        });
        //Proveedores
        Gate::define('proveedores', function (User $user) {
            return $user->permissions->first()->slug =='proveedores' || $user->permissions->first()->slug =='administrador' || $user->permissions->first()->slug =='administrador-main' ;
        });
        //Clientes
        Gate::define('clientes', function (User $user) {
            return $user->permissions->first()->slug =='clientes' || $user->permissions->first()->slug =='administrador' || $user->permissions->first()->slug =='administrador-main' ;
        });
        //Informes
        Gate::define('informes', function (User $user) {
            return $user->permissions->first()->slug =='informes' || $user->permissions->first()->slug =='administrador' || $user->permissions->first()->slug =='administrador-main' ;
        });
        //Sistema
        Gate::define('sistema', function (User $user) {
            return $user->permissions->first()->slug =='sistema' || $user->permissions->first()->slug =='administrador' || $user->permissions->first()->slug =='administrador-main' ;
        });
        //Usuarios
        Gate::define('usuarios', function (User $user) {
            return $user->permissions->first()->slug =='usuarios' || $user->permissions->first()->slug =='administrador' || $user->permissions->first()->slug =='administrador-main' ;
        });
        //Actualizar cuenta
        Gate::define('actualizarcuenta', function (User $user) {
            return $user->permissions->first()->slug =='actualizarcuenta' || $user->permissions->first()->slug =='administrador' || $user->permissions->first()->slug =='administrador-main' ;
        });
        
        //Actualizar cuenta
        Gate::define('contabilidad', function (User $user) {
            return $user->permissions->first()->slug =='contabilidad' || $user->permissions->first()->slug =='administrador' || $user->permissions->first()->slug =='administrador-main' ;
        });



        
    }
}
