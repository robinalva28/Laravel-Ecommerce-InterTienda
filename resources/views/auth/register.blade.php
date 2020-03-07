@extends('..layout.plantilla')
@section('title', 'Registro')
@section('contenido')

{{--@extends('layouts.app')--}}

{{--@section('content')--}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <strong><div class="card-header">{{ __('Nuevo registro') }}</div></strong>

                <div class="card-body">
                    <form method="POST" action="/register">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('usrNombre') is-invalid @enderror" name="usrNombre" value="{{ old('usrNombre') }}" required autocomplete="name" autofocus>

                                @error('usrNombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" class="form-control @error('usrApellido') is-invalid @enderror" name="usrApellido" value="{{ old('usrApellido') }}" required autocomplete="apellido" autofocus>

                                @error('usrApellido')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="celular" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>

                            <div class="col-md-6">
                                <input id="celular" type="text" class="form-control @error('usrCelular') is-invalid @enderror" name="usrCelular" value="{{ old('usrCelular') }}" required autocomplete="email">

                                @error('usrCelular')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('usrEmail') is-invalid @enderror" name="usrEmail" value="{{ old('usrEmail') }}" required autocomplete="email">

                                @error('usrEmail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fecha_nac" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_nac" type="date" class="form-control @error('usrFechaNacimiento') is-invalid @enderror" name="usrFechaNacimiento" value="{{ old('usrFechaNacimiento') }}" required autocomplete="email">

                                @error('usrFechaNacimiento')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="empresa" class="col-md-4 col-form-label text-md-right">{{ __('Empresa donde trabaja') }}</label>

                            <div class="col-md-6">
                                <input id="empresa" type="text" class="form-control @error('usrEmpresa') is-invalid @enderror" name="usrEmpresa" value="{{ old('usrEmpresa') }}" required autocomplete="email">

                                @error('usrEmpresa')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cuil_empresa" class="col-md-4 col-form-label text-md-right">{{ __('CUIL de la empresa') }}</label>

                            <div class="col-md-6">
                                <input id="cuil_empresa" type="text" class="form-control @error('usrCuil_empresa') is-invalid @enderror" name="usrCuil_empresa" value="{{ old('usrCuil_empresa') }}" required autocomplete="email">

                                @error('usrCuil_empresa')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control @error('usrAvatar') is-invalid @enderror" name="usrAvatar" value="{{ old('usrAvatar') }}" required autocomplete="email">

                                @error('usrAvatar')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('usrPassword') is-invalid @enderror" name="usrPassword" required autocomplete="new-password">

                                @error('usrPassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{--<div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>--}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{--@endsection--}}
