@extends('layout.plantilla')

@section('contenido')


    <div class="container container-fluid">

        <div class="tittle">

        <br>
            <h1>Todos</h1>

        </div>
        <a href="/allCategorias" class="btn btn-link">Volver a categorias</a>
        <a href="/" class="btn btn-link">Ir a principal</a>

        <div class="row  mt-4 mb-4 d-flex justify-content-lg-around justify-content-md-end ">

            @foreach($productos as $detalle)

                    <div class="col-lg-3 col-sm-12 col-md-6 mb-4 mx-2">
                        <div class="card" style="width: 17rem;" >
                            <img style="box-shadow: 2px 2px 2px #59aaec;" src="{{ asset('images/productos') }}/{{$detalle->prdImagen}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$detalle->prdNombre}}</h5>
                                {{-- <p class="card-text">{{$detalle->prdDescripcion}}</p>--}}
                                <p><b>{{'Marca: '.$detalle->getMarca->marNombre}}</b></p>
                                <p><b>{{'$'.$detalle->prdPrecio}}</b></p>
                                @if($detalle->prdIdUsuario == Auth::user()->usrId)

                                    <form action="/adminUsuarioProductos" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-block btn-lg">Administrar</button>
                                    </form>
                                @else
                                    <a href="/detallePublicacion/{{$detalle->prdId}}" class="btn btn-primary">+info</a>
                                    <br><br>
                                @endif
                            </div>
                        </div>
                    </div>

            @endforeach

        </div>
    </div>


@endsection

