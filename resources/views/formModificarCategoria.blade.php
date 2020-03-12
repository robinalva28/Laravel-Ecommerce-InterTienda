@extends('layout.plantilla')

@section('title', 'Formulario de modificación una Categoria')

@section('h1', 'Fornulario de modificación una Categoria')

@section('contenido')

    <div class="alert bg-light p-4">
        <form action="/modificarCategoria" method="post">
            @csrf
            Nombre:
            <br>
            <input type="text" name="catNombre" value="{{ $categoria->catNombre }}" class="form-control">
            <input type="hidden" name="marId" value="{{ $categoria->catId }}">
            <br>
            <button class="btn btn-dark">Agregar</button>

        </form>
    </div>

@endsection
