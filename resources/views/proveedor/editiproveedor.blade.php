@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Ver Proveedor : {{$razon_social}}</h1>
    <ul class="breadcrumb">
    <li><a href="home">Inicio</a></li>
    <li><a href="../proveedores">Proveedores</a></li>
    <li class="active">Ver Proveedor: {{$razon_social}}</li>
    </ul>
@stop

@section('content')
@foreach ($dataprv as $proveedor)
<!-- <div style="padding: 20px 30px; background: rgb(243, 156, 18); z-index: 999999; font-size: 16px; font-weight: 600;">
    <a href="/user-management/user/create" style="color: rgba(255, 255, 255, 0.9); display: inline-block; margin-right: 10px; text-decoration: none;">Este proveedor no tiene un usuario creado</a>
    <a class="btn btn-default btn-sm" href="/user-management/user/create" style="margin-top: -5px; border: 0px; box-shadow: none; color: rgb(243, 156, 18); font-weight: 600; background: rgb(255, 255, 255);">Crear usuario!</a>
</div> -->
<div class="row">
    <div class="col-xs-12">
        <form id="registprov" action="../actualizarmisdatos" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">   
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Información proveedor</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Info. empresa</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Info. bancaria</a></li>
                <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Ref. Comercial</a></li>
                <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Ref. Personales</a></li>
                <li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="false">Negociación</a></li>
                <li class=""><a href="#tab_7" data-toggle="tab" aria-expanded="false">Documentación</a></li>
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
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">

    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <div class="form-group field-proveedor-tipo required">
<label class="control-label" for="proveedor-tipo">Tipo de persona</label>
<select id="proveedor-tipo" class="form-control" name="tipo">
<option value="">Seleccione ...</option>
<option value="{{$proveedor->nombre_comercial}}" selected>{{$proveedor->tipo}}</option>
<option value="Persona Natural">Persona Natural</option>
<option value="Persona Jurídica">Persona Jurídica</option>
<option value="Otra">Otra</option>
</select>

<div class="help-block"></div>
</div>                            </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-group field-proveedor-otro_tipo">
<label class="control-label" for="proveedor-otro_tipo">Otra Cuál?</label>
<input type="text" id="proveedor-otro_tipo" class="form-control" name="otro_tipo" value="{{$proveedor->otro_tipo}}" maxlength="255">

