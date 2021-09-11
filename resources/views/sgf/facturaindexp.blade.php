@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Seguimiento transaccional</h1>
    <ul class="breadcrumb"><li><a href="home">Inicio</a></li>
    <li class="active">Seguimiento transaccional</li>
    </ul>
@stop

@section('content')

<script type="text/javascript">
  /* 
      transaccion[0] = filas de tabla certificados en el siguiente orden: ica, iva, rtf, rete ica, Vlr neto. en array
      transaccion de 1 a 11 = datos de tabla principal en el siguiente orden: #HE, valor HE, aprobado, #FRA, Vlr FRA, Fecha rec, vencimiento, Fecha apr, retenciones, Fecha de pago, Vlr neto
      [
        [
          [['ICA1', 'IVA1', 'RTF1', 'RETE ICA1', 'VALOR NETO1'], ['ICA1', 'IVA1', 'RTF1', 'RETE ICA1', 'VALOR NETO1']], 
          ['1', 'VALOR HE1', 'APROBADO1', '#FRA1', 'VALOR FRA1','FECHA REC1', 'VENCIMIENTO1', 'FECHA APR1', 'RETENCIONES1', 'FECHA PAGO1', 'VLR NETO PAGADO1']], 
          [ 
            [['ICA2', 'IVA2', 'RTF2', 'RETE ICA2', 'VALOR NETO2'], ['ICA2', 'IVA2', 'RTF2', 'RETE ICA2', 'VALOR NETO2']
          ], ['2', 'VALOR HE', 'APROBADO', '#FRA', 'VALOR FRA', 'FECHA REC', 'VENCIMIENTO', 'FECHA APR', 'RETENCIONES', 'FECHA PAGO', 'VLR NETO PAGADO']
        ]
      ]
    */
    function cajaPrincipal(transaccion=[], idContenedor, ejecutado_fecha){
      let docTransaccion = "";
      const contenedor = document.getElementById(`${idContenedor}`);
      contenedor.innerHTML = ""; 
      
      transaccion.forEach((lista)=>{
        let certificados = "";
        let datosPrincipal = "";
        let contador = 0;
        let contadorFilas = 0;
        let idFilas = 0;
        lista[1].forEach((datoTabla1)=>{
          if (contador != 0){
            datosPrincipal+=`<td>$${datoTabla1}</td>`; 
          }else{
            idFilas = datoTabla1;
          }
          contador++;
        });
        
        lista[0].forEach((datoTabla2)=>{
          certificados+=`<tr>
                          <th scope="row">${datoTabla2[0]}</th>
                          <td>$${datoTabla2[1]}</td>
                          <td>$${datoTabla2[2]}</td>
                          <td>$${datoTabla2[3]}</td>
                          <td>$${datoTabla2[4]}</td>
                          <td>$${datoTabla2[5]}</td>
                        </tr>`;
        });

        docTransaccion+=`<tr>
                        <th scope="row">
                        <button class="btn btn-warning" id="dLabel" type="button" onclick="cambio('table-${idFilas}-s-${idContenedor}')" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              ${idFilas}
                            <span class="caret"></span>
                          </button>
                            <ul class="dropdown-custom subtabla" id="table-${idFilas}-s-${idContenedor}" aria-labelledby="dLabel">
                          <div class="panel panel-default">
                          
                            <div class="panel-heading text-center">Retenciones</div>

                            
                            <table class="table">
                              <thead>
                                  <tr>
                                    <th>Valor Factura</th>
                                    <th>ICA</th>
                                    <th>IVA</th>
                                    <th>RTF</th>
                                    <th>RETN MUNICIPAL</th>
                                    <th>VLR NETO</th>
                                  </tr>
                              </thead>
                              <tbody>
                                ${certificados}
                              </tbody>
                            </table>
                          </div>
                          </ul>
                        </th>
                          ${datosPrincipal}
                        </tr>`;
      });

      const contenedorPrincipal = `<div class="dropdown">
                <button class="btn btn-warning" id="dLabel" type="button" onclick="cambio('table-${idContenedor}')" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  ${ejecutado_fecha}
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-custom" id="table-${idContenedor}" aria-labelledby="dLabel">
                <div class="panel panel-default">
                
                  <div class="panel-heading text-center">Momentos</div>

                  
                  <table class="table">
                    <thead>
                        <tr>
                          <th>#HE</th>
                          <th>Valor HE</th>
                          <th>Aprobado</th>
                          <th>#FRA</th>
                          <th>Vlr FRA</th>
                          <th>Fecha Rec</th>
                          <th>Vencimiento</th>
                          <th>Fecha Apr</th>
                          <th>Retenciones</th>
                          <th>Fecha de pago</th>
                          <th>Vlr Neto Pagado</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${docTransaccion}
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="warning"></td>
                        <td class="warning">RECIBIDA</td>
                        <td class="warning"></td>
                        <td class="info">APROBADA</td>
                        <td class="info"></td>
                        <td class="success"></td>
                        <td class="success">PAGADA</td>
                    </tbody>
                  </table>
                </div>
                </ul>
              </div>`;
      contenedor.innerHTML = contenedorPrincipal; 
    };
