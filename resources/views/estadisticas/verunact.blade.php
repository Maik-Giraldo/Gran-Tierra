@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Ver Estadística</h1>
    <ul class="breadcrumb">
    <li><a href="{{url('home')}}">Inicio</a></li>
    <li><a href="{{url('estadisticas-certificados')}}">Estadísticas</a></li>
    <li class="active">Ver Estadística</li>
    </ul>
@stop

@section('content')
<div class="box box-warning">
@foreach($estadistica as $stat)
    <div class="ica-view box-body">
      <table id="w0" class="table table-striped table-bordered detail-view">
        <tr><th>ID</th><td>{{$stat->id}}</td></tr>
        <tr><th>Usuario</th><td>{{$stat->usuario}}</td></tr>
        <tr><th>Nit</th><td>{{$stat->nit}}</td></tr>
        <tr><th>Fecha y Hora</th><td>{{$stat->fecha}} {{$stat->hora}}</td></tr>
        <tr><th>Accion</th><td>{{$stat->accion}}</td></tr>
        <tr><th>Año</th><td>{{$stat->anio}}</td></tr>
        <tr><th>Periodo</th><td>{{$stat->periodo}}</td></tr>
      </table>
      </div>
    @endforeach
</div>
@stop
