@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Editar Provedor</h1>
    <ul class="breadcrumb"><li><a href="/">Inicio</a></li>
      <li><a href="../proveedores">Proveedores</a></li>
    <li class="active">Editar Provedor</li>
    </ul>
@stop

@section('content')
@foreach ($dataprv as $proveedor)
<div class="proveedor-update">
<div class="box box-default">
<div class="box-header with-border">
<h3 class="box-title">Información proveedor</h3>
</div>
<!-- /.box-header -->
<div class="row">
    <div class="col-xs-12">
        <form id="registprov" action="../updateprvdr" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Información proveedor</a></li>
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
<label class="control-label" for="proveedor-nombre_razon_social">Nombre Razón Social</label>
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

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                 <div class="form-group field-proveedor-nombre_comercial required">
<label class="control-label" for="proveedor-nombre_comercial">Nombre Comercial</label>
<input type="text" id="proveedor-nombre_comercial" class="form-control" name="nombre_comercial" value="{{$proveedor->nombre_comercial}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-matricula_mercantil required">
<label class="control-label" for="proveedor-matricula_mercantil">Matrícula Mercantil</label>
<input type="text" id="proveedor-matricula_mercantil" class="form-control" name="matricula_mercantil" value="{{$proveedor->matricula_mercantil}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                 <div class="form-group field-proveedor-direccion required">
<label class="control-label" for="proveedor-direccion">Dirección</label>
<input type="text" id="proveedor-direccion" class="form-control" name="direccion" value="{{$proveedor->direccion}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-ciudad required">
<label class="control-label" for="proveedor-ciudad">Ciudad</label>
<input type="text" id="proveedor-ciudad" class="form-control" name="ciudad" value="{{$proveedor->ciudad}}" maxlength="60">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                 <div class="form-group field-proveedor-departamento required">
<label class="control-label" for="proveedor-departamento">Departamento</label>
<input type="text" id="proveedor-departamento" class="form-control" name="departamento" value="{{$proveedor->departamento}}" maxlength="60">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-telefono required">
<label class="control-label" for="proveedor-telefono">Télefono</label>
<input type="text" id="proveedor-telefono" class="form-control" name="telefono" value="{{$proveedor->telefono}}" maxlength="60">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                 <div class="form-group field-proveedor-celular required">
<label class="control-label" for="proveedor-celular">Celular</label>
<input type="text" id="proveedor-celular" class="form-control" name="celular" value="{{$proveedor->celular}}" maxlength="60">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="form-group field-proveedor-fax required">
<label class="control-label" for="proveedor-fax">Fax</label>
<input type="text" id="proveedor-fax" class="form-control" name="fax" value="{{$proveedor->fax}}" maxlength="60">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="form-group field-proveedor-email required">
<label class="control-label" for="proveedor-email">Email</label>
<input type="text" id="proveedor-email" class="form-control" name="email" value="{{$proveedor->email}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-representante_legal required">
<label class="control-label" for="proveedor-representante_legal">Representante Legal</label>
<input type="text" id="proveedor-representante_legal" class="form-control" name="representante_legal" value="{{$proveedor->representante_legal}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-documento_representante_legal required">
<label class="control-label" for="proveedor-documento_representante_legal">C.C.</label>
<input type="text" id="proveedor-documento_representante_legal" class="form-control" name="documento_representante_legal" value="{{$proveedor->documento_representante_legal}}">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-contacto_pedidos required">
<label class="control-label" for="proveedor-contacto_pedidos">Persona de Contacto (Pedidos)</label>
<input type="text" id="proveedor-contacto_pedidos" class="form-control" name="contacto_pedidos" value="{{$proveedor->contacto_pedidos}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-cp_telefono required">
<label class="control-label" for="proveedor-cp_telefono">Teléfono</label>
<input type="text" id="proveedor-cp_telefono" class="form-control" name="cp_telefono" value="{{$proveedor->cp_telefono}}">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-contacto_contabilidad_cartera required">
<label class="control-label" for="proveedor-contacto_contabilidad_cartera">Persona de Contacto (Cont./Cart.)</label>
<input type="text" id="proveedor-contacto_contabilidad_cartera" class="form-control" name="contacto_contabilidad_cartera" value="{{$proveedor->contacto_contabilidad_cartera}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-cp_telefon2 required">
                    <label class="control-label" for="proveedor-cp_telefon2">Teléfono</label>
                    <input type="text" id="proveedor-cp_telefon2" class="form-control" name="cp_telefon2" value="{{$proveedor->cp_telefon2}}">
                    <div class="help-block">
                    </div>
                </div>
            </div>
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
        <div class="form-group">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" style="display: inline;" href="/actualizar-mis-datos">Descartar</a>
            </div>
        </form>
            <!-- /.tab-content -->
    </div>
</div>
</div>
</div>
@endforeach
@stop
