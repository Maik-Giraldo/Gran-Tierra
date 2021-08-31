@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Noticias</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
    <li class="active">Noticias</li>
    </ul>
@stop

@section('content')
<div class="box box-warning">
    <div class="seguimiento-facturas-index box-body">
    <p><a class="btn btn-success" href="{{url('noticias/create')}}">Crear Noticia</a></p>
      <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
        <div id="w1" style="font-size:12px;">
          <div class="summary">Mostrando
            <strong>{{($noticias->currentpage()-1)*$noticias->perpage()+1}}-{{$noticias->currentpage()*$noticias->perpage()}}</strong>
              de  <strong>{{$noticias->total()}}</strong> elementos</div>
          <table class="table table-striped table-bordered"><thead>
            <tr>
              <th>@sortablelink('id', 'Id')</th>
              <th><a href="#">Contenido</a></th>
              <th>@sortablelink('fecha', 'Fecha')</th>
              <th>@sortablelink('imagen', 'Imagen')</th>
              <th class="action-column"><a href="#">Acciones</a></th>
            </tr>
            <tr id="w1-filters" class="filters">
              <form role="search" class="navbar-form navbar-left" accept-charset="UTF-8" action="{{url('seguimiento-facturas/search')}}" method="GET">
                <td></td>
                <td><input type="text" class="form-control" name="conetnido" maxlength="155"></td>
                <td><input type="text" class="form-control" name="fecha" maxlength="155"></td>
                <td><input type="text" class="form-control" name="imagen" maxlength="100"></td>
                <td name="acciones"><button type="submit" class="btn btn-primary">
                  <i class="fa fa-fw fa-search"></i></button></td>
              </form>
            </tr>
          </thead>
          <tbody>
        @foreach ($noticias as $noticia)
        <tr data-key="169">
          <td>{{$noticia->id}}</td>
          <td>{{ str_limit($noticia->contenido, 200) }}</td>
          <td>{{$noticia->fecha}}</td>
          <td>{{$noticia->imagen}}</td>
          <td><a href="{{url('noticias/view-id='.$noticia->id)}}"
            title="Ver" aria-label="Ver" data-pjax="0">
            <span class="glyphicon glyphicon-eye-open"></span>
              </a>
            <a href="{{url('noticias/edit-id='.$noticia->id)}}" title="Editar"
               aria-label="Actualizar" data-pjax="0">
              <span class="glyphicon glyphicon-pencil"></span></a>
              <a href="#" id="borraritem" name="{{$noticia->id}}" title="noticias" 
                aria-label="Eliminar">
                <span class="glyphicon glyphicon-trash"></span>
              </a></td>
              </tr>
        @endforeach
    </tbody>
  </table>
  {{ $noticias->links() }}
      </div>
      </div>
      </div>
  </div>
@stop
