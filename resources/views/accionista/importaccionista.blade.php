@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Importar certificados - accionista </h1>
    <ul class="breadcrumb"><li><a href="/">Inicio</a></li>
    <li class="active">Importar certificados - accionista </li>
    </ul>
@stop

@section('content')
<div class="col-xs-12">
<div class="box box-warning">
    <div class="iva-form box-body">
        <form id="accionistaimport" name="accionistaimport" action="upload-accionista" method="post" enctype="multipart/form-data">
          @if(Session::has('alert_success'))
              <div class="alert alert-success" role="alert">
                  {!! session('alert_success') !!}
                </div>
          <?php session()->forget('alert_success') ?>
          @endif
          @if(Session::has('alert_message'))
              <div class="alert alert-danger" role="alert">
                  {!! session('alert_message') !!}
                </div>
          <?php session()->forget('alert_message') ?>
          @endif
          @if(Session::has('alert_success'))
              <div class="alert alert-success" role="alert">
                  {!! session('alert_success') !!}
                </div>
          <?php session()->forget('alert_success') ?>
          @endif
                  @if (session()->get('resultado'))
                  <div class="alert alert-success" role="alert">
                  Excelente! Se han subido satisfactoriamiente los certificados.<br>
                  @foreach(session()->get('resultado') as $result)
                  <li><label>Registros Insertados:</label> {{$result['inserteds']}}</li>
                  @endforeach
                  </div>
                  @endif
                  <?php session()->forget('resultado') ?>

          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="error-summary" style="display:none"><p>Por favor corrija los siguientes errores:</p><ul></ul></div>
          <div id="aniodiv" class="form-group field-import-year">
            <label class="control-label" for="import-year">A??o</label>
              <select id="anio" class="form-control" name="anio" required>
                <option value="" selected="true" disabled="disabled">Seleccionar a??o...</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
              </select>
              <div class="help-block"></div>
            </div>
            <div id="periododiv" class="form-group field-import-period">
              <label class="control-label" for="import-empresa">Empresa</label>
              <select id="empresa" class="form-control" name="id_empresa" required>
                <option value="" selected="true">Seleccionar Empresa...</option>
                  @foreach($empresas as $empresa)
                    <option value="{{$empresa->id_empresa}}">{{$empresa->nit_empresa}} - {{$empresa->nombre_empresa}}</option>
                  @endforeach
                    <option value="todas">Todas</option>
              </select>
              <div class="help-block"></div>
            </div>
        <div id="periododiv" class="form-group field-import-period">
          <label class="control-label" for="import-period">Periodo</label>
          <select id="periodo" class="form-control" name="periodo" required>
            <option value="" selected="true" disabled="disabled">Seleccionar periodo...</option>
            <option value="1">Enero - Diciembre</option>
          </select>
          <div class="help-block"></div>
        </div>
         <label>Archivo Excel</label>
        <input id="input-id" name="excelfile" type="file" class="file" data-preview-file-type="text"> <br>
        <input type="hidden" name="nit" value="{{ Auth::user()->Nit }}">
        <div class="form-group">
            <button type="submit" id="submit-button" class="btn btn-success">Importar</button>
        </div>
        </form>
    </div>
</div>
</div>
@stop
