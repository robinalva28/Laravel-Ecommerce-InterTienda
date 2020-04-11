@extends('layout.plantilla')

@section('title', 'Carrito')

@section("contenido")
    {{--===================--}}
    {{--MENSAJES DE ALERTA--}}
    {{--===================--}}
<div class="container d-flex flex-column h-100 mt-3">
    @if( session()->has('mensaje') )
        <div class="alert alert-success">
            {{ session()->get('mensaje') }}
        </div>
    @endif

        {{--===================================================================--}}
        {{--VARIABLE $i ALMACENA LA CANTIDAD DE POSICIONES RECIBIDAS(PRODUCTOS)--}}
        {{--===================================================================--}}
        <?php $i= 0 ?>
        @foreach($carrito as $producto)

            <?php $i++ ?>

        @endforeach

        {{--===================================================================--}}
        {{--MUESTRO MENSAJE DE CARRITO VACIO SI NO SE RECIBEN PRODUCTOS DESDE EL CONTROLADOR--}}
        {{--===================================================================--}}
        @if($i==0)

            <div class="jumbotron">
                <h1 class="display-4">¡Tu carrito está vacío!</h1>
                <p class="lead">Puedes agregar productos al carrito con tan solo un click.</p>
                <hr class="my-4">
                <p>Haz click abajo para visitar las categorías</p>
                <a class="btn btn-primary btn-lg" href="/allCategorias" role="button">¡Ir a categorías!</a>
            </div>
        @else
            {{--===================================================================--}}
            {{--SI SE RECIBEN PRODUCTOS MUESTRO LA TABLA CON C/U DE LOS PRODUCTOS EN CARRITO--}}
            {{--===================================================================--}}
    <div class=" my-3 col-sm-11 col-md-11 col-lg-11 col-form-label">
        <h2><strong>Carrito</strong>
            <small>
                <a class="float-right" href="/todosLosProductos" class="btn btn-link">Ir a todas las publicaciones</a>
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
        {{--===================================================================--}}
        {{--VARIABLE $totalFinal ALMACENA EL PRECIO TOTAL DE TOD0 (PRD * CANTIDAD)--}}
        {{--===================================================================--}}
            @php $totalFinal = 0 @endphp
            @foreach($carrito as $producto)
                <tr>
                    {{--COLUMNAS--}}

                    {{--IMAGEN DE PRODUCTO--}}

                    <th scope="row"><img src="{{ asset('images/productos') }}/{{$producto->getProducto->prdImagen}}" alt="..." class="img-fluid img-thumbnail" width="80px"></th>

                    {{--COL NOMBRE Y DESCRIPCION DE PRODUCTO--}}
                    <td><strong> {{$producto->getProducto->prdNombre}}. </strong><br>
                        @if($producto->getProducto->eliminado)
                        {{--CONDICIONAL PARA PRODUCTOS NO DISPONIBLES--}}
                        <label style="color:red;">Producto no disp.</label>
                            @else
                            {{$producto->getProducto->prdDescripcion}}

                            @endif
                    </td>
                    {{--=======================--}}
                    {{--======COL PRECIO=======--}}
                    {{--=======================--}}
                    <td>${{$producto->getProducto->prdPrecio}}</td>


                    {{--===============================--}}
                    {{--======COL CANTIDAD STOCK=======--}}
                    {{--===============================--}}
                    {{--VERIFICO SI LA CANTIDAD DE STOCK ESTÁ DISPONIBLE TAMBIÉN EN LA TABLA PRODUCTOS
                    Y MUESTRO UN MENSAJE DISTINTO EN CADA SITUACIÓN--}}

                    @if($producto->carCantidadPrd > $producto->getProducto->prdStock)

                    <td><label style="color:red;">Stock no disp.</label></td>
                    @else
                    <td>{{$producto->carCantidadPrd}}</td>
                    @endif
                    {{--=======================--}}
                    {{--======COL PRECIO TOTAL=======--}}
                    {{--=======================--}}
                        <td>${{$producto->getProducto->prdPrecio * $producto->carCantidadPrd}}
                        <br>
                        <br>
                            {{--RESTO LAS ITERACIONES DE CADA PRODUCTO EN CARRITO A MEDIDA QUE SE TRAEN--}}
                        @php $i--; @endphp
                            {{--=======================--}}
                            {{--======COL PRECIO TOTAL=======--}}
                            {{--=======================--}}
                    @if($i == 0)
                            <h5><strong>Total carrito: ${{$totalFinal += $producto->getProducto->prdPrecio * $producto->carCantidadPrd}}</strong></h5>
                        @else
                        {{--SUMA OCULTA DE CADA PRODUCTO, SOLO SE MOSTRARÁ EL TOTAL CUANDO LA CONDICIÓN DE TRUE--}}
                            <label style="font-size: 0;"> Total carrito: $ {{$totalFinal
                    += $producto->getProducto->prdPrecio * $producto->carCantidadPrd}}</label>
                        @endif

                    </td>

                    {{--BOTON FORM ELIMINAR PRODUCTO DEL CARRITO--}}
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
            {{--=======================--}}
            {{--======FORM BOTON CONFIRMAR COMPRA=======--}}
            {{--=======================--}}
        <form method="post" action="/addCompra" href="#confirmarCompra">
            @csrf
        <button type="submit" onclick="return confirm('¿Confirmar compra?')" class="btn btn-success btn-lg">Confirmar compra</button>

        </form>

            {{--FIN DEL IF QUE MUESTRA EL CONTENIDO DEL CARRITO--}}
    @endif

</div>



    @endsection

