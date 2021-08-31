@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Seguimento de facturas</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
    <li class="active">Seguimento de facturas</li>
    </ul>
@stop

@section('content')
<div class="box box-warning">
    <div class="seguimiento-facturas-index box-body">
      <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
        <div id="w1" style="font-size:12px;">
          <div class="summary">Mostrando
            <strong>{{($facturas->currentpage()-1)*$facturas->perpage()+1}}-{{$facturas->currentpage()*$facturas->perpage()}}</strong>
              de  <strong>{{$facturas->total()}}</strong> elementos</div>
          <table class="table table-striped table-bordered"><thead>
            <tr>
              <th><a href="#">Nit</a></th>
              <th>@sortablelink('numero_factura', 'Número Factura')</th>
              <th>@sortablelink('valor_total', 'Valor Total')</th>
              <th>@sortablelink('estado', 'Estado')</th>
              <th style="width:88px"><a href="" data-sort="retenciones">Iva</a></th>
              <th style="width:88px"><a href="" data-sort="retenciones">Ica</a></th>
              <th style="width:88px"><a href="" data-sort="retenciones">Rtf</a></th>
              <th>@sortablelink('fecha_pago', 'Fecha de Pago')</th>
              <th class="action-column"><a href="#">Acciones</a></th>
            </tr>
            <tr id="w1-filters" class="filters">
              <form role="search" class="navbar-form navbar-left" accept-charset="UTF-8" action="{{url('seguimiento-facturas/search')}}" method="GET">
                <td>{{Auth::user()->Nit}}</td>
                <td><input type="text" class="form-control" name="numero_documento" maxlength="155"></td>
                <td><input type="text" class="form-control" name="valor_total" maxlength="100"></td>
                <td><input type="text" class="form-control" name="estado" maxlength="100"></td>
                <td><input type="text" class="form-control" name="iva" maxlength="100"></td>
                <td><input type="text" class="form-control" name="ica" maxlength="100"></td>
                <td><input type="text" class="form-control" name="rtf" maxlength="100"></td>
                <td><input type="text" class="form-control" name="fecha_pago" maxlength="10"></td>
                <td><button type="submit" class="btn btn-primary">
                  <i class="fa fa-fw fa-search"></i></button></td>
              </form>
            </tr>
          </thead>
          <tbody>
        @foreach ($facturas as $factura)
        <tr data-key="169">
          <td>{{$factura->nit}}</td>
          <td>{{$factura->numero_factura}}</td>
          <td>{{$factura->valor_total}}</td>
          <td>{{$factura->estado}}</td>
          <td>{{$factura->iva}}</td>
          <td>{{$factura->ica}}</td>
          <td>{{$factura->rtf}}</td>
          <td>{{$factura->fecha_pago}}</td>
              </tr>
        @endforeach
    </tbody>
  </table>
  {{ $facturas->links() }}
      </div>
      </div>
      </div>
  </div>
@stop
