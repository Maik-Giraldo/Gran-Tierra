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
            <a class="btn btn-danger" href="" data-method="post">Borrar</a>
        </p>
        <table id="w0" class="table table-striped table-bordered detail-view">
          <tr><th>ID</th><td>{{$factura->id}}</td></tr>
          <tr><th>Nit</th><td>{{$factura->nit}}</td></tr>
          <tr><th>Tipo de documento</th><td>{{$factura->tipo_documento}}</td></tr>
          <tr><th>No. Documento</th><td>{{$factura->numero_documento}}</td></tr>
          <tr><th>Fecha documento</th><td>{{$factura->fecha_documento}}</td></tr>
          <tr><th>Vr. Neto Documento</th><td>{{$factura->valor_neto}}</td></tr>
          <tr><th>Retenciones</th><td>{{$factura->retenciones}}</td></tr>
          <tr><th>Cuotas de fomento</th><td>{{$factura->cuotas_fomento}}</td></tr>
          <tr><th>Descuentos comerciales</th><td>{{$factura->descuentos_comerciales}}</td></tr>
          <tr><th>Anticipos/Cartera</th><td>{{$factura->anticipos}}</td></tr>
          <tr><th>Banco</th><td>{{$factura->banco}}</td></tr>
          <tr><th>Fecha Pago</th><td>{{$factura->fecha_pago}}</td></tr>
          <tr><th>Vr. Pagado</th><td>{{$factura->valor_a_pagar}}</td></tr>
          <tr><th>Fecha Importacion</th><td>{{$factura->fecha_importacion}}</td></tr>
          <tr><th>Estado</th><td>{{$factura->estado}}</td></tr></table>
    </div>
    @endforeach
</div>
@stop
