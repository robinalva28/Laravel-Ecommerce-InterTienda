<?php

use Illuminate\Database\Seeder;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('usuarios')->truncate();
        DB::table('usuarios')->insert([
            'nombre' => 'Administrador',
            'apellido' => 'Supremo',
            'email' => 'admin@admin.com',
            'celular'=>'123456789',
            'fechaNacimiento'=>'1999-02-22',
            //'usrIdEmpresa'=> null,
            'cuilEmpresa'=>'12345678910',
            'password' => Hash::make('12345admin'),
            'avatar'=> 'Forrest-Gump.jpg',
            'validado' => 1,
            'isAdmin' => 1
        ]);



    }
}
