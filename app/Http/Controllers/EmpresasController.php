<?php

namespace App\Http\Controllers;
use App\Empresa;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    public function index()
    {
        //
        $empresas = Empresa::paginate(6);
        return view('/adminEmpresas',
            [ 'empresas' =>  $empresas ]);
    }

    public function create()
    {
        //
        return view('/formAgregarEmpresa');
    }

    public function store(Request $request)
    {
        //
        $empresa = new Empresa();
        ######## validacion
        $validacion = $request->validate(
            [
                'empNombre' => 'required|min:3|max:75',
            ]);

        $empresa->empNombre = request('empNombre');
        $empresa->empCuil = request('empCuil');
        $empresa->save();
        return redirect('/admin/adminEmpresas')->with('mensaje', 'empresa '.$empresa->empNombre.' agregada con éxito');
    }

    public function edit($id)
    {


        $empresa= Empresa::find($id);

        return view('formModificarEmpresa',
            [
                'empresa' => $empresa,
            ]);

    }

    public function update(Request $request,$id)
    {
        //
        $empresa = Empresa::find($id);
        //dd($empresa);

        $validacion = $request->validate(
            [
                'empNombre' => 'required|min:3|max:75',
            ]
        );



        $empresa->empNombre = $request->input('empNombre');
        $empresa->empCuil = $request->input('empCuil');
        $empresa->save();
        return redirect('/admin/adminEmpresas')
            ->with('mensaje', 'Empresa '.$empresa->empNombre.' modificada con éxito');
    }



}
