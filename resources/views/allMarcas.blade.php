@extends("layout.plantilla")

@section('title', 'Marcas')

@section('h1', 'Marcas')


@section('contenido')

    {{-- mensajes de ok --}}
    @if( session()->has('mensaje') )
        <div class="alert alert-danger">
            {{ session()->get('mensaje') }}
        </div>
    @endif

    <?php $i= 0 ?>
    @foreach($marcas as $marca)

        <?php $i++ ?>
    @endforeach

    @if($i==0)


        <div class="jumbotron col-8 mx-auto">
            <a href="/todosLosProductos" class="btn btn-link">Ver todo</a>
            <a href="/allCategorias" class="btn btn-link">Ir a categorías</a>
            <a href="/" class="btn btn-link">Ir a principal</a>
            <br>
            <h1 class="display-4">¡No encontramos nada en Marcas!</h1>
            <p class="lead">Puedes publicar algún artículo o servicio..</p>
            <hr class="my-4">
            <p>Si ya existen productos y/o servicios publicados recarga la página.</p>
            <a class="btn btn-primary btn-lg" href="/formAgregarProducto" role="button">Nueva publicación</a>
        </div>
    @else

    <div   class="jumbotron col-sm-10 col-lg-4 col-md-6 mx-auto "   >
            <a href="/todosLosProductos" class="btn btn-link">Ver todo</a>
            <a href="/allCategorias" class="btn btn-link">Ir a categorías</a>
            <a href="/" class="btn btn-link">Ir a principal</a>

            <h2 class="mx-auto"><strong><h1>@yield('h1')</h1></strong></h2>

            <hr class="my-4">
            <div class="container">
            @foreach($marcas as $marca)

                <a href="/mar/{{$marca->marId}}"  class="nav-item just" >
                    <i class="zoom fas fa-greater-than">{{$marca->marNombre}}</i> </a>
                <br>

            @endforeach




            <a href="/todosLosProductos"  class="px-4 ml-4 nav-item" >
                <i class=" zoom fas fa-greater-than">Todas</i></a>
            <br>
            </div>
        </div>
    @endif
  @endsection
