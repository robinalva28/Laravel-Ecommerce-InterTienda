@extends('layout.plantilla')

@section('title', 'Formulario de alta una nueva Marca')

@section('h1', 'Fornulario de alta una nueva Marca')

@section('contenido')

    <div class="alert bg-light p-4">
        <form action="/agregarMarca" method="post">
            @csrf
            Nombre:
            <br>
            <input type="text" name="marNombre" class="form-control">
            <br>
            <button class="btn btn-dark">Agregar</button>

        </form>
    </div>

@endsection
