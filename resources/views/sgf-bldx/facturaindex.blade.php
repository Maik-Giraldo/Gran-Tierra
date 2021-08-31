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
    <p><a class="btn btn-success" href="{{url('seguimiento-facturas/create')}}">Crear Seguimiento Factura</a></p>
      <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
        <div id="w1" style="font-size:12px;">
          <div class="summary">Mostrando
            <strong>{{($facturas->currentpage()-1)*$facturas->perpage()+1}}-{{$facturas->currentpage()*$facturas->perpage()}}</strong>
              de  <strong>{{$facturas->total()}}</strong> elementos</div>
              @if(Session::has('alert_success'))
                  <div class="alert alert-success" role="alert">
                      {!! session('alert_success') !!}
                    </div>
              <?php session()->forget('flash_message') ?>
              @endif
          <table class="table table-striped table-bordered"><thead>
            <tr>
              <th>@sortablelink('nombre_proveedor', 'Nombre')</th>
              <th>@sortablelink('nit', 'Nit')</th>
              <th>@sortablelink('numero_factura', 'Número Factura')</th>
              <th>@sortablelink('valor_a_pagar', 'Valor a Pagar')</th>
              <th>@sortablelink('estado', 'Estado')</th>
              <th style="width:88px"><a href="" data-sort="retenciones">Iva</a></th>
              <th style="width:88px"><a href="" data-sort="retenciones">Ica</a></th>
              <th style="width:88px"><a href="" data-sort="retenciones">Rtf</a></th>
              <th>@sortablelink('fecha_vencimiento', 'Fecha Venc.')</th>
              <th class="action-column"><a href="#">Acciones</a></th>
            </tr>
            <tr id="w1-filters" class="filters">
              <form role="search" class="navbar-form navbar-left" accept-charset="UTF-8" action="{{url('seguimiento-facturas/search')}}" method="GET">
                <td><input type="text" class="form-control" name="nombre_proveedor" maxlength="100"></td>
                <td><input type="number" class="form-control" name="nit" maxlength="100"></td>
                <td><input type="text" class="form-control" name="numero_factura" maxlength="155"></td>
                <td><input type="text" class="form-control" name="valor_total" maxlength="100"></td>
                <td><input type="text" class="form-control" name="estado" maxlength="100"></td>
                <td><input type="text" class="form-control" name="iva" maxlength="100"></td>
                <td><input type="text" class="form-control" name="ica" maxlength="100"></td>
                <td><input type="text" class="form-control" name="rtf" maxlength="100"></td>
                <td><input type="text" class="form-control" name="fecha_vencimiento" maxlength="10"></td>
                <td><button type="submit" class="btn btn-primary">
                  <i class="fa fa-fw fa-search"></i></button></td>
              </form>
            </tr>
          </thead>
          <tbody>
        @foreach ($facturas as $factura)
        <tr data-key="169">
          <td>{{$factura->nombre_proveedor}}</td>
          <td>{{$factura->nit}}</td>
          <td>{{$factura->numero_factura}}</td>
          <td>{{$factura->valor_a_pagar}}</td>
          <td>{{$factura->estado}}</td>
          <td>{{$factura->iva}}</td>
          <td>{{$factura->ica}}</td>
          <td>{{$factura->rtf}}</td>
          <td>{{$factura->fecha_vencimiento}}</td>
          <td><a href="{{url('seguimiento-facturas/view-id='.$factura->id)}}"
            title="Ver" aria-label="Ver" data-pjax="0">
            <span class="glyphicon glyphicon-eye-open"></span>
              </a>
            <a href="{{url('seguimiento-facturas/edit-id='.$factura->id)}}" title="Editar"
               aria-label="Actualizar" data-pjax="0">
              <span class="glyphicon glyphicon-pencil"></span></a>
              <a href="#" id="borraritem" name="{{$factura->id}}" title="seguimiento_facturas" aria-label="Eliminar">
                <span class="glyphicon glyphicon-trash"></span>
              </a></td>
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
