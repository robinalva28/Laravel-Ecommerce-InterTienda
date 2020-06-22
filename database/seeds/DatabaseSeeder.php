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
            'marNombre'=>'Xiaomi']
        );

        DB::table('marcas')->insert([
            'marNombre'=>'Samsung']
            );
        DB::table('marcas')->insert([
             'marNombre'=>'Oster']
            );
        DB::table('marcas')->insert([
             'marNombre'=>'Patrick']
            );
        DB::table('marcas')->insert([
             'marNombre'=>'Quicksilver']
            );
        DB::table('marcas')->insert([
             'marNombre'=>'Zara']
            );
        DB::table('marcas')->insert([
             'marNombre'=>'JBL']
            );
        DB::table('marcas')->insert([
             'marNombre'=>'Adidas']
            );
        DB::table('marcas')->insert([
             'marNombre'=>'Otra marca'
        ]);

/*CREACION DE VARIAS CATEGORIAS*/

        DB::table('categorias')->insert([
              'catNombre'=>'Teconología',
              'catDescripcion'=>'Cualquier equipo tecnológico que quieras comprar',
              'catImagen'=>'cateroria_tecnologia.png' ]);
        DB::table('categorias')->insert([ 
             'catNombre'=>'Vestimenta',
              'catDescripcion'=>'Cualquier ropa o calzado que quieras comprar',
              'catImagen'=>'cateroria_vestimenta.png' ]);
        DB::table('categorias')->insert([
             'catNombre'=>'Hogar',
              'catDescripcion'=>'Todo para el hogar',
              'catImagen'=>'otros_01.png' ]);
        DB::table('categorias')->insert([
             'catNombre'=>'Otros + Servicios',
              'catDescripcion'=>'Otros productos mas servicios ofrecidos',
              'catImagen'=>'cateroria_otros.png'

        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
