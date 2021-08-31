@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Seguimento de facturas</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
    <li class="active">Seguimento Transaccional</li>
    </ul>
@stop

@section('content')
<div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list"></i> Consulta de Facturas por Rangos de Fecha</h3>
      </div>
      <div class="iva-index box-body">
          <form method="POST" action="consulta-facturas-por-fechas"
          accept-charset="UTF-8" id="consulta-facturas-por-fechas" name="consulta-facturas-por-fechas"
          enctype="multipart/form-data" target="_blank">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="nit" id="nit" value="{{Auth::user()->Nit}}">
            <div class="row">
              <div class="col-xs-2">
                  <input type="text" class="form-control" name="nit" placeholder="Nit" required="required">
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
              <th><a href="#">Sociedad</a></th>
              <th>@sortablelink('documento_compra', 'Doc compra')</th>
              <th>@sortablelink('administrador_contacto', 'Administrador Contacto')</th>
              <th>@sortablelink('valor_total', 'Valor Total')</th>
              <th>@sortablelink('fecha_emision', 'Fecha Emision')</th>
              <th>@sortablelink('vencimiento', 'Vencimiento')</th>
              <th>@sortablelink('ejecutado_fecha', 'Ejecutado a la fecha')</th>            
              <th>@sortablelink('saldo', 'Saldo (Vlr ejecutado)')</th>
              <!-- <th class="action-column"><a href="#"></a></th> -->
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
                <td><input type="text" placeholder="Documento Compra" class="form-control" name="documento_compra" maxlength="100"></td>
                <td><input type="number" placeholder="Contacto" class="form-control" name="administrador_contacto" maxlength="100"></td>
                <td><input type="text" class="form-control" placeholder="Valor Total" name="valor_total" maxlength="155"></td>


                <td><input type="text" placeholder="Fecha Emision" class="form-control" name="fecha_emision" title="Año-Mes-Día, o solo el año para ver las facturas de determinado año, o año-mes"/></td>
                <td><input type="text" placeholder="Vencimiento" class="form-control" name="vencimiento" title="Año-Mes-Día, o solo el año para ver las facturas de determinado año, o año-mes"/></td>
                <td><input type="text" class="form-control" placeholder="Ejecutado Fecha" name="ejecutado_fecha" maxlength="155"></td>
                <td><input type="text" class="form-control" placeholder="Saldo (Vlr fecha)" name="saldo" maxlength="155"></td>        
                <td><button type="submit" class="btn btn-primary">
                  <i class="fa fa-fw fa-search"></i></button></td>
              </form>
            </tr>
          </thead>
          <tbody>
          <td><div class="dropdown">
                <button class="btn btn-warning" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Mas
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dLabel">
                <div class="panel panel-default">
                
                  <div class="panel-heading text-center">Momentos</div>

                  
                  <table class="table">
                    <thead>
                        <tr>
                          <th>#HE</th>
                          <th>Valor HE</th>
                          <th>Aprobado</th>
                          <th>#FRA</th>
                          <th>Vlr FRA</th>
                          <th>Fecha Rec</th>
                          <th>Vencimiento</th>
                          <th>Vlr FRA</th>
                          <th>Fecha Apr</th>
                          <th>Retenciones</th>
                          <th>Fecha de pago</th>
                          <th>Vlr Neto Pagado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>A</td>
                          <td>500.000</td>
                          <td>S</td>
                          <td>1</td>
                          <td>500.000</td>
                          <td>15/02/2021</td>
                          <td>26/03/2021</td>
                          <td>16-feb</td>
                          <td>55.000</td>
                          <td>29-mar</td>
                          <td>445.000</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                          <td>B</td>
                          <td>1.000.000</td>
                          <td>S</td>
                          <td>3</td>
                          <td>1.000.000</td>
                          <td>18/03/2021</td>
                          <td>26/04/2021</td>
                          <td>19-mar</td>
                          <td>110.000</td>
                          <td>30-abr</td>
                          <td>890.000</td>
                        </tr>
                        <tr class="info">
                          <th scope="row"></th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>RECIBIDA</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>APROBADA</td>
                          <td></td>
                          <td>PAGADA</td>
                          <td></td>
                          <td></td>
                        </tr>
                    </tbody>
                  </table>
                </div>
                </ul>
              </div>
              </td>
              </div> 
        @foreach ($facturas as $factura)
        <tr data-key="169">
          <td>{{$factura->nombre_empresa}}</td>
          <td>{{$factura->nombre_proveedor}}</td>
          <td>{{$factura->nit}}</td>
          <td><a href="{{url('seguimiento-facturas/view-id='.$factura->id)}}">{{$factura->numero_factura}}</a></td>
          <td>{{$factura->fecha_factura}}</td>
          <td>{{date('Y-m-d', strtotime($factura->fecha_pago))}}</td>
          <td>${{number_format(floatval($factura->valor_total),0,',','.')}}</td>
          <td>${{number_format(floatval($factura->valor_a_pagar),0,',','.')}}</td>
          <td>{{$factura->estado}}</td>       
          <td>{{$factura->texto}}</td>     
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
