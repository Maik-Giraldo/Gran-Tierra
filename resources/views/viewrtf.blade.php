@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Ver Registro de Rtf</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
      <li><a href="rtf-index">Editar Rtf</a></li>
      <li class="active">Ver Registro Rtf</li>
    </ul>
@stop
@section('content')
<div class="col-xs-12">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-eye"></i> Vista de item</h3>
    </div>
    <div class="ica-view box-body">
    @foreach($datartf as $rtf)
    <p><a class="btn btn-primary" href="rtf-edit-{{$rtf->id}}">Editar</a>
     <a class="btn btn-danger" href="#" name="{{$rtf->id}}" id="borrarrtfitem">Borrar</a></p>
      <table id="w0" class="table table-striped table-bordered detail-view">
        <tr><th>ID</th><td>{{$rtf->id}}</td></tr>
        <tr><th>Nit Tercero</th><td>{{$rtf->Nit}}</td></tr>
        <tr><th>Concepto</th><td>{{$rtf->Concepto}}</td></tr>
        <tr><th>Base Gravable</th><td>{{$rtf->Base}}</td></tr>
        <tr><th>Porcentaje Iva</th><td>{{$rtf->Porcentaje}}</td></tr>
        <tr><th>Valor Retenido</th><td>{{$rtf->Retenido}}</td></tr>
        <tr><th>Año</th><td>{{$rtf->Ano}}</td></tr>
        <tr><th>Periodo</th><td>{{$rtf->Mes}}</td></tr>
        <tr><th>Ciudad Expedido</th><td>{{$rtf->Ciudad_Pago}}</td></tr>
        <tr><th>Ciudad Pago</th><td>{{$rtf->Ciudad_Expedido}}</td></tr>
        <tr><th>Empresa</th><td>{{$rtf->nombre_empresa}}</td></tr>
        <tr><th>Banco Pago</th><td>{{$rtf->Banco_pago}}</td></tr>
        <tr><th>Fecha Expedición día/mes/año</th><td>{{$rtf->fecha_expedicion}}</td></tr>
      </table>
      @endforeach
      </div>
    </div>
  </div>
@stop
