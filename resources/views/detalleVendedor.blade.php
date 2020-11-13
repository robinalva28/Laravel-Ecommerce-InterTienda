@extends('layout.plantilla')

@section('title', 'Vendedor')


@section('contenido')

@section('h1', "Vendedor: {$venta->getProducto->prdNombre} x{$venta->venStock}")
{{-- mensajes de ok --}}

<div class="mx-auto mt-1 p-1  col-6 table table-bordered table-hover table-striped alert bg-light p-4">
    <h1>@yield('h1')</h1>

    <form action="#" >


        <br>
        <div class="form-group">
            <label for="nombre">Nombre: {{$venta->getVendedor->nombre}}</label>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido: {{$venta->getVendedor->apellido}}</label>
        </div>

        <div class="form-group">
            <label for="empresa">Empresa:
                @if($venta->getVendedor->getEmpresa)
                    <td>{{$venta->getVendedor->getEmpresa->empNombre}}</td>
                @else
                    <td>Sin Empresa</td>
                @endif

            </label>
        </div>

        <div class="form-group">
            <br>
            <label for="email">Contacto:</label>
        </div>


        <div class="form-group">
            <label for="email">Email: {{$venta->getVendedor->email}}</label>
        </div>

        <div class="form-group">
            <label for="celular">Celular: {{$venta->getVendedor->celular}}</label>
        </div>

        <a href="/compras" class="btn btn-outline-secondary ml-3">
            Volver a mis compras
        </a>


    </form>
</div>


@endsection



