@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Soporte</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
    <li class="active">Soporte</li>
    </ul>
@stop

@section('content')
<div class="col-xs-12">
  <div class="box box-warning">
    <div class="site-contact box-body">
        <p>Estimado cliente: Si tiene alguna duda o requiere de soporte, por favor diligencie el siguiente formulario o comuníquese a nuestro PBX 743 6298, con gusto lo atenderemos</p>
          <div class="row">
              <div class="col-lg-12">
                  <form id="contact-form" action="soportesf" method="post" role="form">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      @if(Session::has('flash_message'))
                          <div class="alert alert-success" role="alert">
                              {!! session('flash_message') !!}
                            </div>
                      @endif
                      <?php session()->forget('flash_message') ?>
                      <div class="form-group field-contactform-name required">
                        <label class="control-label" for="contactform-name">Nombre</label>
                        <input type="text" id="contactform-name" class="form-control" name="name" autofocus>
                        <p class="help-block help-block-error"></p>
                      </div>
                      <div class="form-group field-contactform-email required">
                        <label class="control-label" for="contactform-email">Correo electrónico</label>
                        <input type="email" id="contactform-email" class="form-control" name="email">
                        <p class="help-block help-block-error"></p>
                      </div>
                      <div class="form-group field-contactform-subject required">
                        <label class="control-label" for="contactform-subject">Asunto</label>
                        <input type="text" id="contactform-subject" class="form-control" name="subject">
                        <p class="help-block help-block-error"></p>
                      </div>
                      <div class="form-group field-contactform-body required">
                        <label class="control-label" for="contactform-body">Mensaje</label>
                        <textarea id="contactform-body" class="form-control" name="body" rows="6"></textarea>
                        <p class="help-block help-block-error"></p>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary" name="contact-button">Enviar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@stop
