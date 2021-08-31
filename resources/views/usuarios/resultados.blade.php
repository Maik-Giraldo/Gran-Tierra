@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Importar Usuarios </h1>
    <ul class="breadcrumb"><li><a href="{{url('home')}}">Inicio</a></li>
    <li class="active">Importar Usuarios </li>
    </ul>
@stop

@section('content')
<div class="container">
     <div class="form-group">
     <br>
         <div class="col-md-5 col-md-offset-3">
         <h3>Resultado de subida de Excel de Usuarios:</h3>
         <br><br>
         @if (is_array($resultado))
         @foreach($resultado as $result)
         <li><label>Insertados:</label> {{$result['inserteds']}}</li>
         @endforeach
         @endif
         @if (is_array($errores))
         @foreach($errores as $error)
         <label>Errores:</label>{{$error}}
         @endforeach
         @else
         <label>Errores:</label>0
         @endif
         </div>
          </div>
         </div>
@stop
