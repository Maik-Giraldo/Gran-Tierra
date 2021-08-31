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
          <table class="table table-striped table-bordered"><thead>
            <tr>
              <th>@sortablelink('nit', 'Nit')</th>
              <th>@sortablelink('tipo_documento', 'Tipo de Documento')</th>
              <th>@sortablelink('numero_documento', 'Número Documento')</th>
              <th>@sortablelink('fecha_documento', 'Fecha')</th>
              <th style="width:100px"><a href="" data-sort="valor_neto">Vr. Neto</a></th>
              <th style="width:88px"><a href="" data-sort="retenciones">Retenciones</a></th>
              <th style="width:88px"><a href="" data-sort="cuotas_fomento">Cuotas de fomento</a></th>
              <th style="width:88px"><a href="" data-sort="descuentos_comerciales">Descuentos comerciales</a></th>
              <th style="width:60px"><a href="" data-sort="anticipos">Anticipos</a></th>
              <th style="width:100px"><a href="" data-sort="valor_a_pagar">Vr. Pagado</a></th>
              <th>@sortablelink('fecha_pago', 'Fecha Pago')</th>
              <th class="action-column"><a href="#">Acciones</a></th>
            </tr>
            <tr id="w1-filters" class="filters">
              <form role="search" class="navbar-form navbar-left" accept-charset="UTF-8" action="{{url('seguimiento-facturas/search')}}" method="GET">
                <td><input type="number" class="form-control" name="nit" maxlength="100"></td>
                <td><input type="text" class="form-control" name="tipo_documento" maxlength="155"></td>
                <td><input type="text" class="form-control" name="numero_documento" maxlength="155"></td>
                <td><input type="text" class="form-control" name="fecha_documento" maxlength="100"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td><td></td>
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
          <td>{{$factura->tipo_documento}}</td>
          <td>{{$factura->numero_documento}}</td>
          <td>{{$factura->fecha_documento}}</td>
          <td>{{$factura->valor_neto}}</td>
          <td>{{$factura->retenciones}}</td>
          <td>{{$factura->cuotas_fomento}}</td>
          <td>{{$factura->descuentos_comerciales}}</td>
          <td>{{$factura->anticipos}}</td>
          <td>{{$factura->valor_a_pagar}}</td>
          <td>{{$factura->fecha_pago}}</td>
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
