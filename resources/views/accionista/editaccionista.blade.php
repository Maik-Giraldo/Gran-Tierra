@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Editar Registro de accionista</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
      <li><a href="accionista-index">Editar accionista</a></li>
      <li class="active">Editar Registro accionista</li>
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
        <form id="updateoneaccionista" name="updateoneaccionista" action="updateoneaccionista" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @if(Session::has('flash_message'))
                <div class="alert alert-success" role="alert">
                    {!! session('flash_message') !!}
                  </div>
            <?php session()->forget('flash_message') ?>
            @endif
          @foreach($dataaccionista as $accionista)
          <div class="form-group col-md-6 field-iva-fecha_expedicion required">
            <label class="control-label" for="accionista-banco_pago">Empresa</label>
               <select class="form-control" id="pdesde" name="id_empresa" disabled="true">
                  <option value="{{$accionista->id_empresa}}" selected="selected">{{$accionista->nombre_empresa}}</option>
                   @foreach ($empresas as $empresa)
                     <option value="{{$empresa->id_empresa}}">{{$empresa->nit_empresa}}-{{$empresa->nombre_empresa}}</option>
                   @endforeach
                </select>
                <input type="hidden" name="banco_pago" value="null">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-nit_tercero required">
            <label class="control-label" for="iva-nit_tercero">Nit Accionista</label>
            <input type="text" id="iva-nit_tercero" class="form-control" name="nit_accionista" value="{{$accionista->Nit_accionista}}" maxlength="255">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-nombre_tercero required">
            <label class="control-label" for="iva-nit_tercero">Nombre Accionista</label>
            <input type="text" id="iva-nombre_tercero" value="{{$accionista->Accionista}}" class="form-control" name="accionista" maxlength="255">
            <div class="help-block"></div>
          </div>
          <div id="divperiodo" class="form-group col-md-6 field-iva-periodo required">
            <label class="control-label" for="iva-periodo">Tipo</label>
            <input type="text" id="iva-periodo" class="form-control" name="tipo" value="{{$accionista->Tipo}}">
            <div class="help-block"></div>
          </div>
          <input type="hidden" value="{{$accionistaid}}" name="accionistaid">
          <div class="form-group col-md-6 field-iva-concepto required">
            <label class="control-label" for="iva-concepto">Acciones</label>
            <input type="number" id="iva-concepto" class="form-control" value="{{$accionista->Cantidad}}" name="cantidad" maxlength="255">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-base_gravable required">
            <label class="control-label" for="iva-base_gravable">Valor Nominal</label>
            <input type="number" id="iva-base_gravable" class="form-control" name="valor_nominal" value="{{$accionista->Valor_Nominal}}">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-porcentaje_retenido required">
            <label class="control-label" for="iva-porcentaje_retenido">Valor Intrinseco Valorizado</label>
            <input type="number" id="iva-porcentaje_retenido" class="form-control" name="valor_intrinseco_valorizado" value="{{$accionista->Valor_Intrinseco_Valorizado}}">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-valor_retenido required">
            <label class="control-label" for="iva-valor_retenido">Valor Intrinseco Sin Valorizar</label>
            <input type="number" id="iva-valor_retenido" class="form-control" name="valor_intrinseco_sin_valorizar" value="{{$accionista->Valor_Intrinseco_Sin_Valorizar}}">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-valor_retenido required">
            <label class="control-label" for="iva-valor_retenido">Total Utilidades 2016 y Anteriores</label>
            <input type="number" id="iva-valor_retenido" class="form-control" name="total_utilidades_2016_anteriores" value="{{$accionista->total_utilidades_2016_anteriores}}">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-valor_retenido required">
            <label class="control-label" for="iva-valor_retenido">Total Utilidades 2017  y años siguientes</label>
            <input type="number" id="iva-valor_retenido" class="form-control" name="total_utilidades_2017_siguientes" value="{{$accionista->total_utilidades_2017_siguientes}}">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-valor_retenido required">
            <label class="control-label" for="iva-valor_retenido">Gravado Utilidades 2016 y Anteriores</label>
            <input type="number" id="iva-valor_retenido" class="form-control" name="gravado_utilidades_2016_anteriores" value="{{$accionista->gravado_utilidades_2016_anteriores}}">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-valor_retenido required">
            <label class="control-label" for="iva-valor_retenido">Gravado Utilidades 2017 Siguientes</label>
            <input type="number" id="iva-valor_retenido" class="form-control" name="gravado_utilidades_2017_siguientes" value="{{$accionista->gravado_utilidades_2017_siguientes}}">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-valor_retenido required">
            <label class="control-label" for="iva-valor_retenido">No Gravado Utilidades 2016 y Anteriores</label>
            <input type="number" id="iva-valor_retenido" class="form-control" name="no_gravado_utilidades_2016_anteriores" value="{{$accionista->no_gravado_utilidades_2016_anteriores}}">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-valor_retenido required">
            <label class="control-label" for="iva-valor_retenido">No Gravado Utilidades 2017 y siguientes</label>
            <input type="number" id="iva-valor_retenido" class="form-control" name="no_gravado_utilidades_2017_siguientes" value="{{$accionista->no_gravado_utilidades_2017_siguientes}}">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-valor_retenido required">
            <label class="control-label" for="iva-valor_retenido">Retención en la fuente de utilidades 2016 y anteriores</label>
            <input type="number" id="iva-valor_retenido" class="form-control" name="rtf_utilidades_2016_anteriores" value="{{$accionista->rtf_utilidades_2016_anteriores}}">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-valor_retenido required">
            <label class="control-label" for="iva-valor_retenido">Retención en la fuente de utilidades 2017 y años siguientes</label>
            <input type="number" id="iva-valor_retenido" class="form-control" name="rtf_utilidades_2017_siguientes" value="{{$accionista->rtf_utilidades_2017_siguientes}}">
            <div class="help-block"></div>
          </div>
          <div id="iva-anio" class="form-group col-md-6 field-iva-anio required">
            <label class="control-label" for="iva-anio">Dirección</label>
            <input type="text" id="iva-anio" class="form-control" name="direccion" value="{{$accionista->direccion}}">
            <div class="help-block"></div>
          </div>
          <div id="divperiodo" class="form-group col-md-6 field-iva-periodo required">
            <label class="control-label" for="iva-periodo">Contador</label>
            <input type="text" id="iva-periodo" class="form-control" name="contador" value="{{$accionista->Contador}}">
            <div class="help-block"></div>
          </div>
          <div id="iva-anio" class="form-group col-md-6 field-iva-anio required">
            <label class="control-label" for="iva-anio">Año</label>
            <input type="number" id="iva-anio" class="form-control" name="anio" value="{{$accionista->Ano}}">
            <div class="help-block"></div>
          </div>
          <div class="form-group col-md-6 field-iva-ciudad_expedido required">
            <label class="control-label" for="iva-ciudad_expedido">Ciudad Expedido</label>
            <input type="text" id="iva-ciudad_expedido" class="form-control" name="ciudad_expedido" value="{{$accionista->Ciudad_Expedido}}" maxlength="50">
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