</script>

<div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list"></i> Consulta de Facturas por Rangos de Fecha</h3>
      </div>
      <div class="iva-index box-body">
          <form method="POST" action="{{url('consulta-facturas-x-fechas')}}"
          accept-charset="UTF-8" id="consulta-facturas-por-fechas" name="consulta-facturas-por-fechas"
          enctype="multipart/form-data" target="_blank">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="nit" id="nit" value="{{Auth::user()->Nit}}">
            <div class="row">
              <div class="col-xs-2">
                  <input type="text" class="form-control" name="nit" value="{{ Auth::user()->Nit }}" required="required" readonly="readonly">
               </div>
               <div class="col-xs-2">
                  <select class="form-control" id="pdesde" name="id_empresa" required>
                     <option value="">Empresa..</option>
                     <option value="todas">Todas</option>
                      @forEach ($empresas as $empresa)
                        <option value="{{$empresa->id_empresa}}">{{$empresa->nit_empresa}}-{{$empresa->nombre_empresa}}</option>
                      @endforEach
                  </select>
               </div>
               <div class="col-xs-3">
                  <div id="fecha_pago_inicio-datetime" class="input-group date">
                    <span class="input-group-addon" id="fif" title="Seleccione fecha inicio">
                      <span class="glyphicon glyphicon-calendar">
                      </span>
                    </span>
                      <input type="text" id="fecha_pago_inicio" class="form-control form_datetime"
                       name="fecha_pago_inicio" placeholder="Fecha de pago (desde)">
                     </div>
                  <div class="help-block"></div>
               </div>
               <div class="col-xs-3">
                  <div id="fecha_pago_fin-datetime" class="input-group date">
                    <span class="input-group-addon" id="fff" title="Fecha de pago (hasta)">
                      <span class="glyphicon glyphicon-calendar">
                      </span>
                    </span>
                      <input type="text" id="fecha_pago_fin" class="form-control form_datetime"
                       name="fecha_pago_fin" placeholder="Fecha de pago (hasta)">
                     </div>
                  <div class="help-block"></div>
               </div>
                <div class="col-xs-2">
                  <button type="submit" class="btn btn-primary btn-block">Consultar</button>
                </div>
            </div>
          </form>
      </div>
  </div>
