@extends('layout.plantilla')

@section('title', 'Mi cuenta')

@section('h1', 'Mi cuenta')

@section('contenido')
    @if( session()->has('mensaje') )
        <div class="alert alert-success">
            {{ session()->get('mensaje') }}
        </div>
    @endif
    <div class=" col-md-9 mt-1 p-1 mx-auto mx-3 container-fluid">

        <a href="/faq" class="btn btn-link">Preguntas frecuentes</a>
        <a href="/contact" class="btn btn-link">Contactar con InterTienda</a>
    </div>
<div class="card bg-light col-md-9 mt-1 p-1 mx-auto mx-3">
    <table role="table" class="table  table-hover table-striped table-borderless mx-auto mt-1 p-1 col-md-12 ">
    <thead class="thead-dark">
        <tr class="mr-3">
               <th role="columnheader" >Habilitado</th>
               <th role="columnheader" >Nombre</th>
               <th role="columnheader" >Apellido</th>
               <th role="columnheader" >Email</th>
               <th role="columnheader" >Celular</th>
               <th role="columnheader" >Empresa</th>
               <th role="columnheader" >Fecha de nacimiento</th>
               <th role="columnheader" >Avatar</th>
            <th role="columnheader" colspan="2"></th>


        </tr>
        </thead>
        <tbody>
        <h2><strong>@yield('h1') - {{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</strong></h2>
        <br>

            <tr>
                @if(auth()->user()->validado == 1)
                    <td class="tdhabilitado tabla-valor" style="color:green;" >Si</td>
                @else
                    <td class="tdhabilitado tabla-valor" style="color:red;" >No</td>
                @endif
                <td role="cell" class="tdnombre tabla-valor"><p>{{ auth()->user()->nombre }}</p></td>
                    <td role="cell" class="tdapellido tabla-valor"><p>{{ auth()->user()->apellido }}</p></td>
                    <td role="cell" class="tdemail tabla-valor"><p>{{ auth()->user()->email}}</p></td>
                    <td role="cell" class="tdcelular tabla-valor"><p>{{ auth()->user()->celular }}</p></td>

                    @if(is_object(auth()->user()->getEmpresa))
                        <td role="cell" class="tdempresa tabla-valor"><p>{{auth()->user()->getEmpresa->empNombre}}</p></td>
                    @else
                           <td role="cell" class="tdempresa tabla-valor"><p>
                           Sin Empresa
                               </p></td>
                    @endif


                    <td role="cell" class="tdnacimiento tabla-valor"><p>{{ auth()->user()->fechaNacimiento }}</p></td>
                    <p ><img  src="{{ asset('images/avatares') }}/{{ auth()->user()->avatar }}" class="img-thumbnail" width="80px" >
                    </td>
                       <td role="cell" class=" tabla-valor"><p>
                        <a href="/formModificarDatos" class="btn btn-outline-secondary">
                            Modificar datos
                        </a>
                           </p></td>
            </tr>

        </tbody>
    </table>
</div>
@endsection
