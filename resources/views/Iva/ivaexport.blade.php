@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
<h1>Exportar IVA</h1>
  <ul class="breadcrumb"><li><a href="/">Inicio</a></li>
    <li class="active">Exportar IVA</li>
</ul>
@stop

@section('content')
<div class="col-xs-12">
  <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list"></i>Exportar certificados de IVA</h3>
      </div>
      <div class="iva-index box-body">
          <form method="POST" action="iva"
          accept-charset="UTF-8" id="expediriva" name="expediriva"
          enctype="multipart/form-data" target="_blank">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="nit" id="nit" value="{{Auth::user()->Nit}}">
            <div class="row">
              <div class="col-xs-2">
                  <input type="text" class="form-control" name="nit" value="{{Auth::user()->Nit}}" readonly="readonly" placeholder="Nit">
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
               <div class="col-xs-2">
                   <select class="form-control" id="anio" name="anio" required>
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
                  <select class="form-control" id="pdesde" name="pdesde" required>
                     <option value="">Periodo Desde</option>
                     <option value="1">Primero</option>
                     <option value="2">Segundo</option>
                     <option value="3">Tercero</option>
                     <option value="4">Cuarto</option>
                     <option value="5">Quinto</option>
                     <option value="6">Sexto</option>
                     </select>
               </div>
              <div class="col-xs-2">
                 <select class="form-control" id="phasta" name="phasta" required>
                    <option value="">Periodo Desde</option>
                    <option value="1">Primero</option>
                    <option value="2">Segundo</option>
                    <option value="3">Tercero</option>
                    <option value="4">Cuarto</option>
                    <option value="5">Quinto</option>
                    <option value="6">Sexto</option>
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
              <strong>{{($ivas->currentpage()-1)*$ivas->perpage()+1}}-{{$ivas->currentpage()*$ivas->perpage()}}</strong>
                de  <strong>{{$ivas->total()}}</strong> elementos</div>
            <table class="table table-striped table-bordered"><thead>
              <tr>
                <th>#</th>
                <th><a href="" data-sort="id_empresa">Empresa</a></th>
                <th><a href="" data-sort="nit_tercero">Nit</a></th>
                <th><a href="" data-sort="valor_iva">Valor Iva</a></th>
                <th><a href="" data-sort="porcentaje_retenido">% Retenido</a></th>
                <th><a href="" data-sort="valor_retenido">Valor Retenido</a></th>
                <th><a href="" data-sort="anio">Año</a></th>
                <th><a href="" data-sort="periodo">Periodo</a></th>
                <th><a href="#">Buscar</a></th>
              </tr>
              <tr id="w0-filters" class="filters">
                <td>&nbsp;</td>
                <form role="search" class="navbar-form navbar-left" accept-charset="UTF-8" action="{{url('iva-find')}}" method="GET">
                <td><input type="text" class="form-control" name="empresa"></td>
                <td><input type="text" class="form-control" name="nit_tercero"></td>
                <td><input type="text" class="form-control" name="valor_iva"></td>
                <td><input type="text" class="form-control" name="porcentaje_iva"></td>
                <td><input type="text" class="form-control" name="valor_retenido"></td>
                <td><input type="text" class="form-control" name="anio"></td>
                <td><input type="text" class="form-control" name="periodo"></td>
                <td><button type="submit" class="btn btn-primary">
                  <i class="fa fa-fw fa-search"></i></button></td>
              </form>
              </tr>
              </thead>
              <tbody>
              <?php $i = 0; ?>
              @foreach($ivas as $iva)
              <?php @$i++; ?>
              <tr data-key="1016">
                <td>{{$i}}</td>
                <td>{{$iva->nombre_empresa}}</td>
                <td>{{$iva->Nit}}</td>
                <td>{{$iva->Iva}}</td>
                <td>{{$iva->Porcentaje}}</td>
                <td>{{$iva->Retenido}}</td>
                <td>{{$iva->Ano}}</td>
                <td>{{$iva->Periodo}}</td>
                <td><a href="ivareport-nit={{$iva->Nit}}-y={{$iva->Ano}}-p={{$iva->Periodo}}-e={{$iva->id_empresa}}"
                 title="pdf" target="_blank">
                  <span class="glyphicon glyphicon-file"></span></a>
                </td>
              </tr>
              @endforeach
              </tbody>
            </table>
            {{ $ivas->links() }}
            </div>
          </div>
        </div>
      </div>
@stop
