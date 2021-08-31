<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Estadistica extends Model
{
  use Sortable;
  protected $table = 'user_visit_log';
  protected $fillable = ['token','ip','language','user_agent','user_id','visit_time','browser','os'];

  protected $primaryKey = 'id';

  public $sortable = ['id', 'user_id', 'visit_time', 'browser','os'];

  public function scopeFilter($query, $params)
    {
        if ( isset($params['user']) && trim($params['user']) !== '' )
        {
            $query->where('user', 'LIKE', trim($params['user'] . '%'));
        }

        if ( isset($params['visit_time']) && trim($params['visit_time']) !== '' )
        {
            $query->where('visit_time', 'LIKE', trim($params['visit_time'] . '%'));
        }

        if ( isset($params['browser']) && trim($params['browser']) !== '' )
        {
            $query->where('browser', 'LIKE', trim($params['browser'] . '%'));
        }

        if ( isset($params['language']) && trim($params['language']) !== '' )
        {
            $query->where('language', 'LIKE', trim($params['language'] . '%'));
        }

        if ( isset($params['ip']) && trim($params['ip']) !== '' )
        {
            $query->where('ip', 'LIKE', trim($params['ip'] . '%'));
        }

        if ( isset($params['os']) && trim($params['os']) !== '' )
        {
            $query->where('os', 'LIKE', trim($params['os'] . '%'));
        }
        return $query;
    }
}
