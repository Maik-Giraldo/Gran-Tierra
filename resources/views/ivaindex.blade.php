@extends('adminlte::page')

@section('title', 'Certiweb | Demo')
@section('content_header')
    <h1>Editar IVA</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
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
            <div class="summary">Mostrando
              <strong>{{($ivas->currentpage()-1)*$ivas->perpage()+1}}-{{$ivas->currentpage()*$ivas->perpage()}}</strong>
                de  <strong>{{$ivas->total()}}</strong> elementos</div>
              <table class="table table-striped table-bordered"><thead>
                  <tr>
                    <th>#</th>
                    <th><a href="#" data-sort="empresa">Empresa</a></th>
                    <th><a href="#" data-sort="nit_tercero">Nit Tercero</a></th>
                    <th><a href="#" data-sort="concepto">Concepto</a></th>
                    <th><a href="#" data-sort="base_gravable">Base Gravable</a>
                    </th><th><a href="#" data-sort="porcentaje_iva">% Iva</a></th>
                    <th><a href="#" data-sort="valor_iva">Valor Iva</a></th>
                    <th><a href="#" data-sort="valor_retenido">Retenido</a></th>
                    <th><a href="#" data-sort="anio">Año</a></th>
                    <th><a href="#" data-sort="periodo">Periodo</a></th>
                    <th class="action-column">&nbsp;</th></tr>
                    <tr id="w1-filters" class="filters"><td>&nbsp;</td>
                      <form role="search" class="navbar-form navbar-left" accept-charset="UTF-8" action="{{url('search-iva')}}" method="GET">
                        <td><input type="text" class="form-control" name="empresa"></td>
                        <td><input type="text" class="form-control" name="nit_tercero"></td>
                        <td><input type="text" class="form-control" name="concepto"></td>
                        <td><input type="text" class="form-control" name="base_gravable"></td>
                        <td><input type="text" class="form-control" name="porcentaje_iva"></td>
                        <td><input type="text" class="form-control" name="valor_iva"></td>
                        <td><input type="text" class="form-control" name="valor_retenido"></td>
                        <td><input type="text" class="form-control" name="anio"></td>
                        <td><input type="text" class="form-control" name="periodo"></td>
                        <td><button type="submit" class="btn btn-primary">
                          <i class="fa fa-fw fa-search"></i></button></td>
                      </form>
                    </tr>
                </thead>
                <tbody>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <?php $i = 0; ?>
                  @foreach($ivas as $iva)
                  <?php @$i++; ?>
                      <tr data-key="7">
                        <td>{{$i}}</td>
                        <td>{{$iva->nombre_empresa}}</td>
                        <td>{{$iva->Nit}}</td>
                        <td>{{$iva->Concepto}}</td>
                        <td>{{number_format($iva->Base,0,',','.')}}</td>
                        <td>{{$iva->Porcentaje}}</td>
                        <td>{{number_format($iva->Iva,0,',','.')}}</td>
                        <td>{{number_format($iva->Retenido,0,',','.')}}</td>
                        <td>{{$iva->Ano}}</td>
                        <td>{{$iva->Periodo}}</td>
                        <td><a href="iva-view-{{$iva->id}}" title="Ver" aria-label="Ver">
                          <span class="glyphicon glyphicon-eye-open"></span></a>
                           <a href="iva-edit-{{$iva->id}}" title="Actualizar" aria-label="Actualizar">
                             <span class="glyphicon glyphicon-pencil"></span></a>
                             <a href="#" name="{{$iva->id}}" id="borrarivaitem" title="Eliminar" aria-label="Eliminar">
                               <span class="glyphicon glyphicon-trash"></span></a></td></tr>
                              @endforeach
                  </tbody>
                </table>
              {{ $ivas->links() }}
                      </div>
                  </div>
           </div>
         </div>
       </div>
@stop
