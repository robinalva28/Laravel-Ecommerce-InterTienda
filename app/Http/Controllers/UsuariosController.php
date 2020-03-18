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

}



