@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Facturas en Trámite</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
    <li class="active">Facturas en Trámite</li>
    </ul>
@stop
@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list"></i> Listado De Trámites y Aprobaciones</h3>
      </div>      
    <div class="seguimiento-facturas-index box-body">      
      <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
        <div id="w1" style="font-size:12px;">          
          <div class="summary">Mostrando
            <strong>{{($facturas->currentpage()-1)*$facturas->perpage()+1}}-{{$facturas->currentpage()*$facturas->perpage()}}</strong>
              de  <strong>{{$facturas->total()}}</strong> elementos</div><br>
          <h4>No. Factura: Fra.0054</h4>
          <div class="container" style="background-color: #fff;">
              <ul class="progressbar">
                <li class="active">Emisor</li>
                <li class="">Pagador</li>
                <li class="">Fondeador</li>
                <li>Desembolsado</li>
              </ul>
          </div> 
      </div>
      </div>    
      </div>
      <div class="seguimiento-facturas-index box-body">      
      <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
        <div id="w1" style="font-size:12px;">          
          <div class="summary">Mostrando
            <strong>{{($facturas->currentpage()-1)*$facturas->perpage()+1}}-{{$facturas->currentpage()*$facturas->perpage()}}</strong>
              de  <strong>{{$facturas->total()}}</strong> elementos</div><br>
          <h4>No. Factura: Fra.0055</h4>
          <div class="container" style="background-color: #fff;">
              <ul class="progressbar">
                <li class="active">Emisor</li>
                <li class="">Pagador</li>
                <li class="">Fondeador</li>
                <li>Desembolsado</li>
              </ul>
          </div> 
      </div>
      </div>    
      </div>
      <div class="seguimiento-facturas-index box-body">      
      <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
        <div id="w1" style="font-size:12px;">          
          <div class="summary">Mostrando
            <strong>{{($facturas->currentpage()-1)*$facturas->perpage()+1}}-{{$facturas->currentpage()*$facturas->perpage()}}</strong>
              de  <strong>{{$facturas->total()}}</strong> elementos</div><br>
          <h4>No. Factura: Fra.0056</h4>
          <div class="container" style="background-color: #fff;">
              <ul class="progressbar">
                <li class="active">Emisor</li>
                <li class="active">Pagador</li>
                <li class="active">Fondeador</li>
                <li>Desembolsado</li>
              </ul>
          </div> 
      </div>
      </div>    
      </div>
      <div class="seguimiento-facturas-index box-body">      
      <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
        <div id="w1" style="font-size:12px;">          
          <div class="summary">Mostrando
            <strong>{{($facturas->currentpage()-1)*$facturas->perpage()+1}}-{{$facturas->currentpage()*$facturas->perpage()}}</strong>
              de  <strong>{{$facturas->total()}}</strong> elementos</div><br>
          <h4>No. Factura: Fra.0057</h4>
          <div class="container" style="background-color: #fff;">
              <ul class="progressbar">
                <li class="active">Emisor</li>
                <li class="active">Pagador</li>
                <li class="">Fondeador</li>
                <li>Desembolsado</li>
              </ul>
          </div> 
      </div>
      </div>    
      </div>
  </div>  
@stop
