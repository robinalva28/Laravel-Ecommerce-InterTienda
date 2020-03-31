@extends('layout.plantilla')

@section('title', 'Mis publicaciones')

@section('h1', 'Mis publicaciones')

@section('contenido')

    <div class="{{--card bg-light col-md-11 mt-1 p-1 --}} ">
        @if( session()->has('mensaje') )
            <div class="alert alert-success">
                {{ session()->get('mensaje') }}
            </div>
        @endif

            <?php $i= 0 ?>

            @foreach($productos as $producto)
                @if($producto->prdIdUsuario == Auth::user()->usrId)
                <?php $i++ ?>
                @endif
            @endforeach

            @if($i==0)

                <div class="jumbotron container flex-column h-100 mt-5 ">
                    <h1 class="display-4">¡Aún no has publicado nada!</h1>
                    <p class="lead">En éste panel puedes administrar tus publicaciones como desees.</p>
                    <hr class="my-4">
                    <p>Haz click abajo para hacer tu primera publicación</p>
                    <a class="btn btn-primary btn-lg" href="/formAgregarProducto" role="button">¡Publicar!</a>
                </div>
            @else

        <table class="table table-hover table-striped table-border mx-auto mt-1 p-1 col-md-12 ">

            <thead class="thead-dark">

                <th colspan="10">
                   <h3><strong>@yield('h1')</strong></h3>
               </th>


            <tr class="mr-3">
                <th>Nombre</th>
                <th>Precio</th>
                <th>Marca</th>
                <th>Categoria</th>
                <th>Descripción</th>
                <th>Stock</th>
                <th>Imagen</th>
                <th colspan="3"></th>
            </tr>
            </thead>
            <tbody>
            @foreach( $productos as $producto )
                <tr>
                    <td>{{ $producto->prdNombre }}</td>
                    <td>{{ '$'. $producto->prdPrecio }}</td>
                    <td>{{ $producto->getMarca->marNombre}}</td>
                    <td>{{ $producto->getCategoria->catNombre }}</td>
                    <td>{{ $producto->prdDescripcion }}</td>
                    <td>{{ $producto->prdStock }}</td>
                    <td ><img  src="{{ asset('images/productos') }}/{{ $producto->prdImagen }}" class="img-thumbnail" width="80px" ></td>
                    <td>
                        <a href="formModificarProducto/{{$producto->prdId}}" class="btn btn-outline-secondary">
                            Modificar
                        </a>
                    </td>
                    <td>
                        <form action="/eliminarProducto/{{$producto->prdId}} " method="post">
                            @csrf
                            <button type="submit" onclick="return confirm('¿Desea eliminar éste producto?')" class="btn btn-outline-secondary">
                                Eliminar
                            </button>
                        </form>
                    </td>
                        <td >
                            <a href="/detallePublicacion/{{$producto->prdId}}" class="nav-link">Vista previa</a>

                        </td>
                </tr>

            @endforeach

            <th colspan="2">
                <a href="/formAgregarProducto" class="btn btn-dark">
                    Nueva publicación
                </a>
            </th>

            <th colspan="8">{!! $productos->render() !!} </th>

            </tbody>
        </table>
    </div>
    @endif
@endsection

