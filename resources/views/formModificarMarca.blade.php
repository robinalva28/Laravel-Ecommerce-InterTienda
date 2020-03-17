@extends('layout.plantilla')

@section('title', 'Formulario de modificación una Marca')

@section('h1', 'Fornulario de modificación una Marca')

@section('contenido')

    <div class=" align-content-center mx-auto alert bg-light p-4 col-6 ">
        <form action="/admin/modificarMarca" method="post">
            @csrf
            Nombre:
            <br>
            <input type="text" name="marNombre" value="{{ $marca->marNombre}}" class="form-control">
            <input type="hidden" name="marId" value="{{$marca->marId }}">
            <br>
            <button type="submit" class="btn btn-dark">Modificar</button>
        </form>
    </div>

@endsection

