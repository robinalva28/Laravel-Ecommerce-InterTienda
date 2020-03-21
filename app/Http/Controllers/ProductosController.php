<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
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
        $productos = Producto::with('getMarca', 'getCategoria')->paginate(6);

        return view('adminProductos',
            [
                'productos'=>$productos,
            ]);
    }

    public function allCategorias(){

        $productos = Producto::with('getMarca', 'getCategoria')->get();
        $categorias = Categoria::all();
        return view('allCategorias',
            [
                'productos'=>$productos,
                'categorias'=> $categorias
            ]);
    }

    public function productosUsuario()
    {
        //
        $productos = Producto::with('getMarca', 'getCategoria', 'getUsuario')->paginate(6);

        return view('adminUsuarioProductos',
            [
                'productos'=>$productos,
            ]);
    }

    public function prdEnCategorias($id)
    {
        //
        $productos = Producto::with('getMarca', 'getCategoria', 'getUsuario')->get();
        $categorias = Categoria::all();
        $categoria = Categoria::find($id);
        return view('cat',
            [
                'productos'=>$productos,
                'categorias'=>$categorias,
                'categoria'=>$categoria
            ]);
    }
    public function prdEnCategorias2()
    {
        //
        $productos = Producto::with('getMarca', 'getCategoria', 'getUsuario')->get();
        $categorias = Categoria::all();
        return view('todosLosProductos',
            [
                'productos'=>$productos,
                'categorias'=>$categorias
            ]);
    }
    //PROGRAMAR PARA MOSTRAR LOS DETALLES DE LA PUBLICACION DDESDE DONDE SE PUEDE AGREGAR AL CARRITO

    public function prdEnDetalle($id)
    {
        //
        $productos = Producto::with('getMarca', 'getCategoria', 'getUsuario')->get();
        $categorias = Categoria::all();
        $producto = Producto::find($id);
        return view('detallePublicacion',
            [
                'productos'=>$productos,
                'producto'=>$producto,
                'categorias'=>$categorias
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
        $Productos = Marca::all();
        $categorias = Categoria::all();
        return view('formAgregarProducto',
            [
                'marcas'=>$Productos,
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


           $producto = Producto::create([
            'prdNombre' => $request['prdNombre'],
            'prdDescripcion' => $request ['prdDescripcion'],
            'prdIdMarca' => $request ['marId'],
            'prdIdCategoria' => $request['catId'],
            'prdPrecio' => $request['prdPrecio'],
            'prdIdUsuario' => $request['usrId'],
            'prdImagen' => $imageName,
            'prdStock' => $request['prdStock'],
            'prdIdUsuario'=>Auth::user()->usrId
        ]);

            return redirect('adminUsuarioProductos'/*,'ProductosController@index'*/)
                ->with('mensaje', 'Publicación '.$producto->prdNombre.' creada con éxito');

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
        $Productos = Marca::all();
        $categorias = Categoria::all();
        $producto = Producto::find($id);
        return view('formModificarProducto',
            [ 'producto'=>$producto,
                'marcas'=>$Productos,
                'categorias'=>$categorias
            ]);
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

        $Producto= Producto::findOrFail($id);

        // For a sanity check, die and dump here temporarily
        dd($request);

       // $Producto = Producto::find($request->input('prdId'));
        $Producto->prdNombre = $request->input('prdNombre');
        $Producto->prdDescripcion = $request->input('prdDescripcion');
        $Producto->prdPrecio = $request->input('prdPrecio');
        $Producto->prdIdCategoria = $request->input('prdIdCategoria');
        $Producto->prdIdMarca = $request->input('prdIdMarca');
        $Producto->prdIdUsuario = $request->input('prdIdUsuario');
        $Producto->prdImagen = $request->input('prdImagen');
        $Producto->prdIdUsuario = Auth::user()->usrId;
        $Producto->save();

        return redirect('/adminUsuarioProductos')
            ->with('mensaje', 'Publicacion '.$Producto->prdNombre.' modificada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::destroy($id);

        return redirect('/adminUsuarioProductos')
            ->with('mensaje', 'Publicación eliminada con éxito');

    }
}
