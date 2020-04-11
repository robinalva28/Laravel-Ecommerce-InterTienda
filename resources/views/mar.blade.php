@extends('layout.plantilla')

@section('title', "{$marca->marNombre}")

@section('h1', "{$marca->marNombre}")

@section('contenido')


    <div class="container container-fluid">

        <div class="tittle">


            <h1>@yield('h1')</h1>

        </div>
        <a href="/allMarcas" class="btn btn-link">Volver a marcas</a>
        <a href="/todosLosProductos" class="btn btn-link">Ver todo</a>
        <a href="/allCategorias" class="btn btn-link">Ir a categorías</a>
        <a href="/" class="btn btn-link">Ir a principal</a>


        <div class="row mt-4 mb-4 d-flex justify-content-center ">

            {{--===================================================================--}}
            {{--VARIABLE $i QUE SE ITERA CON CADA MARCA ENCONTRADA EN BD--}}
            {{--===================================================================--}}

        <?php $i= 0 ?>
            @foreach($productos as $detalle)
                @if($detalle->prdIdMarca == $marca->marId)


                    {{--===================================================================--}}
                    {{--LISTADO DE LOS PRODUCTOS CORRESPONDIENTES A LA MARCA--}}
                    {{--===================================================================--}}

                    <div class="zoom {{--col-lg-3 col-sm-12 col-md-6 mb-4 mx-2--}}">
                        <div class="card" style="width: 18rem; background-color: #EEEEEE;" >
                            <img style="max-height: 24rem; box-shadow: 2px 2px 2px #59aaec;" src="{{ asset('images/productos') }}/{{$detalle->prdImagen}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$detalle->prdNombre}}</h5>
                                {{-- <p class="card-text">{{$detalle->prdDescripcion}}</p>--}}
                                <p><b>{{'Marca: '.$detalle->getMarca->marNombre}}</b></p>
                                <p><b>{{'$'.$detalle->prdPrecio}}</b></p>


                                {{--===================================================================--}}
                                {{--SI UN PRODUCTO ES PROPIO DEL USER AUTENTICADO MUESTRA BTN ADMINISTRAR--}}
                                {{--===================================================================--}}

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
                    <?php $i++ ?>
                @endif
            @endforeach

                {{--===================================================================--}}
                {{--MENSAJE - NO HAY MARCAS AFILIADAS--}}
                {{--===================================================================--}}

            @if($i==0)

                <div class="jumbotron">
                    <h1 class="display-4">¡No encontramos nada en {{$marca->marNombre}}!</h1>
                    <p class="lead">Puedes publicar algún artículo o servicio relacionado con la marca {{$marca->marNombre}}.</p>
                    <hr class="my-4">
                    <p>Si ya existen productos y/o servicios relacionados a esta marca recarga la página.</p>
                    <a class="btn btn-primary btn-lg" href="/formAgregarProducto" role="button">Nueva publicación</a>
                </div>
            @endif

        </div>
    </div>


@endsection

