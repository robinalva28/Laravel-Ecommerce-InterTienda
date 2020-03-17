<?php

namespace App\Http\Controllers;


use App\Categoria;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorias = Categoria::paginate(6);
        return view('/adminCategorias',
            [ 'categorias' =>  $categorias ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function allCategorias(){

        $categorias = Categoria::all();

        return view('inicioAutenticado',
            [
                'categorias'=>$categorias
            ]);
    }


    public function create()
    {
        //
        return view('/formAgregarCategoria');
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
        $categoria = new Categoria();
        ######## validacion
        $validacion = $request->validate(
            [
                'catNombre' => 'required|min:3|max:75',
            ]
        );
        ###

        //
        $validacion = $request->validate([
            'catImagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = 'noDisponible.png';
        if ($request->file('catImagen')) {
           $imageName = time().'.'.request()->catImagen->getClientOriginalExtension();
            $imagen = $request->file('catImagen');
            $imagen->getClientOriginalExtension();
           $imageName = $request->catImagen->getClientOriginalName();
            $request->catImagen->move(public_path('images/categorias'), $imageName);
        }

        $categoria->catNombre = request('catNombre');
        $categoria->catDescripcion = request('catDescripcion');
        $categoria->catImagen = $imageName;
        $categoria->save();
        return redirect('/admin/adminCategorias')->with('mensaje', 'Categoria '.$categoria->catNombre.' agregada con éxito');
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
    public function update(Request $request)
    {
        //
        $Categoria = Categoria::find($request->input('catId'));
        $Categoria->catNombre = $request->input('catNombre');
        $Categoria->save();
        return redirect('/admin/adminCategorias')
            ->with('mensaje', 'Categoria '.$Categoria->catNombre.' modificada con éxito');
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
