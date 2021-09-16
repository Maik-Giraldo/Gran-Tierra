@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Ver Documentos de compra : {{$razon_social}}</h1>
    <ul class="breadcrumb">
    <li><a href="home">Inicio</a></li>
    <li><a href="../proveedores">Documentos de compra</a></li>
    <li class="active">Ver Documentos de compra: {{$razon_social}}</li>
    </ul>
@stop

@section('content')
@foreach ($dataprv as $proveedor)
<!-- <div style="padding: 20px 30px; background: rgb(243, 156, 18); z-index: 999999; font-size: 16px; font-weight: 600;">
    <a href="/user-management/user/create" style="color: rgba(255, 255, 255, 0.9); display: inline-block; margin-right: 10px; text-decoration: none;">Este proveedor no tiene un usuario creado</a>
    <a class="btn btn-default btn-sm" href="/user-management/user/create" style="margin-top: -5px; border: 0px; box-shadow: none; color: rgb(243, 156, 18); font-weight: 600; background: rgb(255, 255, 255);">Crear usuario!</a>
</div> -->
<div class="row">
    <div class="col-xs-12">
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
        <div class="nav-tabs-custom">
            <p>
            <a class="btn btn-sm btn-primary" href="{{url('/actualizar-mis-datos/info')}}">Editar</a>
            </p>
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Información proveedor</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Info. empresa</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Info. bancaria</a></li>
                <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Ref. Comercial</a></li>
                <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Ref. Personales</a></li>
                <li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="false">Negociación</a></li>
                <li class=""><a href="#tab_7" data-toggle="tab" aria-expanded="false">Documentación</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                 <label class="control-label">Nombre razón social</label><br/>
                                 {{$razon_social}}                         </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="control-label">Nit o C.C.</label><br/>
                                {{$proveedor->numero_nit_cc}}                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">Dígito de verificación</label><br/>
                              {{$proveedor->digito_verificacion}}                             </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nombre comercial</label><br/>
                                 {{$proveedor->nombre_comercial}}                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Matrícula mercantil</label><br/>
                                {{$proveedor->matricula_mercantil}}                           </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Dirección</label><br/>
                                 {{$proveedor->direccion}}                           </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Ciudad</label><br/>
                                {{$proveedor->ciudad}}                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Departamento</label><br/>
                                 {{$proveedor->departamento}}                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Teléfono</label><br/>
                                {{$proveedor->telefono}}                           </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Celular</label><br/>
                                 {{$proveedor->celular}}                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Fax</label><br/>
                                {{$proveedor->fax}}                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Celular</label><br/>
                                 {{$proveedor->celular}}                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Representante legal</label><br/>
                                {{$proveedor->representante_legal}}                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Documento representante legal</label><br/>
                                 {{$proveedor->documento_representante_legal}}                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Persona de contacto (Pedidos)</label><br/>
                                {{$proveedor->contacto_pedidos}}                           </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Teléfono contacto pedidos</label><br/>
                                 {{$proveedor->cp_telefono}}                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Persona de contacto (Cont. / Cart.)</label><br/>
                                {{$proveedor->contacto_contabilidad_cartera}}                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Teléfono de contacto (Cont. / Cart.)</label><br/>
                                 {{$proveedor->cp_telefon2}}                           </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Estado</label><br/>
                                 {{$proveedor->estado}}                          </div>
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tipo de empresa</label><br/>
                                {{$proveedor->tipo}}                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Otro tipo</label><br/>
                                                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Régimen IVA</label><br/>
                                {{$proveedor->regimen_iva}}                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Régimen RENTA</label><br/>
                                {{$proveedor->regimen_renta}}                           </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Autoretenedor RENTA</label><br/>
                                {{$proveedor->autoretenedor_renta}}                           </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Actividad económica</label><br/>
                                {{$proveedor->actividad_economica}}                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Código CIIU</label><br/>
                                {{$proveedor->codigo_ciiu}}                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Entidad financiera</label><br/>
                                {{$proveedor->entidad_financiera}}                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Dirección</label><br/>
                                {{$proveedor->ef_direccion}}                           </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Teléfono</label><br/>
                                {{$proveedor->ef_telefono}}                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tipo de cuenta</label><br/>
                                {{$proveedor->ef_tipo_cuenta}}                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">No. de cuenta</label><br/>
                                {{$proveedor->ef_cuenta}}                         </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Titular</label><br/>
                                {{$proveedor->ef_titular}}                             </div>
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nombre</label><br/>
                                {{$proveedor->rc_nombre1}}                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Contacto</label><br/>
                              {{$proveedor->rc_nombre2}}                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Dirección</label><br/>
                                {{$proveedor->rc_direccion1}}                           </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Teléfono</label><br/>
                                {{$proveedor->rc_telefono1}}                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nombre</label><br/>
                                {{$proveedor->ef_titular}}                         </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Contacto</label><br/>
                                {{$proveedor->rc_nombre2}}                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Dirección</label><br/>
                                {{$proveedor->rc_direccion2}}                           </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Teléfono</label><br/>
                                {{$proveedor->rc_telefono2}}                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nombre</label><br/>
                                {{$proveedor->rp_nombre1}}                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Contacto</label><br/>
                                {{$proveedor->rp_contacto1}}                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Dirección</label><br/>
                                {{$proveedor->rp_direccion1}}                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Teléfono</label><br/>
                                {{$proveedor->rp_telefono1}}                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nombre</label><br/>
                                {{$proveedor->rp_nombre2}}                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Contacto</label><br/>
                                {{$proveedor->rp_contacto2}}                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Dirección</label><br/>
                                {{$proveedor->rp_direccion2}}                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Teléfono</label><br/>
                                {{$proveedor->rp_telefono2}}                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Condiciones de pago</label><br/>
                                {{$proveedor->nc_condiciones_pago}}                           </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Pago en</label><br/>
                                {{$proveedor->nc_tiempo_pago}}                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Otro</label><br/>
                                            {{$proveedor->nc_tiempo_pago_otro}}      </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Observación</label><br/>
                                {{$proveedor->nc_tiempo_pago_obs}}                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Descuento financiero</label><br/>
                                {{$proveedor->nc_descuento_financiero}}                           </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Pie de factura</label><br/>
                                {{$proveedor->nc_pie_factura}}                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Persona autorizada para recoger pagos</label><br/>
                                {{$proveedor->nc_persona_autorizada_pagos}}                             </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">C.C.</label><br/>
                                {{$proveedor->nc_persona_autorizada_pagos_cc}}                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Sección</label><br/>
                                {{$proveedor->nc_seccion}}                           </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Responsable de negociación</label><br/>
                                {{$proveedor->nc_responsable_negociacion}}                           </div>
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_7">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Documento RUT</label><br/>
                                <a href="{{ asset('images/proveedores/' . $proveedor->doc_rut . '') }}" target="_blank">{{$proveedor->doc_rut}}</a>                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Certificado de existencia y representación</label><br/>
                                <a href="{{ asset('images/proveedores/' . $proveedor->doc_certificado_existencia_representacion . '') }}" target="_blank">{{$proveedor->doc_certificado_existencia_representacion}}</a>                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Certificación bancaria</label><br/>
                                <a href="{{ asset('images/proveedores/' . $proveedor->doc_certificacion_bancaria . '') }}" target="_blank">{{$proveedor->doc_certificacion_bancaria}}</a>                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Cédula representante legal</label><br/>
                                <a href="{{ asset('images/proveedores/' . $proveedor->doc_cedula_rep_legal . '') }}" target="_blank">{{$proveedor->doc_cedula_rep_legal}}</a>                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Referencia comercial No. 1</label><br/>
                                <a href="{{ asset('images/proveedores/' . $proveedor->doc_referencia_comercial_1 . '') }}" target="_blank">{{$proveedor->doc_referencia_comercial_1}}</a>                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Referencia Comercial No. 2</label><br/>
                                <a href="{{ asset('images/proveedores/' . $proveedor->doc_referencia_comercial_2 . '') }}" target="_blank">{{$proveedor->doc_referencia_comercial_2}}</a>                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- /.tab-pane -->
        </div>
                <div>
            <!-- <a data-method="post" class="btn btn-primary" href="/actualizar-mis-datos/info">Editar</a> -->

        </div>
            <!-- /.tab-content -->
    </div>
</div>
@endforeach
@stop
