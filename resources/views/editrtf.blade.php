@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Editar Registro de Rtf</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
      <li><a href="rtf-index">Editar Rtf</a></li>
      <li class="active">Editar Registro Rtf</li>
    </ul>
@stop
@section('content')
<div class="col-xs-12">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-pencil"></i> Formulario para editar items</h3>
    </div>
    <div class="iva-create box-body">
      <div class="iva-form">
        <form id="updateonertf" name="updateonertf" action="updateonertf" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @if(Session::has('flash_message'))
                <div class="alert alert-success" role="alert">
                    {!! session('flash_message') !!}
                  </div>
            <?php session()->forget('flash_message') ?>
            @endif
          @foreach($datartf as $rtf)
          <div class="form-group col-md-6 field-iva-nit_tercero required">
            <label class="control-label" for="iva-nit_tercero">Nit Tercero</label>
            <input type="text" id="iva-nit_tercero" class="form-control" name="nit_tercero" value="{{$rtf->Nit}}" maxlength="255">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-nombre_tercero required">
            <label class="control-label" for="iva-nit_tercero">Nombre Tercero</label>
            <input type="text" id="iva-nombre_tercero" value="{{$rtf->Nombre}}" class="form-control" name="nombre_tercero" maxlength="255">
            <div class="help-block"></div>
          </div>
          <input type="hidden" value="{{$rtfid}}" name="rtfid">
          <div class="form-group col-md-6 field-iva-concepto required">
            <label class="control-label" for="iva-concepto">Concepto</label>
            <input type="text" id="iva-concepto" class="form-control" value="{{$rtf->Concepto}}" name="concepto" maxlength="255">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-base_gravable required">
            <label class="control-label" for="iva-base_gravable">Base Gravable</label>
            <input type="text" id="iva-base_gravable" class="form-control" name="base_gravable" value="{{$rtf->Base}}">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-porcentaje_retenido required">
            <label class="control-label" for="iva-porcentaje_retenido">Porcentaje Retenido</label>
            <input type="text" id="iva-porcentaje_retenido" class="form-control" name="porcentaje" value="{{$rtf->Porcentaje}}">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-valor_retenido required">
            <label class="control-label" for="iva-valor_retenido">Valor Retenido</label>
            <input type="text" id="iva-valor_retenido" class="form-control" name="valor_retenido" value="{{$rtf->Retenido}}">

            <div class="help-block"></div>
          </div>
          <div id="iva-anio" class="form-group col-md-6 field-iva-anio required">
            <label class="control-label" for="iva-anio">Año</label>
            <input type="text" id="iva-anio" class="form-control" name="anio" value="{{$rtf->Ano}}">
            <div class="help-block"></div>
          </div>
          <div id="divperiodo" class="form-group col-md-6 field-iva-periodo required">
            <label class="control-label" for="iva-periodo">Periodo</label>
            <input type="text" id="iva-periodo" class="form-control" name="periodo" value="{{$rtf->Mes}}">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-ciudad_expedido required">
            <label class="control-label" for="iva-ciudad_expedido">Ciudad Expedido</label>
            <input type="text" id="iva-ciudad_expedido" class="form-control" name="ciudad_expedido" value="{{$rtf->Ciudad_Expedido}}" maxlength="50">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-ciudad_pago required">
            <label class="control-label" for="iva-ciudad_pago">Ciudad Pago</label>
            <input type="text" id="iva-ciudad_pago" class="form-control" name="ciudad_pago" value="{{$rtf->Ciudad_Pago}}" maxlength="50">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-fecha_expedicion required">
            <label class="control-label" for="rtf-banco_pago">Empresa</label>
               <select class="form-control" id="pdesde" name="id_empresa" disabled="true">
                  <option value="{{$rtf->id_empresa}}" selected="selected">{{$rtf->nombre_empresa}}</option>
                   @foreach ($empresas as $empresa)
                     <option value="{{$empresa->id_empresa}}">{{$empresa->nit_empresa}}-{{$empresa->nombre_empresa}}</option>
                   @endforeach
                </select>
                <input type="hidden" name="banco_pago" value="null">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-fecha_expedicion required">
            <label class="control-label" for="iva-fecha_expedicion">Fecha Expedición día/mes/año</label>
            <input type="text" id="iva-fecha_expedicion" class="form-control" name="fecha_expedicion" value="{{$rtf->fecha_expedicion}}">
            <div class="help-block"></div>
          </div>
          @endforeach
          <div class="form-group">
            <button type="submit" class="btn btn-success">Editar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@stop
