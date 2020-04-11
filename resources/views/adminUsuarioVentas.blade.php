@extends('layout.plantilla')

@section('title', 'Mis ventas')

@section('h1', 'Mis ventas')

@section("contenido")
    <div class="container col-11 d-flex flex-column h-100 mt-3">
        @if( session()->has('mensaje') )
            <div class="alert alert-success">
                {{ session()->get('mensaje') }}
            </div>
        @endif
        <?php $i= 0 ?>

        @foreach($ventas as $venta)

            @if($venta->getVendedor->usrId == auth()->user()->usrId)

                <?php $i++ ?>

            @endif

        @endforeach

        @if($i==0)

            <div class="jumbotron">
                <h1 class="display-4">¡Aún no has efectuado tu primera Venta!</h1>
                <p class="lead">Aquí aparecerán todas las ventas que tengas, también los datos para contactar a los compradores de tus productos o servicios.</p>
                <hr class="my-4">
                <p>Haz click abajo para visitar las categorías</p>
                <a class="btn btn-primary btn-lg" href="/allCategorias" role="button">¡Ir a categorías!</a>
            </div>
        @else

            <div class=" my-3 col-sm-11 col-md-11 col-lg-11 ">
                <h2><strong>@yield('h1')</strong></h2>

            </div>
                <table role="table" class="table  table-hover table-striped table-borderless mx-auto mt-1 p-1 col-md-12 ">
                <thead>
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Producto</th>
                    <th colspan="1">&nbsp;</th>
                    <th scope="col">Precio und.</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                    <th scope="col">Comprador</th>
                </tr>
                </thead>
                <tbody>
                @php $totalFinal = 0 @endphp
                @foreach($ventas as $producto)
                    <tr>
                        <th>
                            <label for="fecha" type="date">{{$producto->created_at->format('d-m-y')}} </label>
                        </th>
                        <th scope="row"><img src="{{ asset('images/productos') }}/{{$producto->getProducto->prdImagen}}" alt="..." class="img-fluid img-thumbnail" width="80px"></th>

                          <td role="cell" class="tdnombre tabla-valor"><p><strong> {{$producto->getProducto->prdNombre}}.  </strong><br>
                            {{$producto->getProducto->prdDescripcion}}
                              </p></td>
                        <td role="cell" class="tdprecio tabla-valor"><p>${{$producto->getProducto->prdPrecio}}</p></td>
                        <td role="cell" class="tdstock tabla-valor"><p>{{$producto->venStock}}</p></td>
                        <td role="cell" class="tdtotal tabla-valor"><p>${{$producto->getProducto->prdPrecio * $producto->venStock}}</p></td>

                        @php $i--; @endphp

                          <td role="cell" class="tddatoscontacto tabla-valor"><p>
                            {{--INICIO DE VENTANA EMERGENTE CON DATOS DEL VENDEDOR--}}
                            <a href="/comprador/{{$producto->venId}}" class="btn btn-success btn"  >Ver datos</a>
                              </p></td>
                    </tr>

                @endforeach
                <th colspan="7">  {{ $ventas->links() }}</th>
                </tbody>
            </table>
            {{--<div class="container-fluid">

            </div>
            <button type="button" class="btn btn-success mb-5">Confirmar compra</button>--}}
        @endif

    </div>



@endsection


