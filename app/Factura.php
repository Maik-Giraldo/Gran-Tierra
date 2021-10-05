<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;

class Factura extends Model
{ 
    use Sortable;
    protected $table = 'seguimiento_transaccional';
    protected $primaryKey = 'id';
    public $sortable = [
        'id',
        'nit',
        'id_empresa', 
        'doc_compra',
        'administrador_contrato',
        'fecha_emision',
        'vencimiento',
        'ejecutado_fecha',
        'valor_total',
        'saldo',
    ];

    protected $fillable = [
        'id',
        'nit',
        'id_empresa',
        'doc_compra',
        'administrador_contrato',
        'fecha_emision',
        'vencimiento',
        'ejecutado_fecha',
        'valor_total',
        'saldo',
    ];


  public static function csgf($fecha){
      $sgf = DB::table('seguimiento_transaccional')
      ->join('empresa as enterprise', 'seguimiento_transaccional.id_empresa', '=', 'enterprise.id_empresa')
      ->where('fecha_importacion','=',$fecha)
      ->where('enterprise.id_grupo_empresa', '=', 1)
       ->get(['nit']);
      return $sgf;
    }
}