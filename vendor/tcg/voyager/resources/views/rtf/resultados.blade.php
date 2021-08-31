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
         <div class="alert alert-success" role="alert">
         @if (is_array($resultado))
         @foreach($resultado as $result)
         <li><label>Insertados:</label> {{$result['inserteds']}}</li>
         <li><label>Actualizados:</label> {{$result['updates']}}</li>
         @endforeach
         @endif
         @if (is_array($errores))
         @foreach($errores as $error)
         <label>Errores:</label>{{$error}}
         @endforeach
         @endif
         </div>
         </div>
     </div>
         </div>
   </div>
@stop
