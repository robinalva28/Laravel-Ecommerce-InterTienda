@extends('layout.plantilla')

@section('contenido')


<div class="container d-flex flex-column h-100">

    <form  action="login" method="POST">
        <div class=" my-3 col-sm-11 col-md-11 col-lg-11 col-form-label">
            <h2><Strong>Inicie Sesión</Strong></h2>
        </div>
        <div class="form-group row">

            <label for="staticEmail" class="col-sm-2 col-form-label mt-10">Email</label>
            <div class="col-sm-8 col-md-8">
                <input type="email" class="form-control" id="staticEmail" name="email" placeholder="correo@ejemplo.com">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña</label>
            <div class="col-sm-8 col-md-8">
                <input type="password" class="form-control" id="inputPassword" name="pass" placeholder="Escriba su contraseña aquí">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label mt-10">Recordar usuario</label>
            <div class="col-sm-8 col-md-8">
                <input type="checkbox" id="checkbox" name="recordarUsuario">
            </div>
        </div>
        <button type="submit" class="btn btn-secondary mx-5 col-sm-2 col-md-1 col-lg-1  mt-5">Iniciar</button>
    </form>
    <!-- VALIDACIONES -->

</div>
@endsection
