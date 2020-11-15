@extends('layout.plantilla')

@section('title', 'Modificar producto')

@section('h1', 'Modificar producto')
@section('contenido')



<div class="card bg-light col-md-7 mt-5 p-3 mx-auto">
    @if( session()->has('mensaje') )
        <div class="alert alert-success">
            {{ session()->get('mensaje') }}
        </div>
    @endif
    <form action="/modificarProducto/{{$producto->prdId}}" method="post" enctype="multipart/form-data">
        @csrf
        {{--INPUTS HIDDENS--}}

        <input type="hidden" name="prdIdUsuario" value="{{Auth::user()->usrId}}">

        {{--FIN DE INPUT HIDDEN--}}

        <div class="form-group">
            <label for="prdNombre">Nombre del Producto: antes  {{$producto->prdNombre }}</label>
            <input type="text" class="form-control" name="prdNombre"  value="{{$producto->prdNombre }}" id="prdNombre" placeholder="nombre del Producto" required>
        </div>
        <div class="form-group">
            <label for="prdPrecio">Precio:</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">$</div>
                </div>
                <input type="number" name="prdPrecio" value="{{ $producto->prdPrecio }}" class="form-control" id="prdPrecio" placeholder="0" min="0" step="0" required>
            </div>
        </div>

        <div class="form-group">
            <label>Categoría:</label>
            <select name="prdIdCategoria" class="form-control" required>
                <option value="{{$producto->getCategoria->catId}}">Seleccione una categoría</option>

                @foreach( $categorias as $categoria )
                    @if($producto->getCategoria->catNombre == $categoria->catNombre)
                        <option value="{{ $categoria->catId }}" selected>{{ $categoria->catNombre }}</option>
                    @else
                    <option value="{{ $categoria->catId }}">{{ $categoria->catNombre }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Marca:</label>
            <select name="prdIdMarca" class="form-control" required>
                <option value="{{$producto->getMarca->marId}}">Seleccione una marca</option>
                @foreach ( $marcas as $marca )
                    @if($producto->getMarca->marNombre == $marca->marNombre)
                        <option value="{{ $marca->marId  }}" selected>{{ $marca->marNombre  }}</option>
                    @else
                        <option value="{{$marca->marId  }}">{{ $marca->marNombre }}</option>
                    @endif
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="prdDescripcion">Descripción:</label>
            <textarea name="prdDescripcion" class="form-control" id="prdDescripcion">{{ $producto->prdDescripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="prdStock">Stock:</label>
            <input type="number" name="prdStock" value="{{ $producto->prdStock }}"class="form-control" id="prdStock" required min="0" step="1">
        </div>

        Imagen: <br>
        <input type="file" name="prdImagen" value="" class="form-control">
        <br>
        <button type="submit" class="btn btn-dark px-4">
            <i class="far fa-plus-square fa-lg mr-2"></i>
            Modificar Producto
        </button>
        <a href="/adminUsuarioProductos" class="btn btn-outline-secondary ml-3">
            volver al panel de productos
        </a>

        @if(count($errors))
            <div class="form-group mt-3">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

    </form>
</div>

@endsection
