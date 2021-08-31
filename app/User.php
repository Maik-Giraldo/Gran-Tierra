<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','Nit','Tel','Ciudad','Tipo',
        'activo','ciiu','Direccion','Empresa','Contacto','role_id',
        'avatar','email_confirmed', 'tipo_persona','pais'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeFilter($query, $params)
      {
          if ( isset($params['nit']) && trim($params['nit']) !== '' )
          {
              $query->where('Nit', '=', trim($params['nit']));
          }

          if ( isset($params['email']) && trim($params['email']) !== '' )
          {
              $query->where('email', 'LIKE', '%'. trim($params['email'] . '%'));
          }

          return $query;
      }


    public static function crtf(){
        $user = DB::table('users')
         ->get(['Nit']);
        return $user;
  }

    public static function updateUser($valueusers,$updateusr)  {
        DB::table('users')
            ->where('Nit', $valueusers['Nit'])
            ->update($valueusers);
   }

}
