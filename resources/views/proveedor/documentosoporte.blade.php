@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Aceptación de ticket</h1>
    <ul class="breadcrumb">
    <li><a href="home">Inicio</a></li>
    <li><a href="../proveedores">proveedor</a></li>
    <li class="active">Aceptación de ticket</li>
    </ul>
@stop

@section('content')
@foreach ($dataprv as $users)
<!-- <div style="padding: 20px 30px; background: rgb(243, 156, 18); z-index: 999999; font-size: 16px; font-weight: 600;">
    <a href="/user-management/user/create" style="color: rgba(255, 255, 255, 0.9); display: inline-block; margin-right: 10px; text-decoration: none;">Este proveedor no tiene un usuario creado</a>
    <a class="btn btn-default btn-sm" href="/user-management/user/create" style="margin-top: -5px; border: 0px; box-shadow: none; color: rgb(243, 156, 18); font-weight: 600; background: rgb(255, 255, 255);">Crear usuario!</a>
</div> -->


<div class="box-header with-border">
<h3 class="box-title">Fecha de Generación: <?php echo date('d/m/Y'); ?></h3>
</div>
<!-- /.box-header -->
<div class="row">
    <div class="col-xs-12">
        <form id="registprov" action="soldocusoporte" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false" style="font-weight:bold; color:#3c8dbc;">Subir Aceptación de ticket</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
    @if(Session::has('flash_message'))
        <div class="alert alert-success" role="alert">
            {!! session('flash_message') !!}
          </div>
    <?php session()->forget('flash_message') ?>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-nombre_razon_social required">
<label class="control-label" for="User-nombre">Nombre</label>
<input type="text" id="proveedor-nombre_razon_social" class="form-control" name="name" value="{{$users->name}}" maxlength="255">
<input type="hidden" id="id" class="form-control" name="name" value="{{$users->name}}" maxlength="255">
<br>
@endforeach

<div class="content-select">
<select name="administrador_contrato">
    <option selected>Administrador de contrato</option>
    @foreach($factura as $fact)
    <option value="{{$fact->administrador_contrato}}">{{$fact->administrador_contrato}}</option>
    @endforeach
</select>
</div>

<br>


<div class="content-select">
<select name="hoja_entrada">
    <option selected>Hoja de entrada</option>
    @foreach($hojaEntrada as $hoja)
    <option value="{{$hoja->he}}">{{$hoja->he}}</option>
    @endforeach
</select>
</div>





<div class="help-block"></div>
</div>                    </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group field-proveedor-ciudad required">
<label class="control-label" for="proveedor-ciudad">Valor del ticket</label>
<input type="number" required class="form-control" name="valor_ticket" placeholder="$" maxlength="60">

<div class="help-block"></div>
</div>                    </div>
        </div>
    </div>
                </div>
            </div>


<input type="file" class="form-control" name="files[]" multiple>


    </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success center-block">Guardar</button>
            </div>
        </form>
            <!-- /.tab-content -->
    </div>
</div>
</div>
</div>

<style type="text/css">
    .content-select select{
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        max-width: 250px;
	    position: relative;
        display: inline-block;
        width: 100%;
        cursor: pointer;
        padding: 7px 10px;
        height: 42px;
        outline: 0; 
        border: 0;
        border-radius: 0;
        background: #f0f0f0;
        color: #7b7b7b;
        font-size: 1em;
        color: #999;
        font-family: 
        'Quicksand', sans-serif;
        border:2px solid rgba(0,0,0,0.2);
        border-radius: 12px;
        position: relative;
        transition: all 0.25s ease;
    }

    .content-select i{
        position: absolute;
        right: 20px;
        top: calc(50% - 13px);
        width: 16px;
        height: 16px;
        display: block;
        border-left:4px solid #2AC176;
        border-bottom:4px solid #2AC176;
        transform: rotate(-45deg); /* Giramos el cuadrado */
        transition: all 0.25s ease;
    }

    .content-select:hover i{
	    margin-top: 3px;
    }
    
</style>

@stop