<div class="help-block"></div>
</div>                            </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-regimen_iva required">
<label class="control-label" for="proveedor-regimen_iva">Régimen Iva</label>
<select id="proveedor-regimen_iva" class="form-control" name="regimen_iva">
<option value="">Seleccione ...</option>
<option value="{{$proveedor->regimen_iva}}" selected>{{$proveedor->regimen_iva}}</option>
<option value="Común" selected>Común</option>
<option value="Simplificado">Simplificado</option>
<option value="No responsable">No responsable</option>
</select>

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-regimen_renta required">
<label class="control-label" for="proveedor-regimen_renta">Régimen Renta</label>
<select id="proveedor-regimen_renta" class="form-control" name="regimen_renta">
<option value="">Seleccione ...</option>
<option value="{{$proveedor->regimen_iva}}" selected>{{$proveedor->regimen_iva}}</option>
<option value="Contribuyente" selected>Contribuyente</option>
<option value="No contribuyente">No contribuyente</option>
<option value="Régimen especial">Régimen especial</option>
<option value="Gran contribuyente">Gran contribuyente</option>
<option value="Autorretenedor">Autorretenedor</option>
</select>

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-autoretenedor_renta required">
<label class="control-label" for="proveedor-autoretenedor_renta">Autoretenedor Renta</label>
<select id="proveedor-autoretenedor_renta" class="form-control" name="autoretenedor_renta">
<option value="">Seleccione ...</option>
<option value="{{$proveedor->autoretenedor_renta}}" selected>{{$proveedor->autoretenedor_renta}}</option>
<option value="Si">Si</option>
<option value="No">No</option>
</select>

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-actividad_economica required">
<label class="control-label" for="proveedor-actividad_economica">Actividad Económica</label>
<input type="text" id="proveedor-actividad_economica" class="form-control" name="actividad_economica" value="{{$proveedor->actividad_economica}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-codigo_ciiu required">
<label class="control-label" for="proveedor-codigo_ciiu">Código Ciiu</label>
<input type="text" id="proveedor-codigo_ciiu" class="form-control" name="codigo_ciiu" value="{{$proveedor->codigo_ciiu}}">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-entidad_financiera required">
<label class="control-label" for="proveedor-entidad_financiera">Entidad Financiera</label>
<input type="text" id="proveedor-entidad_financiera" class="form-control" name="entidad_financiera" value="{{$proveedor->entidad_financiera}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-ef_direccion required">
<label class="control-label" for="proveedor-ef_direccion">Dirección</label>
<input type="text" id="proveedor-ef_direccion" class="form-control" name="ef_direccion" value="{{$proveedor->ef_direccion}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-ef_telefono required">
<label class="control-label" for="proveedor-ef_telefono">Teléfono</label>
<input type="text" id="proveedor-ef_telefono" class="form-control" name="ef_telefono" value="{{$proveedor->ef_telefono}}" maxlength="60">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-ef_tipo_cuenta required">
<label class="control-label" for="proveedor-ef_tipo_cuenta">Tipo de cuenta</label>
<select id="proveedor-ef_tipo_cuenta" class="form-control" name="ef_tipo_cuenta">
<option value="">Seleccione ...</option>
<option value="{{$proveedor->ef_tipo_cuenta}}" selected>{{$proveedor->ef_tipo_cuenta}}</option>
<option value="Ahorros" selected>Ahorros</option>
<option value="Cuenta corriente">Cuenta corriente</option>
</select>

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-ef_cuenta required">
<label class="control-label" for="proveedor-ef_cuenta">No. de cuenta</label>
<input type="text" id="proveedor-ef_cuenta" class="form-control" name="ef_cuenta" value="{{$proveedor->ef_cuenta}}" maxlength="60">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-ef_titular required">
<label class="control-label" for="proveedor-ef_titular">Titular</label>
<input type="text" id="proveedor-ef_titular" class="form-control" name="ef_titular" value="{{$proveedor->ef_titular}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_4">

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-rc_nombre1 required">
<label class="control-label" for="proveedor-rc_nombre1">Nombre</label>
<input type="text" id="proveedor-rc_nombre1" class="form-control" name="rc_nombre1" value="{{$proveedor->rc_nombre1}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-rc_contacto1 required">
<label class="control-label" for="proveedor-rc_contacto1">Contacto</label>
<input type="text" id="proveedor-rc_contacto1" class="form-control" name="rc_contacto1" value="{{$proveedor->rc_contacto1}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-rc_direccion1 required">
<label class="control-label" for="proveedor-rc_direccion1">Dirección</label>
<input type="text" id="proveedor-rc_direccion1" class="form-control" name="rc_direccion1" value="{{$proveedor->rc_direccion1}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-rc_telefono1 required">
<label class="control-label" for="proveedor-rc_telefono1">Teléfono</label>
<input type="text" id="proveedor-rc_telefono1" class="form-control" name="rc_telefono1" value="{{$proveedor->rc_telefono1}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-rc_nombre2 required">
<label class="control-label" for="proveedor-rc_nombre2">Nombre</label>
<input type="text" id="proveedor-rc_nombre2" class="form-control" name="rc_nombre2" value="{{$proveedor->rc_nombre2}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-rc_contacto2 required">
<label class="control-label" for="proveedor-rc_contacto2">Contacto</label>
<input type="text" id="proveedor-rc_contacto2" class="form-control" name="rc_contacto2" value="{{$proveedor->rc_contacto2}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-rc_direccion2 required">
<label class="control-label" for="proveedor-rc_direccion2">Dirección</label>
<input type="text" id="proveedor-rc_direccion2" class="form-control" name="rc_direccion2" value="{{$proveedor->rc_direccion2}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-rc_telefono2 required">
<label class="control-label" for="proveedor-rc_telefono2">Teléfono</label>
<input type="text" id="proveedor-rc_telefono2" class="form-control" name="rc_telefono2" value="{{$proveedor->rc_telefono2}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_5">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-rp_nombre1">
<label class="control-label" for="proveedor-rp_nombre1">Nombre</label>
<input type="text" id="proveedor-rp_nombre1" class="form-control" name="rp_nombre1" value="{{$proveedor->rp_nombre1}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-rp_contacto1">
<label class="control-label" for="proveedor-rp_contacto1">Contacto</label>
<input type="text" id="proveedor-rp_contacto1" class="form-control" name="rp_contacto1" value="{{$proveedor->rp_contacto1}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-rp_direccion1">
<label class="control-label" for="proveedor-rp_direccion1">Dirección</label>
<input type="text" id="proveedor-rp_direccion1" class="form-control" name="rp_direccion1" value="{{$proveedor->rp_direccion1}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-rp_telefono1">
<label class="control-label" for="proveedor-rp_telefono1">Teléfono</label>
<input type="text" id="proveedor-rp_telefono1" class="form-control" name="rp_telefono1" value="{{$proveedor->rp_telefono1}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-rp_nombre2">
<label class="control-label" for="proveedor-rp_nombre2">Nombre</label>
<input type="text" id="proveedor-rp_nombre2" class="form-control" name="rp_nombre2" value="{{$proveedor->rp_nombre2}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-rp_contacto2">
<label class="control-label" for="proveedor-rp_contacto2">Contacto</label>
<input type="text" id="proveedor-rp_contacto2" class="form-control" name="rp_contacto2" value="{{$proveedor->rp_contacto2}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-rp_direccion2">
<label class="control-label" for="proveedor-rp_direccion2">Dirección</label>
<input type="text" id="proveedor-rp_direccion2" class="form-control" name="rp_direccion2" value="{{$proveedor->rp_direccion2}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-rp_telefono2">
<label class="control-label" for="proveedor-rp_telefono2">Teléfono</label>
<input type="text" id="proveedor-rp_telefono2" class="form-control" name="rp_telefono2" value="{{$proveedor->rp_telefono2}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_6">
                    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-nc_condiciones_pago required">
