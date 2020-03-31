@extends('layout.plantilla')

@section('title', 'Comprador')


@section('contenido')

@section('h1', "Comprador: {$compra->getProducto->prdNombre} x{$compra->venStock}")
{{-- mensajes de ok --}}



<div class="mx-auto mt-1 p-1  col-6 table table-bordered table-hover table-striped alert bg-light p-4">
    <h1>@yield('h1')</h1>

    <form action="#" >


        <br>
        <div class="form-group">
            <label for="nombre">Nombre: {{$compra->getComprador->nombre}}</label>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido: {{$compra->getComprador->apellido}}</label>
        </div>

        <div class="form-group">
            <label for="empresa">Empresa:
                <td>{{$compra->getComprador->getEmpresa->empNombre}}</td>
            </label>
        </div>

        <div class="form-group">
            <br>
            <label for="email">Contacto:</label>
        </div>


        <div class="form-group">
            <label for="email">Email: {{$compra->getComprador->email}}</label>
        </div>

        <div class="form-group">
            <label for="celular">Celular: {{$compra->getComprador->celular}}</label>
        </div>

        <a href="/ventas" class="btn btn-outline-secondary ml-3">
            Volver a mis ventas
        </a>


    </form>
</div>


@endsection




