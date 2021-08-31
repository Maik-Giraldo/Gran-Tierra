@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Ver Registro de Iva</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
      <li><a href="iva-index">Editar Iva</a></li>
      <li class="active">Ver Registro Iva</li>
    </ul>
@stop
@section('content')
<div class="col-xs-12">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-eye"></i> Vista de item</h3>
    </div>
    <div class="iva-view box-body">
    @foreach($dataiva as $iva)
    <p><a class="btn btn-primary" href="iva-edit-{{$iva->id}}">Editar</a>
     <a class="btn btn-danger" href="#" name="{{$iva->id}}" id="borrarivaitem">Borrar</a></p>
      <table id="w0" class="table table-striped table-bordered detail-view">
        <tr><th>ID</th><td>{{$iva->id}}</td></tr>
        <tr><th>Nit Tercero</th><td>{{$iva->Nit}}</td></tr>
        <tr><th>Concepto</th><td>{{$iva->Concepto}}</td></tr>
        <tr><th>Base Gravable</th><td>{{$iva->Base}}</td></tr>
        <tr><th>Porcentaje Iva</th><td>{{$iva->Porcentaje}}</td></tr>
        <tr><th>Valor Iva</th><td>{{$iva->Iva}}</td></tr>
        <tr><th>Valor Retenido</th><td>{{$iva->Retenido}}</td></tr>
        <tr><th>Año</th><td>{{$iva->Ano}}</td></tr>
        <tr><th>Periodo</th><td>{{$iva->Periodo}}</td></tr>
        <tr><th>Ciudad Expedido</th><td>{{$iva->Ciudad_Expedido}}</td></tr>
        <tr><th>Ciudad Pago</th><td>{{$iva->Ciudad_Pago}}</td></tr>
        <tr><th>Empresa</th><td>{{$iva->nombre_empresa}}</td></tr>
        <tr><th>Fecha Expedición día/mes/año</th><td>{{$iva->fecha_expedicion}}</td></tr>
      </table>
      @endforeach
      </div>
    </div>
  </div>
@stop
