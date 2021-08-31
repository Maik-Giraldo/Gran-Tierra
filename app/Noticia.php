<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Noticia extends Model
{
  use Sortable;
  protected $table = 'noticias';
  protected $fillable = ['titulo','contenido','fecha','imagen','status'];

  protected $primaryKey = 'id';

  public $sortable = ['id', 'titulo', 'contenido', 'fecha', 'imagen'];

  public function scopeFilter($query, $params)
    {
        if ( isset($params['titulo']) && trim($params['id']) !== '' )
        {
            $query->where('titulo', 'LIKE', trim($params['titulo'] . '%'));
        }

        if ( isset($params['contenido']) && trim($params['contenido']) !== '' )
        {
            $query->where('contenido', 'LIKE', trim($params['contenido'] . '%'));
        }

        if ( isset($params['fecha']) && trim($params['fecha']) !== '' )
        {
            $query->where('fecha', 'LIKE', trim($params['fecha'] . '%'));
        }

        if ( isset($params['imagen']) && trim($params['imagen']) !== '' )
        {
            $query->where('imagen', 'LIKE', trim($params['imagen'] . '%'));
        }
        return $query;
    }
}
