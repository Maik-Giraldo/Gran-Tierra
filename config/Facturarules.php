<?php
$sgf_rules = [
            'nit' => 'required', 'string',
            'nombre_proveedor' => 'required', 'string',
            'numero_factura' => 'required', 'string',
            'fecha_factura' => 'required', 'string',
            'moneda' => 'required', 'string',
            'fecha_vencimiento' => 'required', 'string',
            'valor_total' => 'required', 'numeric',
            'valor_a_pagar' => 'required', 'numeric',
            'iva' => 'required', 'numeric',
            'ica' => 'required', 'numeric',
            'rtf' => 'required', 'numeric',
            'estado' => 'required', 'string',
            ];

return $sgf_rules;
