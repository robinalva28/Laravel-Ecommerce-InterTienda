<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('prdId');
            $table->string('prdNombre',40);
            $table->string('prdDescripcion',200);
            $table->float('prdPrecio');
            $table->integer('prdIdCategoria');
            $table->integer('prdIdMarca');
            $table->integer('prdIdUsuario');
            $table->string('prdImagen',100);
            $table->integer('prdStock');
            $table->boolean('eliminado');

            $table->foreign('prdIdCategoria')
                ->references('catId')->on('categorias');

            $table->foreign('prdIdMarca')
                ->references('marId')->on('marcas');

            $table->foreign('prdIdUsuario')
                ->references('usrId')->on('usuarios');

          //  $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
