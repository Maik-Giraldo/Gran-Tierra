@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Crear Noticia</h1>
    <ul class="breadcrumb">
    <li><a href="{{url('home')}}">Inicio</a></li>
    <li><a href="{{url('noticias')}}">Noticias</a></li>
    <li class="active">Crear Noticia</li>
    </ul>
@stop

@section('content')
<div class="box box-warning">
	<div class="noticias-create  box-body">
    <div class="noticias-form">
      <form id="actualizar-noticia" action="{{url('noticias/update')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          @if(Session::has('flash_message'))
              <div class="alert alert-success" role="alert">
                  {!! session('flash_message') !!}
                </div>
          <?php session()->forget('flash_message') ?>
          @endif
          @foreach($datanw as $noticia)
          <div class="form-group field-noticias-titulo required">
          <label class="control-label" for="noticias-titulo">Titulo</label>
          <input type="text" id="noticias-titulo" class="form-control" name="titulo" value="{{$noticia->titulo}}" maxlength="255">
          <input type="hidden" name="id" value="{{$noticia->id}}">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-noticias-contenido required">
          <label class="control-label" for="noticias-contenido">Contenido</label>
          <textarea id="noticias-contenido" class="form-control" name="contenido" rows="6">{{$noticia->contenido}}</textarea>
          <div class="help-block"></div>
        </div>
    <div class="form-group field-noticias-fecha required">
      <label class="control-label" for="noticias-fecha">Fecha</label>
      <div id="noticias-fecha-datetime" class="input-group date">
        <span class="input-group-addon" id="cal2" title="Seleccione fecha y hora">
          <span class="glyphicon glyphicon-calendar">
          </span>
        </span>
          <span class="input-group-addon" title="Limpiar campo" id="reset-date">
            <span class="glyphicon glyphicon-remove"></span>
          </span>
          <input type="text" id="noticias-fecha" class="form-control form_datetime"
           name="fecha" value="{{$noticia->fecha}}" placeholder="Ingresa la fecha ...">
         </div>
      <div class="help-block"></div>
    </div>
      <label>Imagen</label>
      <input id="imagennw" name="imagen" type="file" class="file" data-preview-file-type="image"> <br>
    <div class="form-group field-noticias-status required">
      <label class="control-label" for="noticias-status">Estado</label>
      <select id="noticias-status" class="form-control" name="status">
        <option value="">Seleccionar...</option>
        <option value="{{$noticia->status}}" selected>@if ($noticia->status  == 1) Activo @else Deshabilitado @endif</option>
        <option value="1">Activo</option>
        <option value="2">Deshabilitado</option>
      </select>
      <div class="help-block"></div>
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
