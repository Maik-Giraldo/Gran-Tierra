@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Ver Notificación</h1>
    <ul class="breadcrumb">
    <li><a href="{{url('home')}}">Inicio</a></li>
    <li><a href="{{url('notificaciones')}}">Notificaciones</a></li>
    <li class="active">Ver Notificación</li>
    </ul>
@stop

@section('content')
<div class="box box-warning">
@foreach($notificacion as $ntf)
    <div class="ica-view box-body">
    <p><a class="btn btn-primary" href="edit-id={{$ntf->id}}">Editar</a>
     <a class="btn btn-danger" href="#" name="{{$ntf->id}}" id="borrarrtfitem">Borrar</a></p>
      <table id="w0" class="table table-striped table-bordered detail-view">
        <tr><th>ID</th><td>{{$ntf->id}}</td></tr>
        <tr><th>Notificación</th><td>{{$ntf->notificacion}}</td></tr>
        <tr><th>Tipo</th><td>{{$ntf->tipo}}</td></tr>
        <tr><th>Estado</th><td>{{$ntf->estado}}</td></tr>
        <tr><th>Creado</th><td>{{$ntf->created_at}}</td></tr>
        <tr><th>Fecha Despublicación</th><td>{{$ntf->date_unpublish}}</td></tr>
        <tr><th>Última Actualización</th><td>{{$ntf->updated_at}}</td></tr>
      </table>
      </div>
    @endforeach
</div>
@stop
