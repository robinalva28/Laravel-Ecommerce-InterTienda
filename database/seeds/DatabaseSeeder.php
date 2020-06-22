<?php

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
        /*CREACIÓN DE VARIAS MARCAS*/

        DB::table('marcas')->insert([
            'marNombre'=>'Xiaomi'],[
            'marNombre'=>'Samsung'],[
             'marNombre'=>'Oster'],[
             'marNombre'=>'Patrick'],[
             'marNombre'=>'Quicksilver'],[
             'marNombre'=>'Zara'],[
             'marNombre'=>'JBL'],[
             'marNombre'=>'Adidas'],[
             'marNombre'=>'Otra marca'
        ]);

/*CREACION DE VARIAS CATEGORIAS*/

        DB::table('categorias')->insert([
              'catNombre'=>'Teconología',
              'catDescripcion'=>'Cualquier equipo tecnológico que quieras comprar',
              'catImagen'=>'cateroria_tecnologia.png'],
            [
             'catNombre'=>'Vestimenta',
              'catDescripcion'=>'Cualquier ropa o calzado que quieras comprar',
              'catImagen'=>'cateroria_vestimenta.png'],
            [
             'catNombre'=>'Hogar',
              'catDescripcion'=>'Todo para el hogar',
              'catImagen'=>'otros_01.png'],
            [
             'catNombre'=>'Otros + Servicios',
              'catDescripcion'=>'Otros productos mas servicios ofrecidos',
              'catImagen'=>'cateroria_otros.png'

        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
