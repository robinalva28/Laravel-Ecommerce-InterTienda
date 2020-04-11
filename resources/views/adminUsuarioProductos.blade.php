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
                @if($producto->prdIdUsuario == Auth::user()->usrId or Auth::user()->isAdmin)
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
              {{--  <div><h1>@yield('h1')</h1></div>--}}
        <table role="table" class="table  table-hover table-striped table-borderless mx-auto mt-1 p-1 col-md-12 ">

            <thead role="rowgroup" class="thead-dark">

                <th  role="columnheader"  colspan="10">
                    @if(Auth::user()->isAdmin)
                        <h3><strong>PUBLICACIONES DE {{strtoupper($productos[0]->getUsuario->nombre
                            . ' '.$productos[0]->getUsuario->apellido)}}</strong></h3>
                        @else
                   <h3><strong>@yield('h1')</strong></h3>
                        @endif

                </th>
            <tr role="row" class="mr-3">
                <th role="columnheader" >Nombre</th>
                <th role="columnheader" >Precio</th>
                <th role="columnheader" >Marca</th>
                <th role="columnheader">Categoria</th>
                <th role="columnheader">Descripción</th>
                <th role="columnheader">Stock</th>
                <th role="columnheader">Imagen</th>
                <th role="columnheader" colspan="3"></th>
            </tr>
            </thead>
            <tbody role="rowgroup">
            @foreach( $productos as $producto )
                <tr role="row" >
                    <td role="cell" class="tdnombre tabla-valor"><p>{{ $producto->prdNombre }}</p></td>
                    <td role="cell" class="tdprecio tabla-valor"><p>{{ '$'. $producto->prdPrecio }}</p></td>
                    <td role="cell" class="tdmarca tabla-valor"><p>{{ $producto->getMarca->marNombre}}</p></td>
                    <td role="cell" class="tdcategoria tabla-valor"><p>{{ $producto->getCategoria->catNombre }}</p></td>
                    <td role="cell" class="tddescripcion tabla-valor"><p>{{ $producto->prdDescripcion }}</p></td>
                    <td role="cell" class="tdstock tabla-valor"><p>{{ $producto->prdStock }}</p></td>
                    <td role="cell"  class="tdimagen tabla-valor"><p><img  src="{{ asset('images/productos') }}/{{ $producto->prdImagen }}"
                               class="img-thumbnail" width="80px" style="max-height: 100px;
                              /* margin-left: 30%;*/" ></p></td>
                    <td role="cell"  class="tabla-valor"><p>
                        <a href="formModificarProducto/{{$producto->prdId}}" class="btn btn-outline-secondary">
                            Modificar
                        </a>
                        </p></td>
                    <td role="cell"  class="tabla-valor"><p>
                        <form action="/eliminarProducto/{{$producto->prdId}} " method="post">
                            @csrf
                            <button type="submit" onclick="return confirm('¿Desea eliminar éste producto?')" class="btn btn-outline-secondary">
                                Eliminar
                            </button>
                        </form>
                        </td>
                        <td role="cell"  class="tabla-valor"><p>
                            <a style="padding-top: 0px;" href="/detallePublicacion/{{$producto->prdId}}" class="nav-link">Vista previa
                            @if($producto->eliminado)
                                <label style="color:red;">Eliminado</label>
                                @endif
                            </a>
                            </p></td>
                </tr>

            @endforeach

            <th role="columnheader" colspan="4">
                <a href="/formAgregarProducto" class="btn btn-dark">
                    Nueva publicación
                </a>
                <br>
                <br>
                @if(Auth::user()->isAdmin)
                    <a class="btn btn-outline-dark" href="/admin/verPerfil/{{$producto->getUsuario->usrId}}">
                        {{'Volver a los datos de '. $producto->getUsuario->nombre .' '. $producto->getUsuario->apellido}} </a>
                @endif
            </th>

            <th role="columnheader" colspan="8">{!! $productos->render() !!} </th>

            </tbody>
        </table>
    </div>
    @endif
@endsection

