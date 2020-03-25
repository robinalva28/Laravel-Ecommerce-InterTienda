@extends('layout.plantilla')

@section('title', 'Nueva Empresa')

@section('h1', 'Nueva Empresa')

@section('contenido')

    <div class="mx-auto mt-1 p-1  col-6 table table-bordered table-hover table-striped alert bg-light p-4">
       <h3><strong>@yield('h1')</strong></h3>
        <form action="/admin/agregarEmpresa" method="post">
            @csrf
            Nombre:
            <br>
            <input type="text" name="empNombre" class="form-control">

            CUIL:
            <br>
            <input type="number" name="empCuil" class="form-control">
            <br>

            <button type="submit" class="btn btn-dark">Agregar</button>
            <a href="/admin/adminEmpresas" class="btn btn-outline-secondary ml-3">
                Ir al panel de Empresas
            </a>
        </form>
    </div>

@endsection
