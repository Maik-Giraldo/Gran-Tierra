@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Noticias</h1>
    <ul class="breadcrumb"><li><a href="{{url('home')}}">Inicio</a></li>
    <li class="active">Noticias</li>
    </ul>
@stop

@section('content')
<div class="box box-warning">
    <div class="noticias-list  box-body">
       <div id="list-wrapper" class="row list-news">
         @foreach($noticias as $noticia)
          <div class="col-sm-4">
              <article class="item" data-key="3">
                  <div class="image-container">
                    <img style="width: 100%; height: 195px; display: block;" src="{{url('images/noticias/'.$noticia->imagen)}}" class="img-responsive"
                     alt="{{$noticia->titulo}}" align="right" />
                    </div>
                         <h3 class="title"><a href="{{url('/noticias/view-id='.$noticia->id)}}" title="{{$noticia->titulo}}">
                               {{$noticia->titulo}}</a>       </h3>
                             <div class="item-excerpt">{{ str_limit($noticia->contenido, 100) }}</div>
               </article>
             </div>
             @endforeach
        </div>
        <div class="summary">Mostrando
          <strong>{{($noticias->currentpage()-1)*$noticias->perpage()+1}}-{{$noticias->currentpage()*$noticias->perpage()}}</strong>
            de  <strong>{{$noticias->total()}}</strong> elementos</div>
      </div>
      {{ $noticias->links() }}
    </div>
@stop

