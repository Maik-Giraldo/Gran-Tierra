@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Proveedores</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
    <li class="active">Proveedores</li>
    </ul>
@stop

@section('content')
<div class="box box-warning">
  <div class="proveedores-index box-body">
    <p><a class="btn btn-success" href="../proveedor-create">Crear Proveedor</a></p>
    <div id="w0" class="grid-view">
      <div class="summary">Mostrando
        <strong>{{($proveedores->currentpage()-1)*$proveedores->perpage()+1}}-{{$proveedores->currentpage()*$proveedores->perpage()}}</strong>
          de  <strong>{{$proveedores->total()}}</strong> elementos</div>
    <table class="table table-striped table-bordered"><thead>
        <th>@sortablelink('id')</th>
        <th>@sortablelink('nombre_razon_social', 'Nombre Razón Social')</th>
        <th>@sortablelink('numero_nit_cc', 'C.C. o NIT.')</th>
        <th>@sortablelink('digito_verificacion', 'Dígito Ver.')</th>
        <th>@sortablelink('email', 'Email')</th>
        <th class="action-column">&nbsp;</th>
      </tr>
      <tr id="w0-filters" class="filters">
        <td><input type="text" class="form-control" name="ProveedorSearch[id]"></td>
        <td><input type="text" class="form-control" name="ProveedorSearch[nombre_razon_social]"></td>
        <td><input type="text" class="form-control" name="ProveedorSearch[numero_nit_cc]"></td>
        <td><input type="text" class="form-control" name="ProveedorSearch[digito_verificacion]"></td>
        <td><input type="text" class="form-control" name="ProveedorSearch[email]"></td>
        <td>&nbsp;</td></tr>
    </thead>
    <tbody>
@foreach ($proveedores as $proveedor)
<tr data-key="29">
  <td>{{$proveedor->id}}</td>
  <td>{{$proveedor->nombre_razon_social}}</td>
  <td>{{$proveedor->numero_nit_cc}}</td>
  <td>{{$proveedor->digito_verificacion}}</td>
  <td>{{$proveedor->email}}</td>
  <td><a href="view-id={{$proveedor->id}}" title="Ver" aria-label="Ver" data-pjax="0">
    <span class="glyphicon glyphicon-eye-open"></span></a>
    <a href="update-id={{$proveedor->id}}" title="Actualizar" aria-label="Actualizar" data-pjax="0">
      <span class="glyphicon glyphicon-pencil"></span></a>
       <a href="#" title="{{$proveedor->nombre_razon_social}}" name="{{$proveedor->id}}" id="deleteprvdr" aria-label="Eliminar"><span class="glyphicon glyphicon-trash"></span></a>
     </td>
 </tr>
 @endforeach
 </tbody>
  </table>
  {{ $proveedores->links() }}
</div>
 </div>
</div>
@stop
