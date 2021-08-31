<html>
@foreach ($datosempr as $empresa)
<head>
<title>{{$empresa->nombre_empresa}}</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
.Estilo1 {font-family: Arial, Helvetica, sans-serif}
.Estilo3 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.Estilo4 {font-size: 11px}
.Estilo5 {font-family: Arial, Helvetica, sans-serif; font-size: 11px; }
</style>
</head>

<body>
<table width="" height="" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="" height="" valign="top">
      <table width="" border="0" align="center" cellpadding="6" cellspacing="5">
        <tr class="texto">
          <td></td>
        </tr>
        <tr class="texto">
          <td width="100%" class="Estilo1">
            <div align="center" class="Estilo4">
            <span class="Estilo3">{{$empresa->nombre_empresa}}</span>
           </div>
         </td>
        </tr>
        <tr align="center" class="texto">
          <td class="Estilo5">Nit.<span class="Estilo1">{{$empresa->nit_empresa}}<br>
            {{$empresa->direccion_empresa}}<br>
          </span></td>
        </tr>
        <tr class="texto">
          <td height="80" class="Estilo5"> <p align="center"><strong>CERTIFICADO  IMPUESTO DE INDUSTRIA Y COMERCIO</strong></p>
            <p align="center"><strong> ICA </strong><br>
            <p align="left">Que en el periodo @if($hasta > $desde) {{$desde}} hasta {{$hasta}} @else {{$desde}} @endif de {{$ano}} se le practic&oacute; RETENCI&Oacute;N DE ICA
          sobre los siguientes pagos o abonos en cuenta a: </p>
          <p><strong>RAZ&Oacute;N SOCIAL : </strong><span class="Estilo1">{{$ret->Nombre}}. </span>
          <strong>NIT o C.C. :</strong> <span class="Estilo1">{{$ret->Nit}}</span></p><br/>
        <p>CIUDAD DONDE SE PRACTICO LA RETENCI&Oacute;N: {{$ret->Ciudad_Expedido}} <br/>
            CIUDAD DONDE SE CONSIGNO LA RETENCI&Oacute;N: {{$ret->Ciudad_Pago}}</p>
          </td>
        </tr>
        <tr class="texto">
          <td class="Estilo1"><table width="100%" border="0">
            <tr class="Estilo5">
                <td width="9%" height="22"><strong>Bimestre</strong></td>
                <td width="37%"  height="22" class="Estilo3" align="center">Concepto</td>
                <td width="17%" height="22"><div align="center"><strong>Vr. Total Bienes<br/>
                  y/o Servicios Grav.</strong></div></td>
                <td width="19%" class="Estilo3"><div align="center">% de Retenci&oacute;n</div></td>
                <td width="18%"><div align="right"><strong>Valor Retencion </strong></div></td>
              </tr>
            <?php
            $sumabase       = 0;
            $sumaretenido   = 0;
            ?>
            @foreach ($datosica as $ica)
              @if ($ica->id_empresa == $empresa->id_empresa)
            <tr class="Estilo5">
              <td><div align="center">{{$ica->Periodo}}</div></td>
              <td><div align="center">{{$ica->Concepto}}</div></td>
              <td><div align="center"><em>${{number_format($ica->Base,0,',','.')}}</em></div></td>
              <td align="center">{{ number_format($ica->Porcentaje, 2) }}</td>
              <td><div align="right"><em>${{number_format($ica->Retenido,0,',','.')}}</em></div></td>
            </tr>
            <?php
            $sumabase            += $ica->Base;
            $sumaretenido        += $ica->Retenido;
            ?>
              @endif
            @endforeach
          </table>
            <p align="left"><table width="100%"  border="0">
              <tr>
                <td><div align="right"><span class="Estilo5">TOTAL RETENIDO : ............... ${{number_format($sumaretenido,0,',','.')}}</span></div></td>
                    </tr>
              <tr>
                <td>
                  <div align="right"><span class="Estilo5">SON: {{strtoupper($letras)}} PESOS MCTE***** </span></div>
                </td>
              </tr>
            </table></td>
        </tr>
        <tr class="texto">
          <td height="42" class="Estilo5">
            <p align="justify">La anterior suma hace parte de las consignaciones efectuadas oportunamente por <span class="Estilo1">{{$empresa->nombre_empresa}}</span> a favor de la Secretaria de Hacienda de hacienda
              de {{$ret->Ciudad_Pago}}.</p></td>
        </tr>

        <tr class="texto">
          <td class="Estilo1"><div align="justify" class="Estilo4">De acuerdo con el Art&iacute;culo 10 del Decreto 836 de 1991
              los certificados expedidos por computador no requieren firma aut&oacute;grafa.<br>
              <br>
              <br>
          </div></td>
        </tr>

        <tr class="texto">
          <td class="Estilo1"><div align="center" class="Estilo4"><p><span class="Estilo1">El presente certificado se expide por {{$empresa->nombre_empresa}}</span> en {{$ret->Ciudad_Pago}}.
            el 15 de<?php if($ica->Periodo == 1) {echo ' Marzo de '; echo $ano;};
             if($ica->Periodo == 2) {echo ' Mayo de '; echo $ano;};
             if($ica->Periodo == 3) {echo ' Julio de '; echo $ano;};
             if($ica->Periodo == 4) {echo ' Septiembre de '; echo $ano;};
             if($ica->Periodo == 5) {echo ' Noviembre de '; echo $ano;};
             if($ica->Periodo == 6) {echo ' Enero de '; echo $ano + 1;}; ?>
                <br>
                <span class="Estilo5">{{$empresa->direccion_empresa}}</span></p>
            <p>Fecha de Impresi&oacute;n: {{date("Y/m/d")}} </p>
          </div></td>
        </tr>
    <tr class="texto">
          <!-- <td height="52" class="Estilo5"> <p><img src="{{url('images/firma.png')}}" alt="firma" width="160" height="60"></p> -->
            <p><span class="Estilo1">
              WILSON MORA SANJUAN<br>
              Gerente Central de Impuestos.<br></span>. <br>
              <br>
              <br>
            </p>            </td>
        </tr>
        <tr class="texto">
          <td class="Estilo5">&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
@endforeach
</html>
