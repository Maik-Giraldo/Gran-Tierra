<?php
$iva_rules = [
            'nit'=>'numeric',
            'nombre'=>'required|string|max:300',
            'concepto'=>'required|string|max:300',
            'porcentaje'=>'numeric',
            'base'=>'required|numeric',
            'iva'=>'required|numeric',
            'retenido'=>'numeric',
            'ano'=>'numeric',
            'periodo'=>'numeric',
            'ciudad_pago'=>'string',
            'ciudad_expedido'=>'string',
            'banco_pago'=>'',
            'ind_iva'=>'',
            ];

return $iva_rules;