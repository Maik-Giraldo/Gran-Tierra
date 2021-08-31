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
          <td height="80" class="Estilo5"> <p align="center"><strong>CERTIFICADO  IMPUESTO A LAS VENTAS (I</strong><strong>VA)</strong></p>
            <p align="left">Que en el periodo @if($hasta > $desde) {{$desde}} hasta {{$hasta}} @else {{$desde}} @endif de {{$ano}} se le practic&oacute; RETENCI&Oacute;N DE IVA
          sobre pagos o abonos en cuenta por COMPRAS O SERVICIOS a: </p>
          <p><strong>RAZ&Oacute;N SOCIAL : </strong><span class="Estilo1">{{$ret->Nombre}}. </span>
          <strong>NIT o C.C. :</strong> <span class="Estilo1">{{$ret->Nit}}</span></p><br/>
        <p>CIUDAD DONDE SE PRACTICO LA RETENCI&Oacute;N: {{$ret->Ciudad_Expedido}} <br/>
            CIUDAD DONDE SE CONSIGNO LA RETENCI&Oacute;N: {{$ret->Ciudad_Pago}}</p>
          </td>
        </tr>
        <tr class="texto">
          <td class="Estilo1"><table width="100%" border="0">
            <tr class="Estilo5">
              <td width="22%" class="Estilo3"><div align="center">Periodo</div></td>
              <td width="22%" height="25" class="Estilo3"><div align="center">Concepto</div></td>
              <td width="19%"><div align="center"><strong>Valor Factura antes de IVA.</strong></div></td>
              <td width="19%" height="25"><div align="center"><strong>Valor iva</strong></div></td>
              <!-- <td width="12%" height="25"><div align="center"><strong>IVA<br/> Descontable</strong></div></td>-->
              <td width="14%" height="25" class="Estilo3"><div align="center">Tarifa de retenci&oacute;n</div></td>
              <td width="21%"><div align="center"><strong>Valor Retenci&oacute;n</strong></div></td>
            </tr>
            <?php
            $sumabase       = 0;
            $sumaretenido   = 0;
            ?>
            @foreach ($datosiva as $iva)
            <tr class="Estilo5">
              <td><div align="center">{{$iva->Periodo}}</div></td>
              <td><div align="left">{{$iva->Concepto}}</div></td>
              <td><div align="center"><em>${{number_format($iva->Base,0,',','.')}}</em></div></td>
              <td><div align="center"><em>${{number_format($iva->Iva,0,',','.')}}</em></div></td>
              <td align="center">{{$iva->Porcentaje}}</td>
              <td><div align="right"><em>${{number_format($iva->Retenido,0,',','.')}}</em></div></td>
            </tr>
            <?php
            $sumabase            += $iva->Base;
            $sumaretenido        += $iva->Retenido;
            ?>
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
            <p align="justify">La anterior suma hace parte de las retenciones practicadas y consignadas
              por <span class="Estilo1">{{$empresa->nombre_empresa}}</span> por concepto de Retenciones IVA
              en {{$ret->Ciudad_Pago}}.</p></td>
        </tr>

        <tr class="texto">
          <td class="Estilo1"><div align="justify" class="Estilo4">De acuerdo con el Art&iacute;culo 10 del Decreto 836 de 1991
              los certificados expedidos por computador no requieren firma aut&oacute;grafa.<br>
              <br>
              <br>
          </div></td>
        </tr>

        <tr class="texto">
          <td class="Estilo1"><div align="center" class="Estilo4"><p><span class="Estilo1">El presente certificado se expide por {{$empresa->nombre_empresa}}</span> en {{$iva->Ciudad_Pago}}.
            el 15 de<?php if($iva->Periodo == 1) {echo ' Marzo de '; echo $ano;};
        		 if($iva->Periodo == 2) {echo ' Mayo de '; echo $ano;};
        		 if($iva->Periodo == 3) {echo ' Julio de '; echo $ano;};
        		 if($iva->Periodo == 4) {echo ' Septiembre de '; echo $ano;};
        		 if($iva->Periodo == 5) {echo ' Noviembre de '; echo $ano;};
        		 if($iva->Periodo == 6) {echo ' Enero de '; echo $ano + 1;}; ?>
                <br>
                <span class="Estilo5">{{$empresa->direccion_empresa}}</span></p>
            <p>Fecha de Impresi&oacute;n: {{date("Y/m/d")}} </p>
          </div></td>
        </tr>
		<tr class="texto">
          <!-- <td height="52" class="Estilo5"> <p><img src="{{url('images/firma.png')}}" alt="firma" width="160" height="60"></p> -->
            <p><span class="Estilo1">
              WILSON MORA SANJUAN.<br>
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