<label class="control-label" for="proveedor-nc_condiciones_pago">Condiciones de pago</label>
<select id="proveedor-nc_condiciones_pago" class="form-control" name="nc_condiciones_pago">
<option value="">Seleccione ...</option>
<option value="Consignación" selected>Consignación</option>
<option value="Transferencia electrónica">Transferencia electrónica</option>
<option value="Transportadora">Transportadora</option>
<option value="Cheque">Cheque</option>
</select>

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-nc_tiempo_pago required">
<label class="control-label" for="proveedor-nc_tiempo_pago">Pago en</label>
<select id="proveedor-nc_tiempo_pago" class="form-control" name="nc_tiempo_pago">
<option value="">Seleccione ...</option>
<option value="{{$proveedor->nc_tiempo_pago}}" selected>{{$proveedor->nc_tiempo_pago}}</option>
<option value="8 días">8 días</option>
<option value="15 días">15 días</option>
<option value="30 días">30 días</option>
<option value="45 días">45 días</option>
<option value="Otro">Otro</option>
</select>

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-nc_tiempo_pago_otro">
<label class="control-label" for="proveedor-nc_tiempo_pago_otro">Otro</label>
<input type="text" id="proveedor-nc_tiempo_pago_otro" class="form-control" name="nc_tiempo_pago_otro" value="{{$proveedor->nc_tiempo_pago_otro}}" maxlength="60">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-nc_tiempo_pago_obs">
<label class="control-label" for="proveedor-nc_tiempo_pago_obs">Observación</label>
<input type="text" id="proveedor-nc_tiempo_pago_obs" class="form-control" name="nc_tiempo_pago_obs" value="{{$proveedor->nc_tiempo_pago_obs}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-nc_descuento_financiero required">
<label class="control-label" for="proveedor-nc_descuento_financiero">Descuento financiero</label>
<input type="text" id="proveedor-nc_descuento_financiero" class="form-control" name="nc_descuento_financiero" value="{{$proveedor->nc_descuento_financiero}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-nc_pie_factura required">
<label class="control-label" for="proveedor-nc_pie_factura">Pie factura</label>
<input type="text" id="proveedor-nc_pie_factura" class="form-control" name="nc_pie_factura" value="{{$proveedor->nc_pie_factura}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>

     <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-nc_persona_autorizada_pagos required">
