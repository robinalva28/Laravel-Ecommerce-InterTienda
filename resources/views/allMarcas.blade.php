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


        <div class="jumbotron col-4 mx-auto "   >
            <a href="/todosLosProductos" class="btn btn-link">Ver todo</a>
            <a href="/allCategorias" class="btn btn-link">Ir a categorías</a>
            <a href="/" class="btn btn-link">Ir a principal</a>

            <h2 class="mx-auto"><strong><h1>@yield('h1')</h1></strong></h2>

            <hr class="my-4">
            @foreach($marcas as $marca)

                <a href="/mar/{{$marca->marId}}" style="color: #1d643b; font-size: 3vh" class="nav-item" >
                    <i class="fas fa-greater-than"></i>{{$marca->marNombre}} </a>
                <br>

            @endforeach
            <a href="/todosLosProductos" style="color: #1d643b; font-size: 3vh" class="nav-item" >
                <i class="fas fa-greater-than"></i>Todas</a>
            <br>

        </div>

  @endsection
