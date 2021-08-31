<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rtf extends Model
{
    protected $table = 'rtfs';
    protected $fillable = ['Nit','id_empresa','Cuenta','Nombre','Concepto','Porcentaje','Base',
        'Retenido','Ano','Mes','Ciudad_Pago','Ciudad_Expedido','Banco_pago','ind_rtf','fecha_expedicion'];
    protected $primaryKey = 'id';

    public function scopeFilter($query, $params)
      {
          if ( isset($params['nit_tercero']) && trim($params['nit_tercero']) !== '' )
          {
              $query->where('Nit', '=', trim($params['nit_tercero']));
          }
          if ( isset($params['empresa']) && trim($params['empresa']) !== '' )
          {
              $query->where('empresa.nombre_empresa', 'LIKE', '%'.trim($params['empresa'] . '%'));
          }
          if ( isset($params['concepto']) && trim($params['concepto']) !== '' )
          {
              $query->where('Concepto', 'LIKE', '%'.trim($params['Concepto'] . '%'));
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

    public static function crtf($ano,$periodo,$empresa){
        if($empresa == 'todas'){
              $rtf = DB::table('rtfs')
              ->where('Ano','=',$ano)
              ->where('Mes','=',$periodo)
               ->get(['rtfs.nit']); }
           else {
             $rtf = DB::table('rtfs')
             ->where('Ano','=',$ano)
             ->where('Mes','=',$periodo)
             ->where('id_empresa','=',$empresa)
              ->get(['rtfs.nit']);
           }
        return $rtf;
  }

  public static function buscar($nit){
  $rts =  DB::table('rtfs')
          ->join('empresa', 'rtfs.id_empresa', '=', 'empresa.id_empresa')
          ->where('Nit', $nit)
          ->orderBy('Ano','DESC');
          return $rts;
  }
  public static function notas($nit){
  $rts =  DB::table('rtfs')
          ->where('Nit', $nit)
          ->where('notas','!=', null)->first(['notas','texto_honorarios','valor_honorarios']);
          return $rts;
  }

  public static function valida($nit, $ano, $empresa){
        if($empresa == 'todas'){
          $rtf =  DB::table('rtfs')
                  ->where('nit', $nit)
                  ->where('ano', $ano)->get();
        } else {
          $rtf =  DB::table('rtfs')
                  ->where('nit', $nit)
                  ->where('ano', $ano)
                  ->where('id_empresa', $empresa)->get();
        }
      return $rtf;
    }
    public static function ciudadrt($nit, $ano, $empresa){
        if($empresa == 'todas'){
        $ciudadrt =  DB::table('rtfs')
                ->where('nit', $nit)
                ->where('ano', $ano)
                ->first(['Ciudad_Pago','Ciudad_Expedido',
                    'Nombre','Nit','id_empresa']);
         } else {
           $ciudadrt =  DB::table('rtfs')
                   ->where('nit', $nit)
                   ->where('ano', $ano)
                   ->where('id_empresa', $empresa)
                   ->first(['Ciudad_Pago','Ciudad_Expedido',
                       'Nombre','Nit','id_empresa']);
                    }
        return $ciudadrt;
    }
    public static function updateRtf($valuertf,$ano)  {
        DB::table('rtfs')
            ->where('ano', $ano)
            ->update($valuertf);
   }
   public function empresas()
    {
        return $this->hasMany('App\Empresa');
    }
}
