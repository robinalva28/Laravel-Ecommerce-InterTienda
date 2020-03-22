@extends('layout.plantilla')

@section('title', 'Modificar Categoria')

@section('h1', 'Modificar Categoria')

@section('contenido')
<div class="ml-5 cmx-auto mt-1 p-1  col-6 ">
    <div class="alert bg-light p-4 col-8 align-items-center">
        <form action="/admin/modificarCategoria/{{$categoria->catId}}" method="post" enctype="multipart/form-data">
            @csrf
            Nombre:
            <br>
            <input type="text" name="catNombre" value="{{ $categoria->catNombre }}" class="form-control">
            <br>
            Descripcion:
            <br>
            <input type="text" name="catDescripcion" value="{{ $categoria->catDescripcion }}" class="form-control">
            <br>

            Miniatura:
            <br>
            <input type="file" name="catImagen" class="form-control">
            <br>


            <input type="hidden" name="marId" value="{{ $categoria->catId }}">

            <br>
            <button type="submit" class="btn btn-dark">Agregar</button>

            <a href="/admin/adminCategorias" class="btn btn-outline-secondary ml-3">
                Ir al panel de categorias
            </a>
        </form>
    </div>
</div>
@endsection
