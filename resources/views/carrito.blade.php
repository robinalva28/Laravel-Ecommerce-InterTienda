@extends('layout.plantilla')

@section('title', 'Carrito')

@section("contenido")
<div class="container d-flex flex-column h-100 mt-3">
    @if( session()->has('mensaje') )
        <div class="alert alert-success">
            {{ session()->get('mensaje') }}
        </div>
    @endif
        <?php $i= 0 ?>
        @foreach($carrito as $producto)
            <?php $i++ ?>
        @endforeach

        @if($i==0)

            <div class="jumbotron">
                <h1 class="display-4">¡Tu carrito está vacío!</h1>
                <p class="lead">Puedes agregar productos al carrito con tan solo un click.</p>
                <hr class="my-4">
                <p>Haz click abajo para visitar las categorías</p>
                <a class="btn btn-primary btn-lg" href="/allCategorias" role="button">¡Ir a categorías!</a>
            </div>
        @else

    <div class=" my-3 col-sm-11 col-md-11 col-lg-11 col-form-label">
        <h2><strong>Carrito</strong>
            <small>
                <a class="float-right" href="/allCategorias" class="btn btn-link">Ir a categorias</a>
            </small>
        </h2>

    </div>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">Producto</th>
                <th colspan="1">&nbsp;</th>
                <th scope="col">Precio und.</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Total</th>
                <th scope="col">Remover</th>
            </tr>
        </thead>
        <tbody>
            @php $totalFinal = 0 @endphp
            @foreach($carrito as $producto)
                <tr>
                    <th scope="row"><img src="{{ asset('images/productos') }}/{{$producto->getProducto->prdImagen}}" alt="..." class="img-fluid img-thumbnail" width="80px"></th>

                    <td><strong> {{$producto->getProducto->prdNombre}}.  </strong><br>
                            {{$producto->getProducto->prdDescripcion}}
                    </td>
                    <td>${{$producto->getProducto->prdPrecio}}</td>
                    {{--VERIFICO SI LA CANTIDAD DE STOCK ESTÁ DISPONIBLE TAMBIÉN EN LA TABLA DEL PRODUCTO--}}
                    @if($producto->carCantidadPrd > $producto->getProducto->prdStock)
                    <td><label style="color:red;">Stock no disp.</label></td>
                    @else
                    <td>{{$producto->carCantidadPrd}}</td>
                    @endif

                        <td>${{$producto->getProducto->prdPrecio * $producto->carCantidadPrd}}

                        <br>
                        <br>
                        @php $i--; @endphp
                    @if($i == 0)
                            <h5><strong>Total carrito: ${{$totalFinal += $producto->getProducto->prdPrecio * $producto->carCantidadPrd}}</strong></h5>
                        @else
                            <label style="font-size: 0;"> Total carrito: $ {{$totalFinal
                    += $producto->getProducto->prdPrecio * $producto->carCantidadPrd}}</label>
                        @endif

                    </td>
                    <td>
                        <form action="/eliminarCarrito/{{$producto->carId}}" method="post">
                            @csrf
                            <button type="submit" onclick="return confirm('¿Desea eliminar éste producto?')" class="btn btn-outline-secondary">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
            </tr>

               @endforeach
            <th>  {{ $carrito->links() }}</th>
        </tbody>
    </table>
        <div class="container-fluid">

        </div>

        <form method="post" action="/addCompra" href="#confirmarCompra">
            @csrf
        <button type="submit" onclick="return confirm('¿Confirmar compra?')" class="btn btn-success btn-lg">Confirmar compra</button>

        </form>
          {{--  <div class="modal fade col-auto" id="confirmarCompra" >
                <div class="modal-dialog">
                    <div class="modal-content" style="background-color: #dee2e6">
                        --}}{{--HEADER DE LA VENTANA EMERGENTE--}}{{--

                        <div class="modal-header">

                            <h2 class="modal-title">¡Enhorabuena! compraste:</h2><br>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>

                        --}}{{--BODY DE VENTANA EMERGENTE--}}{{--
                        <div class="modal-body"  >
                            @foreach($carrito as $producto)

                                <label> <i class="fas fa-angle-double-right"></i> {{$producto->getProducto->prdNombre}}  </label>
                                <br>

                                <img  height="60px" src="{{ asset('images/productos') }}/{{$producto->getProducto->prdImagen}}"
                                     class=" " alt="...">
                                <br>
                            @endforeach
                            <br>
                            <div class="" style="width: auto;">
                               --}}{{-- <img src="{{ asset('images/productos') }}/{{$producto->getProducto->prdImagen}}" class="card-img-top " alt="...">
                               --}}{{--
                                    <div class="form-group">
                                       <h5>En la sección Compras podrás acceder a la información del vendedor
                                       y así pautar la entrega y formas de pago, si tienes algún inconveniente con la compra no dudes
                                       en contactarnos.</h5>
                                    </div>

                            </div>
                        </div>

                        --}}{{--FOOTER VENTANA EMERGENTE--}}{{--
                        <div class="modal-footer">

                            <form action="/compras" method="get">
                                @csrf
                               --}}{{-- <h4 class="d-inline-block" for="cantidad">Selecciona cantidad:</h4>
                                <input type="hidden" name="prdId" value="{{$producto->prdId}}">
                                <input style="height: 4vh;" name="cantidad" id="cantidad" type="number" value="1" min="1" max="{{ $producto->prdStock }}" step="1"/>
                              --}}{{--
                                <button type="submit" class="btn btn-primary" >IR A MIS COMPRAS</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>--}}
            {{--FIN DEL IF QUE MUESTRA EL CONTENIDO DEL CARRITO--}}
    @endif

</div>



    @endsection

