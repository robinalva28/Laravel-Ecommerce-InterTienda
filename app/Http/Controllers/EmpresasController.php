<?php

namespace App\Http\Controllers;
Use DB;
Use App\User;
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

    public function destroy($id)
    {
        //
        /*PARA ELIMINAR UNA EMPRESA DEBE NO TENER USUARIOS AFILIADOS*/
        $empresa = DB::table('empresas')
            ->where('empId', '=', $id)->get();
        //dd($empresa[0]->empNombre);
        $usuarios = User::with('getEmpresa')->get();
        //dd($usuarios);
        /*VARIABLE QUE ALMACENA LOS USUARIOS AFILIADOS*/
        $existenAfiliadosEn = [];
        foreach ($usuarios as $user) {
            /*VERIFICO SI ALGUN USUARIO TIENE EL ID QUE CORRESPONDA ALA EMPRESA
            QUE INTENTO ELIMINAR*/
            if ($user->usrIdEmpresa == $empresa[0]->empId) {
                $existenAfiliadosEn[$empresa[0]->empId] = $user->usrIdEmpresa;
            }
        }
           //dd($existenAfiliadosEn);
        /*SI EXISTEN USUARIOS AFILIADOS NO ELIMINO*/
        if (isset($existenAfiliadosEn[$id])) {
            return redirect ('admin/adminEmpresas')
                ->with('mensaje', 'Imposible eliminar Empresa '.$empresa[0]->empNombre.', la misma tiene usuarios afiliados');;
        }else{

            /*SI NO EXISTEN USUARIOS AFILIADOS LA ELIMINO*/
            Empresa::destroy($id);

            return redirect ('admin/adminEmpresas')
                ->with('mensaje', 'Empresa '.$empresa[0]->empNombre.' Eliminada con éxito');;
        }
    }

}
