<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Iva extends Model
{
    protected $table = 'ivas';
    protected $fillable = ['Nit','id_empresa','Cuenta','Nombre','Concepto','Porcentaje','Base',
        'Iva','Retenido','Ano','Periodo','Ciudad_Pago','Ciudad_Expedido','Banco_Pago','ind_iva','sticker','fecha_sticker',
        'n_dec','fecha_expedicion','sticker2','fecha_sticker2','n_dec2','fecha_dec2','regimen'];
    protected $primaryKey = 'id';

    public function scopeFilter($query, $params)
      {
          if ( isset($params['empresa']) && trim($params['empresa']) !== '' )
          {
              $query->where('empresa.nombre_empresa', 'LIKE', '%'. trim($params['empresa'] . '%'));
          }
          if ( isset($params['nit_tercero']) && trim($params['nit_tercero']) !== '' )
          {
              $query->where('Nit', '=', trim($params['nit_tercero']));
          }

          if ( isset($params['concepto']) && trim($params['concepto']) !== '' )
          {
              $query->where('Concepto', 'LIKE', trim($params['Concepto'] . '%'));
          }

          if ( isset($params['base_gravable']) && trim($params['base_gravable']) !== '' )
          {
              $query->where('Base', '=', trim($params['base_gravable']));
          }

          if ( isset($params['porcentaje_iva']) && trim($params['porcentaje_iva']) !== '' )
          {
              $query->where('Porcentaje', '=', trim($params['porcentaje_iva']));
          }

          if ( isset($params['valor_iva']) && trim($params['valor_iva']) !== '' )
          {
              $query->where('iva', '=', trim($params['valor_iva']));
          }
          if ( isset($params['valor_retenido']) && trim($params['valor_retenido']) !== '' )
          {
              $query->where('Retenido', '=', trim($params['valor_retenido']));
          }
          if ( isset($params['anio']) && trim($params['anio']) !== '' )
          {
              $query->where('Ano', '=', trim($params['anio']));
          }
          if ( isset($params['periodo']) && trim($params['periodo']) !== '' )
          {
              $query->where('Periodo', '=', trim($params['periodo']));
          }

          return $query;
      }

  public static function civa($ano,$periodo,$empresa){
      if($empresa == 'todas'){
              $iva = DB::table('ivas')
              ->where('Ano','=',$ano)
              ->where('Periodo','=',$periodo)
               ->get(['ivas.nit']);}
       else {
              $iva = DB::table('ivas')
             ->where('Ano','=',$ano)
             ->where('Periodo','=',$periodo)
             ->where('id_empresa','=',$empresa)
              ->get(['ivas.nit']);
         }
        return $iva;
  }

  public static function valida($nit, $ano, $desde, $hasta, $empresa){
        if($empresa == 'todas'){
          $iva =  DB::table('ivas')
                  ->where('nit', $nit)
                  ->where('ano', $ano)
                  ->whereBetween('periodo', [$desde, $hasta])->get();
        } else {
          $iva =  DB::table('ivas')
                  ->where('nit', $nit)
                  ->where('ano', $ano)
                  ->where('id_empresa', $empresa)
                  ->whereBetween('periodo', [$desde, $hasta])->orderBy('periodo')->get();
        }
      return $iva;
    }
    public static function validarp($nit, $ano, $periodo, $empresa){
        $iva =  DB::table('ivas')
                    ->join('empresa', 'ivas.id_empresa', '=', 'empresa.id_empresa')
                    ->where('nit', $nit)
                    ->where('ano', $ano)
                    ->where('ivas.id_empresa', $empresa)
                    ->where('periodo', $periodo)->orderBy('periodo')->get();
        return $iva;
      }
    public static function ciudadrt($nit, $ano, $desde, $hasta, $empresa){
        if($empresa == 'todas'){
        $ciudadrt =  DB::table('ivas')
                ->where('nit', $nit)
                ->where('ano', $ano)
                ->whereBetween('periodo', [$desde, $hasta])->first();
         } else {
           $ciudadrt =  DB::table('ivas')
                   ->where('nit', $nit)
                   ->where('ano', $ano)
                   ->where('id_empresa', $empresa)
                   ->whereBetween('periodo', [$desde, $hasta])->first();
                    }
        return $ciudadrt;
    }
    public static function ciudadrp($nit, $ano, $periodo, $empresa){
        $ciudadrt =  DB::table('ivas')
               ->where('nit', $nit)
               ->where('ano', $ano)
               ->where('Periodo', $periodo)
               ->where('id_empresa', $empresa)
               ->first(['Ciudad_Pago','Ciudad_Expedido',
                'Nombre','Nit','Porcentaje']);
        return $ciudadrt;
    }

    public static function buscar($nit){
    $ivas =  DB::table('ivas')
            ->where('Nit', $nit)
            ->orderBy('Ano','DESC');
            return $ivas;
    }

    public static function updateIva($valueiva,$ano,$periodo)  {
        DB::table('ivas')
            ->where('ano', $ano)
            ->where('periodo', $periodo)
            ->update($valueiva);
   }
   public function empresas()
    {
        return $this->hasMany('App\Empresa');
    }
}
