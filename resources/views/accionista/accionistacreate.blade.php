@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Crear registro de accionista</h1>
    <ul class="breadcrumb">
    <li><a href="home">Inicio</a></li>
    <li><a href="accionista-index">accionista</a></li>
    <li class="active">Crear registro de accionista</li>
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
        <form id="updateoneaccionista" name="updateoneaccionista" action="accionista-create" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @if(Session::has('flash_message'))
                <div class="alert alert-success" role="alert">
                    {!! session('flash_message') !!}
                  </div>
            <?php session()->forget('flash_message') ?>
            @endif
            <div class="form-group col-md-6 field-iva-fecha_expedicion required">
              <label class="control-label" for="iva-empresa">Empresa</label>
                <select class="form-control" id="empresa" name="id_empresa" required>
                  <option value="">Empresa..</option>
                   @foreach ($empresas as $empresa)
                     <option value="{{$empresa->id_empresa}}">{{$empresa->nit_empresa}}-{{$empresa->nombre_empresa}}</option>
                   @endforeach
                </select>
                <div class="help-block"></div>
            </div>
            <div class="form-group col-md-6 field-iva-nit_tercero required">
              <label class="control-label" for="iva-nit_tercero">Nit Accionista</label>
              <input type="text" id="iva-nit_tercero" class="form-control" name="nit_accionista" value="" required maxlength="255">
              <div class="help-block"></div>
            </div>
            <div class="form-group col-md-6 field-iva-nombre_tercero required">
              <label class="control-label" for="iva-nit_tercero">Nombre Accionista</label>
              <input type="text" id="iva-nombre_tercero" value="" class="form-control" name="accionista" required maxlength="255">
              <div class="help-block"></div>
            </div>
            <div id="divperiodo" class="form-group col-md-6 field-iva-periodo required">
              <label class="control-label" for="iva-periodo">Tipo</label>
              <input type="text" id="iva-periodo" class="form-control" name="tipo" value="" required>
              <div class="help-block"></div>
            </div>
            <div class="form-group col-md-6 field-iva-concepto required">
              <label class="control-label" for="iva-concepto">Acciones</label>
              <input type="number" id="iva-concepto" class="form-control" value="" name="cantidad" maxlength="255" required>
              <div class="help-block"></div>
            </div>
            <div class="form-group col-md-6 field-iva-base_gravable required">
              <label class="control-label" for="iva-base_gravable">Valor Nominal</label>
              <input type="number" id="iva-base_gravable" class="form-control" name="valor_nominal" value="" required>
              <div class="help-block"></div>
            </div>
            <div class="form-group col-md-6 field-iva-porcentaje_retenido required">
              <label class="control-label" for="iva-porcentaje_retenido">Valor Intrinseco Valorizado</label>
              <input type="number" id="iva-porcentaje_retenido" class="form-control" name="valor_intrinseco_valorizado" value="" required>
              <div class="help-block"></div>
            </div>
            <div class="form-group col-md-6 field-iva-valor_retenido required">
              <label class="control-label" for="iva-valor_retenido">Valor Intrinseco Sin Valorizar</label>
              <input type="number" id="iva-valor_retenido" class="form-control" name="valor_intrinseco_sin_valorizar" value="" required>
              <div class="help-block"></div>
            </div>
            <div class="form-group col-md-6 field-iva-valor_retenido required">
              <label class="control-label" for="iva-valor_retenido">Total Utilidades 2016 y Anteriores</label>
              <input type="number" id="iva-valor_retenido" class="form-control" name="total_utilidades_2016_anteriores" value="" required>
              <div class="help-block"></div>
            </div>
            <div class="form-group col-md-6 field-iva-valor_retenido required">
              <label class="control-label" for="iva-valor_retenido">Total Utilidades 2017  y años siguientes</label>
              <input type="number" id="iva-valor_retenido" class="form-control" name="total_utilidades_2017_siguientes" value="" required>
              <div class="help-block"></div>
            </div>
            <div class="form-group col-md-6 field-iva-valor_retenido required">
              <label class="control-label" for="iva-valor_retenido">Gravado Utilidades 2016 y Anteriores</label>
              <input type="number" id="iva-valor_retenido" class="form-control" name="gravado_utilidades_2016_anteriores" value="" required>
              <div class="help-block"></div>
            </div>
            <div class="form-group col-md-6 field-iva-valor_retenido required">
              <label class="control-label" for="iva-valor_retenido">Gravado Utilidades 2017 Siguientes</label>
              <input type="number" id="iva-valor_retenido" class="form-control" name="gravado_utilidades_2017_siguientes" value="" required>
              <div class="help-block"></div>
            </div>
            <div class="form-group col-md-6 field-iva-valor_retenido required">
              <label class="control-label" for="iva-valor_retenido">No Gravado Utilidades 2016 y Anteriores</label>
              <input type="number" id="iva-valor_retenido" class="form-control" name="no_gravado_utilidades_2016_anteriores" value="" required>
              <div class="help-block"></div>
            </div>
            <div class="form-group col-md-6 field-iva-valor_retenido required">
              <label class="control-label" for="iva-valor_retenido">No Gravado Utilidades 2017 y siguientes</label>
              <input type="number" id="iva-valor_retenido" class="form-control" name="no_gravado_utilidades_2017_siguientes" value="" required>
              <div class="help-block"></div>
            </div>
            <div class="form-group col-md-6 field-iva-valor_retenido required">
              <label class="control-label" for="iva-valor_retenido">Retención en la fuente de utilidades 2016 y anteriores</label>
              <input type="number" id="iva-valor_retenido" class="form-control" name="rtf_utilidades_2016_anteriores" value="" required>
              <div class="help-block"></div>
            </div>
            <div class="form-group col-md-6 field-iva-valor_retenido required">
              <label class="control-label" for="iva-valor_retenido">Retención en la fuente de utilidades 2017 y años siguientes</label>
              <input type="number" id="iva-valor_retenido" class="form-control" name="rtf_utilidades_2017_siguientes" value="" required>
              <div class="help-block"></div>
            </div>
            <div id="iva-anio" class="form-group col-md-6 field-iva-anio required">
              <label class="control-label" for="iva-anio">Dirección</label>
              <input type="text" id="iva-anio" class="form-control" name="direccion" value="" required>
              <div class="help-block"></div>
            </div>
            <div id="divperiodo" class="form-group col-md-6 field-iva-periodo required">
              <label class="control-label" for="iva-periodo">Contador</label>
              <input type="text" id="iva-periodo" class="form-control" name="contador" value="" required>
              <div class="help-block"></div>
            </div>
            <div id="iva-anio" class="form-group col-md-6 field-iva-anio required">
              <label class="control-label" for="iva-anio">Año</label>
              <input type="number" id="iva-anio" class="form-control" name="anio" value="" required>
              <div class="help-block"></div>
            </div>
            <div class="form-group col-md-6 field-iva-ciudad_expedido required">
              <label class="control-label" for="iva-ciudad_expedido">Ciudad Expedido</label>
              <input type="text" id="iva-ciudad_expedido" class="form-control" name="ciudad_expedido" value="" maxlength="50" required>
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
