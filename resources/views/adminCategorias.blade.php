@extends('layout.plantilla')

@section('title', 'Panel de Categorías')

@section('h1', 'Panel de Categorías')

@section('contenido')

    {{-- mensajes de ok --}}
    @if( session()->has('mensaje') )
        <div class="alert alert-success">
            {{ session()->get('mensaje') }}
        </div>
    @endif

    <table class=" mx-auto mt-1 p-1  col-6 table table-bordered table-hover table-striped">
        <thead class="thead-dark">
        <tr>
            <th>id</th>
            <th>Categoria</th>
            <th>Descripcion</th>
            <th>Miniatura</th>
            <th></th>
            <th></th>
           {{-- <th colspan="2">
                <a href="/formAgregarCategoria" class="btn btn-dark">Agregar</a>
            </th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach( $categorias as $categoria )
            <tr>
                <td>{{$categoria->catId}}</td>
                <td>{{$categoria->catNombre}}</td>
                <td>{{$categoria->catDescripcion}}</td>
                <td><img  src="{{ asset('images/categorias') }}/{{ $categoria->catImagen  }}" class="img-thumbnail" width="80px" ></td>
                <td>
                    <a href="formModificarCategoria/{{$categoria->catId}}" class="btn btn-outline-secondary">
                        Modificar
                    </a>
                </td>
                <td>
                    <a onclick="return confirm('¿Está seguro de eliminar ésta categoría?')" href="" class="btn btn-outline-secondary">
                        Eliminar
                    </a>
                </td>
            </tr>
        @endforeach
        <th colspan="1">
            <a href="/admin/formAgregarCategoria" class="btn btn-dark">Agregar</a>
        </th>
        <th>{{ $categorias->links() }}</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        </tbody>
    </table>



@endsection
