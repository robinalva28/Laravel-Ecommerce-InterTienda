<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Usuario;


class UsuariosController extends Controller
{
    public function add(Request $req){
        $newUser = new Usuario();
        $newUser->usNombre = $req['nombre'];
        $newUser->usApellido = $req['apellido'];
        $newUser->usEmail = $req['email'];
        $newUser->usPassword = password_hash($req['pass'],PASSWORD_DEFAULT);
        $newUser->usCelular = $req['celular'];
        $newUser->usAvatar = $req['avatar'];
        $newUser->usValidado = false;
        $newUser->save();
        return redirect('/perfil');
    }
}
