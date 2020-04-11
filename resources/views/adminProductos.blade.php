@extends('layout.plantilla')

@section('title', 'Publicaciones')

@section('h1', ' Historial de las publicaciones')

@section('contenido')

    <div class="{{--card bg-light col-md-11 mt-1 p-1 --}} mx-3">
        <div><h1>@yield('h1')</h1></div>
    <table role="table" border="2px" class="table table-hover table-striped table-border mx-auto mt-1 p-1 col-md-12 ">
        <thead role="rowgroup" class="thead-dark">

        <tr role="row" class="mr-3">
            <th  role="columnheader" data-id>ID</th>
            <th  role="columnheader">Productos</th>
            <th role="columnheader" colspan="2"></th>
            <th  role="columnheader">Propietario</th>
            <th  role="columnheader">Ventas</th>
            <th  role="columnheader">Stock <br>vendido</th>
            <th  role="columnheader">Stock <br>disp.</th>
            {{--<th>Precio</th>
            <th  role="columnheader">Marca</th>
            <th  role="columnheader">Categoria</th>
            <th  role="columnheader">Descripción</th>
            --}}

            <th role="columnheader" colspan="2">Estado de <br>publicación</th>
        </tr>
        </thead>
        <tbody  role="rowgroup">
        @foreach( $productos as $producto )
            <tr role="row">
                <td role="cell" class="tabla-valor">
                   <h5>{{ $producto->prdId }}</h5>
                </td>

                <td role="cell" class="tabla-valor">
                    <h5><img  src="{{ asset('images/productos') }}/{{ $producto->prdImagen }}" class="img-thumbnail" width="80px" >
                    </h5></td>

                <td role="cell" class="tabla-valor" colspan="2" >
                    <strong><h5>{{ $producto->prdNombre }}.</h5></strong><br>
                    <h5>{{ ' Precio: $'. $producto->prdPrecio }}</h5><br>
                    <h5>{{ 'Marca: '.$producto->getMarca->marNombre}}</h5><br>
                    <h5>{{ 'Categoría: '.$producto->getCategoria->catNombre }}</h5><br>
                    <h5>{{ 'Descripción: '.$producto->prdDescripcion }}</h5>
                </td>


                <th  role="columnheader"><a href="/admin/verPerfil/{{$producto->getUsuario->usrId}}"><strong>{{'ID. '.$producto->getUsuario->usrId}}</strong>
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
                <td role="cell" class="tabla-valor">


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

                <td role="cell" class="tabla-valor">

                    {{--RECORRO CADA ESPACIO SUMANDO LA CANTIDAD DE PRODUCTOS VENDIDOS--}}
                    <h5>{{$cant}}</h5>



                </td>
                <td role="cell" class="tabla-valor"> {{ $producto->prdStock }}</td>

                 <td role="cell" class="tabla-valor" colspan="2">
                @if($producto->eliminado)
                        <label style="color:red;">Eliminado</label>
                    @else
                        <label style="color:green;">En linea</label>
                    @endif
                </td>

            </tr>
        @endforeach



        <th role="columnheader" style="border: 2px; padding-left: 50%;" colspan="9"> {{ $productos->links() }}</th>

        </tbody>
    </table>
    </div>





@endsection
