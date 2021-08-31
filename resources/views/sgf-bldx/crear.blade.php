@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Crear Seguimento de factura</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
      <li><a href="{{url('seguimiento-facturas')}}">Seguimiento Facturas</a></li>
    <li class="active">Crear Seguimento de factura</li>
    </ul>
@stop
@section('content')
<div class="box box-warning">
	<div class="seguimiento-facturas-create box-body">
    <div class="seguimiento-facturas-form">
      <form id="csgfcts" action="{{url('seguimiento-facturas/create')}}" method="post">
        @if(Session::has('flash_message'))
            <div class="alert alert-success" role="alert">
                {!! session('flash_message') !!}
              </div>
        <?php session()->forget('flash_message') ?>
        @endif
        @if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group field-seguimientofacturas-nit required">
          <label class="control-label" for="seguimientofacturas-nit">Nombre Proveedor</label>
          <input type="text" id="seguimientofacturas-namepr" class="form-control" name="nombre_proveedor" maxlength="255">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-nit required">
          <label class="control-label" for="seguimientofacturas-nit">Nit</label>
          <input type="text" id="seguimientofacturas-nit" class="form-control" name="nit" maxlength="255">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-numero_documento required">
          <label class="control-label" for="seguimientofacturas-numero_documento">No. Factura</label>
          <input type="text" id="seguimientofacturas-numero_documento" class="form-control" name="numero_factura" maxlength="255">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-fecha_pago required">
          <label class="control-label" for="seguimientofacturas-fecha_pago">Fecha Factura</label>
          <input type="date" id="seguimientofacturas-factura" class="form-control" name="fecha_factura">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-valor_neto required">
          <label class="control-label" for="seguimientofacturas-valor_neto">Valor Total</label>
          <input type="number" id="seguimientofacturas-valor_neto" class="form-control" name="valor_total">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-nit required">
          <label class="control-label" for="seguimientofacturas-nit">Moneda</label>
          <input type="text" id="seguimientofacturas-namepr" class="form-control" name="moneda" maxlength="255">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-valor_neto required">
          <label class="control-label" for="seguimientofacturas-valor_neto">Valor a Pagar</label>
          <input type="number" id="seguimientofacturas-valor_neto" class="form-control" name="valor_a_pagar">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-retenciones required">
          <label class="control-label" for="seguimientofacturas-retenciones">Iva</label>
          <input type="number" id="seguimientofacturas-retenciones" class="form-control" name="iva">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-retenciones required">
          <label class="control-label" for="seguimientofacturas-retenciones">Ica</label>
          <input type="number" id="seguimientofacturas-retenciones" class="form-control" name="ica">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-retenciones required">
          <label class="control-label" for="seguimientofacturas-retenciones">Rtf</label>
          <input type="number" id="seguimientofacturas-retenciones" class="form-control" name="rtf">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-fecha_importacion required">
          <label class="control-label" for="seguimientofacturas-fecha_importacion">Fecha Vencimiento</label>
          <input type="date" id="seguimientofacturas-fecha_importacion" class="form-control" name="fecha_vencimiento">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-estado required">
          <label class="control-label" for="seguimientofacturas-estado">Estado</label>
          <select id="seguimientofacturas-estado" class="form-control" name="estado">
            <option value="">Seleccione el estado...</option>
            <option value="Pendiente de pago">Pendiente de pago</option>
            <option value="Pagada">Pagada</option>
          </select>
          <div class="help-block"></div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">Crear</button>    </div>
        </form>
      </div>
      </div>
    </div>
@stop
