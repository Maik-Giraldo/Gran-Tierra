@extends('adminlte::page')

@section('title', 'Certiweb | Valorem')

@section('content_header')
    <h1>Editar Seguimento de factura {{$numero_documento}}</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
      <li><a href="{{url('seguimiento-facturas')}}">Seguimiento Facturas</a></li>
    <li class="active">Editar Seguimento de factura</li>
    </ul>
@stop
@section('content')
<div class="box box-warning">
	<div class="seguimiento-facturas-update box-body">
    <div class="seguimiento-facturas-form">
      <form id="csgfcts" action="updatesfacts" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
        @foreach ($datafact as $factura)
        <div class="form-group field-seguimientofacturas-nit required">
          <label class="control-label" for="seguimientofacturas-nit">Sociedad</label>
          <input type="text" id="seguimientofacturas-nit" class="form-control" name="empresa" value="{{$factura->nombre_empresa}}" maxlength="255" disabled="disabled">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-numero_documento required">
          <label class="control-label" for="seguimientofacturas-numero_documento">Nombre Proveedor</label>
          <input type="text" id="seguimientofacturas-nombre_proveedor" class="form-control" name="nombre_proveedor" value="{{$factura->nombre_proveedor}}" maxlength="255">
          <div class="help-block"></div>
        </div>        
        <div class="form-group field-seguimientofacturas-nit required">
          <label class="control-label" for="seguimientofacturas-nit">Nit</label>
          <input type="text" id="seguimientofacturas-nit" class="form-control" name="nit" value="{{$factura->nit}}" maxlength="255">
          <input type="hidden" id="seguimientofacturas-id" class="form-control" name="id" value="{{$factura->id}}" maxlength="255">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-numero_documento required">
          <label class="control-label" for="seguimientofacturas-numero_documento">No. Factura</label>
          <input type="text" id="seguimientofacturas-numero_documento" class="form-control" name="numero_factura" value="{{$factura->numero_factura}}" maxlength="255">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-moneda required">
          <label class="control-label" for="seguimientofacturas-moneda">Moneda</label>
          <input type="text" id="seguimientofacturas-moneda" class="form-control" name="moneda" value="{{$factura->moneda}}">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-valor_neto required">
          <label class="control-label" for="seguimientofacturas-valor_neto">Valor Factura</label>
          <input type="number" id="seguimientofacturas-valor_neto" class="form-control" name="valor_total" value="{{$factura->valor_total}}">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-fecha_pago required">
          <label class="control-label" for="seguimientofacturas-fecha_pago">Fecha Factura</label>
          <input type="date" id="seguimientofacturas-fecha_pago" class="form-control" name="fecha_factura" value="{{$factura->fecha_factura}}">

          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-retenciones required">
          <label class="control-label" for="seguimientofacturas-retenciones">Iva</label>
          <input type="number" id="seguimientofacturas-retenciones" class="form-control" name="iva" value="{{$factura->iva}}">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-retenciones required">
          <label class="control-label" for="seguimientofacturas-retenciones">Retefuente</label>
          <input type="number" id="seguimientofacturas-retenciones" class="form-control" name="rtf" value="{{$factura->rtf}}">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-retenciones required">
          <label class="control-label" for="seguimientofacturas-reteiva">ReteIva</label>
          <input type="number" id="seguimientofacturas-reteiva" class="form-control" name="reteiva" value="{{$factura->reteiva}}">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-retenciones required">
          <label class="control-label" for="seguimientofacturas-retenciones">ReteIca</label>
          <input type="number" id="seguimientofacturas-retenciones" class="form-control" name="ica" value="{{$factura->ica}}">
          <div class="help-block"></div>
        </div>                  
        <div class="form-group field-seguimientofacturas-valor_neto required">
          <label class="control-label" for="seguimientofacturas-valor_neto">Valor del Pago</label>
          <input type="number" id="seguimientofacturas-valor_neto" class="form-control" name="valor_a_pagar" value="{{$factura->valor_a_pagar}}">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-fecha_importacion required">
          <label class="control-label" for="seguimientofacturas-fecha_importacion">Fecha de Pago</label>
          <input type="date" id="seguimientofacturas-fecha_importacion" class="form-control" name="fecha_pago" value="{{$factura->fecha_pago}}">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-valor_neto required">
          <label class="control-label" for="seguimientofacturas-valor_neto">Banco Receptor</label>
          <input type="text" id="seguimientofacturas-valor_neto" class="form-control" name="banco_receptor" value="{{$factura->banco_receptor}}">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-valor_neto required">
          <label class="control-label" for="seguimientofacturas-valor_neto">Cuenta Bancaría No.</label>
          <input type="number" id="seguimientofacturas-valor_neto" class="form-control" name="cuenta_bancaria" value="{{$factura->cuenta_bancaria}}">
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-estado required">
          <label class="control-label" for="seguimientofacturas-estado">Estado</label>
          <select id="seguimientofacturas-estado" class="form-control" name="estadot" disabled="disabled">
            <option value="{{$factura->estado}}" selected>{{$factura->estado}}</option>
            @if ($factura->estado == 'Pagada')
            <option value="Pendiente de pago">Pendiente de pago</option>
            @else
            <option value="Pagada">Pagada</option>
            @endif
          </select>
          <input type="hidden" name="estado" value="{{$factura->estado}}"/>
          <div class="help-block"></div>
        </div>
        <div class="form-group field-seguimientofacturas-texto required">
          <label class="control-label" for="seguimientofacturas-texto">texto</label>
          <input type="text" id="seguimientofacturas-texto" class="form-control" name="texto" value="{{$factura->texto}}">
          <div class="help-block"></div>
        </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar</button>
           </div>
           @endforeach
          </form>
        </div>
	     </div>
     </div>
@stop
