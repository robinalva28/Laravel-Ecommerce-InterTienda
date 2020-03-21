<?php

namespace App\Http\Controllers;

use App\Marca;
use App\Categoria;
use App\Producto;
use App\User;
Use App\Carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    //
    public function index()
    {

        $carrito = Carrito::with('getProducto')->where("carUsuarios_usrId","=",Auth::user()->usrId)->get();
        //dd($carrito);
        return view('carrito',
        [
            'carrito'=>$carrito
    ]);
    }

    public function store(Request $request)
    {
       // dd($request);
        $carrito = Carrito::create([
            'carIdProducto' => $request['prdId'],
            'carUsuarios_usrId' => Auth::user()->usrId,
            'carCantidadPrd' => $request['cantidad']
        ]);

        return redirect('/carrito');
    }
}
