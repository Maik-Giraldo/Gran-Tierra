<html>
<head>
@foreach ($datosempr as $empresa)
<title>{{$empresa->nombre_empresa}}</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <style type="text/css">
    .Estilo1 {font-family: Arial, Helvetica, sans-serif}
    .Estilo3 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 14px }
    .Estilo32 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 13px }
    .Estilo31 {font-family: Arial, Helvetica, sans-serif; font-size: 12px;}
    .Estilo4 {font-size: 12px}
    .Estilo5 {font-family: Arial, Helvetica, sans-serif; font-size: 11px; }
    .header img {
      float: left;
      width: 190px;
      height: 70px;
    }
    .logotext {
      position: relative;
      top: 18px;
      padding-left: 37px;
      font-size: 15px;
      font-weight: bold;
      left: 12px;
    }
    .logo {
            background:url(logo.png) no-repeat;
            background-position: top left;
    }
    table {border: 1px solid;}
    </style>
</head>
<body>
<table width="550" cellpadding="5" cellspacing="0" align="center" class="Estilo5">
  <tr class="texto">
         <td width="100%" class="Estilo1" colspan="3" style="border: 0">
            <div><img width="201" height="54" src="{{public_path('images/empresa/'.$empresa->logotipo_color)}}"></div>
            <div align="center" class="Estilo4"><br>
            <span class="Estilo3">CERTIFICADO DE RETENCIÓN DE I V A</span>
           </div>
         </td>
  </tr>
  <tr class="texto">
    <td width="50%" style="border: 0">
      <div class="Estilo31" style="text-align: left;">CIUDAD DONDE SE CONSIGNÓ LA RETENCIÓN: </div>
    </td>
    <td colspan="2" style="border: 0">
      <div class="Estilo31" style="text-align: left;">{{$ret->Ciudad_Pago}}</div>
    </td>
  </tr>
  <tr>
    <td style="border: 0">
      <div class="Estilo31" style="text-align: left;">AÑO GRAVABLE: </div>
    </td>
    <td colspan="2" style="border: 0">
      <div class="Estilo31" style="text-align: left;">{{$ano}}</div>
    </td>
  </tr>
  <tr>
    <td style="border: 0">
      <div class="Estilo31" style="text-align: left;">RETENEDOR : </div>
    </td>
    <td colspan="2" style="border: 0">
      <div class="Estilo31" style="text-align: left;">{{$empresa->nombre_empresa}}</div>
    </td>
  </tr>
  <tr>
    <td style="border: 0">
      <div class="Estilo31" style="text-align: left;">NIT : </div>
    </td>
    <td colspan="2" style="border: 0">
      <div class="Estilo31" style="text-align: left;">{{$empresa->nit_empresa}}</div>
    </td>
  </tr>
  <tr>
    <td style="border: 0">
      <div class="Estilo31" style="text-align: left;">DIRECCIÓN : </div>
    </td>
    <td colspan="2" style="border: 0">
      <div class="Estilo31" style="text-align: left;">{{$empresa->direccion_empresa}}</div>
    </td>
  </tr>
  <tr>
    <td style="border: 0">
      <div class="Estilo31" style="text-align: left;">RETENIDO : </div>
    </td>
    <td colspan="2" style="border: 0">
      <div class="Estilo31" style="text-align: left;">{{$ret->Nombre}}</div>
    </td>
  </tr>
  <tr>
    <td style="border: 0">
      <div class="Estilo31" style="text-align: left;">NIT O C.C : </div>
    </td>
    <td colspan="2" style="border: 0">
      <div class="Estilo31" style="text-align: left;">{{$ret->Nit}}</div>
    </td>
  </tr>
  <tr>
    <td height="" colspan="3" valign="top" style="border: 0">
      <table width="100%" border="1" cellspacing="0" cellpadding="0" class="Estilo5">
      <tr>
        <td width="20%"><div align="center"><strong>PERIODO</strong></div></td>
        <td width="20%"><div align="center"><strong>CONCEPTO DE LA OPERACIÓN</strong></div></td>
        <td width="15%"><div align="center"><strong>VALOR DE LA OPERACIÓN</strong></div></td>
        <td width="15%"><div align="center"><strong>IVA GENERADO</strong></div></td>

        <td width="15%"><div align="center"><strong>% DE RETENCIÓN</strong></div></td>
        <td width="15%"><div align="center"><strong>VALOR RETENIDO</strong></div></td>
      </tr>
      <?php
      $sumabase       = 0;
      $sumaiva        = 0;
      $sumaretenido   = 0;
      ?>
      @foreach ($datosiva as $iva)
      @if($loop->last)
         <tr>
            <td style="padding-bottom: 70px;"><div align="left" style="border-bottom: 0;">
            		@if ($iva->Periodo == 1)
				    Enero - Febrero
					@elseif ($iva->Periodo == 2)
				    Marzo - Abril
					@elseif ($iva->Periodo == 3)
				    Mayo - Junio
				    @elseif ($iva->Periodo == 4)
				    Julio - Agosto
					@elseif ($iva->Periodo == 5)
				    Septiembre - Octubre
					@else
					Noviembre - Diciembre
					@endif
 				</div></td>
            <td style="padding-bottom: 70px;">{{$iva->Concepto}}</td>
            <td style="padding-bottom: 70px;"><div align="right">${{number_format($iva->Base,0,',','.')}}</div></td>
            <td style="padding-bottom: 70px;"><div align="right">${{number_format($iva->Iva,0,',','.')}}</div></td>
            <td style="padding-bottom: 70px;"><div align="right">{{$iva->Porcentaje}}</div></td>
            <td style="padding-bottom: 70px;"><div align="right">${{number_format($iva->Retenido,0,',','.')}}</div></td>
        </tr>
      @else
        <tr>
            <td><div align="left">
            		@if ($iva->Periodo == 1)
				    Enero - Febrero
					@elseif ($iva->Periodo == 2)
				    Marzo - Abril
					@elseif ($iva->Periodo == 6)
				    Mayo - Junio
				    @elseif ($iva->Periodo == 4)
				    Julio - Agosto
					@elseif ($iva->Periodo == 5)
				    Septiembre - Octubre
					@else
					Noviembre - Diciembre
					@endif
 				</div></td>
            <td>{{$iva->Concepto}}</td>
            <td><div align="right">${{number_format($iva->Base,0,',','.')}}</div></td>
            <td><div align="right">${{number_format($iva->Iva,0,',','.')}}</div></td>
            <td><div align="right">{{$iva->Porcentaje * 100}}%</div></td>
            <td><div align="right">${{number_format($iva->Retenido,0,',','.')}}</div></td>
        </tr>
        @endif
        <?php
        $sumaiva             += $iva->Iva;
        $sumabase            += $iva->Base;
        $sumaretenido        += $iva->Retenido;
        ?>
        @endforeach
        <tfoot>
          <tr>
            <td colspan="2"><strong>TOTAL SUMA RETENIDA</strong></td>
            <td><div align="right"><strong>${{number_format($sumabase,0,',','.')}}</strong></div></td>
            <td><div align="right"><strong>${{number_format($sumaiva,0,',','.')}}</strong></div></td>
            <td><div align="right"></div></td>
            <td><div align="right"><strong>${{number_format($sumaretenido,0,',','.')}}</strong></div></td>
          </tr>
        </tfoot>
    </table>
  </td>
  </tr>
  <tr>
    <td colspan="3">
      <p>{{$iva->regimen}}</p>
      <p class="Estilo32" style="text-align: center; line-height: 1.5em;"><strong>Este documento no requiere para su validez firma autógrafa de acuerdo con el artículo 7 del Decreto 380 de 1996, recopilado en el artículo 1.6.1.12.13 del DUT 1625 de Octubre 11 de 2016, que regula el contenido del certificado de retenciones a título de IVA.
      </strong></p>
    </p>
  </td>
  </tr>
  <tr>
    <td style="border: 0">
      <div class="Estilo31" style="text-align: left;">{{$ret->Ciudad_Expedido}} </div>
    </td>
    <td colspan="2" style="border: 0">
      <div class="Estilo31" style="text-align: center;">Fecha de Expedición: {{date('Y-m-d', strtotime($iva->fecha_expedicion))}}</div>
    </td>
  </tr>
</table>
<p>Gerencia Central de Impuestos</p>
</body>
@endforeach
</html>
