@extends('adminlte::page')

@section('title', 'Certiweb | Gran tierra')

@section('content_header')
<h1>Exportar ICA</h1>
  <ul class="breadcrumb"><li><a href="/">Inicio</a></li>
    <li class="active">Exportar ICA</li>
</ul>
@stop

@section('content')
<div class="col-xs-12">
  <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list"></i>Exportar certificados de ICA</h3>
      </div>
      <div class="iva-index box-body">
          <form method="POST" action="ica"
          accept-charset="UTF-8" id="expedirica" name="expedirica"
          enctype="multipart/form-data" target="_blank">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="nit" id="nit" value="{{Auth::user()->Nit}}">
            <div class="row">
              <div class="col-xs-2">
                 <input type="text" class="form-control" name="nit" placeholder="Nit">
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
                  <option value="">Periodo Hasta</option>
                  <option value="1">Primero</option>
                  <option value="2">Segundo</option>
                  <option value="3">Tercero</option>
                  <option value="4">Cuarto</option>
                  <option value="5">Quinto</option>
                  <option value="6">Sexto</option>
                  </select>
              </div>
              <div class="col-xs-1">
                  <select class="form-control" style="width:76px; margin-left: -10px;" id="anio" name="anio" required>
                      <option value="">Año</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                    </select>
                </div>
                <div class="col-xs-1">
                  <select class="form-control" style="width:90px; margin-left: -9px;" id="ciudad" name="ciudad" required>
                      <option value="">Ciudad</option>
                      <option value="todas">Todas</option>
                      <option value="ARMENIA">ARMENIA</option>
                      <option value="BARRANQUILLA">BARRANQUILLA</option>
                      <option value="BOGOT">BOGOTÁ</option>
                      <option value="BUCARAMANGA">BUCARAMANGA</option>
                      <option value="BUENAVENTURA">BUENAVENTURA</option>
                      <option value="CAJICA">CAJICA</option>
                      <option value="CALI">CALI</option>
                      <option value="CARTAGENA">CARTAGENA</option>
                      <option value="CARTAGO">CARTAGO</option>
                      <option value="CHIA">CHIA</option>
                      <option value="CUCUTA">CUCUTA</option>
                      <option value="FLORENCIA">FLORENCIA</option>
                      <option value="FLORIDABLANCA">FLORIDABLANCA</option>
                      <option value="GRANADA">GRANADA</option>
                      <option value="HONDA">HONDA</option>
                      <option value="IBAGUE">IBAGUE</option>
                      <option value="MAGANGUE">MAGANGUE</option>
                      <option value="MANIZALES">MANIZALES</option>
                      <option value="MEDELLIN">MEDELLIN</option>
                      <option value="NEIVA">NEIVA</option>
                      <option value="PALMIRA">PALMIRA</option>
                      <option value="PASTO">PASTO</option>
                      <option value="PEREIRA">PEREIRA</option>
                      <option value="SAN GIL">SAN GIL</option>
                      <option value="SANTA MARTA">SANTA MARTA</option>
                      <option value="SINCELEJO">SINCELEJO</option>
                      <option value="SOLEDAD">SOLEDAD</option>
                      <option value="TULUA">TULUA</option>
                      <option value="TUNJA">TUNJA</option>
                      <option value="VILLAVICENCIO">VILLAVICENCIO</option>
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
              <strong>{{($icas->currentpage()-1)*$icas->perpage()+1}}-{{$icas->currentpage()*$icas->perpage()}}</strong>
                de  <strong>{{$icas->total()}}</strong> elementos</div>
            <table class="table table-striped table-bordered"><thead>
              <tr>
                <th>#</th>
                <th><a href="" data-sort="id_empresa">Empresa</a></th>
                <th><a href="" data-sort="nit_tercero">Nit</a></th>
                <th><a href="" data-sort="anio">Año</a></th>
                <th><a href="" data-sort="periodo">Periodo</a></th>
                <th><a href="" data-sort="base_gravable">Base Gravable</a></th>
                <th><a href="" data-sort="porcentaje">Porcentaje</a></th>
                <th><a href="" data-sort="valor_retenido">Valor Retenido</a></th>
                <th><a href="" data-sort="ciudad">Ciudad</a></th>
                <th class="action-column">&nbsp;</th>
              </tr>
              <tr id="w1-filters" class="filters"><td>&nbsp;</td>
                <form role="search" class="navbar-form navbar-left" accept-charset="UTF-8" action="{{url('find-ica')}}" method="GET">
                <td><input type="text" class="form-control" name="empresa"></td>
                <td><input type="text" class="form-control" name="nit_tercero"></td>
                <td><input type="text" class="form-control" name="anio"></td>
                <td><input type="text" class="form-control" name="periodo"></td>
                <td><input type="text" class="form-control" name="base"></td>
                <td><input type="text" class="form-control" name="porcentaje"></td>
                <td><input type="text" class="form-control" name="retenido"></td>
                <td><input type="text" class="form-control" name="ciudad"></td>
                <td><button type="submit" class="btn btn-primary">
                  <i class="fa fa-fw fa-search"></i></button></td>
              </tr>
              </thead>
              <tbody>
              <?php $i = 0; ?>
              @foreach($icas as $ica)
              <?php @$i++; ?>
              <tr data-key="1016">
                <td>{{$i}}</td>
                <td>{{$ica->nombre_empresa}}</td>
                <td>{{$ica->Nit}}</td>
                <td>{{$ica->Ano}}</td>
                <td>{{$ica->Periodo}}</td>
                <td>{{number_format($ica->Base,0,',','.')}}</td>
                <td>{{number_format((float)$ica->Porcentaje,5,',','.')}}</td>
                <td>{{number_format($ica->Retenido,0,',','.')}}</td>
                <td>{{$ica->Ciudad_Expedido}}</td>
                <td><a href="icareport-nit={{$ica->Nit}}-y={{$ica->Ano}}-p={{$ica->Periodo}}-ciudad={{$ica->Ciudad_Expedido}}-e={{$ica->id_empresa}}"
                 title="pdf" target="_blank">
                  <span class="glyphicon glyphicon-file"></span></a>
                </td>
              </tr>
              @endforeach
              </tbody>
            </table>
            {{ $icas->links() }}
            <div class="row">
                      <div class="col-sm-8"></div>
                      <div class="col-sm-4 text-right">
                        <div class="summary">
                          <strong>Mostrando {{($icas->currentpage()-1)*$icas->perpage()+1}}-{{$icas->currentpage()*$icas->perpage()}}</strong>
                            de  <strong>{{$icas->total()}}</strong> elementos
                          </div>
                      </div>
                    </div>
            </div>
          </div>
        </div>
      </div>
    <!-- /.row -->
  <!-- <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer> -->
<!-- <footer class="main-footer">
    <p class="text-right">2018 &copy;  Todos los derechos reservados. <a target="_blank" href="http://actituddigital.com">Actitud Digital</a></p>

</footer> -->
@stop
