@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Editar Notificación</h1>
    <ul class="breadcrumb">
    <li><a href="{{url('home')}}">Inicio</a></li>
    <li><a href="{{url('notificaciones')}}">Notificaciones</a></li>
    <li class="active">Editar Notificación</li>
    </ul>
@stop

@section('content')
<div class="box box-warning">
	<div class="noticias-create  box-body">
    <div class="noticias-form">
      <form id="actualizar-notificacion" action="{{url('notificaciones/update')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          @if(Session::has('flash_message'))
              <div class="alert alert-success" role="alert">
                  {!! session('flash_message') !!}
                </div>
          <?php session()->forget('flash_message') ?>
          @endif
          @foreach($datantf as $ntf)
          <div class="form-group field-notificacions-contenido required">
            <label class="control-label" for="notificacions-contenido">Notificación</label>
            <textarea id="notificacions-contenido" class="form-control" name="notificacion" rows="6" required>{{$ntf->notificacion}}</textarea>
            <div class="help-block"></div>
          </div>
          <div class="form-group field-notificacions-titulo required">
            <label class="control-label" for="notificacions-titulo">Tipo</label>
            <select id="notificaciones-tipo" class="form-control" name="tipo" required>
              <option value="{{$ntf->tipo}}" selected>{{$ntf->tipo}}</option>
              <option value="alerta">Alerta</option>
              <option value="advertencia">Advertencia</option>
            </select>
            <input type="hidden" name="id" value="{{$ntf->id}}">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-notificacions-titulo required">
          <label class="control-label" for="notificacions-titulo">Estado</label>
          <select id="notificaciones-estado" class="form-control" name="estado" required>
            <option value="{{$ntf->estado}}" selected>{{$ntf->estado}}</option>
            <option value="activo">Activo</option>
            <option value="inactivo">Deshabilitado</option>
          </select>
        <div class="help-block"></div>
      </div>
      <div class="form-group field-notificacions-fecha required">
        <label class="control-label" for="notificacions-fecha">Fecha Despublicación</label>
        <div id="notificacions-fecha-datetime" class="input-group date">
          <span class="input-group-addon" id="cal2" title="Seleccione fecha y hora">
            <span class="glyphicon glyphicon-calendar">
            </span>
          </span>
            <span class="input-group-addon" title="Limpiar campo" id="reset-date">
              <span class="glyphicon glyphicon-remove"></span>
            </span>
            <input type="text" id="notificacions-fecha" class="form-control form_datetime"
             name="date_unpublish" value="{{$ntf->date_unpublish}}" placeholder="Ingresa la fecha ..." required>
           </div>
        <div class="help-block"></div>
      </div>
      </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Editar</button>
        </div>
        @endforeach
          </form>
        </div>
	     </div>
     </div>
@stop
