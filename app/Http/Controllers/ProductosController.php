<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Marca;
use App\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Producto::with('getMarca', 'getCategoria')->get();

        return view('adminProductos',
            [
                'productos'=>$productos,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('formAgregarProducto',
            [
                'marcas'=>$marcas,
                'categorias'=>$categorias
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validacion = $request->validate([
            'prdImagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = 'noDisponible.png';
        if ($request->file('prdImagen')) {
            //$imageName = time().'.'.request()->prdImagen->getClientOriginalExtension();
            $imagen = $request->file('prdImagen');
            //$imagen->getClientOriginalExtension();
            $imageName = $request->prdImagen->getClientOriginalName();
            $request->prdImagen->move(public_path('images/productos'), $imageName);
        }
        //


        //return $imageName;
  /*  $producto = new Producto();
        $producto->prdNombre = $request['prdNombre'];
        $producto->prdDescripcion = $request['prdDescripcion'];
        $producto->prdIdMarca = $request['marId'];
        $producto->prdIdCategoria = $request['catId'];
        $producto->prdPrecio = $request['prdPrecio'];
        $producto->prdIdUsuario = $request['usrId'];
        $producto->prdImagen = $imageName;
        $producto->prdStock = $request['prdStock'];*/



            Producto::create([
            'prdNombre' => $request['prdNombre'],
            'prdDescripcion' => $request ['prdDescripcion'],
            'prdIdMarca' => $request ['marId'],
            'prdIdCategoria' => $request['catId'],
            'prdPrecio' => $request['prdPrecio'],
            'prdIdUsuario' => $request['usrId'],
            'prdImagen' => $imageName,
            'prdStock' => $request['prdStock'],
        ]);

            return redirect('adminProductos'/*,'ProductosController@index'*/);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
