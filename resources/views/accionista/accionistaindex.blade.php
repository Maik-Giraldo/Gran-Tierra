@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Editar accionista</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
    <li class="active">Editar accionista</li>
    </ul>
@stop

@section('content')
<div class="col-xs-12">
<div class="box box-warning">
<div class="iva-index box-body">
    <p><a class="btn btn-success" href="accionista-create">Crear registro de accionista</a></p>
    <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
          <div id="w1" class="grid-view">
            <div class="summary">Mostrando
              <strong>{{($accionistas->currentpage()-1)*$accionistas->perpage()+1}}-{{$accionistas->currentpage()*$accionistas->perpage()}}</strong>
                de  <strong>{{$accionistas->total()}}</strong> elementos</div>
              <table class="table table-striped table-bordered"><thead>
                  <tr>
                    <th>#</th>
                    <th><a href="#" data-sort="empresa">Empresa</a></th>
                    <th><a href="#" data-sort="nit_tercero">Nit Accionista</a></th>
                    <th><a href="#" data-sort="acciniosta">Accionista</a></th>
                    <th><a href="#" data-sort="acciones">Acciones</a></th>
                    <th><a href="#" data-sort="valor_nominal">Valor Nominal</a>
                    <th><a href="#" data-sort="valor_intrinseco_valorizado">Vlr Intrinseco Valorizado</a>
                    <th><a href="#" data-sort="anio">Año</a></th>
                    <th><a href="#" data-sort="valor_iva">Ciudad</a></th>
                    <th class="action-column">&nbsp;</th></tr>
                    <tr id="w1-filters" class="filters"><td>&nbsp;</td>
                      <form role="search" class="navbar-form navbar-left" accept-charset="UTF-8" action="{{url('search-accionista')}}" method="GET">
                      <td><input type="text" class="form-control" name="empresa"></td>
                      <td><input type="text" class="form-control" name="nit_accionista"></td>
                      <td><input type="text" class="form-control" name="accionista"></td>
                      <td><input type="text" class="form-control" name="acciones"></td>
                      <td><input type="text" class="form-control" name="valor_nominal"></td>
                      <td><input type="text" class="form-control" name="valor_intrinseco_valorizado"></td>
                      <td><input type="text" class="form-control" name="anio"></td>
                      <td><input type="text" class="form-control" name="ciudad"></td>
                      <td><button type="submit" class="btn btn-primary">
                        <i class="fa fa-fw fa-search"></i></button></td>
                    </form>
                    </tr>
                </thead>
                <tbody>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <?php $i = 0; ?>
                  @foreach($accionistas as $accionista)
                  <?php @$i++; ?>
                      <tr data-key="7">
                        <td>{{$i}}</td>
                        <td>{{$accionista->nombre_empresa}}</td>
                        <td>{{$accionista->Nit_accionista}}</td>
                        <td>{{$accionista->Accionista}}</td>
                        <td>{{$accionista->Cantidad}}</td>
                        <td>{{number_format($accionista->Valor_Nominal,0,',','.')}}</td>
                        <td>{{number_format($accionista->Valor_Intrinseco_Valorizado,0,',','.')}}</td>
                        <td>{{$accionista->Ano}}</td>
                        <td>{{$accionista->Ciudad_Expedido}}</td>
                        <td><a href="accionista-view-{{$accionista->id}}" title="Ver" aria-label="Ver">
                          <span class="glyphicon glyphicon-eye-open"></span></a>
                           <a href="accionista-edit-{{$accionista->id}}" title="Actualizar" aria-label="Actualizar">
                             <span class="glyphicon glyphicon-pencil"></span></a>
                             <a href="#" name="{{$accionista->id}}" id="borraraccionistaitem" title="Eliminar" aria-label="Eliminar">
                               <span class="glyphicon glyphicon-trash"></span></a></td></tr>
                              @endforeach
                  </tbody>
                </table>
              {{ $accionistas->links() }}
                      </div>
                  </div>
           </div>
         </div>
       </div>
@stop
