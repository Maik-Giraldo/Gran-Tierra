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
    .Estilo51 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; font-weight: bold;}
    .Estilo52 {font-family: Arial, Helvetica, sans-serif; font-size: 11px;}
    .header img {
	  float: left;
	  width: 190px;
	  height: 70px;
	}
	.logotext {
      position: relative;
      top: 18px;
      font-size: 16px;
      font-weight: bold;
    }
    .logo {
            background:url(logo.png) no-repeat;
            background-position: top left;
    }
    table {border: 1px solid;}
    .border-lb {border: 1px solid #323232; border-width: 0 1 0px 0px; padding-bottom: 3px;}
    </style>
</head>
<body>
<table width="550" cellpadding="5" cellspacing="0" align="center" class="Estilo5">
  <tr class="texto">
         <td width="100%" class="Estilo1" colspan="3" style="border: 0">
            <div><img width="201" height="54" src="{{public_path('images/empresa/'.$empresa->logotipo_color)}}"></div>
            <div align="center" class="Estilo4"><br>
            <span class="Estilo3">CERTIFICADO DE RETENCIÓN EN LA FUENTE A TÍTULO <br/> DE IMPUESTO DE RENTA Y COMPLEMENTARIOS</span>
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
        <td width="30%"><div align="center"><strong>CONCEPTO</strong></div></td>
        <td width="10%"><div align="center"><strong>NOTAS</strong></div></td>
        <td width="15%"><div align="center"><strong>VALOR BASE</strong></div></td>
        <td width="15%"><div align="center"><strong>VALOR RETENIDO</strong></div></td>

        <td width="15%"><div align="center"><strong>TARIFA</strong></div></td>
      </tr>
      <?php
      $sumabase       = 0;
      $sumaretenido   = 0;
      ?>
      @foreach ($datosrtf as $rtf)
      @if ($rtf->id_empresa == $empresa->id_empresa)
      @if($loop->last)
         <tr>
            <td class="border-lb" style="padding-bottom: 90px; padding-left: 2px;">{{$rtf->Concepto}}</td>
            <td class="border-lb" align="center" style="padding-bottom: 90px;">@if($rtf->texto_honorarios == 'Ver nota') Ver nota @endif</td>
            <td class="border-lb" style="padding-bottom: 90px; padding-right: 2px;"><div align="right">${{number_format($rtf->Base,0,',','.')}}</div></td>
            <td class="border-lb" style="padding-bottom: 90px; padding-right: 2px;"><div align="right">${{number_format($rtf->Retenido,0,',','.')}}</div></td>
            <?$porcentaje=str_replace(',', '.', $rtf->Porcentaje)?>
            <td class="border-lb" style="padding-bottom: 90px; padding-right: 2px;"><div align="center">{{$porcentaje * 100}}%</div></td>
        </tr>
      @else
        <tr>
            <td class="border-lb" style="padding-left: 2px;">{{$rtf->Concepto}}</td>
            <td class="border-lb" align="center">@if($rtf->texto_honorarios == 'Ver nota') Ver nota @endif</td>
            <td class="border-lb" style="padding-right: 2px;"><div align="right">${{number_format($rtf->Base,0,',','.')}}</div></td>
            <td class="border-lb" style="padding-right: 2px;"><div align="right">${{number_format($rtf->Retenido,0,',','.')}}</div></td>
            <?$porcentaje=str_replace(',', '.', $rtf->Porcentaje)?>
            <td class="border-lb" style="padding-right: 2px;"><div align="center">{{$porcentaje * 100}}%</div></td>
        </tr>
        @endif
        @endif
        <?php
        if ($rtf->id_empresa == $empresa->id_empresa){
        $sumabase            += $rtf->Base;
        $sumaretenido        += $rtf->Retenido;
        }
        ?>
        @endforeach
        <tfoot>
          <tr>
            <td colspan="3"><div align="right"><strong>TOTAL:</strong></div></td>
            <td style="padding-right: 2px;"><div align="right"><strong>${{number_format($sumaretenido,0,',','.')}}</strong></div></td>
            <td><div align="right"></div></td>
          </tr>
        </tfoot>
    </table>
  </td>
  </tr>
  @if ($notas->id_empresa == $empresa->id_empresa)
  <tr>
    <td height="" colspan="3" valign="top" style="border: 0">
      <table width="65%" border="1" cellspacing="0" cellpadding="0" class="Estilo5">
      <tr>
        <td width="30%"><div align="center"><span class="Estilo51">{{$notas->Concepto}}</span></div></td>
        <td width="10%"><div align="center"><strong>Ver Nota</strong></div></td>
        <td width="15%"><div align="center"><strong>${{number_format($notas->Base,0,',','.')}}</strong></div></td>
      </tr>
    </table>
  </td>
  </tr>
  <tr>
  	<td colspan="3">
  		<p class="Estilo52" style="text-align: left;">
 			<strong>Nota: Valores a reportar por la compañía en medios magneticos año gravable {{$ano}}.</strong>

  		</p>
		</td>
	</tr>
  @endif
    <tr>
    <td colspan="3"><p class="Estilo32" style="text-align: center; line-height: 1.5em;"><strong>{{$rtf->articulo_decreto}}.
      </strong></p>
    </p>
  </td>
  </tr>
  <tr>
    <td style="border: 0">
      <div class="Estilo31" style="text-align: left;">{{$ret->Ciudad_Expedido}} </div>
    </td>
    <td colspan="2" style="border: 0">
      <div class="Estilo31" style="text-align: center;">Fecha de Expedición: {{date('Y-m-d', strtotime($rtf->fecha_expedicion))}}</div>
    </td>
  </tr>
</table>
<p>Gerencia Central de Impuestos</p>
</body>
@endforeach
</html>
