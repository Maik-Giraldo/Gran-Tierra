@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Crear Proveedor</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
      <li><a href="proveedores">Proveedores</a></li>
    <li class="active">Crear Proveedor</li>
    </ul>
@stop

@section('content')
<div class="proveedor-create">
<div class="box box-default">
<div class="box-header with-border">
<h3 class="box-title">Documentos de compra</h3>
</div>
<!-- /.box-header -->
<div class="box-body">

<form id="registprov" action="proveedor-create" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
@if(Session::has('flash_message'))
    <div class="alert alert-success" role="alert">
        {!! session('flash_message') !!}
      </div>
<?php session()->forget('flash_message') ?>
@endif


    <div class="row">
        <div class="box-header with-border">
            <h3 class="box-title">Adjuntar documentación</h3>
        </div><br/>
    </div>

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
                <div class="form-group field-proveedor-doc_referencia_comercial_2 required">
<label class="control-label" for="proveedor-doc_referencia_comercial_2">Autorización Política Tratamiento de datos</label>
<input id="doc_referencia_comercial_2-id" name="doc_referencia_comercial_2" type="file" class="file" data-preview-file-type="pdf"> <br>

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>


                <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <div class="form-group field-proveedor-persona_autoriza">
<label class="control-label" for="proveedor-persona_autoriza">Persona Autorizada por Avon</label>
<input type="text" id="proveedor-persona_autoriza" class="form-control" name="persona_autoriza" maxlength="60">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <div class="form-group field-proveedor-estado">
<label class="control-label" for="proveedor-estado">Estado</label>
<select id="proveedor-estado" class="form-control" name="estado">
<option value=""></option>
<option value="Sin revisar">Sin revisar</option>
<option value="Aprobado">Aprobado</option>
<option value="En proceso">En proceso</option>
<option value="Declinado">Declinado</option>
</select>

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Enviar información</button>            </div>

    </form>
</div>
</div>
</div>
@stop
