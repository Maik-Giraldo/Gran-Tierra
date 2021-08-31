@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Detalle de Venta de factura {{$numero_documento}}</h1>
    <ul class="breadcrumb"><li><a href="{{url('home')}}">Inicio</a></li>
      <li><a href="{{url('vender-facturas')}}">Facturas</a></li>
    <li class="active">Venta de Factura</li>
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
          <tr><th>Fecha de Radicación</th><td>{{date('d/m/Y', strtotime($factura->fecha_factura))}}</td></tr>
          <tr><th>Fecha de Vencimiento</th><td>{{date('d/m/Y', strtotime($factura->fecha_pago))}}</td></tr>
          <tr><th>Total Impuestos</th><td>${{number_format(floatval($factura->reteica),0,',','.')}}</td></tr> 
          <tr><th>Retenciones</th><td>${{number_format(floatval($factura->reteiva),0,',','.')}}</td></tr>  
          <tr style="color:#fff;"><th bgcolor="#3c8dbc">Neto a Pagar:</th><td bgcolor="#3c8dbc"><strong>${{number_format(floatval($factura->valor_total),0,',','.')}}</strong></td></tr>  
        </table>
    </div>
    <div class="form-group">
      <div class="col-md-12">
        <button type="submit" style="margin-top: 12px;" class="btn btn-success">Vender</button>
      </div>
    </div>
    @endforeach
</div>
@stop
