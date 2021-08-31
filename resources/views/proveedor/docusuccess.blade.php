@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Documento soporte de adquisiciones efectuadas a no obligados a facturar</h1>
    <ul class="breadcrumb">
    <li><a href="home">Inicio</a></li>
    <li><a href="../proveedores">Proveedores</a></li>
    <li class="active">Documento Soporte</li>
    </ul>
@stop

@section('content')
@foreach ($dataprv as $proveedor)
<!-- <div style="padding: 20px 30px; background: rgb(243, 156, 18); z-index: 999999; font-size: 16px; font-weight: 600;">
    <a href="/user-management/user/create" style="color: rgba(255, 255, 255, 0.9); display: inline-block; margin-right: 10px; text-decoration: none;">Este proveedor no tiene un usuario creado</a>
    <a class="btn btn-default btn-sm" href="/user-management/user/create" style="margin-top: -5px; border: 0px; box-shadow: none; color: rgb(243, 156, 18); font-weight: 600; background: rgb(255, 255, 255);">Crear usuario!</a>
</div> -->

<div class="proveedor-update">
<div class="box box-default">
<div class="box-header with-border">
  <div class="alert alert-success" role="alert">
      Solicitud de Documento de Soporte Generada Exitosamente!
    </div>
<h3 class="box-title">Fecha de Generación: <?php echo date('d/m/Y'); ?></h3>
</div>
<!-- /.box-header -->
<div class="row">
    <div class="col-xs-12">
        <form id="registprov" action="soldocusoporte" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false" style="font-weight:bold; color:#3c8dbc;">Datos del Vendedor</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
    @if(Session::has('flash_message'))
        <div class="alert alert-success" role="alert">
            {!! session('flash_message') !!}
          </div>
    <?php session()->forget('flash_message') ?>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-nombre_razon_social required">
<label class="control-label" for="proveedor-nombre_razon_social">Nombres y Apellidos o Razón Social</label>
<input type="text" id="proveedor-nombre_razon_social" class="form-control" name="nombre_razon_social" value="{{$proveedor->nombre_razon_social}}" maxlength="255">
<input type="hidden" id="id" class="form-control" name="id" value="{{$proveedor->id}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <div class="form-group field-proveedor-numero_nit_cc required">
<label class="control-label" for="proveedor-numero_nit_cc">C.C. o NIT.</label>
<input type="text" id="proveedor-numero_nit_cc" class="form-control" name="numero_nit_cc" value="{{$proveedor->numero_nit_cc}}">

<div class="help-block"></div>
</div>                            </div>
                </div>
                 <div class="col-md-3">
                    <div class="form-group">
                        <div class="form-group field-proveedor-digito_verificacion required">
<label class="control-label" for="proveedor-digito_verificacion">Dígito Ver.</label>
<select id="proveedor-digito_verificacion" class="form-control" name="digito_verificacion">
<option value="">Seleccione ...</option>
<option value="{{$proveedor->digito_verificacion}}" selected>{{$proveedor->digito_verificacion}}</option>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
</select>

<div class="help-block"></div>
</div>                            </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false" style="font-weight:bold; color:#3c8dbc;">Datos del Adquiriente</a></li>
    </ul>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                 <div class="form-group field-proveedor-nombre_comercial required">
<label class="control-label" for="proveedor-nombre_comercial">Razón Social</label>
<input type="text" id="proveedor-nombre_comercial" class="form-control" name="nombre_comercial" readonly value="ACTITUD DIGITAL" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-matricula_mercantil required">
<label class="control-label" for="proveedor-matricula_mercantil">Nit</label>
<input type="text" id="proveedor-matricula_mercantil" class="form-control" readonly name="matricula_mercantil" value="9005216547-1" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false" style="font-weight:bold; color:#3c8dbc;">Descripción de la Operación</a></li>
    </ul>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="comment">Descripcion de Bienes o Servicios Prestados:</label>
          <textarea class="form-control" rows="5" id="comment" required>{{$bienes}}</textarea>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                 <div class="form-group field-proveedor-direccion required">
<label class="control-label" for="proveedor-direccion">Consecutivo DIAN</label>
<input type="text" id="proveedor-direccion" class="form-control" name="direccion" readonly value="CNC-1" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-ciudad required">
<label class="control-label" for="proveedor-ciudad">Valor total de la Operación</label>
<input type="text" id="proveedor-ciudad" required class="form-control" name="valor_total" value="$ {{$valor_total}}" maxlength="60">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>
                </div>
            </div>
        <!-- /.tab-pane -->
            <!-- <div class="form-group">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" style="display: inline;" href="/actualizar-mis-datos">Descartar</a>
            </div>
        </form>  -->
    </div>
            <!--<div class="form-group">
                <button type="button" class="btn btn-lg btn-success center-block">Generar Documento Soporte</button>
            </div>-->
        </form>
            <!-- /.tab-content -->
    </div>
</div>
</div>
</div>
@endforeach
@stop
