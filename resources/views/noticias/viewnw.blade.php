@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h3>{{$titulo}}</h3>
    <ul class="breadcrumb">
    <li><a href="{{url('home')}}">Inicio</a></li>
    <li><a href="{{url('noticias/list')}}">Noticias</a></li>
    <li class="active">Noticia {{$id_noticia}}</li>
    </ul>
@stop

@section('content')
<div class="box box-warning">
    @foreach ($datanw as $noticia)
    <div class="noticias-view box-body">
      <div class="">
        <p><img width="30%" HSPACE="10" src="{{url('images/noticias/'.$noticia->imagen)}}" class="img-responsive"
         alt="{{$noticia->titulo}}" align="right" /> </p>
      </div>
        <p style="text-align:justify; font-size:130%;">
        {{$noticia->contenido}}</p>
          @if( Auth::user()->role_id == 4 )
          <p><a class="btn btn-primary" href="{{url('noticias/edit-id='.$noticia->id)}}">Editar</a>
              <a class="btn btn-danger" href="#" title="noticias" name="{{$noticia->id}}" id="borraritem">Borrar</a>
          </p>
          @endif
    </div>
    @endforeach
</div>
@stop
