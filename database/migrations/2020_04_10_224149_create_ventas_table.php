<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('venId');
            $table->integer('venIdProducto');
            $table->integer('venStock');
            $table->integer('venIdVendedor');
            $table->integer('venIdComprador');
            $table->timestamps();

            $table->foreign('venIdProducto')
                ->references('prdId')->on('productos');
            $table->foreign('venIdVendedor')
                ->references('usrId')->on('usuarios');
            $table->foreign('venIdComprador')
                ->references('usrId')->on('usuarios');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
