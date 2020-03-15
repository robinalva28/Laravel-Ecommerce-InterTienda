@extends('layout.plantilla')

@section('title', 'Detalle')

@section('contenido')

<div class="container container-fluid">

    <div class="tittle m-3">
        <h1>{{$producto->prdNombre}}</h1>
    </div>
    <a href="/inicioAuth" class="btn btn-link">Volver a Principal</a>
    <a href="/cat/{{$producto->prdIdCategoria}}" class="btn btn-link">Volver a Categoría</a>

    <div class="mt-4 mb-4 d-flex justify-content-start">
        <div class="d-flex col-lg-6 col-sm-4 col-md-4 col-mb-4">
            <div class="card" style="width: 28rem;">
                <img src="{{ asset('images/productos') }}/{{$producto->prdImagen}}" class="card-img-top" alt="...">
                <div class="card-body">
                </div>
            </div>
        </div>
        <div  class=" justify-content-end ">
            <p></p>
            <p >{{$producto->prdDescripcion}}</p>
            <h2>PRECIO</h2>
            <h4>{{'$'.$producto->prdPrecio}}</h4>
            <br>
            <button type="button" class="btn btn-primary">Agregar al Carrito</button>
            <br><br>
        </div>
    </div>

    <div class="d-flex">

    </div>


</div>
<!-- CARDS -->

@endsection
