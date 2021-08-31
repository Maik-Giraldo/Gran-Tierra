<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;

class Factura extends Model
{
  use Sortable;
  protected $table = 'seguimiento_facturas';
  protected $fillable = ['nombre_proveedor','nit','numero_factura','fecha_factura','fecha_vencimiento','moneda','valor_total','valor_a_pagar','iva','ica','rtf','estado','fecha_importacion'];
  protected $primaryKey = 'id';

  public $sortable = ['nombre_proveedor', 'nit', 'numero_factura','facha_factura','valor_a_pagar','valor_total','estado', 'iva','ica','rtf','fecha_vencimiento','fecha_importacion'];

  public function scopeFilter($query, $params)
    {
        if ( isset($params['nombre_proveedor']) && trim($params['nombre_proveedor']) !== '' )
        {
            $query->where('nombre_proveedor', 'LIKE', trim($params['nombre_proveedor'] . '%'));
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
        if ( isset($params['fecha_vencimiento']) && trim($params['fecha_vencimiento']) !== '' )
        {
            $query->where('fecha_vencimiento', 'LIKE', trim($params['fecha_vencimiento'] . '%'));
        }

        return $query;
    }

  public static function csgf($fecha){
      $sgf = DB::table('seguimiento_facturas')
      ->where('fecha_vencimiento','=',$fecha)
       ->get(['nit']);
      return $sgf;
    }
}
