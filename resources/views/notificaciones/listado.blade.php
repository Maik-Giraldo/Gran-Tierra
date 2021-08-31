@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Notificaciones</h1>
    <ul class="breadcrumb"><li><a href="{{url('home')}}">Inicio</a></li>
    <li class="active">Notificaciones</li>
    </ul>
@stop

@section('content')
<div class="box box-warning">
    <div class="seguimiento-facturas-index box-body">
    <p><a class="btn btn-success" href="{{url('notificaciones/create')}}">Crear notificacion</a></p>
      <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
        <div id="w1" style="font-size:12px;">
          <div class="summary">Mostrando
            <strong>{{($notificaciones->currentpage()-1)*$notificaciones->perpage()+1}}-{{$notificaciones->currentpage()*$notificaciones->perpage()}}</strong>
              de  <strong>{{$notificaciones->total()}}</strong> elementos</div>
          <table class="table table-striped table-bordered"><thead>
            <tr>
              <th>id</th>
              <th>Notificacion</th>
              <th>Tipo</th>
              <th>Estado</th>
              <th>Creado</th>
              <th class="action-column"><a href="#">Acciones</a></th>
            </tr>
            <tr id="w1-filters" class="filters">
              <form role="search" class="navbar-form navbar-left" accept-charset="UTF-8" action="{{url('notificaciones/search')}}" method="GET">
                <td></td>
                <td><input type="text" class="form-control" name="notificacion" maxlength="155"></td>
                <td><input type="text" class="form-control" name="tipo" maxlength="155"></td>
                <td><input type="text" class="form-control" name="estado" maxlength="100"></td>
                <td><input type="text" class="form-control" name="creado" maxlength="100"></td>
                <td name="acciones"><button type="submit" class="btn btn-primary">
                  <i class="fa fa-fw fa-search"></i></button></td>
              </form>
            </tr>
          </thead>
          <tbody>
        @foreach ($notificaciones as $notificacion)
        <tr data-key="169">
          <td>{{$notificacion->id}}</td>
          <td>{{ str_limit($notificacion->notificacion, 200) }}</td>
          <td>{{$notificacion->tipo}}</td>
          <td>{{$notificacion->estado}}</td>
          <td>{{$notificacion->created_at}}</td>
          <td><a href="{{url('notificaciones/view-id='.$notificacion->id)}}"
            title="Ver" aria-label="Ver" data-pjax="0">
            <span class="glyphicon glyphicon-eye-open"></span>
              </a>
            <a href="{{url('notificaciones/edit-id='.$notificacion->id)}}" title="Editar"
               aria-label="Actualizar" data-pjax="0">
              <span class="glyphicon glyphicon-pencil"></span></a>
              <a href="#" id="borraritem" name="{{$notificacion->id}}" title="notificaciones"
                aria-label="Eliminar">
                <span class="glyphicon glyphicon-trash"></span>
              </a></td>
              </tr>
        @endforeach
    </tbody>
  </table>
  {{ $notificaciones->links() }}
      </div>
      </div>
      </div>
  </div>
@stop
