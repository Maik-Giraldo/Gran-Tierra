@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Ver Registro de accionista</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
      <li><a href="accionista-index">Editar accionista</a></li>
      <li class="active">Ver Registro accionista</li>
    </ul>
@stop
@section('content')
<div class="col-xs-12">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-eye"></i> Vista de item</h3>
    </div>
    <div class="ica-view box-body">
    @foreach($dataaccionista as $accionista)
    <p><a class="btn btn-primary" href="accionista-edit-{{$accionista->id}}">Editar</a>
     <a class="btn btn-danger" href="#" name="{{$accionista->id}}" id="borraraccionistaitem">Borrar</a></p>
      <table id="w0" class="table table-striped table-bordered detail-view">
        <tr><th>ID</th><td>{{$accionista->id}}</td></tr>
        <tr><th>Empresa</th><td>{{$accionista->nombre_empresa}}</td></tr>
        <tr><th>Nit Accionista</th><td>{{$accionista->Nit_accionista}}</td></tr>
        <tr><th>Accionista</th><td>{{$accionista->Accionista}}</td></tr>
        <tr><th>Acciones</th><td>{{$accionista->Cantidad}}</td></tr>
        <tr><th>Valor Nominal</th><td>{{$accionista->Valor_Nominal}}</td></tr>
        <tr><th>Valor Intrinseco Valorizado</th><td>{{$accionista->Valor_Intrinseco_Valorizado}}</td></tr>
        <tr><th>Valor Intrinseco Sin Valorizar</th><td>{{$accionista->Valor_Intrinseco_Sin_Valorizar}}</td></tr>
        <tr><th>Total Utilidades 2016 y Anteriores</th><td>{{$accionista->total_utilidades_2016_anteriores}}</td></tr>
        <tr><th>Total Utilidades 2017  y años siguientes</th><td>{{$accionista->total_utilidades_2017_siguientes}}</td></tr>
        <tr><th>Gravado Utilidades 2016 y Anteriores</th><td>{{$accionista->gravado_utilidades_2016_anteriores}}</td></tr>
        <tr><th>Gravado Utilidades 2017 Siguientes</th><td>{{$accionista->gravado_utilidades_2017_siguientes}}</td></tr>
        <tr><th>No Gravado Utilidades 2016 y Anteriores</th><td>{{$accionista->no_gravado_utilidades_2016_anteriores}}</td></tr>
        <tr><th>No Gravado Utilidades 2017 y siguientes</th><td>{{$accionista->no_gravado_utilidades_2017_siguientes}}</td></tr>
        <tr><th>Retención en la fuente de utilidades 2016 y anteriores</th><td>{{$accionista->rtf_utilidades_2016_anteriores}}</td></tr>
        <tr><th>Retención en la fuente de utilidades 2017 y años siguientes</th><td>{{$accionista->rtf_utilidades_2017_siguientes}}</td></tr>
        <tr><th>Dirección</th><td>{{$accionista->direccion}}</td></tr>
        <tr><th>Contador</th><td>{{$accionista->Contador}}</td></tr>
        <tr><th>Tp no</th><td>{{$accionista->Tp_no}}</td></tr>
        <tr><th>Año</th><td>{{$accionista->Ano}}</td></tr>
        <tr><th>Ciudad</th><td>{{$accionista->Ciudad_Expedido}}</td></tr>
      </table>
      @endforeach
      </div>
    </div>
  </div>
@stop
