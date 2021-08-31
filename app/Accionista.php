<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Accionista extends Model
{
  protected $table = 'accionistas';
  protected $fillable = ['id_empresa','Nit_accionista','Accionista','Cantidad','Tipo','Valor_Nominal','Valor_Intrinseco_Valorizado',
      'Valor_Intrinseco_Sin_Valorizar','total_utilidades_2016_anteriores','total_utilidades_2017_siguientes','gravado_utilidades_2016_anteriores','gravado_utilidades_2017_siguientes',
      'no_gravado_utilidades_2016_anteriores','no_gravado_utilidades_2017_siguientes','rtf_utilidades_2016_anteriores','rtf_utilidades_2017_siguientes',
      'direccion','Contador','Ano','Ciudad_Expedido','Tp_no','fecha_expedicion'];
  protected $primaryKey = 'id';

  public function scopeFilter($query, $params)
    {
        if ( isset($params['nit_accionista']) && trim($params['nit_accionista']) !== '' )
        {
            $query->where('Nit_accionista', '=', trim($params['nit_accionista']));
        }
        if ( isset($params['empresa']) && trim($params['empresa']) !== '' )
        {
            $query->where('empresa.nombre_empresa', 'LIKE', trim($params['empresa'] . '%'));
        }
        if ( isset($params['accionista']) && trim($params['accionista']) !== '' )
        {
            $query->where('Accionista', 'LIKE', trim($params['accionista'] . '%'));
        }
        if ( isset($params['acciones']) && trim($params['acciones']) !== '' )
        {
            $query->where('Cantidad', '=', trim($params['acciones']));
        }
        if ( isset($params['valor_nominal']) && trim($params['valor_nominal']) !== '' )
        {
            $query->where('Valor_nominal', '=', trim($params['valor_nominal']));
        }
        if ( isset($params['valor_intrinseco_valorizado']) && trim($params['valor_intrinseco_valorizado']) !== '' )
        {
            $query->where('Valor_Intrinseco_Valorizado', '=', trim($params['valor_intrinseco_valorizado']));
        }
        if ( isset($params['anio']) && trim($params['anio']) !== '' )
        {
            $query->where('Ano', '=', trim($params['anio']));
        }
        if ( isset($params['ciudad']) && trim($params['ciudad']) !== '' )
        {
            $query->where('Ciudad_Expedido', 'LIKE', trim($params['ciudad'] . '%'));
        }
        return $query;
    }

  public static function caccionista($ano,$periodo,$empresa){
      if($empresa == 'todas'){
        $accionista = DB::table('accionistas')
        ->where('Ano','=',$ano)
         ->get(['accionistas.Nit_accionista']);
     } else {
        $accionista = DB::table('accionistas')
        ->where('Ano','=',$ano)
        ->where('id_empresa','=',$empresa)
        ->get(['accionistas.Nit_accionista']);
     }
      return $accionista;
    }

public static function buscar($nit){
$rts =  DB::table('accionistas')
        ->join('empresa', 'accionistas.id_empresa', '=', 'empresa.id_empresa')
        ->where('Nit_accionista', $nit)
        ->orderBy('Ano','DESC');
        return $rts;
}

public static function valida($nit, $ano, $empresa){
      if($empresa == 'todas'){
        $accionista =  DB::table('accionistas')
                ->where('nit_accionista', $nit)
                ->where('ano', $ano)->get();
      } else {
        $accionista =  DB::table('accionistas')
                ->where('nit_accionista', $nit)
                ->where('ano', $ano)
                ->where('id_empresa', $empresa)->get();
      }
    return $accionista;
  }
  public static function ciudadrt($nit, $ano, $empresa){
      if($empresa == 'todas'){
      $ciudadrt =  DB::table('accionistas')
              ->where('nit_accionista', $nit)
              ->where('ano', $ano)
              ->first(['Ciudad_Expedido',
                  'Accionista','Nit_accionista','id_empresa']);
       } else {
         $ciudadrt =  DB::table('accionistas')
                 ->where('nit_accionista', $nit)
                 ->where('ano', $ano)
                 ->where('id_empresa', $empresa)
                 ->first(['Ciudad_Expedido',
                     'Accionista','Nit_accionista','id_empresa']);
                  }
      return $ciudadrt;
  }
  public static function updateaccionista($valueaccionista,$ano)  {
      DB::table('accionistas')
          ->where('ano', $ano)
          ->update($valueaccionista);
 }
 public function empresas()
  {
      return $this->hasMany('App\Empresa');
  }
}
