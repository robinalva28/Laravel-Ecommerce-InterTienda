@extends('layout.plantilla')

@section('title', 'Publicaciones')

@section('h1', ' Historial de las publicaciones')

@section('contenido')

    <div class="{{--card bg-light col-md-11 mt-1 p-1 --}} mx-3">
        <div><h1>@yield('h1')</h1></div>
    <table border="2px" class="table table-hover table-striped table-border mx-auto mt-1 p-1 col-md-12 ">
        <thead class="thead-dark">
        <tr class="mr-3">
            <th>ID</th>
            <th>Productos</th>
            <th colspan="2"></th>
            <th>Propietario</th>
            <th>Ventas</th>
            <th>Stock <br>vendido</th>
            <th>Stock <br>disp.</th>
            {{--<th>Precio</th>
            <th>Marca</th>
            <th>Categoria</th>
            <th>Descripción</th>
            --}}

            <th colspan="2">Estado de <br>publicación</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $productos as $producto )
            <tr>
                <td>
                    {{ $producto->prdId }}
                </td>

                <td>  <img  src="{{ asset('images/productos') }}/{{ $producto->prdImagen }}" class="img-thumbnail" width="80px" ></td>

                <td colspan="2"><strong>{{ $producto->prdNombre }}.</strong><br>
                    {{ ' Precio: $'. $producto->prdPrecio }}<br>
                    {{ 'Marca: '.$producto->getMarca->marNombre}}<br>
                    {{ 'Categoría: '.$producto->getCategoria->catNombre }}<br>
                    {{ 'Descripción: '.$producto->prdDescripcion }}
                </td>


                <th><a href="/admin/verPerfil/{{$producto->getUsuario->usrId}}"><strong>{{'ID. '.$producto->getUsuario->usrId}}</strong>
                    {{$producto->getUsuario->nombre .' '. $producto->getUsuario->apellido}} </a>
                    <br>

                </th>
                {{--VENTAS--}}
                <?php $i=0;$cant=0;$ventas=0; ?>

                {{--LLENO EL ITERADOR CON LA CANTIDAD DE OBJETOS QUE COINCIDAN--}}
                @foreach($allVentas as $venta)

                    @if($venta->venIdProducto == $producto->prdId)
                        <?php $i++; ?>
                    @endif
                @endforeach
                <td>


                    @foreach($allVentas as $venta)

                        @if($venta->venIdProducto == $producto->prdId)

                            <label style="font-size: 0;">
                                {{$cant += $venta->venStock}}
                                {{$ventas++}}
                            </label>
                            <?php $i--; ?>
                        @endif
                    @endforeach
                        {{--IMPRIMO LA CANTIDAD DE STOCK--}}
                        {{$ventas}}

                </td>
                {{--STOCK VENDIDO--}}

                <td>

                    {{--RECORRO CADA ESPACIO SUMANDO LA CANTIDAD DE PRODUCTOS VENDIDOS--}}
                    {{$cant}}



                </td>
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



        <th style="border: 2px; padding-left: 50%;" colspan="9"> {{ $productos->links() }}</th>

        </tbody>
    </table>
    </div>





@endsection
