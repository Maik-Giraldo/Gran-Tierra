<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Registro extends Model
{
	use Sortable;
    protected $table = 'registros';
    protected $fillable = ['nit','usuario','fecha','hora',
    'anio','periodo','hasta','accion'];
    protected $primaryKey = 'id';
    public $sortable = ['id', 'usuario', 'nit', 'fecha','hora','anio','accion','periodo','empresa'];

    public function scopeFilter($query, $params)
      {
          if ( isset($params['usuario']) && trim($params['usuario']) !== '' )
          {
              $query->where('usuario', 'LIKE', trim($params['usuario'] . '%'));
          }

          if ( isset($params['nit']) && trim($params['nit']) !== '' )
          {
              $query->where('nit', 'LIKE', trim($params['nit'] . '%'));
          }
          if ( isset($params['accion']) && trim($params['accion']) !== '' )
          {
              $query->where('accion', 'LIKE', trim($params['accion'] . '%'));
          }
          if ( isset($params['anio']) && trim($params['anio']) !== '' )
          {
              $query->where('anio', 'LIKE', trim($params['anio'] . '%'));
          }
          if ( isset($params['periodo']) && trim($params['periodo']) !== '' )
          {
              $query->where('periodo', 'LIKE', trim($params['periodo'] . '%'));
          }
          if ( isset($params['fecha']) && trim($params['fecha']) !== '' )
          {
              $query->where('fecha', 'LIKE', trim($params['fecha'] . '%'));
          }
          if ( isset($params['hora']) && trim($params['hora']) !== '' )
          {
              $query->where('hora', 'LIKE', trim($params['hora'] . '%'));
          }
					if ( isset($params['empresa']) && trim($params['empresa']) !== '' )
          {
              $query->where('empresa', 'LIKE', trim($params['empresa'] . '%'));
          }
          return $query;
      }
}
