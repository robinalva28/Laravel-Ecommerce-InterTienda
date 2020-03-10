@extends('layout.plantilla')

@section('title', 'Usuarios Registrados')

@section('contenido')



<div class="card bg-light col-md-8 mt-1 p-1 mx-auto mx-3">
    <table class="table table-hover table-striped table-border ">
        <thead class="thead-dark">
        <tr class="mr-3">
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Celular</th>
            <th>Fecha de nacimiento</th>
            <th>Avatar</th>
            <th>Empresa</th>
            <th>CUIL</th>
       {{--     <th colspan="2">
                <a href="/formAgregarProducto" class="btn btn-dark">
                    Nueva publicación
                </a>
            </th>--}}
        </tr>
        </thead>
        <tbody>


        @foreach( $usuario as $detalle )
            <tr>
                <td>{{ $detalle->usrId }}</td>
                <td>{{ $detalle->nombre }}</td>
                <td>{{ $detalle->apellido }}</td>
                <td>{{ $detalle->email}}</td>
                <td>{{ $detalle->celular }}</td>
                <td>{{ $detalle->cui }}</td>
                <td>{{ $detalle->fechaNacimiento }}</td>
                <td>{{ $detalle->fechaNacimiento }}</td>
                <td ><img  src="{{ asset('images/avatares') }}/{{ $detalle->avatar }}" class="img-thumbnail" width="150px" ></td>
                <td>
                    <a href="" class="btn btn-outline-secondary">
                        Modificar
                    </a>
                </td>
                <td>
                    <a href="" class="btn btn-outline-secondary">
                        Eliminar
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
