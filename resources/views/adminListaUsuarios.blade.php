@extends('layout.plantilla')

@section('title', 'Usuarios Registrados')

@section('contenido')

    {{-- mensajes de ok --}}
    @if( session()->has('mensaje') )
        <div class="alert alert-success">
            {{ session()->get('mensaje') }}
        </div>
    @endif

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

                @if(is_object($detalle->getEmpresa))
                <td>{{$detalle->getEmpresa->empNombre}}</td>
                @else
                <td>
                    <a href="/admin/asignarEmpresa/{{$detalle->usrId}}" onclick="return confirm('¿Asignar Empresa?')" class="btn btn-outline-secondary">
                        Asignar
                    </a>
                    </td>
                @endif

                <td>{{ $detalle->cuilEmpresa}}</td>
                <td>{{ $detalle->celular }}</td>

                <td>{{ $detalle->fechaNacimiento }}</td>

                @if($detalle->isAdmin == 1)
                    <td style="color:blue;" >Administrador</td>
                    <td></td>

                    @elseif($detalle->validado == 1)
                    <td style="color:green;" >Habilitado</td>
                    <td>
                        <a href="/admin/inhabilitarUsuario/{{$detalle->usrId}}" onclick="return confirm('¿Inhabilitar usuario?')" class="btn btn-outline-secondary">
                            Inhabilitar
                        </a>
                    </td>

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
