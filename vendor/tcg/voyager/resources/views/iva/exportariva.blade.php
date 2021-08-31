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
       <form method="POST" action="iva"
        accept-charset="UTF-8" id="expediriva" name="expediriva"
        enctype="multipart/form-data" target="_blank">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <span class="icon voyager-download"></span>
          <span>Exportar archivo pdf de certificado Iva de {{Auth::user()->name}}</span>
          <hr>
          <br>
          <div class="form-group">
          <label for="ano">Nit</label>
            <input type="text" class="form-control" name="nit" id="nit">
          </div>
         <div class="form-group">
          <label for="ano">Año</label>
          <select class="form-control" id="anio" name="anio" required>
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
          <label for="pdesde">Periodo - Desde</label>
          <select class="form-control" id="pdesde" name="pdesde" required>
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
          <label for="phasta">Periodo - Hasta</label>
          <select class="form-control" id="phasta" name="phasta" required>
            <option value="">Seleccionar ...</option>
            <option value="1">Primero</option>
      			<option value="2">Segundo</option>
      			<option value="3">Tercero</option>
      			<option value="4">Cuarto</option>
      			<option value="5">Quinto</option>
      			<option value="6">Sexto</option>
          </select>
        </div>
        <br>
        <div class="col-sm-offset-4 col-sm-3 text-center">
           <button type="submit" class="btn btn-success btn-block btn-lg">
               Descargar <span class="glyphicon glyphicon-download-alt"></span>
            </button>
        </div>
      </form>
    </div>
 </div>
</div>
@stop
