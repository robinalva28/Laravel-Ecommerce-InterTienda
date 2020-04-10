<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('usrId');
            $table->string('nombre',40);
            $table->string('apellido',40);
            $table->string('email',40);
            $table->string('celular',40);
            $table->date('fechaNacimiento');
            $table->integer('usrIdEmpresa');
            $table->string('cuilEmpresa',15);
            $table->string('password',150);
            $table->string('avatar',100);
            $table->string('remember_token',100)->nullable();
            $table->boolean('validado');
            $table->boolean('isAdmin');

            $table->foreign('usrIdEmpresa')
                ->references('empId')->on('empresas');


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
        Schema::dropIfExists('usuarios');
    }
}
