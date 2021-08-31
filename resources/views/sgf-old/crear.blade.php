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
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group field-seguimientofacturas-nit required">
          <label class="control-label" for="seguimientofacturas-nit">Nit</label>
          <input type="text" id="seguimientofacturas-nit" class="form-control" name="nit" maxlength="255">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-tipo_documento required">
          <label class="control-label" for="seguimientofacturas-tipo_documento">Tipo de documento</label>
          <input type="text" id="seguimientofacturas-tipo_documento" class="form-control" name="tipo_documento" maxlength="60">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-numero_documento required">
          <label class="control-label" for="seguimientofacturas-numero_documento">No. Documento</label>
          <input type="text" id="seguimientofacturas-numero_documento" class="form-control" name="numero_documento" maxlength="255">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-fecha_documento required">
          <label class="control-label" for="seguimientofacturas-fecha_documento">Fecha documento</label>
          <input type="date" id="seguimientofacturas-fecha_documento" class="form-control" name="fecha_documento">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-fecha_pago required">
          <label class="control-label" for="seguimientofacturas-fecha_pago">Fecha Pago</label>
          <input type="date" id="seguimientofacturas-fecha_pago" class="form-control" name="fecha_pago">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-valor_neto required">
          <label class="control-label" for="seguimientofacturas-valor_neto">Vr. Neto Documento</label>
          <input type="text" id="seguimientofacturas-valor_neto" class="form-control" name="valor_neto">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-retenciones required">
          <label class="control-label" for="seguimientofacturas-retenciones">Retenciones</label>
          <input type="text" id="seguimientofacturas-retenciones" class="form-control" name="retenciones">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-cuotas_fomento required">
          <label class="control-label" for="seguimientofacturas-cuotas_fomento">Cuotas de fomento</label>
          <input type="text" id="seguimientofacturas-cuotas_fomento" class="form-control" name="cuotas_fomento">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-descuentos_comerciales required">
          <label class="control-label" for="seguimientofacturas-descuentos_comerciales">Descuentos comerciales</label>
          <input type="text" id="seguimientofacturas-descuentos_comerciales" class="form-control" name="descuentos_comerciales">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-anticipos required">
          <label class="control-label" for="seguimientofacturas-anticipos">Anticipos/Cartera</label>
          <input type="text" id="seguimientofacturas-anticipos" class="form-control" name="anticipos">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-valor_a_pagar required">
          <label class="control-label" for="seguimientofacturas-valor_a_pagar">Vr. Pagado</label>
          <input type="text" id="seguimientofacturas-valor_a_pagar" class="form-control" name="valor_a_pagar">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-banco required">
          <label class="control-label" for="seguimientofacturas-banco">Banco</label>
          <input type="text" id="seguimientofacturas-banco" class="form-control" name="banco">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-fecha_importacion required">
          <label class="control-label" for="seguimientofacturas-fecha_importacion">Fecha Importacion</label>
          <input type="date" id="seguimientofacturas-fecha_importacion" class="form-control" name="fecha_importacion">
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
