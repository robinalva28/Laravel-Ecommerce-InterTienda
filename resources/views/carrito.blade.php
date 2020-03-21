@extends('layout.plantilla')

@section('title', 'Carrito')

@section("contenido")
<div class="container d-flex flex-column h-100 mt-5">
    <div class=" my-3 col-sm-11 col-md-11 col-lg-11 col-form-label">
        <h2><strong>Carrito</strong></h2>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Remover</th>
            </tr>
        </thead>
        <tbody>

            @foreach($carrito as $producto)
                <tr>
                    <th scope="row"><img src="{{ asset('images/productos') }}/{{$producto->getProducto->prdImagen}}" alt="..." class="img-fluid img-thumbnail" width="80px"></th>
                    <td>${{$producto->getProducto->prdPrecio}}</td>
                    <td>{{$producto->getProducto->prdStock}}</td>
                    <td><a href="#"><i class="far fa-trash-alt"></i></a></td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <button type="button" class="btn btn-success mb-5">Confirmar compra</button>
</div>
    @endsection
