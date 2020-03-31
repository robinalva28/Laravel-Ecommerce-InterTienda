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
                    <th scope="col">Fecha</th>
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
                        <th>
                            <label for="fecha" type="date">{{$producto->created_at->format('d-m-y')}} </label>
                        </th>
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
                                <a href="/vendedor/{{$producto->venId}}" class="btn btn-success btn"  >Ver datos</a>

                        </td>

                    </tr>

                @endforeach
                <th colspan="7">  {{ $compras->links() }}</th>
                </tbody>
            </table>
            {{--<div class="container-fluid">

            </div>
            <button type="button" class="btn btn-success mb-5">Confirmar compra</button>--}}
        @endif

    </div>



@endsection


