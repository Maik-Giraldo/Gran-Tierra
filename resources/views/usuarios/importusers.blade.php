@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Importar Usuarios </h1>
    <ul class="breadcrumb"><li><a href="{{url('home')}}">Inicio</a></li>
    <li class="active">Importar Usuarios </li>
    </ul>
@stop

@section('content')
<div class="col-xs-12">
<div class="box box-warning">
    <div class="iva-form box-body">
        <form id="usersimport" name="uploadusers" action="uploadusers" method="post" enctype="multipart/form-data">
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
                  Excelente! Se han subido satisfactoriamiente los usuarios.<br>
                  @foreach(session()->get('resultado') as $result)
                  <li><label>Registros Insertados:</label> {{$result['inserteds']}}</li>
                  @endforeach
                  </div>
                  @endif
                  <?php session()->forget('resultado') ?>
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="error-summary" style="display:none"><p>Por favor corrija los siguientes errores:</p><ul></ul></div>

         <label>Archivo Excel</label>
        <!-- <input type="hidden" name="Import[file]" value=""><input type="file" id="import-file" class="file-loading" name="Import[file]" data-krajee-fileinput="fileinput_ebebbc5d"> -->
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
