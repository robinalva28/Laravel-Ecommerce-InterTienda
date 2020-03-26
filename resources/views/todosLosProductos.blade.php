@extends('layout.plantilla')

@section('contenido')


    <div class="container container-fluid">

        <?php $i= 0 ?>

        @foreach($productos as $producto)

            <?php $i++ ?>
        @endforeach

        @if($i==0)


            <div class="jumbotron col-8 mx-auto">
                <a href="/allMarcas" class="btn btn-link">Ir a Marcas</a>
                <a href="/allCategorias" class="btn btn-link">Ir a categorías</a>
                <a href="/" class="btn btn-link">Ir a principal</a>
                <br>
                <h1 class="display-4">¡No encontramos nada !</h1>
                <p class="lead">Puedes publicar algún artículo o servicio..</p>
                <hr class="my-4">
                <p>Si ya existen productos y/o servicios publicados recarga la página.</p>
                <a class="btn btn-primary btn-lg" href="/formAgregarProducto" role="button">Nueva publicación</a>
            </div>
    </div>
        @else


        <div class="tittle">


            <h1>Todos</h1>

        </div>
        <a href="/allCategorias" class="btn btn-link">Volver a categorias</a>
        <a href="/allMarcas" class="btn btn-link">Ir a marcas</a>
        <a href="/" class="btn btn-link">Ir a principal</a>
        <br>


        <div class="row  mt-4 mb-4 d-flex justify-content-lg-around justify-content-md-end ">

            @foreach($productos as $detalle)

                    <div class="zoom col-lg-3 col-sm-12 col-md-6 mb-4 mx-2">
                        <div class="card" style="width: 17rem; background-color: #EEEEEE;" >
                            <img style="box-shadow: 2px 2px 2px #59aaec;" src="{{ asset('images/productos') }}/{{$detalle->prdImagen}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$detalle->prdNombre}}</h5>
                                {{-- <p class="card-text">{{$detalle->prdDescripcion}}</p>--}}
                                <p><b>{{'Marca: '.$detalle->getMarca->marNombre}}</b></p>
                                <p><b>{{'$'.$detalle->prdPrecio}}</b></p>
                                @if($detalle->prdIdUsuario == Auth::user()->usrId)

                                    <form action="/adminUsuarioProductos" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-dark btn-lg">Administrar</button>
                                    </form>
                                @else
                                    <a href="/detallePublicacion/{{$detalle->prdId}}" class="btn btn-primary">+info</a>
                                    <br><br>
                                @endif
                            </div>
                        </div>
                    </div>

            @endforeach
            <br>

        </div>
        <div class="ml-5">
            <h6 class="">{{$productos->links()}}</h6>
        </div>
        <br>
        <br>
    </div>
    @endif


@endsection

