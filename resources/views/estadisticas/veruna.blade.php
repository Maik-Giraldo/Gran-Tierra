@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Ver Estadística</h1>
    <ul class="breadcrumb">
    <li><a href="{{url('home')}}">Inicio</a></li>
    <li><a href="{{url('estadisticas')}}">Estadísticas</a></li>
    <li class="active">Ver Estadística</li>
    </ul>
@stop

@section('content')
<div class="box box-warning">
@foreach($estadistica as $stat)
    <div class="ica-view box-body">
      <table id="w0" class="table table-striped table-bordered detail-view">
        <tr><th>ID</th><td>{{$stat->id}}</td></tr>
        <tr><th>Usuario</th><td>{{$stat->user}}</td></tr>
        <tr><th>Idioma</th><td>{{$stat->language}}</td></tr>
        <tr><th>Sistema Operativo</th><td>{{$stat->os}}</td></tr>
        <tr><th>Navegador</th><td>{{$stat->browser}}</td></tr>
        <tr><th>Ip</th><td>{{$stat->ip}}</td></tr>
        <tr><th>Fecha de Visita</th><td>{{$stat->visit_time}}</td></tr>
      </table>
      </div>
    @endforeach
</div>
@stop
