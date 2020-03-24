@extends('layout.plantilla')

@section('title', 'Usuarios Registrados')

@section('contenido')



<div class="card bg-light col-md-10 mt-1 p-1 mx-auto mx-3">
    <table class="table table-hover table-striped table-border ">
        <thead class="thead-dark">
        <tr class="mr-3">
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Empresa
            <th>CUIL</th>
            <th>Celular</th>
         {{--   <th>Avatar</th>--}}
            <th>Fecha de nacimiento</th>

            <th colspan="2">Validado</th>

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
                <td>empresa</td>
                <td>{{ $detalle->cuilEmpresa}}</td>
                <td>{{ $detalle->celular }}</td>

               {{-- <td ><img  src="{{ asset('images/avatares') }}/{{ $detalle->avatar }}" class="img-thumbnail" width="150px" ></td>--}}
               {{-- <td>{{ $detalle->usrIdEmpresa->empNombre }}</td>
                <td>{{ $detalle->usrIdEmpresa->empCuil }}</td>--}}
                <td>{{ $detalle->fechaNacimiento }}</td>
                @if($detalle->validado == 1)
                <td style="color:green;" >Habilitado</td>
                    <td>
                        <a href="/admin/inhabilitarUsuario/{{$detalle->usrId}}" onclick="return confirm('¿Inhabilitar usuario?')" class="btn btn-outline-secondary">
                            Inhabilitar
                        </a>
                    </td>
                    @elseif($detalle->isAdmin == 1)
                    <td style="color:blue;" >Administrador</td>
                    <td></td>
                @else
                <td style="color:red;" >No Habilitado</td>
                <td>
                    <a href="/admin/habilitarUsuario/{{$detalle->usrId}}" onclick="return confirm('¿Validar usuario?')" class="btn btn-outline-secondary">
                        Habilitar
                    </a>
                </td>
                @endif
              {{--  <td>
                    <a href="" class="btn btn-outline-secondary">
                        Eliminar
                    </a>
                </td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
