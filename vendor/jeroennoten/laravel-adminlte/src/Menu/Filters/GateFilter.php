<?php

namespace JeroenNoten\LaravelAdminLte\Menu\Filters;

use Illuminate\Contracts\Auth\Access\Gate;
use JeroenNoten\LaravelAdminLte\Menu\Builder;
use Illuminate\Support\Facades\Auth;

class GateFilter implements FilterInterface
{
    protected $gate;

    public function __construct(Gate $gate)
    {
        $this->gate = $gate;
    }

    public function transform($item, Builder $builder)
    {
        // dd($item['text']);
        if($item['text'] == "Importar" && Auth::user()->role_id != 4){
            return false;
        }
        if($item['text'] == "Actualizar mis datos" && Auth::user()->role_id != 3){
            return false;
        }
        if($item['text'] == "Empresas" && Auth::user()->role_id != 4){
            return false;
        }
        if( $item['text'] == "Crear"  && Auth::user()->role_id != 2 ){
            return false;
        }

        if( $item['text'] == "Ver"  && Auth::user()->role_id != 4 ){
            return false;
        }

        if( $item['text'] == "Editar"  && Auth::user()->role_id != 4 ){
            return false;
        }

        if( $item['text'] == "Empresa"  && Auth::user()->role_id != 4 ){
            return false;
        }
        if( $item['text'] == ""  && Auth::user()->role_id != 4 ){
            return false;
        }

        if( $item['text'] == "Usuarios"  && Auth::user()->role_id != 4 ){
            return false;
        }

        if( $item['text'] == "Soporte"  && Auth::user()->role_id != 4 ){
            return false;
        }

        if( $item['text'] == "Estadísticas"  && Auth::user()->role_id != 4 ){
            return false;
        }

        if( $item['text'] == "Edición de datos"  && Auth::user()->role_id != 3 ){
            return false;
        }
        if( $item['text'] == "Documento Soporte"  && Auth::user()->role_id != 2 ){
            return false;
        }

        if (! $this->isVisible($item)) {
            return false;
        }

        return $item;
    }

    protected function isVisible($item)
    {
        if (! isset($item['can'])) {
            return true;
        }

        if (isset($item['model'])) {
            return $this->gate->allows($item['can'], $item['model']);
        }

        return $this->gate->allows($item['can']);
    }
}
