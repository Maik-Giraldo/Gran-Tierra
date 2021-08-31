@extends('adminlte::page')

@section('title', "Certiweb | Demo")

@section('content_header')
<h1>Exportar accionista</h1>
  <ul class="breadcrumb"><li><a href="/">Inicio</a></li>
    <li class="active">Exportar accionista</li>
</ul>
@stop
@section('content')
<div class="col-xs-12">
  <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list"></i>Exportar certificados de accionista</h3>
      </div>
      <div class="iva-index box-body">
          <form method="POST" action="accionista"
          accept-charset="UTF-8" id="expediaccionista" name="expediaccionista"
          enctype="multipart/form-data" target="_blank">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="nit" id="nit" value="{{Auth::user()->Nit}}">
            <div class="row">
              <div class="col-xs-2">
                 <input type="text" class="form-control" name="nit" placeholder="Nit" required="required">
               </div>
               <div class="col-xs-4">
                  <select class="form-control" id="pdesde" name="id_empresa" required>
                     <option value="">Empresa..</option>
                     <option value="todas">Todas</option>
                      @foreach ($empresas as $empresa)
                        <option value="{{$empresa->id_empresa}}">{{$empresa->nit_empresa}}-{{$empresa->nombre_empresa}}</option>
                      @endforeach
                     </select>
               </div>
              <div class="col-xs-2">
                 <select class="form-control" id="pdesde" name="pdesde" required="required">
                    <option value="">Periodo Desde</option>
                    <option value="1">Enero-Diciembre</option>
                    </select>
              </div>
              <div class="col-xs-2">
                  <select class="form-control" id="anio" name="anio" required="required">
                      <option value="">Año</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                    </select>
                </div>
                <div class="col-xs-2">
                  <button type="submit" class="btn btn-primary btn-block">Exportar</button>
                </div>
            </div>
          </form>
      </div>
  </div>
  </div>
<div class="col-xs-12">
  <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list"></i> Lista de certificados disponibles</h3>
      </div>
      <div class="iva-index box-body">
          <div id="w0" class="grid-view">
            <div class="summary">Mostrando
              <strong>{{($accionistas->currentpage()-1)*$accionistas->perpage()+1}}-{{$accionistas->currentpage()*$accionistas->perpage()}}</strong>
                de  <strong>{{$accionistas->total()}}</strong> elementos</div>
            <table class="table table-striped table-bordered"><thead>
              <tr>
                <th>#</th>
                <th><a href="" data-sort="id_empresa">Empresa</a></th>
                <th><a href="" data-sort="nit_accionista">Nit Accionista</a></th>
                <th><a href="" data-sort="accionista">Accionista</a></th>
                <th><a href="" data-sort="anio">Año</a></th>
                <th><a href="" data-sort="cantidad">Acciones</a></th>
                <th><a href="" data-sort="valor_nominal">Valor Nominal</a></th>
                <th class="action-column">&nbsp;</th>
              </tr>
              <tr id="w1-filters" class="filters"><td>&nbsp;</td>
                <form role="search" class="navbar-form navbar-left" accept-charset="UTF-8" action="{{url('find-accionista')}}" method="GET">
                <td><input type="text" class="form-control" name="empresa"></td>
                <td><input type="text" class="form-control" name="nit_accionista"></td>
                <td><input type="text" class="form-control" name="accionista"></td>
                <td><input type="text" class="form-control" name="anio"></td>
                <td><input type="text" class="form-control" name="cantidad"></td>
                <td><input type="text" class="form-control" name="valor_nominal"></td>
                <td><button type="submit" class="btn btn-primary">
                  <i class="fa fa-fw fa-search"></i></button></td>
              </form>
              </tr>
              </thead>
              <tbody>
              <?php $i = 0; ?>
              @foreach($accionistas as $accionista)
              <?php @$i++; ?>
              <tr data-key="1016">
                <td>{{$i}}</td>
                <td>{{$accionista->nombre_empresa}}</td>
                <td>{{$accionista->Nit_accionista}}</td>
                <td>{{$accionista->Accionista}}</td>
                <td>{{$accionista->Ano}}</td>
                <td>{{$accionista->Cantidad}}</td>
                <td>{{number_format($accionista->Valor_Nominal,0,',','.')}}</td>
                <td><a href="accionistareport-nit={{$accionista->Nit_accionista}}-y={{$accionista->Ano}}-e={{$accionista->id_empresa}}"
                 title="pdf" target="_blank">
                  <span class="glyphicon glyphicon-file"></span></a>
                </td>
              </tr>
              @endforeach
              </tbody>
            </table>
            {{ $accionistas->links() }}
            </div>
          </div>
        </div>
      </div>
@stop
