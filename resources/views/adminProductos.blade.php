@extends('layout.plantilla')

@section('title', 'Mis publicaciones')

@section('h1', 'Mis publicaciones')

@section('contenido')

    <table class="table table-hover table-striped table-border">
        <thead class="thead-dark">
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Marca</th>
            <th>Categoria</th>
            <th>Presentacion</th>
            <th>Stock</th>
            <th>Imagen</th>
            <th colspan="2">
                <a href="/formAgregarProducto" class="btn btn-dark">
                    Nueva publicación
                </a>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach( $productos as $producto )
            <tr>
                <td>{{ $producto->prdNombre }}</td>
                <td>{{ $producto->prdPrecio }}</td>
                <td>{{ $producto->getMarca->mkNombre }}</td>
                <td>{{ $producto->getCategoria->catNombre }}</td>
                <td>{{ $producto->Presentacion }}</td>
                <td>{{ $producto->prdStock }}</td>
                <td><img src="{{ asset('images/productos') }}/{{ $producto->prdImagen }}" class="img-thumbnail"></td>
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

@endsection
