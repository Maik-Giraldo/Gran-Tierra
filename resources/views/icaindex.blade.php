@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Editar ICA</h1>
    <ul class="breadcrumb"><li><a href="/">Inicio</a></li>
    <li class="active">Editar Ica</li>
    </ul>
@stop

@section('content')
<div class="col-xs-12">
<div class="box box-warning">
<div class="iva-index box-body">
    <p><a class="btn btn-success" href="ica-create">Crear registro de ICA</a></p>
    <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
          <div id="w1" class="grid-view">
            <div class="summary">Mostrando
              <strong>{{($icas->currentpage()-1)*$icas->perpage()+1}}-{{$icas->currentpage()*$icas->perpage()}}</strong>
                de  <strong>{{$icas->total()}}</strong> elementos
            </div>
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th><a href="#" data-sort="empresa">Empresa</a></th>
                    <th><a href="#" data-sort="nit_tercero">Nit Tercero</a></th>
                    <th><a href="#" data-sort="concepto">Concepto</a></th>
                    <th><a href="#" data-sort="base_gravable">Base Gravable</a>
                    </th><th><a href="#" data-sort="porcentaje_iva">Porcentaje</a></th>
                    <th><a href="#" data-sort="valor_retenido">Valor Retenido</a></th>
                    <th><a href="#" data-sort="anio">Año</a></th>
                    <th><a href="#" data-sort="periodo">Periodo</a></th>
                    <th><a href="#" data-sort="valor_iva">Ciudad</a></th>
                    <th class="action-column">&nbsp;</th>
                  </tr>
                    <tr id="w1-filters" class="filters"><td>&nbsp;</td>
                      <form role="search" class="navbar-form navbar-left" accept-charset="UTF-8" action="{{url('search-ica')}}" method="GET">
                      <td><input type="text" class="form-control" name="empresa"></td>
                      <td><input type="text" class="form-control" name="nit_tercero"></td>
                      <td><input type="text" class="form-control" name="concepto"></td>
                      <td><input type="text" class="form-control" name="base"></td>
                      <td><input type="text" class="form-control" name="porcentaje"></td>
                      <td><input type="text" class="form-control" name="retenido"></td>
                      <td><input type="text" class="form-control" name="anio"></td>
                      <td><input type="text" class="form-control" name="periodo"></td>
                      <td><input type="text" class="form-control" name="ciudad"></td>
                      <td><button type="submit" class="btn btn-primary">
                        <i class="fa fa-fw fa-search"></i></button></td>
                    </tr>
                </thead>
                <tbody>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <?php $i = 0; ?>
                  @foreach($icas as $ica)
                  <?php @$i++; ?>
                      <tr data-key="7">
                        <td>{{$i}}</td>
                        <td>{{$ica->nombre_empresa}}</td>
                        <td>{{$ica->Nit}}</td>
                        <td>{{$ica->Concepto}}</td>
                        <td>{{number_format($ica->Base,0,',','.')}}</td>
                        <td>{{$ica->Porcentaje}}</td>
                        <td>{{number_format($ica->Retenido,0,',','.')}}</td>
                        <td>{{$ica->Ano}}</td>
                        <td>{{$ica->Periodo}}</td>
                        <td>{{$ica->Ciudad_Expedido}}</td>
                        <td><a href="ica-view-{{$ica->id}}" title="Ver" aria-label="Ver">
                          <span class="glyphicon glyphicon-eye-open"></span></a>
                           <a href="ica-edit-{{$ica->id}}" title="Actualizar" aria-label="Actualizar">
                             <span class="glyphicon glyphicon-pencil"></span></a>
                             <a href="#" name="{{$ica->id}}" id="borraricaitem" title="Eliminar" aria-label="Eliminar">
                               <span class="glyphicon glyphicon-trash"></span></a></td></tr>
                              @endforeach
                  </tbody>
                </table>
              {{ $icas->links() }}
                      </div>
                  </div>
           </div>
         </div>
       </div>
@stop
