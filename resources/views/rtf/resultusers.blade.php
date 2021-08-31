@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Importar Rtf </h1>
    <ul class="breadcrumb"><li><a href="{{url('home')}}">Inicio</a></li>
    <li class="active">Importar Rtf </li>
    </ul>
@stop

@section('content')
<div class="container">
     <div class="form-group">
     <br>
         <div class="col-md-5 col-md-offset-3">
         <h3>Resultados de importación Rtf:</h3>
         <br><br>
         @if (is_array($resultado))
         @foreach($resultado as $result)
         <li><label>Insertados:</label> {{$result['inserteds']}}</li>
         @endforeach
         @endif
         @if (is_array($arraynotfound))
         <label>Nits de usuarios no registrados en el sistema: {{count($arraynotfound)}}</label><br>
         <form id="deunr" name="rtfdeunr" action="rtfdeunr" method="post" enctype="multipart/form-data">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           @if(Session::has('alert_success'))
               <div class="alert alert-success" role="alert">
                   {!! session('alert_success') !!}
                 </div>
           <?php session()->forget('alert_success') ?>
           @endif
           <button type="submit" id="submit-button" class="btn btn-success">Descargar usuarios no registrados</button>
         </form>
         @else
         <label>Errores:</label>0
         @endif
         </div>
          </div>
         </div>
@stop
