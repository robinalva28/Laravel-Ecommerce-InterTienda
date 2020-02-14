<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Usuario;


class UsuariosController extends Controller
{
    public function add(Request $req){


        $rules = [
            "usNombre" => "string|min:2",
            "usApellido" => "string|min:2",
            "usEmail" => "email",
            "usPassword" => "password",
            "usCelular"=> "numeric",
            "usAvatar" =>"image",
            "usValidado" => "boolean"
        ];

        $message = [
            "string" => "El campo :attribute debe ser un texto",
            "email" => "Debe ingresar in email valido",
            "numeric"=>"El formato del campo :attribute no es válido",
            "image"=>"debe adjuntar un archivo"
        ];


        $this->validate($req, $rules, $message);

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
