<?php

namespace App\Http\Controllers;

use App\Marca;
use App\Categoria;
use App\Producto;
use App\User;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    //
    public function index()
    {
        $productos = Producto::with('getMarca', 'getCategoria','getUsuario')->get();
        $carritos = Carrito::all();
        return view('carrito',
        ['productos'=>$productos,
          'carritos'=>$carritos

    ]);
    }
}
