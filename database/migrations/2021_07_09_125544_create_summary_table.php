<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summary', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('concept',150);
            $table->enum('type', ['add','out','transfer'])->nullable();
            $table->double('amount', 255, 2)->nullable();
            $table->double('tax', 255, 2)->nullable();
            $table->bigInteger('account_id');
            $table->bigInteger('categories_id');
            $table->string('factura',150)->nullable();;
            $table->bigInteger('id_attr')->nullable();;
            $table->bigInteger('id_transfer')->nullable();;
            $table->bigInteger('tours_id')->nullable();;
            $table->bigInteger('id_attr_tours')->nullable();;
            $table->bigInteger('id_autor');
            $table->enum('future', ['1','2'])->default('1');
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
        Schema::dropIfExists('summary');
    }
}
