<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Notificacion;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Schema::defaultStringLength(191);
      View::composer('*', function ($view)
      {
        if (!Auth::guest()){
          if (Auth::user()->role_id != 3) {
            $countntfs = 0;
            $ntfcs = [];
          } else {
            $usuario = Auth::user()->id;
            $countntfs = Notificacion::where('id','>',0)->count();
            $ntfcs = Notificacion::where('id','>',0)->get();
          }
            $view->with('countntfs', $countntfs );
            $view->with('ntfcs', $ntfcs );
          
          }
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
