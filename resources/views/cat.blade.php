@extends('layout.plantilla')

@section('contenido')


<div class="container container-fluid">

    <div class="tittle">
        <h1></h1>
    </div>
    <a href="/index" class="btn btn-link">Ir a principal</a>
    <a href="/index" class="btn btn-link">Ir a categorias</a>

    <div class="row  mt-4 mb-4 d-flex justify-content-lg-around justify-content-md-end ">
    @foreach($productos as $producto)


        <div class="col-lg-3 col-sm-12 col-md-6 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/productos') }}/{{$producto->prdImagen}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$producto->prdNombre}}</h5>
                   {{-- <p class="card-text">{{$producto->prdDescripcion}}</p>--}}
                    <p><b>{{'$'.$producto->prdPrecio}}</b></p>
                    <a href="tecno_01" class="btn btn-primary">+info</a>
                </div>
            </div>
        </div>
    @endforeach

    </div>
</div>


@endsection
