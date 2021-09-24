<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissionsi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_user');
            $table->bigInteger('saldo')->nullable();
            $table->bigInteger('movimientos')->nullable();
            $table->bigInteger('categoria')->nullable();
            $table->bigInteger('cuentas')->nullable();
            $table->bigInteger('usuario')->nullable();
            $table->bigInteger('transferencia')->nullable();
            $table->bigInteger('tours')->nullable();
            $table->bigInteger('m_futuros')->nullable();
            $table->bigInteger('bitacora')->nullable();
            $table->bigInteger('adjuntos')->nullable();
            $table->bigInteger('pdf')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissionsi');
    }
}
