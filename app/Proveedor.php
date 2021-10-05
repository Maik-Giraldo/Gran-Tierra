<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Proveedor extends Model
{
  use Sortable;
  protected $table = 'proveedor';
  protected $fillable = ['id','nombre_razon_social','nombre_comercial','representante_legal',
                    'documento_representante_legal','contacto_pedidos','cp_telefono','contacto_contabilidad_cartera',
                    'cp_telefon2','email','numero_nit_cc','digito_verificacion','matricula_mercantil','Pass',
                    'telefono','celular','fax','ciudad','departamento','direccion','tipo','otro_tipo',
                    'regimen_iva','regimen_renta','autoretenedor_renta','actividad_economica','codigo_ciiu',
                    'entidad_financiera','ef_direccion','ef_telefono','ef_tipo_cuenta','rc_contacto1',
                    'ef_cuenta','rc_nombre1','rc_nombre2','rc_direccion1','rc_telefono1','ef_titular',
                    'rc_nombre2','rc_direccion2','rc_contacto2','rp_nombre1','rc_telefono2',
                    'rp_contacto1','rp_direccion1','rp_telefono1','rp_nombre2', 'rp_contacto2',
                    'rp_direccion2','rp_telefono2','nc_condiciones_pago','nc_tiempo_pago','nc_tiempo_pago_otro',
                    'nc_tiempo_pago_obs','nc_descuento_financiero','nc_pie_factura','nc_persona_autorizada_pagos',
                    'nc_persona_autorizada_pagos_cc','nc_seccion','nc_responsable_negociacion','doc_rut',
                    'doc_certificado_existencia_representacion','doc_certificacion_bancaria',
                    'doc_cedula_rep_legal','doc_referencia_comercial_1','doc_referencia_comercial_2',
                    'persona_autoriza','estado','revisiones'
                      ];

  protected $primaryKey = 'id';

  public $sortable = ['id', 'nombre_razon_social', 'numero_nit_cc', 'digito_verificacion', 'email', 'estado'];

  public function scopeFilter($query, $params)
    {
        if ( isset($params['id']) && trim($params['id']) !== '' )
        {
            $query->where('id', '=', trim($params['id']));
        }

        if ( isset($params['nombre_razon_social']) && trim($params['nombre_razon_social']) !== '' )
        {
            $query->where('nombre_razon_social', 'LIKE', trim($params['nombre_razon_social'] . '%'));
        }

        if ( isset($params['numero_nit_cc']) && trim($params['numero_nit_cc']) !== '' )
        {
            $query->where('numero_nit_cc', '=', trim($params['numero_nit_cc']));
        }

        if ( isset($params['digito_verificacion']) && trim($params['digito_verificacion']) !== '' )
        {
            $query->where('digito_verificacion', '=', trim($params['digito_verificacion']));
        }

        if ( isset($params['email']) && trim($params['email']) !== '' )
        {
            $query->where('email', 'LIKE', trim($params['email'] . '%'));
        }
        if ( isset($params['estado']) && trim($params['estado']) !== '' )
        {
            $query->where('estado', 'LIKE', '%'.trim($params['estado'] . '%'));
        }

        return $query;
    }
}
