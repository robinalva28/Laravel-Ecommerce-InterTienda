<?php

namespace App\Http\Controllers;

use Hamcrest\BaseDescription;
use Image;
use App\User;
use App\Venta;
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
        $productos = Producto::with('getMarca', 'getCategoria','getUsuario','getVenta')->paginate(6);
        //dd($productos->getVenta->getIdProducto);
        $allVentas = Venta::all();
        //dd($allVentas);
        return view('adminProductos',
            [
                'productos'=>$productos,
                'allVentas'=>$allVentas
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

    public function allMarcas(){


        $marcas = Marca::all();
        return view('allMarcas',
            [
                'marcas'=> $marcas
            ]);
    }

    public function productosUsuario()
    {
        $productos = Producto::with('getMarca', 'getCategoria', 'getUsuario')
            ->where('prdIdUsuario', '=', auth()->user()->usrId)
            ->where('eliminado','=',0)->paginate(6);

        return view('adminUsuarioProductos',
            [
                'productos'=>$productos,
            ]);
    }

    public function adminProductosUsuario($id)
    {
        //
        if(auth()->user()->isAdmin) {
            $productos = Producto::with('getMarca', 'getCategoria', 'getUsuario', 'getVenta')
                ->where('prdIdUsuario', '=', $id)/*
            ->where('eliminado','=',0)*/ ->paginate(6);
           // $usuario = User::where('usrId','=',$id)->get();
              //  dd($usuario->nombre);
            return view('adminUsuarioProductos',
                [
                    'productos' => $productos,
                //    'usuario'=>$usuario
                ]);
        }
    }

    public function prdEnCategorias($id)
    {
        //
        $productos = Producto::with('getMarca', 'getCategoria', 'getUsuario')
            ->where('eliminado','=',0)->get();
        $categorias = Categoria::all();
        $categoria = Categoria::find($id);
        //dd($productos);
        return view('cat',
            [
                'productos'=>$productos,
                'categorias'=>$categorias,
                'categoria'=>$categoria
            ]);
    }

    /* =====RETORNA A TODOS LOS PRODUCTOS====== */
    public function prdEnCategorias2()
    {
        //
        $productos = Producto::with('getMarca', 'getCategoria', 'getUsuario')
            ->where('eliminado','=',0)->paginate(12);
        $categorias = Categoria::all();
        return view('todosLosProductos',
            [
                'productos'=>$productos,
                'categorias'=>$categorias
            ]);
    }

    /* =====RETORNA EL DETALLE DE UNA PUBLICACION====== */
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

    /* =====RETORNA PRODUCTOS POR MARCA====== */
    public function prdEnMarcas($id)
    {
        //
        $productos = Producto::with('getMarca', 'getCategoria', 'getUsuario')
            ->where('eliminado','=',0)->get();
        $marcas = marca::all();
        $marca = Marca::find($id);
        return view('mar',
            [
                'productos'=>$productos,
                'marcas'=>$marcas,
                'marca'=>$marca
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
            'prdImagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ]);
        // ruta de las imagenes guardadas
        $ruta = public_path().'/images/productos/'; //ACA ME TRAE LA RUTA LOCAL DESDE RAIZ
        //$ruta = '/images/productos/';
        //dd($ruta);
        //$imageName = 'noDisponible.png';
        if ($request->file('prdImagen')) {
            $imagenOriginal = $request->file('prdImagen');
            //dd(auth()->user()->nombre); OBTENGO EL NOMBRE DEL USUARIO LOGUEADO PARA CONCATENARLO AL NOMBRE DE LA IMAGEN
            // crear instancia de imagen
            $imagen = Image::make($imagenOriginal);

            // generar un nombre aleatorio para la imagen
            $temp_name = $this->random_string() . auth()->user()->nombre .'.' . $imagenOriginal->getClientOriginalExtension();
            //dd($temp_name);
            // redimensionar el tamaño de la imagen
            $imagen->resize(500,500);

            // guardar imagen
            //save( [ruta], [calidad])
            $imagen->save($ruta . $temp_name, 100);

            /*$imagen->getClientOriginalExtension();
            $imageName = $request->prdImagen->getClientOriginalName();
            $request->prdImagen->move(public_path('images/productos'), $imageName);*/
           // $request->prdImagen->move(public_path('images/productos'), $temp_name);
        }

           $producto = Producto::create([
            'prdNombre' => $request['prdNombre'],
            'prdDescripcion' => $request ['prdDescripcion'],
            'prdIdMarca' => $request ['marId'],
            'prdIdCategoria' => $request['catId'],
            'prdPrecio' => $request['prdPrecio'],
            'prdIdUsuario' => $request['usrId'],
            'prdImagen' => $temp_name,
            'prdStock' => $request['prdStock'],
            'prdIdUsuario'=>Auth::user()->usrId,
               'eliminado' => false
        ]);

            return redirect('adminUsuarioProductos'/*,'ProductosController@index'*/)
                ->with('mensaje', 'Publicación '.$producto->prdNombre.' creada con éxito');

    }
    //Función Random String
    protected function random_string() {
       $key = '';
       $keys = array_merge( range('a','z'), range(0,9) );
       for($i=0; $i<10; $i++) {
          $key .= $keys[array_rand($keys)];
       }
       return $key;
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

        if($producto->prdIdUsuario == auth()->user()->usrId) {

            return view('formModificarProducto',
                ['producto' => $producto,
                    'marcas' => $Productos,
                    'categorias' => $categorias
                ]);
        }else{
            return redirect('/adminUsuarioProductos')/*->with('mensaje', 'Imposible modificar producto.')*/;
        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $Producto = Producto::find($id);

        //dd($request);
        //dd($Producto);
        //imagen
        $validacion = $request->validate([
            'prdImagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($Producto->prdIdUsuario == auth()->user()->usrId) {

        $imageName = 'noDisponible.png';
        if ($request->file('prdImagen')) {
            //$imageName = time().'.'.request()->prdImagen->getClientOriginalExtension();
            $imagen = $request->file('prdImagen');
            //$imagen->getClientOriginalExtension();
            $imageName = $request->prdImagen->getClientOriginalName();
            $request->prdImagen->move(public_path('images/productos'), $imageName);
        }

        // For a sanity check, die and dump here temporarily


       // $Producto = Producto::find($request->input('prdId'));
        $Producto->prdNombre = $request->input('prdNombre');
        $Producto->prdDescripcion = $request->input('prdDescripcion');
        $Producto->prdPrecio = $request->input('prdPrecio');
        $Producto->prdIdCategoria = $request->input('prdIdCategoria');
        $Producto->prdIdMarca = $request->input('prdIdMarca');
        $Producto->prdIdUsuario = $request->input('prdIdUsuario');
        $Producto->prdStock = $request->input('prdStock');
        $Producto->prdImagen = $imageName;
        $Producto->save();

        return redirect('/adminUsuarioProductos')
            ->with('mensaje', 'Publicacion '.$Producto->prdNombre.' modificada con éxito');

        }else{
            return redirect('/adminUsuarioProductos')/*->with('mensaje', 'Imposible modificar producto.')*/;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prd = Producto::find($id);
        //dd($prd->prdIdUsuario);
        /* =====SOLO PERMITE QUE EL USUARIO elimine PRODUCTOS ASOCIADOS
                        A SU ID============== */
       // dd($prd->eliminado);
        try {
            if (!$prd->eliminado) {
                //dd(Auth::user()->isAdmin);
                if($prd->prdIdUsuario == auth()->user()->usrId or Auth::user()->isAdmin ) {
                    //dd($prd);
                    $prd->eliminado = true;
                    $prd->save();
                    /*SI EL USUARIO ES ADMIN REDIRIJO A LA VISTA DE ADMINISTRADOR*/
                    if (Auth::user()->isAdmin) {
                        return redirect("/admin/adminUsuarioProductos/$prd->prdIdUsuario")
                            ->with('mensaje', 'Publicación eliminada con éxito');
                    } else {
                        return redirect('/adminUsuarioProductos')
                            ->with('mensaje', 'Publicación eliminada con éxito');
                    }
                }
            } else {
                /*SI EL PRODUCTO YA ESTÁ ELIMINADO REDIRIJO A LA VISTA QUE CORESPONDA*/
                if(Auth::user()->isAdmin){
                    return redirect("/admin/adminUsuarioProductos/$prd->prdIdUsuario")
                        ->with('mensaje', 'Ésta publicación ya está eliminada');
                }
                return redirect('/adminUsuarioProductos')
                    ->with('mensaje', 'Error al eliminar');

            }
        }catch(\Exception $exception ){
            return redirect('/adminUsuarioProductos')
                ->with('mensaje', 'Error al eliminar'.$exception);
        }

    }
}
