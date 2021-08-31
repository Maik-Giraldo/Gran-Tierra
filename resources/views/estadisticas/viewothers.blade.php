@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Estadísticas</h1>
    <ul class="text-left">
      <li><a href="{{url('estadisticas')}}">Estadísticas de Ingreso al Sistema</a></li>
    </ul>
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
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>@sortablelink('id', 'Id')</th>
        <th>@sortablelink('usuario', 'Usuario')</th>
        <th>@sortablelink('nit', 'Nit')</th>
        <th>@sortablelink('fecha', 'Fecha y Hora')</th>
        <th>@sortablelink('accion', 'Accion')</th>
        <th>@sortablelink('anio', 'Año')</th>
        <th>@sortablelink('periodo', 'Periodo')</th>
        <th>@sortablelink('periodo', 'Empresa')</th>
      </tr>
      <tr id="w1-filters" class="filters">
        <form role="search" class="navbar-form navbar-left" accept-charset="UTF-8" action="{{url('estadisticas/search-certs')}}" method="GET">
          <td></td>
          <td><input type="text" class="form-control" name="usuario" maxlength="100"></td>
          <td><input type="number" class="form-control" name="nit" maxlength="155"></td>
          <td><input type="text" class="form-control" name="fecha" maxlength="155"></td>
          <td><input type="text" class="form-control" name="accion" maxlength="155"></td>
          <td><input type="number" class="form-control" name="anio" maxlength="155"></td>
          <td><input type="number" class="form-control" name="periodo" maxlength="100"></td>
          <td><input type="text" class="form-control" name="empresa" maxlength="100"></td>
          <td><button type="submit" class="btn btn-primary">
            <i class="fa fa-fw fa-search"></i></button></td>
        </form>
      </tr>
    </thead>
								<tbody>
                  @foreach ($estadisticas as $estadistica)
                <tr>
									<td>{{$estadistica->id}}</td>
									<td>{{$estadistica->usuario}}</td>
									<td>{{$estadistica->nit}}</td>
									<td>{{$estadistica->fecha}} {{$estadistica->hora}}</td>
                  <td>{{$estadistica->accion}}</td>
									<td>{{$estadistica->anio}}</td>
                  <td>{{$estadistica->periodo}}</td>
                  <td>{{$estadistica->empresa}}</td>
                  <td>
                    <a href="{{url('estadisticas-certificados/view-id='.$estadistica->id)}}"
                    title="Ver" aria-label="Ver" data-pjax="0">
                    <span class="glyphicon glyphicon-eye-open"></span>
                      </a>
                  </td>
								</tr>
                @endforeach
              </tbody></table>
              {{ $estadisticas->links() }}
      </div>
      </div>
      </div>
  </div>
@stop
