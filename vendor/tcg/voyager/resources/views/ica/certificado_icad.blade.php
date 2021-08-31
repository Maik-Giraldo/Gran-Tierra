<html>
<head>
@foreach ($datosempr as $certif)
<title>{{$certif->nombre_empresa}}</title>
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
      padding-left: 12px;
      font-size: 15px;
      font-weight: bold;
      left: 12px;
    }
    .logo {
            background:url(logo.png) no-repeat;
            background-position: top left;
    }
    table {width:100%;page-break-inside: avoid;border: 1px solid;}
    .border-lb {border: 1px solid #323232; border-width: 0 1 0px 0px; padding-bottom: 3px;}
    </style>
</head>
<body>
<table width="550" cellpadding="5" cellspacing="0" align="center" class="Estilo5">
  <tr class="texto">
         <td width="100%" class="Estilo1" colspan="3" style="border: 0">
            <div><img width="201" height="54" src="{{public_path('images/empresa/'.$certif->logotipo_color)}}"></div>
            <div align="center" class="Estilo4"><br>
            <span class="Estilo3">CERTIFICADO DE RETENCIÓN DE INDUSTRIA Y COMERCIO</span>
           </div>
         </td>
  </tr>
  <tr class="texto">
    <td width="50%" style="border: 0">
      <div class="Estilo31" style="text-align: left;">CIUDAD DONDE SE CONSIGNÓ LA RETENCIÓN: </div>
    </td>
    <td colspan="2" style="border: 0">
      <div class="Estilo31" style="text-align: left;">{{$certif->Ciudad_Pago}}</div>
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
      <div class="Estilo31" style="text-align: left;">{{$certif->nombre_empresa}}</div>
    </td>
  </tr>
  <tr>
    <td style="border: 0">
      <div class="Estilo31" style="text-align: left;">NIT : </div>
    </td>
    <td colspan="2" style="border: 0">
      <div class="Estilo31" style="text-align: left;">{{$certif->nit_empresa}}</div>
    </td>
  </tr>
  <tr>
    <td style="border: 0">
      <div class="Estilo31" style="text-align: left;">DIRECCIÓN : </div>
    </td>
    <td colspan="2" style="border: 0">
      <div class="Estilo31" style="text-align: left;">{{$certif->direccion_empresa}}</div>
    </td>
  </tr>
  <tr>
    <td style="border: 0">
      <div class="Estilo31" style="text-align: left;">RETENIDO : </div>
    </td>
    <td colspan="2" style="border: 0">
      <div class="Estilo31" style="text-align: left;">{{$certif->Nombre}}</div>
    </td>
  </tr>
  <tr>
    <td style="border: 0">
      <div class="Estilo31" style="text-align: left;">NIT O C.C : </div>
    </td>
    <td colspan="2" style="border: 0">
      <div class="Estilo31" style="text-align: left;">{{$certif->Nit}}</div>
    </td>
  </tr>
  <tr>
    <td height="" colspan="3" valign="top" style="border: 0">
      <table width="100%" border="1" cellspacing="0" cellpadding="0" class="Estilo5">
      <tr>
        <td width="20%"><div align="center"><strong>PERIODO</strong></div></td>
        <td width="20%"><div align="center"><strong>VALOR BASE</strong></div></td>
        <td width="15%"><div align="center"><strong>VALOR RETENIDO</strong></div></td>
        <td width="15%"><div align="center"><strong>TARIFA %</strong></div></td>
      </tr>
      <?php
      $sumabase       = 0;
      $sumaica        = 0;
      $sumaretenido   = 0;
      ?>
      @foreach ($datosica as $ica)
      @if ($ica->id_empresa == $certif->id_empresa && $ica->Ciudad_Pago == $certif->Ciudad_Pago)
      @if($loop->last)
         <tr>
            <td class="border-lb" style="padding-bottom: 80px;">
              <div align="center">
                @if ($ica->Periodo == 1)
                  Enero - Febrero
                @elseif ($ica->Periodo == 2)
                  Marzo - Abril
                @elseif ($ica->Periodo == 3)
                  Mayo - Junio
                  @elseif ($ica->Periodo == 4)
                  Julio - Agosto
                @elseif ($ica->Periodo == 5)
                  Septiembre - Octubre
                @elseif ($ica->Periodo == 6)
                  Noviembre - Diciembre
                @endif
        </div>
      </td>
            <td class="border-lb" style="padding-bottom: 80px;"><div align="right">${{number_format($ica->Base,0,',','.')}}</div></td>
            <td class="border-lb" style="padding-bottom: 80px;"><div align="right">${{number_format($ica->Retenido,0,',','.')}}</div></td>
            <td class="border-lb" style="padding-bottom: 80px;"><div align="right">{{number_format((float)$ica->Porcentaje,5,',','.')}}</div></td>
        </tr>
      @else
        <tr>
            <td class="border-lb"><div align="center">
          @if ($ica->Periodo == 1)
            Enero - Febrero
          @elseif ($ica->Periodo == 2)
            Marzo - Abril
          @elseif ($ica->Periodo == 3)
            Mayo - Junio
            @elseif ($ica->Periodo == 4)
            Julio - Agosto
          @elseif ($ica->Periodo == 5)
            Septiembre - Octubre
          @elseif ($ica->Periodo == 6)
            Noviembre - Diciembre
          @endif
        </div></td>
            <td class="border-lb"><div align="right">${{number_format($ica->Base,0,',','.')}}</div></td>
            <td class="border-lb"><div align="right">${{number_format($ica->Retenido,0,',','.')}}</div></td>
            <td class="border-lb"><div align="right">{{number_format((float)$ica->Porcentaje,5,',','.')}}</div></td>
        </tr>
        @endif
        @endif
        <?php
        if ($ica->id_empresa == $certif->id_empresa && $ica->Ciudad_Pago == $certif->Ciudad_Pago){
          $sumabase            += $ica->Base;
          $sumaretenido        += $ica->Retenido;
        }
        ?>
        @endforeach
        <tfoot>
          <tr>
            <td align="right"><strong>TOTALES</strong></td>
            <td><div align="right"><strong>${{number_format($sumabase,0,',','.')}}</strong></div></td>
            <td><div align="right"><strong>${{number_format($sumaretenido,0,',','.')}}</strong></div></td>
            <td></td>
          </tr>
          {{$certif->id_empresa}} - {{$ica->id_empresa}}
         </tfoot>
    </table>
  </td>
  </tr>
  <tr>
    <td colspan="3"><p class="Estilo32" style="text-align: center; line-height: 1.5em;"><strong>{{$ica->resolucion}}.
      </strong></p>
    </p>
  </td>
  </tr>
  <tr>
    <td style="border: 0">
      <div class="Estilo31" style="text-align: left;">{{$certif->Ciudad_Expedido}} </div>
    </td>
    <td colspan="2" style="border: 0">
      <div class="Estilo31" style="text-align: center;">Fecha de Expedición: {{date('Y-m-d', strtotime($ica->fecha_expedicion))}}</div>
    </td>
  </tr>
</table>
<p>Gerencia Central de Impuestos</p>
</body>
@endforeach
</html>