<label class="control-label" for="proveedor-nc_persona_autorizada_pagos">Persona autorizada para recoger pagos</label>
<input type="text" id="proveedor-nc_persona_autorizada_pagos" class="form-control" name="nc_persona_autorizada_pagos" value="{{$proveedor->nc_persona_autorizada_pagos}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-nc_persona_autorizada_pagos_cc required">
<label class="control-label" for="proveedor-nc_persona_autorizada_pagos_cc">C.C.</label>
<input type="text" id="proveedor-nc_persona_autorizada_pagos_cc" class="form-control" name="nc_persona_autorizada_pagos_cc" value="{{$proveedor->nc_persona_autorizada_pagos_cc}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-nc_seccion required">
<label class="control-label" for="proveedor-nc_seccion">Sección</label>
<input type="text" id="proveedor-nc_seccion" class="form-control" name="nc_seccion" value="{{$proveedor->nc_seccion}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-nc_responsable_negociacion required">
<label class="control-label" for="proveedor-nc_responsable_negociacion">Responsable negociación</label>
<input type="text" id="proveedor-nc_responsable_negociacion" class="form-control" name="nc_responsable_negociacion" value="{{$proveedor->nc_responsable_negociacion}}" maxlength="255">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_7">
                    <div class="row">
      <div class="col-md-12">
          <div class="form-group">
              <div class="form-group field-proveedor-doc_rut required">
<label class="control-label" for="proveedor-doc_rut">Certificado de Registro Único Tributario (RUT)</label>
<input id="doc_rut-id" name="doc_rut" type="file" class="file" data-preview-file-type="pdf"> <br>
<div class="help-block"></div>
</div>                    </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-12">
          <div class="form-group">
              <div class="form-group field-proveedor-doc_certificado_existencia_representacion required">
<label class="control-label" for="proveedor-doc_certificado_existencia_representacion">Certificados de Existencia y Representación menor a 30 días</label>
<input id="doc_certificado_existencia_representacion-id" name="doc_certificado_existencia_representacion" type="file" class="file" data-preview-file-type="pdf"> <br>
<div class="help-block"></div>
</div>                    </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-12">
          <div class="form-group">
              <div class="form-group field-proveedor-doc_certificacion_bancaria required">
<label class="control-label" for="proveedor-doc_certificacion_bancaria">Certificación Bancaria</label>
<input id="doc_certificacion_bancaria-id" name="doc_certificacion_bancaria" type="file" class="file" data-preview-file-type="pdf"> <br>

<div class="help-block"></div>
</div>                    </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-12">
          <div class="form-group">
              <div class="form-group field-proveedor-doc_cedula_rep_legal required">
<label class="control-label" for="proveedor-doc_cedula_rep_legal">Fotocopia Cédula Reprentante Legal</label>
<input id="doc_cedula_rep_legal-id" name="doc_cedula_rep_legal" type="file" class="file" data-preview-file-type="pdf"> <br>

<div class="help-block"></div>
</div>                    </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-12">
          <div class="form-group">
              <div class="form-group field-proveedor-doc_referencia_comercial_1 required">
<label class="control-label" for="proveedor-doc_referencia_comercial_1">Referencia Comercial No. 1</label>
<input id="doc_referencia_comercial_1-id" name="doc_referencia_comercial_1" type="file" class="file" data-preview-file-type="pdf"> <br>

<div class="help-block"></div>
</div>                    </div>
      </div>
    </div>


                <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <div class="form-group field-proveedor-persona_autoriza">
<label class="control-label" for="proveedor-persona_autoriza">Persona Autorizada por Demo</label>
<input type="text" id="proveedor-persona_autoriza" class="form-control" name="persona_autoriza" value="{{$proveedor->persona_autoriza}}" maxlength="60">

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
        <div class="form-group">
                <button type="submit" class="btn btn-success">Guardar</button> 
                <a class="btn btn-primary" style="display: inline;" href="/actualizar-mis-datos">Descartar</a> 
            </div>
        </form>        
            <!-- /.tab-content -->
    </div>
</div>
@endforeach
@stop
