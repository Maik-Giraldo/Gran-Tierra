@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Editar IVA</h1>
    <ul class="breadcrumb"><li><a href="/">Inicio</a></li>
    <li class="active">Editar Iva</li>
    </ul>
@stop

@section('content')
<div class="col-xs-12">
<div class="box box-warning">
<div class="iva-index box-body">
    <p><a class="btn btn-success" href="iva-create">Crear registro de IVA</a></p>
    <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
          <div id="w1" class="grid-view">
              <table id="iva-table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th><a href="#">Nit Tercero</a></th>
                    <th><a href="#">Concepto</a></th>
                    <th><a href="#">Base Gravable</a>
                    </th><th><a href="#">Porcentaje Iva</a></th>
                    <th><a href="#">Valor Iva</a></th>
                    <th><a href="#">Valor Retenido</a></th>
                    <th><a href="#">Año</a></th>
                    <th><a href="#">Periodo</a></th>
                    <th class="action-column">&nbsp;</th></tr>
                </thead>
              </table>
                      </div>
                  </div>
           </div>
         </div>
       </div>
@stop
