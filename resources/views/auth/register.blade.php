@extends('adminlte::pageregister')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Registro</h1>
    <ul class="breadcrumb">
    <li class="active">Formulario de Registro</li>
    </ul>
@stop
@section('content')
<div class="box box-warning">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Register') }}</div> -->

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <br>
                        <div class="form-group row">
                            <label for="empresa" class="col-md-4 col-form-label text-md-right">Nombre o Razón Social*</label>

                            <div class="col-md-6">
                                <input id="empresa" type="text" class="form-control{{ $errors->has('empresa') ? ' is-invalid' : '' }}" name="empresa" value="{{ old('empresa') }}" required autofocus>

                                @if ($errors->has('empresa'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('empresa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre de Contacto*</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Tipo*</label>
                            <div class="col-md-6">
                            <select class="form-control" id="tipo_persona" name="tipo_persona" required>
                               <option value="">Seleccione...</option>
                               <option value="Proveedor">Proveedor</option>
                               <option value="Accionista">Accionista</option>
                               <option value="Cliente">Cliente</option>
                             </select>
                         </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Número de Identificación Tributaria (NIT)*</label>

                            <div class="col-md-6">
                                <input id="Nit" type="number" class="form-control{{ $errors->has('Nit') ? ' is-invalid' : '' }}" name="Nit" value="{{ old('Nit') }}" required autofocus>

                                @if ($errors->has('Nit'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Nit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}*</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Teléfono*</label>

                            <div class="col-md-6">
                                <input id="Tel" type="text" class="form-control{{ $errors->has('Tel') ? ' is-invalid' : '' }}" name="Tel" value="{{ old('Tel') }}" required autofocus>

                                @if ($errors->has('Tel'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Tel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">País de Residencia Fiscal*</label>

                            <div class="col-md-6">
                                <input id="Direccion" type="text" class="form-control{{ $errors->has('pais') ? ' is-invalid' : '' }}" name="pais" value="{{ old('pais') }}" required autofocus>

                                @if ($errors->has('pais'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pais') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Ciudad*</label>

                            <div class="col-md-6">
                                <input id="Tel" type="text" class="form-control{{ $errors->has('Ciudad') ? ' is-invalid' : '' }}" name="Ciudad" value="{{ old('Ciudad') }}" required autofocus>

                                @if ($errors->has('Tel'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Ciudad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Dirección*</label>

                            <div class="col-md-6">
                                <input id="Direccion" type="text" class="form-control{{ $errors->has('Ciudad') ? ' is-invalid' : '' }}" name="Direccion" value="{{ old('Direccion') }}" required autofocus>

                                @if ($errors->has('Direccion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Código Ciiu*</label>

                            <div class="col-md-6">
                                <input id="Direccion" type="text" class="form-control{{ $errors->has('ciiu') ? ' is-invalid' : '' }}" name="ciiu" value="{{ old('ciiu') }}" required autofocus>

                                @if ($errors->has('ciiu'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ciiu') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}*</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}*</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <p style="text-align: right;">Todos los campos marcados con * son obligatorios.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</div>
</div>
@endsection
