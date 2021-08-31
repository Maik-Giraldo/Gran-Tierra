@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Notificaciones</h1>
    <ul class="breadcrumb"><li><a href="{{url('home')}}">Inicio</a></li>
    <li class="active">Notificaciones</li>
    </ul>
@stop

@section('content')
<div class="box box-warning">
      <div class="notificaciones-list  box-body">
        <div id="list-wrapper" class="list-notificacions">
          @foreach($notificaciones as $notificacion)
              <div class="alert @if($notificacion->tipo == 'alerta') alert-error @else alert-warning @endif" role="alert">
                {{{$notificacion->notificacion}}}
              </div>
              @endforeach
              </div>
            </div>
        <div class="summary">Mostrando
          <strong>{{($notificaciones->currentpage()-1)*$notificaciones->perpage()+1}}-{{$notificaciones->currentpage()*$notificaciones->perpage()}}</strong>
            de  <strong>{{$notificaciones->total()}}</strong> elementos</div>
      </div>
      {{ $notificaciones->links() }}
    </div>
@stop
