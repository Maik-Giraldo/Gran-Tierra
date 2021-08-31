@extends('voyager::mastercerti')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ voyager_asset('css/ga-embed.css') }}">
    <style>
        .user-email {
            font-size: .85rem;
            margin-bottom: 1.5em;
        }
    </style>
@stop

@section('content')

 <!-- Contenido certiweb -->
     <div class="container">
             <div class="row page-title text-center wow zoomInDown" data-wow-delay="1s" style="margin-top:-49px;">
                 <ol class="breadcrumb" style="text-align: left;">
                     <li class="active">Resultado de subida de Excel de Rtf</li>
                 </ol>
     <div class="form-group">
     <br>
         <div class="col-md-5 col-md-offset-3">
         <h3>Resultado de subida de Excel de Rtf:</h3>
         <br><br>
          <div class="alert alert-danger" role="alert">
            <strong>Hay errores en el archivo de excel</strong> por favor verifique que el año y periodo.
          </div>
         </div>
     </div>
         </div>
   </div>
@stop
