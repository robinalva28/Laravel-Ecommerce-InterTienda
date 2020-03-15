@extends('layout.plantilla')

@section('title', 'Panel de Marcas')

@section('h1', 'Panel de Marcas')

@section('contenido')

    {{-- mensajes de ok --}}
    @if( session()->has('mensaje') )
        <div class="alert alert-success">
            {{ session()->get('mensaje') }}
        </div>
    @endif

    <table class="mx-auto mt-1 p-1  col-5 table table-bordered table-hover table-striped">
        <thead class="thead-dark">
        <tr>
            <th>id</th>
            <th>Marca</th>
            <th></th>
            <th></th>
           {{-- <th colspan="2">
                <a href="/formAgregarMarca" class="btn btn-dark">Agregar</a>
            </th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach( $marcas as $marca )
            <tr>
                <td>{{$marca->marId}}</td>
                <td>{{$marca->marNombre}}</td>
                <td>
                    <a href="/formModificarMarca/{{$marca->marId}}" class="btn btn-outline-secondary">
                        Modificar
                    </a>
                </td>
                <td>
                    <a href="" class="btn btn-outline-secondary">
                        Eliminar
                    </a>
                </td>
            </tr>
        @endforeach
        <th></th>
        <th colspan="1">
            <a href="/formAgregarMarca" class="btn btn-dark">AGREGAR MARCA</a>
        </th>

        <th>  {{ $marcas->links() }}</th>
        <th></th>

        </tbody>
    </table>




@endsection
