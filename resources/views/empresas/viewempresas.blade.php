@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Empresas</h1>
    <ul class="breadcrumb"><li><a href="{{url('home')}}">Inicio</a></li>
    <li class="active">Empresas</li>
    </ul>
@stop

@section('content')
<div class="box box-warning">
    <div class="seguimiento-facturas-index box-body">
      <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
        <!-- <p><a class="btn btn-success" href="{{url('empresa/create/form')}}">Crear</a></p> -->
        <div id="w1" style="font-size:12px;">
          <table class="table table-striped table-bordered"><thead>
            <tr>
              <th>id</th>
              <th>Nombre Empresa</th>
              <th>Nit Empresa</th>
              <th>Email</th>
              <th>Teléfono</th>
              <th>Ciudad</th>
              <th>Dirección</th>
              <!-- <th class="action-column">Eliminar</th> -->
            </tr>
          </thead>
          <tbody>
        @foreach ($dataempresas as $empresa)
        <tr data-key="169">
          <td>{{$empresa->id_empresa}}</td>
          <td><a href="{{url('empresa/view-id='.$empresa->id_empresa)}}">
              {{$empresa->nombre_empresa}}</a>
          </td>
          <td>{{$empresa->nit_empresa}}</td>
          <td>{{$empresa->email_empresa}}</td>
          <td>{{$empresa->telefono_empresa}}</td>
          <td>{{$empresa->ciudad}}</td>
          <td>{{$empresa->direccion_empresa}}</td>
          <!-- <td style="width:70px; text-align:center;">
            <a href="#" id="borraritem" name="{{$empresa->id_empresa}}" title="empresa" aria-label="Eliminar">
                  <span class="glyphicon glyphicon-trash"></span>
            </a>
         </td> -->
        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $dataempresas->links() }}
      </div>
      </div>
      </div>
  </div>
@stop
