@extends('adminlte::page')

@section('title', 'Certiweb | Valorem')

@section('content_header')
    <h1>Detalle de Seguimento de factura {{$numero_documento}}</h1>
    <ul class="breadcrumb"><li><a href="{{url('home')}}">Inicio</a></li>
      <li><a href="{{url('seguimiento-facturas')}}">Seguimiento Facturas</a></li>
    <li class="active">Seguimento de factura</li>
    </ul>
@stop
@section('content')
<div class="box box-warning">
  @foreach ($datafact as $factura)
    <div class="seguimiento-facturas-view box-body">
        <table id="w0" class="table table-striped table-bordered detail-view">
          <tr><th>Sociedad</th><td>{{$factura->nombre_empresa}}</td></tr>
          <tr><th>Nonmbre Proveedor</th><td>{{$factura->nombre_proveedor}}</td></tr>
          <tr><th>Nit</th><td>{{$factura->nit}}</td></tr>
          <tr><th>No. Factura</th><td>{{$factura->numero_factura}}</td></tr>
          <tr><th>Moneda</th><td>{{$factura->moneda}}</td></tr>
          <tr><th>Valor Factura</th><td>${{number_format(floatval($factura->valor_total),0,',','.')}}</td></tr>
          <tr><th>Fecha de Factura</th><td>{{date('d/m/Y', strtotime($factura->fecha_factura))}}</td></tr>
          <tr><th>RETEFUENTE</th><td>${{number_format(floatval($factura->rtf),0,',','.')}}</td></tr>
          <tr><th>RETEIVA</th><td>${{number_format(floatval($factura->reteiva),0,',','.')}}</td></tr>
          <tr><th>RETEICA</th><td>${{number_format(floatval($factura->ica),0,',','.')}}</td></tr>   
          <tr><th>Valor del pago</th><td>${{number_format(floatval($factura->valor_a_pagar),0,',','.')}}</td></tr>
          <tr><th>Fecha del Pago</th><td>{{date('d/m/Y', strtotime($factura->fecha_pago))}}</td></tr>
          <tr><th>Banco Receptor</th><td>{{$factura->banco_receptor}}</td></tr>
          <tr><th>Cuenta Bancaría #</th><td>{{$factura->cuenta_bancaria}}</td></tr>
          <tr><th>Estado</th><td>{{$factura->estado}}</td></tr>
        </table>
    </div>
    @endforeach
</div>
@stop
