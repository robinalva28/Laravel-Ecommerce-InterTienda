@extends('layout.plantilla')

@section('title', 'Mis publicaciones')

@section('h1', 'Mis publicaciones')

@section('contenido')

    <div class="{{--card bg-light col-md-11 mt-1 p-1 --}} mx-3">
    <table class="table table-hover table-striped table-border mx-auto mt-1 p-1 col-md-12 ">
        <thead class="thead-dark">
        <tr class="mr-3">
            <th>Nombre</th>
            <th>Precio</th>
            <th>Marca</th>
            <th>Categoria</th>
            <th>Descripción</th>
            <th>Stock</th>
            <th>Imagen</th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        @foreach( $productos as $producto )
            <tr>
                <td>{{ $producto->prdNombre }}</td>
                <td>{{ '$'. $producto->prdPrecio }}</td>
                <td>{{ $producto->getMarca->marNombre}}</td>
                <td>{{ $producto->getCategoria->catNombre }}</td>
                <td>{{ $producto->prdDescripcion }}</td>
                <td>{{ $producto->prdStock }}</td>
                <td ><img  src="{{ asset('images/productos') }}/{{ $producto->prdImagen }}" class="img-thumbnail" width="80px" ></td>
                <td>
                    <a href="/formModificarProducto/{{$producto->prdId}}" class="btn btn-outline-secondary">
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

        <th colspan="2">
            <a href="/formAgregarProducto" class="btn btn-dark">
                Nueva publicación
            </a>
        </th>
        <th></th>
        <th></th>
        <th>{{ $productos->links() }}</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        </tbody>
    </table>
    </div>





@endsection
