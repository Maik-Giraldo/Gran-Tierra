@extends('adminlte::page')

@section('title', 'Certiweb | Gran tierra')

@section('content_header')
    <h1>Ver Registro de Ica</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
      <li><a href="ica-index">Editar Ica</a></li>
      <li class="active">Ver Registro Ica</li>
    </ul>
@stop
@section('content')
<div class="col-xs-12">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-eye"></i> Vista de item</h3>
    </div>
    <div class="ica-view box-body">
    @foreach($dataica as $ica)
    <p><a class="btn btn-primary" href="ica-edit-{{$ica->id}}">Editar</a>
     <a class="btn btn-danger" href="#" name="{{$ica->id}}" id="borraricaitem">Borrar</a></p>
      <table id="w0" class="table table-striped table-bordered detail-view">
        <tr><th>ID</th><td>{{$ica->id}}</td></tr>
        <tr><th>Nit Tercero</th><td>{{$ica->Nit}}</td></tr>
        <tr><th>Concepto</th><td>{{$ica->Concepto}}</td></tr>
        <tr><th>Base Gravable</th><td>{{$ica->Base}}</td></tr>
        <tr><th>Porcentaje Iva</th><td>{{$ica->Porcentaje}}</td></tr>
        <tr><th>Valor Retenido</th><td>{{$ica->Retenido}}</td></tr>
        <tr><th>Año</th><td>{{$ica->Ano}}</td></tr>
        <tr><th>Periodo</th><td>{{$ica->Periodo}}</td></tr>
        <tr><th>Ciudad Expedido</th><td>{{$ica->Ciudad_Pago}}</td></tr>
        <tr><th>Ciudad Pago</th><td>{{$ica->Ciudad_Expedido}}</td></tr>
        <tr><th>Empresa</th><td>{{$ica->nombre_empresa}}</td></tr>
        <tr><th>Banco Pago</th><td>{{$ica->Banco_pago}}</td></tr>
        <tr><th>Fecha Expedición día/mes/año</th><td>{{$ica->fecha_expedicion}}</td></tr>
      </table>
      @endforeach
      </div>
    </div>
  </div>
@stop
