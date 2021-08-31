<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
  protected $table = 'notificaciones';
  protected $fillable = ['notificacion','tipo','estado','date_unpublish'];
  protected $primaryKey = 'id';

  public function scopeFilter($query, $params)
    {
        if ( isset($params['notificacion']) && trim($params['notificacion']) !== '' )
        {
            $query->where('notificacion', 'LIKE', trim($params['notificacion'] . '%'));
        }

        if ( isset($params['tipo']) && trim($params['tipo']) !== '' )
        {
            $query->where('tipo', 'LIKE', trim($params['tipo'] . '%'));
        }

        if ( isset($params['estado']) && trim($params['estado']) !== '' )
        {
            $query->where('estado', 'LIKE', trim($params['estado'] . '%'));
        }

        if ( isset($params['creado']) && trim($params['creado']) !== '' )
        {
            $query->where('created_at', 'LIKE', trim($params['creado'] . '%'));
        }
        return $query;
    }
}
