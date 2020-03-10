
@extends('layout.plantilla')

@section('title', 'Alta de una nueva Marca')


@section('contenido')

@section('h1', 'Alta de una nueva categoria')

<div class="card bg-light col-md-7 mt-5 p-3 mx-auto">
    <form action="/agregarCategoria" method="post" >
        @csrf

        <div class="form-group">
            <label for="catNombre">Categoria:</label>
            <input type="text" class="form-control" name="catNombre"  value="{{ old('catNombre') }}" id="catNombre" placeholder="nombre de la Categoria">
        </div>
        <button type="submit" class="btn btn-dark px-4">
            <i class="far fa-plus-square fa-lg mr-2"></i>
            Agregar Categoria
        </button>
        <a href="/adminCategorias" class="btn btn-outline-secondary ml-3">
            volver al panel de categorias
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

