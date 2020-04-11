@extends('layout.plantilla')

@section('title', 'Publicaciones')

@section('h1', ' Historial de las publicaciones')

@section('contenido')

    <div class="{{--card bg-light col-md-11 mt-1 p-1 --}} mx-3">
        <div><h1>@yield('h1')</h1></div>
        <table role="table" class="table  table-hover table-striped table-borderless mx-auto mt-1 p-1 col-md-12 ">
            <thead role="rowgroup" class="thead-dark">
            <tr class="mr-3">
                <th role="columnheader">ID</th>
                <th role="columnheader">Productos</th>
                <th role="columnheader" ></th>
                <th role="columnheader">Propietario</th>
                <th role="columnheader">Ventas</th>
                <th role="columnheader">Stock <br>vendido</th>
                <th role="columnheader">Stock <br>disp.</th>
                {{--<th role="columnheader">Precio</th>
                <th role="columnheader">Marca</th>
                <th role="columnheader">Categoria</th>
                <th role="columnheader">Descripción</th>
                --}}

                <th role="columnheader" colspan="2">Estado de <br>publicación</th>
            </tr>
            </thead>
            <tbody role="rowgroup">
            @foreach( $productos as $producto )
                <tr role="row">
                    {{--ID--}}
                    <td role="cell" class="tdid tabla-valor"><p>
                        {{ $producto->prdId }}
                        </p></td>
                    {{--IMAGEN--}}
                    <td role="cell" class="tdimagen tabla-valor"><p>
                            <img  src="{{ asset('images/productos') }}/{{ $producto->prdImagen }}"
                                  class="img-thumbnail" width="80px" ></p></td>

                    {{--DATOS DEL PRODUCTO(NOMBRE, MARCA, CATEGORIA, DESCRIPCION)--}}
                    <td role="cell" class="tdnombre tabla-valor"><p><strong>{{ $producto->prdNombre }}.</strong><br>
                        {{ ' Precio: $'. $producto->prdPrecio }}<br>
                        {{ 'Marca: '.$producto->getMarca->marNombre}}<br>
                        {{ 'Categoría: '.$producto->getCategoria->catNombre }}<br>
                        {{ 'Descripción: '.$producto->prdDescripcion }}
                        </p></td>
                    {{--LINK PARA IR AL PERFIL--}}
                    <th><a href="/admin/verPerfil/{{$producto->getUsuario->usrId}}">
                            <strong>{{'ID. '.$producto->getUsuario->usrId}}</strong>
                            {{$producto->getUsuario->nombre .' Ver datos'}} </a>
                    </th>
                    {{--VENTAS--}}
                    <?php $i=0;$cant=0;$ventas=0; ?>

                    {{--LLENO EL ITERADOR CON LA CANTIDAD DE OBJETOS QUE COINCIDAN--}}
                    @foreach($allVentas as $venta)

                        @if($venta->venIdProducto == $producto->prdId)
                            <?php $i++; ?>
                        @endif
                    @endforeach
                    <td role="cell" class="tdventas tabla-valor"><p>


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

                        </p></td>
                    {{--STOCK VENDIDO--}}

                    <td role="cell" class="tdstockvendido tabla-valor"><p>

                        {{--RECORRO CADA ESPACIO SUMANDO LA CANTIDAD DE PRODUCTOS VENDIDOS--}}
                        {{$cant}}



                        </p></td>
                    <td role="cell" class="tdstock tabla-valor"><p>{{ $producto->prdStock }}</p></td>

                    <td role="cell" class="tabla-valor"><p>
                        @if($producto->eliminado)
                            <label style="color:red;">Eliminado</label>
                        @else
                            <label style="color:green;">En linea</label>
                        @endif
                        </p></td>

                </tr>
            @endforeach



            <th style="border: 2px; /*padding-left: 50%;*/" colspan="9"> {{ $productos->links() }}</th>

            </tbody>
        </table>
    </div>





@endsection
