@extends('layout.plantilla')

@section('title', 'Modificar datos de usuario')


@section('contenido')

@section('h1', 'Modificar datos de usuario')
{{-- mensajes de ok --}}

<div class="mx-auto mt-1 p-1  col-6 table table-bordered table-hover table-striped alert bg-light p-4">
    <h1>@yield('h1')</h1>

    <form action="/modificarDatos/{{$usuario->usrId}}" method="post" enctype="multipart/form-data">
        @csrf

        <br>
        <div class="form-group">
            <label for="nombre">Nombre: {{$usuario->nombre}}</label>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido: {{$usuario->apellido}}</label>
        </div>

        <div class="form-group">
            <label for="empresa">Empresa: {{$usuario->empresa}}</label>
        </div>

        <div class="form-group">
            <label for="fechaNacimiento">Fecha de Nacimiento: {{$usuario->fechaNacimiento}}</label>
        </div>


        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email"  value="{{$usuario->email}}" id="email" placeholder="email">
        </div>

        <div class="form-group">
            <label for="celular">Celular:</label>
            <input type="number" class="form-control" name="celular"  value="{{$usuario->celular}}" id="celular" placeholder="Celular">
        </div>

        Avatar: <br>
        <input type="file" name="avatar" class="form-control" required>
        <br>
        <button type="submit" class="btn btn-dark px-4">
            Guardar cambios
        </button>
        <a href="/perfil" class="btn btn-outline-secondary ml-3">
            Volver a mis datos
        </a>

        @if(count($errors))
            <div class="form-group mt-3">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

    </form>
</div>


@endsection


