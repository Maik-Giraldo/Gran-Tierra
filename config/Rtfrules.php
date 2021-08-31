<?php
$rtf_rules = [
            'nit'=>'numeric',
            'cuenta'=>'numeric',
            'nombre'=>'required|string|max:300',
            'concepto'=>'required|string|max:300',
            'porcentaje'=>'string',
            'base'=>'required|numeric',
            'retenido'=>'numeric',
            'ano'=>'numeric',
            'periodo'=>'numeric',
            'ciudad_pago'=>'string',
            'ciudad_expedido'=>'string',
            'banco_pago'=>'',
            'ind_rtf'=>'',
            ];

return $rtf_rules;
