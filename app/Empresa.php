<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Empresa extends Model
{
    protected $table = 'empresa';
    protected $fillable = ['nombre_empresa','nit_empresa','nombre_responsable',
                            'cargo_responsable','direccion_empresa','telefono_empresa',
                            'cant_usu','email_empresa','campo_ir','logotipo','logotipo_color',
                          'imagen_firma','ciudad','departamento','pais','anios','ciudades'];

    protected $primaryKey = 'id_empresa';

    public static function valida($nit, $ano, $desde, $hasta, $empresa){
        if($empresa != 'todas'){
                $empresas =  DB::table('empresa')
                ->where('id_empresa', $empresa)->get();
         } else {
                $empresas =  DB::table('empresa')
                ->join('ivas', 'empresa.id_empresa', '=', 'ivas.id_empresa')
                ->where('nit', $nit)
                ->where('ano', $ano)
                ->whereBetween('periodo', [$desde, $hasta])
                ->distinct()
                ->get(['empresa.id_empresa','empresa.nombre_responsable','empresa.cargo_responsable','empresa.imagen_firma','empresa.logotipo_color','empresa.nombre_empresa','empresa.nit_empresa','empresa.direccion_empresa']);
                }
        return $empresas;
    }
    public static function validaica($nit, $ano, $desde, $hasta, $empresa){
        if($empresa != 'todas'){
                $empresas =  DB::table('empresa')
                ->where('id_empresa', $empresa)->get();
         } else {
                $empresas =  DB::table('empresa')
                ->join('icas', 'empresa.id_empresa', '=', 'icas.id_empresa')
                ->where('nit', $nit)
                ->where('ano', $ano)
                ->whereBetween('periodo', [$desde, $hasta])
                ->distinct()
                ->get(['empresa.id_empresa','empresa.nombre_responsable','empresa.cargo_responsable','empresa.imagen_firma','empresa.logotipo_color','empresa.nombre_empresa','empresa.nit_empresa','empresa.direccion_empresa']);
                }
        return $empresas;
    }
    public static function validartf($nit, $ano, $empresa){
        if($empresa != 'todas'){
                $empresas =  DB::table('empresa')
                ->where('id_empresa', $empresa)->get();
         } else {
                $empresas =  DB::table('empresa')
                ->join('rtfs', 'empresa.id_empresa', '=', 'rtfs.id_empresa')
                ->where('nit', $nit)
                ->where('ano', $ano)
                ->distinct()
                ->get(['empresa.id_empresa','empresa.nombre_responsable','empresa.cargo_responsable','empresa.imagen_firma','empresa.logotipo_color','empresa.nombre_empresa','empresa.nit_empresa','empresa.direccion_empresa']);
                }
        return $empresas;
    }
    public static function validaaccionista($nit, $ano, $empresa){
        if($empresa != 'todas'){
                $empresas =  DB::table('empresa')
                ->where('id_empresa', $empresa)->get();
         } else {
                $empresas =  DB::table('empresa')
                ->join('accionistas', 'empresa.id_empresa', '=', 'accionistas.id_empresa')
                ->where('nit_accionista', $nit)
                ->where('ano', $ano)
                ->distinct()
                ->get(['empresa.id_empresa','empresa.nombre_responsable','empresa.cargo_responsable','empresa.imagen_firma','empresa.logotipo_color','empresa.nombre_empresa','empresa.nit_empresa','empresa.direccion_empresa']);
                }
        return $empresas;
    }
    public static function validax($nit, $ano, $periodo, $empresa){
          $empresas =  DB::table('empresa')
            ->join('ivas', 'empresa.id_empresa', '=', 'ivas.id_empresa')
            ->where('nit', $nit)
            ->where('ano', $ano)
            ->where('ivas.id_empresa', $empresa)
            ->where('periodo', $periodo)->limit(1);
          return $empresas;
    }
    public function iva()
    {
        return $this->belongsTo('App\Iva');
    }
    public function ica()
    {
        return $this->belongsTo('App\Ica');
    }
    public function rtf()
    {
        return $this->belongsTo('App\Rtf');
    }
}
