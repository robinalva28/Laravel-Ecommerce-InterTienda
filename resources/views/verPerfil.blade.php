@extends('layout.plantilla')

@section('title', "{$usuario->nombre}   ". " $usuario->apellido ")

@section('h1', 'Datos de Usuario')

@section('contenido')
    @if( session()->has('mensaje') )
        <div class="alert alert-success">
            {{ session()->get('mensaje') }}
        </div>
    @endif
{{--    <div class=" col-md-9 mt-1 p-1 mx-auto mx-3 container-fluid">

        <a href="/faq" class="btn btn-link">Preguntas frecuentes</a>
        <a href="/contact" class="btn btn-link">Contactar con InterTienda</a>
    </div>--}}
    <div class="card bg-light col-md-9 mt-1 p-1 mx-auto mx-3">
        <table class="table table-hover table-striped table-border ">
            <thead class="thead-dark">
            <tr class="mr-3">
                <th>Habilitado</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Empresa</th>
                <th>Fecha de nacimiento</th>
                <th>Avatar</th>
                <th colspan="2"></th>
            </tr>
            </thead>
            <tbody>
            <h2><strong>@yield('h1') - {{ $usuario->nombre }} {{ $usuario->apellido }}</strong></h2>
            <br>

            <tr>
                @if($usuario->validado == 1)
                    <td style="color:green;" >Si</td>
                @else
                    <td style="color:red;" >No</td>
                @endif
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->apellido }}</td>
                <td>{{ $usuario->email}}</td>
                <td>{{ $usuario->celular }}</td>

                @if(is_object($usuario->getEmpresa))
                    <td>{{$usuario->getEmpresa->empNombre}}</td>
                @else
                    <td>
                        Sin Empresa
                    </td>
                @endif


                <td>{{ $usuario->fechaNacimiento }}</td>
                <td ><img  src="{{ asset('images/avatares') }}/{{ $usuario->avatar }}" class="img-thumbnail" width="80px" ></td>
                <td>
               {{--     <a href="/formModificarDatos" class="btn btn-outline-secondary">
                        Modificar datos
                    </a>--}}
                </td>
            </tr>
            <tr>
                <td colspan="9">
                <a href="/admin/adminProductos" class="btn btn-outline-dark">Volver</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
