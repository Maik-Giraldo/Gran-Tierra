@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Histórico de Facturas</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
    <li class="active">Histórico de Facturas</li>
    </ul>
@stop

@section('content')
<div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list"></i> Consulta de Facturas por Rangos de Fecha</h3>
      </div>
      <div class="iva-index box-body">
          <form method="POST" action="{{url('consulta-facturas-x-fechas')}}"
          accept-charset="UTF-8" id="consulta-facturas-por-fechas" name="consulta-facturas-por-fechas"
          enctype="multipart/form-data" target="_blank">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="nit" id="nit" value="{{Auth::user()->Nit}}">
            <div class="row">
              <div class="col-xs-2">
                  <input type="text" class="form-control" name="nit" value="{{ Auth::user()->Nit }}" required="required" readonly="readonly">
               </div>
               <div class="col-xs-2">
                  <select class="form-control" id="pdesde" name="id_empresa" required>
                     <option value="">Empresa..</option>
                     <option value="todas">Todas</option>
                      @foreach ($empresas as $empresa)
                        <option value="{{$empresa->id_empresa}}">{{$empresa->nit_empresa}}-{{$empresa->nombre_empresa}}</option>
                      @endforeach
                  </select>
               </div>
               <div class="col-xs-3">
                  <div id="fecha_pago_inicio-datetime" class="input-group date">
                    <span class="input-group-addon" id="fif" title="Seleccione fecha inicio">
                      <span class="glyphicon glyphicon-calendar">
                      </span>
                    </span>
                      <input type="text" id="fecha_pago_inicio" class="form-control form_datetime"
                       name="fecha_pago_inicio" placeholder="Fecha de pago (desde)">
                     </div>
                  <div class="help-block"></div>
               </div>
               <div class="col-xs-3">
                  <div id="fecha_pago_fin-datetime" class="input-group date">
                    <span class="input-group-addon" id="fff" title="Fecha de pago (hasta)">
                      <span class="glyphicon glyphicon-calendar">
                      </span>
                    </span>
                      <input type="text" id="fecha_pago_fin" class="form-control form_datetime"
                       name="fecha_pago_fin" placeholder="Fecha de pago (hasta)">
                     </div>
                  <div class="help-block"></div>
               </div>
                <div class="col-xs-2">
                  <button type="submit" class="btn btn-primary btn-block">Consultar</button>
                </div>
            </div>
          </form>
      </div>
  </div>
<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list"></i> Listado Filtrable</h3>
      </div>
    <div class="seguimiento-facturas-index box-body">
      <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
        <div id="w1" style="font-size:12px;">
          <div class="summary">Mostrando
            <strong>{{($facturas->currentpage()-1)*$facturas->perpage()+1}}-{{$facturas->currentpage()*$facturas->perpage()}}</strong>
              de  <strong>{{$facturas->total()}}</strong> elementos</div>
          <table class="table table-striped table-bordered"><thead>
            <tr>
              <th><a href="#">Sociedad</a></th>
              <th>@sortablelink('nombre_proveedor', 'Nombre')</th>
              <th>@sortablelink('numero_factura', 'Doc')</th>
              <th>@sortablelink('fecha_factura', 'Fecha Factura')</th>
              <th>@sortablelink('fecha_pago', 'Fecha de Pago')</th>
              <th>@sortablelink('valor_total', 'Valor Factura')</th>            
              <th>@sortablelink('valo_a_pagar', 'Valor del Pago')</th>
              <th>@sortablelink('estado', 'Estado')</th>
              <th class="action-column"><a href="#"></a></th>
            </tr>
            <tr id="w1-filters" class="filters">
              <form role="search" class="navbar-form navbar-left" accept-charset="UTF-8" action="{{url('seguimiento-facturas/search')}}" method="GET">
                <td>
                <select class="form-control" id="sociedad" name="sociedad">
                    <option value="" selected="selected" disabled="disabled">Empresa..</option>
                        @foreach ($empresas as $empresa)
                        <option value="{{$empresa->nombre_empresa}}">{{$empresa->nombre_empresa}}</option>
                        @endforeach
                    <option value="">Todas</option>
                    </select>
                </td>
                <td><input type="text" class="form-control" placeholder="Proveedor" name="proveedor" maxlength="155" disabled="disabled"></td>
                <td><input type="text" class="form-control" placeholder="Factura" name="numero_factura" maxlength="155"></td>
                <td><input type="text" placeholder="F. Factura" class="form-control" name="fecha_factura" title="Año-Mes-Día, o solo el año para ver las facturas de determinado año, o año-mes"/></td>
                <td><input type="text" placeholder="F. Pago" class="form-control" name="fecha_pago" title="Año-Mes-Día, o solo el año para ver las facturas de determinado año, o año-mes"/></td>
                <td><input type="text" class="form-control" placeholder="# Factura" name="valor_total" maxlength="155"></td>
                <td><input type="text" class="form-control" placeholder="Valor pago" name="valor_a_pagar" maxlength="155"></td>
                <td><input type="text" class="form-control" placeholder="Estado" name="estado" maxlength="155"></td>                
                <td><button type="submit" class="btn btn-primary">
                  <i class="fa fa-fw fa-search"></i></button></td>
              </form>
            </tr>
          </thead>
          <tbody>
        @foreach ($facturas as $factura)
        <tr data-key="169">
          <td>{{$factura->nombre_empresa}}</td>
          <td>{{$factura->nombre_proveedor}}</td>
          <td><a href="{{url('seguimiento-facturas/ver-id='.$factura->id)}}">{{$factura->numero_factura}}</a></td>
          <td>{{$factura->fecha_factura}}</td>
          <td>{{date('Y-m-d', strtotime($factura->fecha_pago))}}</td>
          <td>${{number_format(floatval($factura->valor_total),0,',','.')}}</td>
          <td>${{number_format(floatval($factura->valor_a_pagar),0,',','.')}}</td>
          <td>{{$factura->estado}}</td>          
          <td><a href="{{url('seguimiento-facturas/ver-id='.$factura->id)}}"
            title="Ver Detalle" aria-label="Ver" data-pjax="0">
            Ver detalle
              </a>
          </td>
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
