<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;

class Factura extends Model
{
  use Sortable;
  protected $table = 'seguimiento_facturas';
  protected $fillable = ['nombre_proveedor','id_empresa','nit','numero_factura','fecha_factura','fecha_pago','moneda','valor_total','valor_a_pagar','iva','ica','rtf','estado','texto','fecha_importacion','banco_receptor','cuenta_bancaria','reteiva'];
  protected $primaryKey = 'id';

  public $sortable = ['nombre_proveedor', 'nit', 'numero_factura','facha_factura','valor_a_pagar','valor_total','estado','texto', 'iva','ica','rtf','fecha_vencimiento','fecha_importacion','fecha_pago'];

  public function scopeFilter($query, $params)
    {
        if ( isset($params['sociedad']) && trim($params['sociedad']) !== '' )
        {
            $query->join('empresa', 'seguimiento_facturas.id_empresa', '=', 'empresa.id_empresa')->where('empresa.id_grupo_empresa',1)->where('empresa.nombre_empresa', 'LIKE', '%'. trim($params['sociedad'] . '%'));
        }
        if ( isset($params['nombre_proveedor']) && trim($params['nombre_proveedor']) !== '' )
        {
            $query->where('nombre_proveedor', 'LIKE', '%'. trim($params['nombre_proveedor'] . '%'));
        }        
        if ( isset($params['nit']) && trim($params['nit']) !== '' )
        {
            $query->where('nit', '=', trim($params['nit']));
        }
        if ( isset($params['valor_a_pagar']) && trim($params['valor_a_pagar']) !== '' )
        {
            $query->where('valor_a_pagar', '=', trim($params['valor_a_pagar']));
        }
        if ( isset($params['iva']) && trim($params['iva']) !== '' )
        {
            $query->where('iva', '=', trim($params['iva']));
        }
        if ( isset($params['ica']) && trim($params['ica']) !== '' )
        {
            $query->where('ica', '=', trim($params['ica']));
        }
        if ( isset($params['rtf']) && trim($params['rtf']) !== '' )
        {
            $query->where('rtf', '=', trim($params['rtf']));
        }
        if ( isset($params['numero_factura']) && trim($params['numero_factura']) !== '' )
        {
            $query->where('numero_factura', 'LIKE', trim($params['numero_factura'] . '%'));
        }
        if ( isset($params['estado']) && trim($params['estado']) !== '' )
        {
            $query->where('estado', 'LIKE', trim($params['estado'] . '%'));
        }
        if ( isset($params['texto']) && trim($params['texto']) !== '' )
        {
            $query->where('texto', 'LIKE', trim($params['texto'] . '%'));
        }
        if ( isset($params['fecha_factura']) && trim($params['fecha_factura']) !== '' )
        {
            $query->where('fecha_factura', 'LIKE', trim($params['fecha_factura'] . '%'));
        }
        if ( isset($params['fecha_pago']) && trim($params['fecha_pago']) !== '' )
        {
            $query->where('fecha_pago', 'LIKE', trim($params['fecha_pago'] . '%'));
        }
        if ( isset($params['reteiva']) && trim($params['reteiva']) !== '' )
        {
            $query->where('reteiva', 'LIKE', trim($params['reteiva'] . '%'));
        }

        return $query;
    }

  public static function csgf($fecha){
      $sgf = DB::table('seguimiento_facturas')
      ->join('empresa as enterprise', 'seguimiento_facturas.id_empresa', '=', 'enterprise.id_empresa')
      ->where('fecha_importacion','=',$fecha)
      ->where('enterprise.id_grupo_empresa', '=', 1)
       ->get(['nit']);
      return $sgf;
    }
}