<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list"></i> Listado Filtrable</h3>
      </div>
    <div class="seguimiento-facturas-index box-body">
      <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
        <div id="w1" style="font-size:12px;">
          <div class="summary">Mostrando
            <strong>{{($transacciones->currentpage()-1)*$transacciones->perpage()+1}}-{{$transacciones->currentpage()*$transacciones->perpage()}}</strong>
              de  <strong>{{$transacciones->total()}}</strong> elementos</div>
          <table class="table table-striped table-bordered"><thead>
            <tr>
            <tr>
              <th><a href="#">Sociedad</a></th>
              <th>@sortablelink('documento_compra', 'Doc compra')</th>
              <th>@sortablelink('administrador_contacto', 'Administrador Contacto')</th>
              <th>@sortablelink('valor_total', 'Valor Total')</th>
              <th>@sortablelink('fecha_emision', 'Fecha Emision')</th>
              <th>@sortablelink('vencimiento', 'Vencimiento')</th>
              <th>@sortablelink('ejecutado_fecha', 'Ejecutado a la fecha')</th>
              <th>@sortablelink('saldo', 'Saldo (Vlr ejecutado)')</th>
              <!-- <th class="action-column"><a href="#"></a></th> -->
            </tr>
            <tr id="w1-filters" class="filters">
              <form role="search" class="navbar-form navbar-left" accept-charset="UTF-8" action="{{url('seguimiento-facturas/search')}}" method="GET">
                <td>
            		<select class="form-control" id="sociedad" name="sociedad">
                		<option value="" selected="selected" disabled="disabled">Empresa..</option>
                      	@forEach ($empresas as $empresa)
                        <option value="{{$empresa->nombre_empresa}}">{{$empresa->nombre_empresa}}</option>
                      	@endforEach
               			<option value="">Todas</option>
                  	</select>
                </td>
                <td><input type="text" placeholder="Documento Compra" class="form-control" name="documento_compra" maxlength="100"></td>
                <td><input type="number" placeholder="Contacto" class="form-control" name="administrador_contacto" maxlength="100"></td>
                <td><input type="text" class="form-control" placeholder="Valor Total" name="valor_total" maxlength="155"></td>


                <td><input type="text" placeholder="Fecha Emision" class="form-control" name="fecha_emision" title="Año-Mes-Día, o solo el año para ver las facturas de determinado año, o año-mes"/></td>
                <td><input type="text" placeholder="Vencimiento" class="form-control" name="vencimiento" title="Año-Mes-Día, o solo el año para ver las facturas de determinado año, o año-mes"/></td>
                <td><input type="text" class="form-control" placeholder="Ejecutado Fecha" name="ejecutado_fecha" maxlength="155"></td>
                <td></td>
                <td><input type="text" class="form-control" placeholder="Saldo (Vlr fecha)" name="saldo" maxlength="155"></td>      
                <td><button type="submit" class="btn btn-primary">
                  <i class="fa fa-fw fa-search"></i></button></td>
              </form>
            </tr>
          </thead>
          <tbody>
          
        @forEach ($transacciones as $transaccion)
        <tr data-key="169">
          <td>{{$transaccion->nombre_empresa}}</td>
          <td>{{$transaccion->doc_compra}}</td>
          <td>{{$transaccion->administrador_contrato}}</td>
          <td>${{number_format(floatval($transaccion->valor_total),0,',','.')}}</td>
          <td>{{date('Y-m-d', strtotime($transaccion->fecha_emision))}}</td>
          <td>{{date('Y-m-d', strtotime($transaccion->vencimiento))}}</td>
          <td><div id="{{$transaccion->id}}"></div>
          <script>
                  cajaPrincipal(transaccion = [ [ [['1.500.000', '100.000', '3.000', '40.000', '80.000', '1.000.000']], ['A', '500.000', 'S', '1', '500.000','15/02/2021', '26/03/2021', '16-Feb', '55.000', '29-Mar', '445.000']], [ [['1.500.000', '100.000', '3.000', '40.000', '80.000', '1.000.000']], ['B', '500.000', 'S', '1', '500.000','15/02/2021', '26/03/2021', '16-Feb', '55.000', '29-Mar', '445.000']]], idContenedor="{{$transaccion->id}}", ejecutado_fecha="{{$transaccion->ejecutado_fecha}}")  
                </script>
          </td>
          <td>${{number_format(floatval($transaccion->saldo),0,',','.')}}</td>
          <td><a href="{{url('seguimiento-facturas/ver-id='.$transaccion->id)}}"
            title="Ver Detalle" aria-label="Ver" data-pjax="0">
            Ver detalle
              </a>
          </td>
              </tr>
        @endforEach
      </tbody>
      </table>
  {{ $transacciones->links() }}
      </div>
      </div>
      </div>
  </div>


  <!--Ancho de caja-->
  <script type="text/javascript">
    const cajaPadre = document.getElementsByClassName("seguimiento-facturas-index");
    const tabla = document.getElementsByClassName("dropdown-custom");
    tabla[0].style = "transform(translateX(-100px))";

    function cambio(idTabla){
      const tabla = document.getElementById(idTabla);
      let estilo = tabla.style.display;
      
      if(estilo == "block"){
        tabla.style.display = "none";
      }else{
        tabla.style.display = "block";
      };
    };

    setInterval(()=>{
      let anchoCaja = cajaPadre[0].clientWidth;
      for(let i = 0; i < tabla.length; i++){
        if(i%3 == 0){
          tabla[i].style.width = `${anchoCaja - 20}px`;
          tabla[i].style.transform = `translateX(-${74.5/100*anchoCaja}px)`;
        };
      };
    },100);

    

  </script>
  <style type="text/css">
    .dropdown-custom {
      position:absolute;
      display:none;
      z-index: 1000;
    }
    .subtabla {
      left: 100px;
      padding: 0px;
    }
  </style>
@stop
