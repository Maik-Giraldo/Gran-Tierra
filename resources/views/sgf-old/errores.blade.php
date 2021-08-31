@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Resultado de subida de Excel de Seguimento de facturas</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
      <li><a href="importar-seguimiento-facturas">Importar Seguimientos Facturas</a></li>
    <li class="active">Resultado de Importación</li>
    </ul>
@stop

@section('content')
<div class="col-xs-12">
<div class="box box-warning">
    <div class="iva-form box-body">
        <form id="factsimport" name="factsimport" action="upload-facturas" method="post" enctype="multipart/form-data">
          <br><br>
          <div class="alert alert-danger" role="alert">
          @if (is_array($resultado))
          <p>Resultado:</p>
          <ul>
          @foreach($resultado as $result)
          <li><label>Insertados:</label> {{$result['inserteds']}}</li>
          @endforeach
          @endif
        </ul>
        <p>{{$cuentaerrores}} Errores:</p>
          <ul>
            @if (is_array($errores))
            @foreach($errores as $error)
              <li>{{$error}}</li>
            @endforeach
            @endif
          </ul>
          </div>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="error-summary" style="display:none"><ul></ul></div>
          <div id="fecha_import" class="form-group field-import-year">
            <label class="control-label" for="import-year">Fecha</label>
              <a href="importar-seguimiento-facturas">Volver a intentar</a>
            </div>
        </form>
    </div>
</div>
</div>
@stop
