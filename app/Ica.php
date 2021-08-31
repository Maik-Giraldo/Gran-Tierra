<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Ica extends Model
{
    protected $table = 'icas';
    protected $fillable = ['Nit','id_empresa','Cuenta','Nombre','Concepto','Porcentaje','Base',
        'Retenido','Ano','Periodo','Ciudad_Pago','Ciudad_Expedido','Banco_pago','ind_ica','fecha_expedicion'];
    protected $primaryKey = 'id';

    public function scopeFilter($query, $params)
      {
          if ( isset($params['nit_tercero']) && trim($params['nit_tercero']) !== '' )
          {
              $query->where('Nit', '=', trim($params['nit_tercero']));
          }
          if ( isset($params['empresa']) && trim($params['empresa']) !== '' )
          {
              $query->where('empresa.nombre_empresa', 'LIKE', trim($params['empresa'] . '%'));
          }
          if ( isset($params['concepto']) && trim($params['concepto']) !== '' )
          {
              $query->where('Concepto', 'LIKE', trim($params['Concepto'] . '%'));
          }

          if ( isset($params['base']) && trim($params['base']) !== '' )
          {
              $query->where('Base', '=', trim($params['base']));
          }

          if ( isset($params['porcentaje']) && trim($params['porcentaje']) !== '' )
          {
              $query->where('Porcentaje', '=', trim($params['porcentaje']));
          }
          if ( isset($params['retenido']) && trim($params['retenido']) !== '' )
          {
              $query->where('Retenido', '=', trim($params['retenido']));
          }
          if ( isset($params['anio']) && trim($params['anio']) !== '' )
          {
              $query->where('Ano', '=', trim($params['anio']));
          }
          if ( isset($params['periodo']) && trim($params['periodo']) !== '' )
          {
              $query->where('Periodo', '=', trim($params['periodo']));
          }

          if ( isset($params['ciudad']) && trim($params['ciudad']) !== '' )
          {
              $query->where('Ciudad_Pago', 'LIKE', '%'.trim($params['ciudad'] . '%'));
          }

          return $query;
      }

    public static function cica($ano, $periodo, $empresa){
        if($empresa == 'todas'){
                $ica = DB::table('icas')
                  ->where('Ano','=',$ano)
                  ->where('Periodo','=',$periodo)
                   ->get(['icas.nit']);
                  return $ica; }
            else {
                $ica = DB::table('icas')
                ->where('Ano','=',$ano)
                ->where('id_empresa','=', $empresa)
                ->where('Periodo','=',$periodo)
                 ->get(['icas.nit']);
            }
            return $ica;
      }

  public static function buscar($nit){
  $icas =  DB::table('icas')
          ->join('empresa', 'icas.id_empresa', '=', 'empresa.id_empresa')
          ->where('Nit', $nit)
          ->orderBy('Ano','DESC');
          return $icas;
  }
  public static function valida($nit, $ano, $desde, $hasta, $ciudad, $empresa){
        if($empresa == 'todas'){
          $ica =  DB::table('icas')
                  ->where('nit', $nit)
                  ->where('Ciudad_Pago', 'LIKE',  '%'.$ciudad.'%')
                  ->where('ano', $ano)
                  ->whereBetween('periodo', [$desde, $hasta])->orderBy('periodo', 'asc')->get();
        } else {
          $ica =  DB::table('icas')
                  ->where('nit', $nit)
                  ->where('ano', $ano)
                  ->where('Ciudad_Pago', 'LIKE',  '%'.$ciudad.'%')
                  ->where('id_empresa', $empresa)
                  ->whereBetween('periodo', [$desde, $hasta])->orderBy('periodo', 'asc')->get();
        }
      return $ica;
    }
    public static function validall($nit, $ano, $desde, $hasta, $ciudad, $empresa){
        if($empresa == 'todas'){
          $ica =  DB::table('icas')
                  ->join('empresa', 'icas.id_empresa', '=', 'empresa.id_empresa')
                  ->where('icas.nit', $nit)
                  ->where('icas.ano', $ano)
                  ->whereBetween('icas.periodo', [$desde, $hasta])->orderBy('icas.periodo', 'asc')->get();
        } else {
          $ica =  DB::table('icas')
                  ->join('empresa', 'icas.id_empresa', '=', 'empresa.id_empresa')
                  ->where('icas.nit', $nit)
                  ->where('icas.ano', $ano)
                  ->where('icas.id_empresa', $empresa)
                  ->whereBetween('icas.periodo', [$desde, $hasta])->orderBy('icas.periodo', 'asc')->get();
        }
      return $ica;
    }
    public static function ciudadrt($nit, $ano, $desde, $hasta, $ciudad, $empresa){
        if($empresa == 'todas'){
        $ciudadrt =  DB::table('icas')
                ->where('nit', $nit)
                ->where('ano', $ano)
                ->where('Ciudad_Pago', 'LIKE',  '%'.$ciudad.'%')
                ->whereBetween('periodo', [$desde, $hasta])->first(['Ciudad_Pago','Ciudad_Expedido',
                    'Nombre','Nit','id_empresa']);
         } else {
           $ciudadrt =  DB::table('icas')
                   ->where('nit', $nit)
                   ->where('ano', $ano)
                   ->where('Ciudad_Pago', 'LIKE',  '%'.$ciudad.'%')
                   ->where('id_empresa', $empresa)
                   ->whereBetween('periodo', [$desde, $hasta])->first(['Ciudad_Pago','Ciudad_Expedido',
                       'Nombre','Nit','id_empresa']);
                    }
        return $ciudadrt;
    }
    public static function allcities($nit, $ano, $desde, $hasta, $ciudad, $empresa){
        if($empresa == 'todas'){
        $ciudadrt =  DB::table('icas')
                ->where('nit', $nit)
                ->where('ano', $ano)
                ->whereBetween('periodo', [$desde, $hasta])->first(['Ciudad_Pago','Ciudad_Expedido',
                    'Nombre','Nit','id_empresa']);
         } else {
           $ciudadrt =  DB::table('icas')
                   ->where('nit', $nit)
                   ->where('ano', $ano)
                   ->where('id_empresa', $empresa)
                   ->whereBetween('periodo', [$desde, $hasta])->first(['Ciudad_Pago','Ciudad_Expedido',
                       'Nombre','Nit','id_empresa']);
                    }
        return $ciudadrt;
    }
    public static function updateIca($valueica,$ano,$periodo)  {
        DB::table('icas')
            ->where('ano', $ano)
            ->where('periodo', $periodo)
            ->update($valueica);
   }
   public function empresas()
    {
        return $this->hasMany('App\Empresa');
    }
}
