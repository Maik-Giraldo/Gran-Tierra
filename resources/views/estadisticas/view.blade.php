@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Estadísticas</h1>
    <ul class="breadcrumb"><li><a href="{{url('home')}}">Inicio</a></li>
    <li class="active">Estadísticas</li>
    </ul>
@stop

@section('content')
<div class="box box-warning">
    <div class="seguimiento-facturas-index box-body">
      <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
        <div id="w1" style="font-size:12px;">
          <div class="summary">Mostrando
            <strong>{{($estadisticas->currentpage()-1)*$estadisticas->perpage()+1}}-{{$estadisticas->currentpage()*$estadisticas->perpage()}}</strong>
              de  <strong>{{$estadisticas->total()}}</strong> elementos</div>
          <table class="table table-striped table-bordered"><thead>
            <tr>
              <th>id</th>
              <th>Usuario</th>
              <th>Idioma</th>
              <th>Sistema Operativo</th>
              <th>Navegador</th>
              <th>Ip</th>
              <th>Fecha Visita</th>
              <th class="action-column"><a href="#">Acciones</a></th>
            </tr>
            <tr id="w1-filters" class="filters">
              <form role="search" class="navbar-form navbar-left" accept-charset="UTF-8" action="{{url('estadisticas/search')}}" method="GET">
                <td></td>
                <td><input type="text" class="form-control" name="user" maxlength="155"></td>
                <td><input type="text" class="form-control" name="language" maxlength="155"></td>
                <td><input type="text" class="form-control" name="os" maxlength="100"></td>
                <td><input type="text" class="form-control" name="browser" maxlength="100"></td>
                <td><input type="text" class="form-control" name="ip" maxlength="100"></td>
                <td><input type="text" class="form-control" name="visit_time" maxlength="100"></td>
                <td name="acciones"><button type="submit" class="btn btn-primary">
                  <i class="fa fa-fw fa-search"></i></button></td>
              </form>
            </tr>
          </thead>
          <tbody>
        @foreach ($estadisticas as $estadistica)
        <tr data-key="169">
          <td>{{$estadistica->id}}</td>
          <td>{{ str_limit($estadistica->user, 200) }}</td>
          <td>{{$estadistica->language}}</td>
          <td>{{$estadistica->os}}</td>
          <td>{{$estadistica->browser}}</td>
          <td><a href="http://ipinfo.io/{{$estadistica->ip}}" target="_blank">{{$estadistica->ip}}</a></td>
          <td>{{$estadistica->visit_time}}</td>
          <td>
            <a href="{{url('estadisticas/view-id='.$estadistica->id)}}"
            title="Ver" aria-label="Ver" data-pjax="0">
            <span class="glyphicon glyphicon-eye-open"></span>
              </a>
          </td>
              </tr>
        @endforeach
    </tbody>
  </table>
  {{ $estadisticas->links() }}
      </div>
      </div>
      </div>
  </div>
@stop
