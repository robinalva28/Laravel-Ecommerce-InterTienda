@extends('layout.plantilla')

@section('contenido')


<div class="container container-fluid">

    <div class="tittle">


            <h1>{{$categoria->catNombre}}</h1>

    </div>
    <a href="/inicioAuth" class="btn btn-link">Volver a categorias</a>
    <a href="/inicioAuth" class="btn btn-link">Ir a principal</a>
    <a href="/todosLosProductos" class="btn btn-link">Ver todo</a>

    <div class="row  mt-4 mb-4 d-flex justify-content-lg-around justify-content-md-end ">

    @foreach($productos as $detalle)

        @if($detalle->prdIdCategoria == $categoria->catId)
        <div class="col-lg-3 col-sm-12 col-md-6 mb-4 mx-2">
            <div class="card" style="width: 18rem;" >
                <img style="box-shadow: 2px 2px 2px #59aaec;" src="{{ asset('images/productos') }}/{{$detalle->prdImagen}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$detalle->prdNombre}}</h5>
                   {{-- <p class="card-text">{{$detalle->prdDescripcion}}</p>--}}
                    <p><b>{{'Marca: '.$detalle->getMarca->marNombre}}</b></p>
                    <p><b>{{'$'.$detalle->prdPrecio}}</b></p>
                    <a href="/detallePublicacion/{{$detalle->prdId}}" class="btn btn-primary">+info</a>
                </div>
            </div>
        </div>
               @endif
    @endforeach

       {{-- @if($categoria->catId != $detalle->prdIdProducto)

            <div class="col-lg-3 col-sm-12 col-md-6 mb-4 mx-2">
                <img style="height: 15vh;" src="{{ asset('images/notificaciones/dificultadesTecnicas.png')}}" alt="">
            </div>
        @endif--}}

    </div>
</div>


@endsection
