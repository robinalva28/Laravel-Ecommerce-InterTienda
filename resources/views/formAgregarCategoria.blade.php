
@extends('layout.plantilla')

@section('title', 'Alta de una nueva Marca')


@section('contenido')

@section('h1', 'Nueva categoria')
<div class=" col-md-9 mt-1 p-1 mx-auto mx-3 container-fluid">
<h1>@yield('h1')</h1>
</div>
<div class="mx-auto mt-1 p-1  col-6 table table-bordered table-hover table-striped alert bg-light p-4">

    <form action="/admin/agregarCategoria" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="catNombre">Categoria:</label>
            <input type="text" class="form-control" name="catNombre"  value="{{ old('catNombre') }}" id="catNombre" placeholder="nombre de la Categoria">
        </div>

<div class="form-group">
            <label for="catDescripcion">Descripcion:</label>
            <input type="text" class="form-control" name="catDescripcion"  value="{{ old('catDescripcion') }}" id="catDescripcion" placeholder="descripcion de la Categoria">
        </div>

    Imagen: <br>
    <input type="file" name="catImagen" class="form-control">
    <br>
        <button type="submit" class="btn btn-dark px-4">
            <i class="far fa-plus-square fa-lg mr-2"></i>
            Agregar Categoria
        </button>
        <a href="/admin/adminCategorias" class="btn btn-outline-secondary ml-3">
            Ir al panel de categorias
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

