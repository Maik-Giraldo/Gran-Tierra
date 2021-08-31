@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Crear Empresa de Grupo Demo</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
      <li><a href="{{ url('empresas') }}">Empresas</a></li>
      <li class="active">Grupo Demo</li>
    </ul>
@stop

@section('content')
<div class="col-xs-12">
    <div class="box box-warning">
		<div class="empresa-update box-body">
      <div class="empresa-form">
        <form id="createempresa" action="empresa" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          @if(Session::has('flash_message'))
              <div class="alert alert-success" role="alert">
                  {!! session('flash_message') !!}
                </div>
          <?php session()->forget('flash_message') ?>
          @endif
          <div class="form-group field-empresa-empresa required">
            <label class="control-label" for="empresa-empresa">Empresa</label>
            <input type="text" id="empresa-empresa" class="form-control" name="nombre_empresa" value="" maxlength="255">
            <div class="help-block"></div>
            <input type="hidden" name="id_empresa" value="">
            <input type="hidden" name="campo_ir" value="1">
          </div>
          <div class="form-group field-empresa-nit required">
            <label class="control-label" for="empresa-nit">Nit</label>
            <input type="text" id="empresa-nit" class="form-control" name="nit_empresa" value="" maxlength="60">
            <div class="help-block"></div>
          </div>
          <div class="form-group field-empresa-email required">
            <label class="control-label" for="empresa-email">Nombre Responsable</label>
            <input type="text" id="empresa-email" class="form-control" name="nombre_responsable"  value="">
            <div class="help-block"></div>
          </div>
          <div class="form-group field-empresa-email required">
            <label class="control-label" for="empresa-email">Cargo Responsable</label>
            <input type="text" id="empresa-email" class="form-control" name="cargo_responsable"  value="">
            <div class="help-block"></div>
          </div>
          <div class="form-group field-empresa-email required">
            <label class="control-label" for="empresa-email">Email</label>
            <input type="email" id="empresa-email" class="form-control" name="email_empresa"  value="">
            <div class="help-block"></div>
          </div>
          <div class="form-group field-empresa-email required">
            <label class="control-label" for="empresa-email">Telefono</label>
            <input type="text" id="empresa-email" class="form-control" name="telefono_empresa"  value="">
            <div class="help-block"></div>
          </div>
          <div class="form-group field-empresa-direccion required">
            <label class="control-label" for="empresa-direccion">Dirección</label>
            <input type="text" id="empresa-direccion" class="form-control" name="direccion_empresa" value="" maxlength="255">
            <div class="help-block"></div>
          </div>
          <div class="form-group field-empresa-ciudad required">
            <label class="control-label" for="empresa-ciudad">Ciudad</label>
            <input type="text" id="empresa-ciudad" class="form-control" name="ciudad" value="" maxlength="60">
            <div class="help-block"></div>
          </div>
          <div class="form-group field-empresa-departamento required">
            <label class="control-label" for="empresa-departamento">Departamento</label>
            <input type="text" id="empresa-departamento" class="form-control" name="departamento" value="" maxlength="60">
            <div class="help-block"></div>
          </div>
          <div class="form-group field-empresa-pais required">
            <label class="control-label" for="empresa-pais">País</label>
            <input type="text" id="empresa-pais" class="form-control" name="pais" value="" maxlength="60">
            <div class="help-block"></div>
          </div>
          <div class="form-group field-empresa-anios required">
            <label class="control-label" for="empresa-anios">Años</label>
            <textarea id="empresa-anios" class="form-control" name="anios" rows="6"></textarea>
              <div class="help-block"></div>
          </div>
          <div class="form-group field-empresa-anios required">
            <label class="control-label" for="empresa-anios">Ciudades (para certificados)</label>
            <textarea id="empresa-anios" class="form-control" name="ciudades" rows="20"></textarea>
              <div class="help-block"></div>
          </div>
          <label>Logotipo</label>
          <input id="logotipo-id" name="logotipo" type="file" class="file" data-preview-file-type="image"> <br>
          <label>Logotipo color</label>
            <input id="logotipo_color-id" name="logotipo_color" type="file" class="file" data-preview-file-type="image"> <br>
              <label>Imagen firma</label>
              <input id="imagen_firma-id" name="imagen_firma" type="file" class="file" data-preview-file-type="image"> <br>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Crear</button>
        </div>
          </form>
        </div>
      		</div>
        </div>
      </div>
@stop
