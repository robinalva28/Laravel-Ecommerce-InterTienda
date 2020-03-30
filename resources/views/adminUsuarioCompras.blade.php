@extends('layout.plantilla')

@section('title', 'Mis compras')

@section('h1', 'Mis compras')

@section("contenido")
    <div class="container col-11 d-flex flex-column h-100 mt-3">
        @if( session()->has('mensaje') )
            <div class="alert alert-success">
                {{ session()->get('mensaje') }}
            </div>
        @endif
        <?php $i= 0 ?>

            @foreach($compras as $compra)

                @if($compra->getComprador->usrId == auth()->user()->usrId)

                    <?php $i++ ?>

                @endif

            @endforeach

        @if($i==0)

            <div class="jumbotron">
                <h1 class="display-4">¡Aún no has efectuado tu primera compra!</h1>
                <p class="lead">Puedes agregar productos al carrito desde la sección de compras, o si ya
                    tienes productos en tu carrito, confirmar la compra.</p>
                <hr class="my-4">
                <p>Haz click abajo para visitar las categorías</p>
                <a class="btn btn-primary btn-lg" href="/allCategorias" role="button">¡Ir a categorías!</a>
            </div>
        @else

            <div class=" my-3 col-sm-11 col-md-11 col-lg-11 ">
                <h2><strong>@yield('h1')</strong></h2>

            </div>
            <table class="table table-hover table-striped ">
                <thead>
                <tr>
                    <th scope="col">Producto</th>
                    <th colspan="1">&nbsp;</th>
                    <th scope="col">Precio und.</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                    <th scope="col">Datos Vendedor</th>
                </tr>
                </thead>
                <tbody>
                @php $totalFinal = 0 @endphp
                @foreach($compras as $producto)
                    <tr>
                        <th scope="row"><img src="{{ asset('images/productos') }}/{{$producto->getProducto->prdImagen}}" alt="..." class="img-fluid img-thumbnail" width="80px"></th>

                        <td><strong> {{$producto->getProducto->prdNombre}}.  </strong><br>
                            {{$producto->getProducto->prdDescripcion}}
                        </td>
                        <td>${{$producto->getProducto->prdPrecio}}</td>
                        <td>{{$producto->venStock}}</td>
                        <td>${{$producto->getProducto->prdPrecio * $producto->venStock}}</td>
                        @php $i--; @endphp
                        <td>

                            {{--INICIO DE VENTANA EMERGENTE CON DATOS DEL VENDEDOR--}}
                                <a href="#datosVendedor" class="btn btn-success btn" data-toggle="modal"  >Ver datos</a>

                            <div class="modal fade col-auto" id="datosVendedor" >
                                <div class="modal-dialog">
                                    <div class="modal-content" style="background-color: #dee2e6">
                                        {{--HEADER DE LA VENTANA EMERGENTE--}}

                                        <div class="modal-header">

                                            <h2 class="modal-title">Éstos son los datos del vendedor</h2><br>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>

                                        {{--BODY DE VENTANA EMERGENTE--}}
                                        <div class="modal-body"  >

                                               <h5> <i class="fas fa-angle-double-right"></i> {{$producto->getVendedor->nombre}}  </h5>
                                            <br>
                                               <label> <i class="fas fa-angle-double-right"></i> {{$producto->getVendedor->apellido}}  </label>
                                                <br>

                                                <img  height="60px" src="{{ asset('images/productos') }}/{{$producto->getProducto->prdImagen}}"
                                                      class=" " alt="...">
                                                <br>

                                            <br>
                                            <div class="" style="width: auto;">
                                                {{-- <img src="{{ asset('images/productos') }}/{{$producto->getProducto->prdImagen}}" class="card-img-top " alt="...">
                                                --}}
                                                <div class="form-group">
                                                    <h5>En la sección Compras podrás acceder a la información del vendedor
                                                        y así pautar la entrega y formas de pago, si tienes algún inconveniente con la compra no dudes
                                                        en contactarnos.</h5>
                                                </div>

                                            </div>
                                        </div>

                                        {{--FOOTER VENTANA EMERGENTE--}}
                                        <div class="modal-footer">

                                            <form action="/compras" method="get">

                                                {{-- <h4 class="d-inline-block" for="cantidad">Selecciona cantidad:</h4>
                                                 <input type="hidden" name="prdId" value="{{$producto->prdId}}">
                                                 <input style="height: 4vh;" name="cantidad" id="cantidad" type="number" value="1" min="1" max="{{ $producto->prdStock }}" step="1"/>
                                               --}}
                                                <button type="submit" class="btn btn-primary" >IR A MIS COMPRAS</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>

                    </tr>

                @endforeach
                <th>  {{ $compras->links() }}</th>
                </tbody>
            </table>
            <div class="container-fluid">

            </div>
            <button type="button" class="btn btn-success mb-5">Confirmar compra</button>
        @endif

    </div>



@endsection


