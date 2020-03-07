<?php
/*

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Usuario;
use Illuminate\Validation\ValidationException;


class UsuariosController extends Controller
{
    public function add(Request $req){


        $rules = [
            "usrNombre" => "required|string|min:2",
            "usrApellido" => "required|string|min:2",
            "usrEmail" => "required|email|unique:usuarios",
            "usrPassword" => "required",
            "usrCelular"=> "required|numeric",
            "usrAvatar" =>"required|image"
        ];
        //validacion de la password

        $mensaje = [
            "string" => "El campo :attribute debe ser un texto",
            "email" => "Debe ingresar in email valido",
            "numeric"=>"El formato del campo :attribute no es válido",
            "image"=>"debe adjuntar un archivo de imagen",
            "min" => "El campo :attribute debe contener al menos :min caracteres",
            "unique" => "El campo :attribute ya existe",
            "required" => "El campo :attribute es requerido"
        ];
       /* if($req['usrPassword'] !=$req['pass']){
           $errors = "las contraseñas no coinciden";

        }*/


       /* try {
            $this->validate($req, $rules, $mensaje);
        } catch (ValidationException $e) {
            dd("Error al validar: $e");
        }

        $newUser = new Usuario();


        $newUser->usrNombre = $req['usrNombre'];
        $newUser->usrApellido = $req['usrApellido'];
        $newUser->usrEmail = $req['usrEmail'];
        $newUser->usrPassword = password_hash($req['usrPassword'],PASSWORD_DEFAULT);
        $newUser->usrCelular = $req['usrCelular'];
        $newUser->usrAvatar = $req['usrAvatar'];
        $newUser->usrValidado = false;
        $newUser->save();
        return redirect('/perfil');
    }
}*/
