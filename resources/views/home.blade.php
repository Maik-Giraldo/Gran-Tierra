@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Seguimiento de Facturas</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
    <li class="active">Seguimiento de Facturas</li>
    </ul>
@stop

@section('content')
        <div class="box box-warning">
        <div class="seguimiento-facturas-index box-body">
        <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
        <div id="w1" style="font-size:12px;"><div class="summary">Mostrando <b>1-1</b> de <b>1</b> elemento.</div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th>
                <a href="/seguimiento-facturas/index?sort=nit" data-sort="nit">Nit</a></th>
                <th><a href="/seguimiento-facturas/index?sort=numero_documento" data-sort="numero_documento">No. Documento</a></th>
                <th><a href="/seguimiento-facturas/index?sort=tipo_documento" data-sort="tipo_documento">Tipo de documento</a></th>
                <th><a href="/seguimiento-facturas/index?sort=fecha_documento" data-sort="fecha_documento">Fecha documento</a></th>
                <th style="width:100px"><a href="/seguimiento-facturas/index?sort=valor_neto" data-sort="valor_neto">Vr. Neto Documento</a></th>
                <th style="width:88px"><a href="/seguimiento-facturas/index?sort=retenciones" data-sort="retenciones">Retenciones</a></th>
                <th style="width:88px"><a href="/seguimiento-facturas/index?sort=cuotas_fomento" data-sort="cuotas_fomento">Cuotas de fomento</a>
                </th><th style="width:88px"><a href="/seguimiento-facturas/index?sort=descuentos_comerciales" data-sort="descuentos_comerciales">Descuentos comerciales</a></th>
                <th style="width:88px"><a href="/seguimiento-facturas/index?sort=anticipos" data-sort="anticipos">Anticipos/Cartera</a></th>
                <th><a href="/seguimiento-facturas/index?sort=banco" data-sort="banco">Banco</a></th>
                <th style="width:100px"><a href="/seguimiento-facturas/index?sort=valor_a_pagar" data-sort="valor_a_pagar">Vr. Pagado</a></th>
                <th><a href="/seguimiento-facturas/index?sort=fecha_pago" data-sort="fecha_pago">Fecha Pago</a>
                </th></tr><tr id="w1-filters" class="filters"><td>
                    <input type="text" class="form-control" name="SeguimientoFacturasSearch[nit]"></td><td><input type="text" class="form-control" name="SeguimientoFacturasSearch[numero_documento]"></td><td><input type="text" class="form-control" name="SeguimientoFacturasSearch[tipo_documento]"></td><td><input type="text" class="form-control" name="SeguimientoFacturasSearch[fecha_documento]"></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td><input type="text" class="form-control" name="SeguimientoFacturasSearch[fecha_pago]"></td></tr>
                </thead>
            <tbody>
                <tr data-key="391"><td>1110515009</td><td>123</td><td>nit</td><td>2018-04-23</td><td>$ 34.555,00</td><td>$ 33,00</td><td>$ 333,00</td><td>$ 333,00</td><td>$ 333,00</td><td>bancolombia</td><td>$ 333,00</td><td>2018-04-24</td></tr>
            </tbody>
        </table>
            </div>
          </div>
        </div>
    </div>
@stop
