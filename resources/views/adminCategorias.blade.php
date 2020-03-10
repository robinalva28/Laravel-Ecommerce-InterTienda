@extends('layout.plantilla')

@section('title', 'Panel de Categorías')

@section('h1', 'Panel de Categorías')

@section('contenido')

    <table class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
        <tr>
            <th>id</th>
            <th>Categoria</th>
            <th colspan="2">
                <a href="/formAgregarCategoria" class="btn btn-dark">Agregar</a>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach( $categorias as $categoria )
            <tr>
                <td>{{$categoria->catId}}</td>
                <td>{{$categoria->catNombre}}</td>
                <td>
                    <a href="" class="btn btn-outline-secondary">
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
        </tbody>
    </table>

    {{ $categorias->links() }}


@endsection
