@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Importar Seguimiento Facturas </h1>
    <ul class="breadcrumb"><li><a href="/">Inicio</a></li>
    <li class="active">Importar Seguimiento Facturas</li>
    </ul>
@stop

@section('content')
<div class="col-xs-12">
<div class="box box-warning">
    <div class="iva-form box-body">
        <form id="factsimport" name="factsimport" action="upload-facturas" method="post" enctype="multipart/form-data">
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
          <!-- <div id="fecha_import" class="form-group field-import-year">
            <label class="control-label" for="import-year">Fecha</label>
              <input type="date" id="import-date" class="form-control" name="importdate">
              <div class="help-block"></div>
          </div> -->
          <div class="form-group field-noticias-fecha required">
            <label class="control-label" for="noticias-fecha">Fecha</label>
            <div id="noticias-fecha-datetime" class="input-group date">
              <span class="input-group-addon" id="cal2" title="Seleccione fecha y hora">
                <span class="glyphicon glyphicon-calendar">
                </span>
              </span>
                <span class="input-group-addon" title="Limpiar campo" id="reset-date">
                  <span class="glyphicon glyphicon-remove"></span>
                </span>
                <input type="text" id="noticias-fecha" class="form-control form_datetime"
                 name="importdate" placeholder="Ingresa la fecha ...">
               </div>
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
