@extends('voyager::mastercerti')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ voyager_asset('css/ga-embed.css') }}">
    <style>
        .user-email {
            font-size: .85rem;
            margin-bottom: 1.5em;
        }
    </style>
@stop

@section('content')

 <!-- Contenido certiweb -->
 <div class="container">
   <div class="row">
     <div class="col-sm-12 col-md-10 col-md-offset-1">
       <form method="POST" action="uploadiva" accept-charset="UTF-8" id="uploadiva" name="uploadiva" enctype="multipart/form-data">
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
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <span>Subir archivo excel de IVA</span>
          <br>
          
        <div class="form-group">
          <label for="ano">Año</label>
          <select class="form-control" id="ano" name="ano" required>
            <option value="">Seleccionar ...</option>
                        <option value="2008">2008</option>
      			<option value="2009">2009</option>
      			<option value="2010">2010</option>
                        <option value="2011">2011</option>
      			<option value="2012">2012</option>
      			<option value="2013">2013</option>
      			<option value="2014">2014</option>
      			<option value="2015">2015</option>
      			<option value="2016">2016</option>
      			<option value="2017">2017</option>
      			<option value="2018">2018</option>
      			<option value="2019">2019</option>
      			<option value="2020">2020</option>
          </select>
        </div>
        <div class="form-group">
          <label for="periodo">Periodo</label>
          <select class="form-control" id="periodo" name="periodo" required>
            <option value="">Seleccionar ...</option>
            <option value="1">Primero</option>
      			<option value="2">Segundo</option>
      			<option value="3">Tercero</option>
      			<option value="4">Cuarto</option>
      			<option value="5">Quinto</option>
      			<option value="6">Sexto</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlFile1">Archivo de excel</label>
          <input class="form-control" name="excelfile" id="excelfile" type="file" required="required">
        </div>
        <br>
        <div class="col-sm-offset-4 col-sm-3 text-center">
          <input class="btn btn-success btn-block btn-lg" value="Subir Iva" type="submit">
        </div>
      </form>
    </div>
 </div>
</div>
@stop
