<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\User;
use Illuminate\Validation\ValidationException;


class UsuariosController extends Controller
{



    public function index()
    {
        //
        $usuario = User::all();

        return view('perfil',
            [
                'usuario'=>$usuario,
            ]);
    }
    public function listaUsuarios()
    {
        //
        $usuario = User::all();

        return view('adminListaUsuarios',
            [
                'usuario'=>$usuario,
            ]);
    }
    protected function getIsAdmin(){
        $usuario = User::all();
        return $usuario;
    }

    public function habilitarUsuario($id)
    {
        //
        $usuario = User::find($id);
        $usuario->validado = 1;
        $usuario->save();
        $usuario = User::all();

        return view('adminListaUsuarios',
            [
                'usuario'=>$usuario,
            ]);
    }

    public function inhabilitarUsuario($id)
    {
        $usuario = User::find($id);
        $usuario->validado = 0;
        $usuario->save();
        $usuario = User::all();

        return view('adminListaUsuarios',
            [
                'usuario'=>$usuario,
            ]);
    }

    public function edit($id)
    {

        $usuario = User::find($id);
        return view('formModificarDatos',
            [
                'usuario'=>$usuario
            ]);
    }

    public function update(Request $request,$id)
    {

        $usuario = User::find($id);

        //dd($request);
        //dd($usuario);
        //imagen
        $validacion = $request->validate([
            'prdImagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = 'sinAvatar.png';
        if ($request->file('avatar')) {
            //$imageName = time().'.'.request()->avatar->getClientOriginalExtension();
            $imagen = $request->file('avatar');
            //$imagen->getClientOriginalExtension();
            $imageName = $request->avatar->getClientOriginalName();
            $request->avatar->move(public_path('images/avatares'), $imageName);
        }

        $usuario->email = $request->input('email');
        $usuario->celular = $request->input('celular');
        $usuario->avatar = $imageName;
        $usuario->save();

        return redirect('/perfil')
            ->with('mensaje', 'Datos de '.$usuario->nombre.' modificados con éxito');
    }

}



