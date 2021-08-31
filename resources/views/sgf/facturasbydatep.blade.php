@extends('adminlte::pagenobar')

@section('title', 'Certiweb | Valorem')

@section('content_header')
    <h1>Seguimento de facturas</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
	<li><a href="{{url('seguimiento-facturas')}}">Seguimiento de Facturas</a></li>
    <li class="active">Consulta por Rango de Fechas</li>
    </ul>
@stop

@section('content')
<div class="box box-warning">
	<div class="box-header with-border">
		@if($fechainicio > $fechafin)
		  	<div class="alert alert-danger" role="alert">
		      <h4>La fecha de Inicio no debe ser mayor a la final.</h4>
			</div>
        @elseif(count($facturas)<1)
        <h2 class="box-title"><i class="fa fa-list"></i> La consulta no produjo resultados.</h2>
        @else
        <h2 class="box-title"><i class="fa fa-list"></i> Facturas entre el 
    	<strong>{{date('d-m-Y', strtotime($fechainicio))}}</strong>
    	 y el <strong>{{date('d-m-Y', strtotime($fechafin))}}</strong> del Nit: <strong>{{$nit}}</strong> </strong>
    	</h2>
    	@endif    	
      </div>
    <div class="seguimiento-facturas-index box-body">
      <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
        <div id="w1" style="font-size:12px;">
         <!-- <p><a class="btn btn-primary" href="{{url('seguimiento-facturas')}}">Volver</a> -->
        </p>
          <table class="table table-striped table-bordered"><thead>
            <tr id="w1-filters" class="filters">
              <form>
                <td><label>Empresa</label></td>
                <td><label>Proveedor</label></td>
                <td><label>Nit</label></td>
                <td><label>Factura No.</label></td>
                <td><label>Moneda</label></td>
                <td><label>Fecha Factura</label></td>                
                <td><label>Valor Factura</label></td>
                <td><label>IVA</label></td>
                <td><label>RETE FUENTE</label></td>
                <td><label>RETE IVA</label></td>
                <td><label>RETE ICA</label></td>
                <td><label>Valor del Pago</label></td>
                <td><label>Estado</label></td> 
                <td><label>Fecha de Pago</label></td>                
                <td><label>Banco Receptor</label></td>                
                <td><label>Cuenta Bancaría No.</label></td>   
              </form>
            </tr>
          </thead>
          <tbody>
         	<?php 
		      $suma_valor_pagado = 0; 
	      	?> 		
        @foreach ($facturas as $factura)
        <tr data-key="169">
          <td>{{$factura->nombre_empresa}}</td>
          <td>{{$factura->nombre_proveedor}}</td>
          <td>{{$factura->nit}}</td>
          <td><a href="{{url('seguimiento-facturas/ver-id='.$factura->id)}}">{{$factura->numero_factura}}</a></td>
          <td>{{$factura->moneda}}</td>
          <td>{{date('d-m-Y', strtotime($factura->fecha_factura))}}</td>                   
          <td>${{number_format(floatval($factura->valor_total),0,',','.')}}</td>
          <td>${{number_format(floatval($factura->iva),0,',','.')}}</td>
          <td>${{number_format(floatval($factura->rtf),0,',','.')}}</td>
          <td>${{number_format(floatval($factura->reteiva),0,',','.')}}</td>
          <td>${{number_format(floatval($factura->ica),0,',','.')}}</td>
          <td>${{number_format(floatval($factura->valor_a_pagar),0,',','.')}}</td> 
          <td>{{$factura->estado}}</td>
          <td>{{date('d-m-Y', strtotime($factura->fecha_pago))}}</td>          
          <td>{{$factura->banco_receptor}}</td>        
          <td>{{$factura->cuenta_bancaria}}</td>
        </tr>      
        <?php
        $suma_valor_pagado += $factura->valor_a_pagar;        
        ?>
        @endforeach
    	</tbody>
    	<tfoot>
    		<tr>
    		<td colspan="16" style="text-align: center; font-size: 14px;"><strong>Total pagado: ${{number_format(floatval($suma_valor_pagado),0,',','.')}}</strong> </td>	
    		</tr>
    	</tfoot>
  		</table>
      </div>
      </div>
      </div>
  </div>
@stop
