@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Crear registro de RTF</h1>
    <ul class="breadcrumb">
    <li><a href="home">Inicio</a></li>
    <li><a href="rtf-index">RTF</a></li>
    <li class="active">Crear registro de RTF</li>
    </ul>
@stop
@section('content')
<div class="col-xs-12">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-pencil"></i> Formulario para agregar items</h3>
    </div>
    <div class="iva-create box-body">
      <div class="iva-form">
        <form id="updateonertf" name="updateonertf" action="rtf-create" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @if(Session::has('flash_message'))
                <div class="alert alert-success" role="alert">
                    {!! session('flash_message') !!}
                  </div>
            <?php session()->forget('flash_message') ?>
            @endif
          <div class="form-group col-md-6 field-iva-nit_tercero required">
            <label class="control-label" for="iva-nit_tercero">Nit Tercero</label>
            <input type="text" id="iva-nit_tercero" class="form-control" name="nit_tercero" maxlength="255">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-nombre_tercero required">
            <label class="control-label" for="iva-nit_tercero">Nombre Tercero</label>
            <input type="text" id="iva-nombre_tercero" class="form-control" name="nombre_tercero" maxlength="255">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-concepto required">
            <label class="control-label" for="iva-concepto">Concepto</label>
            <input type="text" id="iva-concepto" class="form-control" name="concepto" maxlength="255">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-base_gravable required">
            <label class="control-label" for="iva-base_gravable">Base Gravable</label>
            <input type="text" id="iva-base_gravable" class="form-control" name="base_gravable">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-porcentaje_retenido required">
            <label class="control-label" for="iva-porcentaje_retenido">Porcentaje Retenido</label>
            <input type="text" id="iva-porcentaje_retenido" class="form-control" name="porcentaje">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-valor_retenido required">
            <label class="control-label" for="iva-valor_retenido">Valor Retenido</label>
            <input type="text" id="iva-valor_retenido" class="form-control" name="valor_retenido">

            <div class="help-block"></div>
          </div>
          <div id="iva-anio" class="form-group col-md-6 field-iva-anio required">
            <label class="control-label" for="iva-anio">Año</label>
            <input type="text" id="iva-anio" class="form-control" name="anio">
            <div class="help-block"></div>
          </div>
          <div id="divperiodo" class="form-group col-md-6 field-iva-periodo required">
            <label class="control-label" for="iva-periodo">Periodo</label>
            <input type="text" id="iva-periodo" class="form-control" name="periodo">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-ciudad_expedido required">
            <label class="control-label" for="iva-ciudad_expedido">Ciudad Expedido</label>
            <input type="text" id="iva-ciudad_expedido" class="form-control" name="ciudad_expedido" maxlength="50">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-fecha_expedicion required">
            <label class="control-label" for="rtf-empresa">Empresa</label>
              <select class="form-control" id="empresa" name="id_empresa" required>
                <option value="">Empresa..</option>
                 @foreach ($empresas as $empresa)
                   <option value="{{$empresa->id_empresa}}">{{$empresa->nit_empresa}}-{{$empresa->nombre_empresa}}</option>
                 @endforeach
              </select>
              <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-ica-banco_pago required">
            <label class="control-label" for="iva-banco_pago">Ciudad Pago</label>
            <input type="text" id="rtf-ciudad_pago" class="form-control" name="ciudad_pago">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-fecha_expedicion required">
            <label class="control-label" for="iva-fecha_expedicion">Fecha Expedición día/mes/año</label>
            <input type="text" id="iva-fecha_expedicion" class="form-control" name="fecha_expedicion">
            <div class="help-block"></div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success">Crear</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@stop
