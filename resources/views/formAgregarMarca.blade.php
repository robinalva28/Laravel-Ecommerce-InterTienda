@extends('layout.plantilla')

@section('title', 'Formulario de alta una nueva Marca')

@section('h1', 'Fornulario de alta una nueva Marca')

@section('contenido')

    <div class="mx-auto mt-1 p-1  col-6 table table-bordered table-hover table-striped alert bg-light p-4">
        <form action="/admin/agregarMarca" method="post">
            @csrf
            Nombre:
            <br>
            <input type="text" name="marNombre" class="form-control">
            <br>

            <button class="btn btn-dark">Agregar</button>
            <a href="/admin/adminMarcas" class="btn btn-outline-secondary ml-3">
                Ir al panel de marcas
            </a>

        </form>
    </div>

@endsection
