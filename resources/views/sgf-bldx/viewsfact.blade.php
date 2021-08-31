@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Ver Seguimento de factura {{$numero_documento}}</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
      <li><a href="{{url('seguimiento-facturas')}}">Seguimiento Facturas</a></li>
    <li class="active">Ver Seguimento de factura</li>
    </ul>
@stop
@section('content')
<div class="box box-warning">
  @foreach ($datafact as $factura)
    <div class="seguimiento-facturas-view box-body">
        <p><a class="btn btn-primary" href="{{url('seguimiento-facturas/edit-id='.$factura->id)}}">Editar</a>
            <a class="btn btn-danger" href="/seguimiento-facturas/deletef-id={{$factura->id}}">Borrar</a>
        </p>
        <table id="w0" class="table table-striped table-bordered detail-view">
          <tr><th>ID</th><td>{{$factura->id}}</td></tr>
          <tr><th>Nonmbre Proveedor</th><td>{{$factura->nombre_proveedor}}</td></tr>
          <tr><th>Nit</th><td>{{$factura->nit}}</td></tr>
          <tr><th>No. Documento</th><td>{{$factura->numero_factura}}</td></tr>
          <tr><th>Valor Total</th><td>{{$factura->valor_total}}</td></tr>
          <tr><th>Moneda</th><td>{{$factura->moneda}}</td></tr>
          <tr><th>Valor a Pagar</th><td>{{$factura->valor_a_pagar}}</td></tr>
          <tr><th>Iva</th><td>{{$factura->iva}}</td></tr>
          <tr><th>Ica</th><td>{{$factura->ica}}</td></tr>
          <tr><th>Rtf</th><td>{{$factura->rtf}}</td></tr>
          <tr><th>Fecha Vencimiento</th><td>{{$factura->fecha_vencimiento}}</td></tr>
          <tr><th>Estado</th><td>{{$factura->estado}}</td></tr></table>
    </div>
    @endforeach
</div>
@stop
