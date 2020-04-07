@extends('layout.plantilla')

@section('title', 'Publicaciones')

@section('h1', 'Publicaciones')

@section('contenido')

    <div class="{{--card bg-light col-md-11 mt-1 p-1 --}} mx-3">
    <table class="table table-hover table-striped table-border mx-auto mt-1 p-1 col-md-12 ">
        <thead class="thead-dark">
        <tr class="mr-3">
            <th>ID</th>
            <th>Productos</th>
            <th colspan="2"></th>
            <th>Propietario</th>
            <th>Ventas</th>
            <th>Stock</th>
            {{--<th>Precio</th>
            <th>Marca</th>
            <th>Categoria</th>
            <th>Descripción</th>
            --}}

            <th colspan="2">Estado de publicación</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $productos as $producto )

            <tr>
                <td>
                    {{ $producto->prdId }}
                </td>

                <td>  <img  src="{{ asset('images/productos') }}/{{ $producto->prdImagen }}" class="img-thumbnail" width="80px" ></td>

                <td><strong>{{ $producto->prdNombre }}.</strong><br>
                    {{ ' Precio: $'. $producto->prdPrecio }}<br>
                    {{ 'Marca: '.$producto->getMarca->marNombre}}<br>
                    {{ 'Categoría: '.$producto->getCategoria->catNombre }}<br>
                    {{ 'Descripción: '.$producto->prdDescripcion }}
                </td>

                <th></th>
                <th><a href="/admin/verPerfil/{{$producto->getUsuario->usrId}}"><strong>{{'ID. '.$producto->getUsuario->usrId}}</strong>
                    {{$producto->getUsuario->nombre .' '. $producto->getUsuario->apellido}} </a> <br>

                </th>
                <td>Proximanente</td>
                <td>{{ $producto->prdStock }}</td>
                 <td colspan="2">
                @if($producto->eliminado)
                        <label style="color:red;">Eliminado</label>
                    @else
                        <label style="color:green;">En linea</label>
                    @endif
                </td>

            </tr>
        @endforeach


        <th></th>
        <th></th>
        <th>{{ $productos->links() }}</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        </tbody>
    </table>
    </div>





@endsection
