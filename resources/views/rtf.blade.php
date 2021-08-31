@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
<h1>Exportar RTF</h1>
  <ul class="breadcrumb"><li><a href="/">Inicio</a></li>
    <li class="active">Exportar Rtf</li>
</ul>
@stop

@section('content')
<div class="col-xs-12">
  <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list"></i>Exportar certificados de RTF</h3>
      </div>
      <div class="iva-index box-body">
          <form method="POST" action="rtf"
          accept-charset="UTF-8" id="expedirtf" name="expedirtf"
          enctype="multipart/form-data" target="_blank">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="nit" id="nit" value="{{Auth::user()->Nit}}">
            <div class="row">
              <div class="col-xs-2">
                 <input type="text" class="form-control" name="nit" value="{{Auth::user()->Nit}}" readonly="readonly" placeholder="Nit">
               </div>
              <div class="col-xs-4">
                  <select class="form-control" id="pdesde" name="id_empresa" required>
                     <option value="">Empresa..</option>
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
                       <option value="2009">2009</option>
                       <option value="2010">2010</option>
                       <option value="2011">2011</option>
                       <option value="2012">2012</option>
                       <option value="2013">2013</option>
                       <option value="2014">2014</option>
                       <option value="2015">2015</option>
                       <option value="2016">2016</option>
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
              <strong>{{($rtfs->currentpage()-1)*$rtfs->perpage()+1}}-{{$rtfs->currentpage()*$rtfs->perpage()}}</strong>
                de  <strong>{{$rtfs->total()}}</strong> elementos</div>
            <table class="table table-striped table-bordered"><thead>
              <tr>
                <th>#</th>
                <th><a href="" data-sort="id_empresa">Empresa</a></th>
                <th><a href="" data-sort="nit_tercero">Nit</a></th>
                <th><a href="" data-sort="anio">Año</a></th>
                <th><a href="" data-sort="base_gravable">Base Gravable</a></th>
                <th><a href="" data-sort="valor_retenido">Valor Retenido</a></th>
                <th class="action-column">&nbsp;</th>
              </tr>
              <tr id="w0-filters" class="filters">
                <form role="search" class="navbar-form navbar-left" accept-charset="UTF-8" action="{{url('rtf-find')}}" method="GET">
                <td>&nbsp;</td>
                <td><input type="text" class="form-control" name="empresa"></td>
                <td></td>
                <td><input type="number" class="form-control" name="anio" value=""></td>
                <td><input type="number" class="form-control" name="base" value=""></td>
                <td><input type="text" class="form-control" name="retenido" value=""></td>
                <td><button type="submit" class="btn btn-primary">
                  <i class="fa fa-fw fa-search"></i></button></td>
              </form>
              </tr>
              </thead>
              <tbody>
              <?php $i = 0; ?>
              @foreach($rtfs as $rtf)
              <?php @$i++; ?>
              <tr data-key="1016">
                <td>{{$i}}</td>
                <td>{{$rtf->nombre_empresa}}</td>
                <td>{{$rtf->Nit}}</td>
                <td>{{$rtf->Ano}}</td>
                <td>{{$rtf->Base}}</td>
                <td>{{$rtf->Retenido}}</td>
                <td><a href="rtfreport-nit={{$rtf->Nit}}-y={{$rtf->Ano}}-e={{$rtf->id_empresa}}"
                 title="pdf" target="_blank">
                  <span class="glyphicon glyphicon-file"></span></a>
                </td>
              </tr>
              @endforeach
              </tbody>
            </table>
            {{ $rtfs->links() }}
            </div>
          </div>
        </div>
      </div>
@stop
