@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Pronto Pago</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
    <li class="active">Vender Facturas</li>
    </ul>
@stop
@section('content')
<div class="box box-warning">
  <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-list"></i> Listado De Facturas Vendibles para Pronto Pago</h3>
  </div>  
<!-- /.box-header -->
<!-- form start -->
<div class="summary">Mostrando
  <strong>{{($facturas->currentpage()-1)*$facturas->perpage()+1}}-{{$facturas->currentpage()*$facturas->perpage()}}</strong>
    de  <strong>{{$facturas->total()}}</strong> elementos
</div>
<form role="form" name="ventafacturas" id="ventafacturas" class="navbar-form" accept-charset="UTF-8" action="{{url('ventafacturas')}}" method="POST">
<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
<div class="box-body">
<table class="table table-striped table-bordered"><thead>
  <tr>
    <th>Nombre</th>
    <th>No. Factura</th>
    <th>Fecha Factura</th>
    <th>Fecha Vencimiento</th>
    <th>% Negociación</th>
    <th>Valor Neto</th>
    <th>Valor a Pagar</th>
    <th><input type="checkbox" class="select-on-check-all" id="selection_all" name="selection_all" value="1"></th>
    <th class="action-column"><a href="#">Acciones</a></th>
  </tr>
</thead>
<tbody>
@foreach ($facturas as $factura)
<tr data-key="169">
<td>{{$factura->nombre_proveedor}}</td>
<td><a href="{{url('seguimiento-facturas/ver-id='.$factura->id)}}">{{$factura->numero_factura}}</a></td>
<td>{{$factura->fecha_factura}}</td>
<td>{{date('Y-m-d', strtotime($factura->fecha_pago))}}</td>
<td>1.60</td>
<td>${{number_format(floatval($factura->valor_a_pagar),0,',','.')}}</td>
<td>${{number_format(floatval($factura->valor_total),0,',','.')}}</td>
<td><input type="checkbox" id="itemcheck" class="checksavon" name="{{$factura->id}}" value="{{$factura->id}}"></td>
<td><a href="{{url('vender-facturas/factura-id='.$factura->id)}}"
  title="Vender" aria-label="Vender" data-pjax="0">
  Vender
    </a>
</td>
    </tr>
@endforeach
</tbody>
<tfoot>
<tr>
  <td colspan="5" style="text-align: right;"><strong>Totales:</strong></td>
  <td>$15.030.102</td>
  <td>$10.937.337</td>
</tr>
</tfoot>
</table>
{{ $facturas->links() }}
<div class="row">
<div class="col-sm-8"></div>
<div class="col-sm-4 text-right">
  <div class="form-inline">
    <select id="user-grid-5bdc3c6444915-bulk-actions" class="form-control input-sm" name="grid-bulk-actions" data-ok-button="#user-grid-5bdc3c6444915-ok-button">
      <option value="" selected>--- Con lo seleccionado ---</option>
      <option value="vender">Vender</option>
      </optgroup>
    </select>
      <button type="submit" class="grid-bulk-ok-button btn btn-sm btn-default" target="_blank">Ok</button>
  </div><br>
  <div class="summary">
    <strong>Mostrando {{($facturas->currentpage()-1)*$facturas->perpage()+1}}-{{$facturas->currentpage()*$facturas->perpage()}}</strong>
      de  <strong>{{$facturas->total()}}</strong> elementos
    </div>
</div>
</div>
</div>
</form>
</div>
@stop
