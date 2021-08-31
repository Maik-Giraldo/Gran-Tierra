@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Grupo Demo</h1>
    <ul class="breadcrumb"><li><a href="{{url('home')}}">Inicio</a></li>
    <li><a href="{{ url('empresas') }}">Empresas</a></li>
    <li class="active">Grupo Demo</li>
    </ul>
@stop

@section('content')
<div class="col-xs-12">
  <div class="box box-warning">
    @foreach ($dataempresa as $empresa)
    <div class="ica-view box-body">
    <p><a class="btn btn-primary" href="editar-id-{{$empresa->id_empresa}}">Editar</a></p>
      <table id="w0" class="table table-striped table-bordered detail-view">
        <tr><th>ID</th><td>{{$empresa->id_empresa}}</td></tr>
        <tr><th>Empresa</th><td>{{$empresa->nombre_empresa}}</td></tr>
        <tr><th>Nit</th><td>{{$empresa->nit_empresa}}</td></tr>
        <tr><th>Nombre Responsable</th><td>{{$empresa->nombre_responsable}}</td></tr>
        <tr><th>Cargo Responsable</th><td>{{$empresa->cargo_responsable}}</td></tr>
        <tr><th>Email</th><td>{{$empresa->email_empresa}}</td></tr>
        <tr><th>Teléfono</th><td>{{$empresa->telefono_empresa}}</td></tr>
        <tr><th>Dirección</th><td>{{$empresa->direccion_empresa}}</td></tr>
        <tr><th>Ciudad</th><td>{{$empresa->ciudad}}</td></tr>
        <tr><th>Departamento</th><td>{{$empresa->departamento}}</td></tr>
        <tr><th>País</th><td>{{$empresa->pais}}</td></tr>
        <tr><th>Años</th><td>{{$empresa->anios}}</td></tr>
        <tr><th>Años</th><td>{{$empresa->ciudades}}</td></tr>
          <tr><th>Logotipo</th><td><img src="../images/empresa/{{$empresa->logotipo}}" width="250" alt=""></td></tr>
          <tr><th>Logotipo Color</th><td><img src="../images/empresa/{{$empresa->logotipo_color}}" width="250" alt=""></td></tr>
          <tr><th>Imagen Firma</th><td><img src="../images/empresa/{{$empresa->imagen_firma}}" width="250" alt=""></td></tr>
        </table>
        </div>
      </div>
      @endforeach
    </div>
@stop
