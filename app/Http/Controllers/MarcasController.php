<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Marca;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $marcas = Marca::paginate(8);
        return view('adminMarcas',
            [
                'marcas'=>$marcas
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('formAgregarMarca');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion

        $validacion = $request->validate(
            [
                'marNombre' => 'required|min:3|max:75',
            ]
        );

        $marNombre = $request->input('marNombre');
        $Marca = new Marca;
        $Marca->marNombre = $marNombre;
        $Marca->save();
        return redirect('/admin/adminMarcas')
            ->with('mensaje', 'Marca '.$Marca->marNombre.' agregada con éxito');
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
        $marca = Marca::find($id);
        return view('formModificarMarca', [ 'marca'=>$marca ]);
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

        $Marca = Marca::find($request->input('marId'));
        $Marca->marNombre = $request->input('marNombre');

        $Marca->save();
        return redirect('/admin/adminMarcas')
            ->with('mensaje', 'Marca '.$Marca->marNombre.' modificada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      /*  //
        Marca::destroy($id);

        return redirect ('admin/adminMarcas');*/

        $marca = Marca::where('marId','=',$id)->get();
        //dd($marca[0]->marId);
        $productos = Producto::with('getMarca')->get();
        //dd($productos);

        $existenProductosEn = [];

        foreach ($productos as $producto) {
            if ($producto->prdIdMarca == $id) {
                $existenProductosEn[$marca[0]->marId] = $producto->prdIdMarca;
            }
        }
        //dd($existenProductosEn);
        if (isset($existenProductosEn[$id])) {
            return redirect ('admin/adminMarcas')
                ->with('mensaje', 'Imposible eliminar Marca '.$marca[0]->marNombre.
                    ', existen publicaciones que hacen referencia a la misma');;
        }else{
            Marca::destroy($id);

            return redirect ('admin/adminMarcas')
                ->with('mensaje', 'Marca '.$marca[0]->marNombre.' Eliminada con éxito');;
        }

    }
}

