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
                <h1 class="display-4">¡Aún no has agregado nada al Carrito!</h1>
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
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Remover</th>
            </tr>
        </thead>
        <tbody>

            @foreach($carrito as $producto)
                <tr>
                    <th scope="row"><img src="{{ asset('images/productos') }}/{{$producto->getProducto->prdImagen}}" alt="..." class="img-fluid img-thumbnail" width="80px"></th>

                    <td><strong> {{$producto->getProducto->prdNombre}}.  </strong><br>
                            {{$producto->getProducto->prdDescripcion}}
                    </td>
                    <td>${{$producto->getProducto->prdPrecio}}</td>
                    <td>{{$producto->carCantidadPrd}}</td>
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
    <button type="button" class="btn btn-success mb-5">Confirmar compra</button>
    @endif

</div>



    @endsection

