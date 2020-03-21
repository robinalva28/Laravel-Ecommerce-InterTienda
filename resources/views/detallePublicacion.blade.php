@extends('layout.plantilla')

@section('title', "{$producto->prdNombre}")

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
            <h3>Descripción:</h3>
            <h4>{{$producto->prdDescripcion}}</h4>
            <br>

            <h3>Precio:</h3>
            <h4>{{'$'.$producto->prdPrecio}}</h4>
            <br>
            <h6 style="color: #1b4b72"><strong> En stock: {{$producto->prdStock}}</strong></h6>
            {{--BOTON ADD CARRITO O IR A MIS PUBLICACIONES--}}
            @if($producto->prdIdUsuario == Auth::user()->usrId)

            <form action="/adminUsuarioProductos" method="GET">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg">Administrar</button>
            </form>
                @else
            <a href="#addCarrito" class="btn btn-primary btn-lg" data-toggle="modal">Agregar al Carrito</a>
            <br><br>
            @endif
            {{--VENTANA EMERGENTE PARA AGREGAR AL CARRITO--}}
            <div class="modal fade col-auto" id="addCarrito" >
                <div class="modal-dialog">
                    <div class="modal-content" style="background-color: #dee2e6">
                        {{--HEADER DE LA VENTANA EMERGENTE--}}

                        <div class="modal-header">
                        <h4 class="modal-title">Un paso más ¡{{$producto->prdNombre}}!</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                         </div>

                        {{--BODY DE VENTANA EMERGENTE--}}
                        <div class="modal-body"  >
                            <div class="card " style="width: auto;">
                                <img src="{{ asset('images/productos') }}/{{$producto->prdImagen}}" class="card-img-top " alt="...">
                                <div class="card-body ">
                                    <div class="form-group">
                                        <label>Stock: {{ $producto->prdStock }}</label><br>
                                       </div>
                                </div>
                            </div>
                        </div>

                        {{--FOOTER VENTANA EMERGENTE--}}
                        <div class="modal-footer">

                            <form action="/addACarrito" method="POST">
                                @csrf
                                <h4 class="d-inline-block" for="cantidad">Selecciona cantidad:</h4>
                                <input type="hidden" name="prdId" value="{{$producto->prdId}}">
                                <input style="height: 4vh;" name="cantidad" id="cantidad" type="number" value="1" min="1" max="{{ $producto->prdStock }}" step="1"/>
                                <button type="submit" class="btn btn-primary" >Agregar al Carrito</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex">

    </div>


</div>
<!-- CARDS -->

@endsection
