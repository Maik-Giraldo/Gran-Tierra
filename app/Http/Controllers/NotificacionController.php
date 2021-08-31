<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notificacion;
use Session;

class NotificacionController extends Controller
{
  public function list()
  {
      $notificaciones = Notificacion::where('id', '>', 0)->paginate(20);
      return view('notificaciones.listado', compact('notificaciones'));
  }
  public function createntf()
  {
      return view('notificaciones.create');
  }

  public function save(Request $request)
  {
    $datantf= array_except($request->all(),'_token');
    Notificacion::create($datantf);
    Session::flash('flash_message','Bien, notificación creada satisfactorialmente!');
             return back()->withInput();
  }

  public function ver()
  {
      $notificaciones = Notificacion::where('id', '>', 0)->paginate(20);
      return view('notificaciones.ver', compact('notificaciones'));
  }

  public function search(Request $request)
  {
      $notificaciones = Notificacion::filter($request->all())->paginate(20);
      return view('notificaciones.listado', compact('notificaciones'));
  }

  public function viewone($id)
  {
      $notificacion = Notificacion::where('id','=',$id)->get();
      return view('notificaciones.veruna', compact('notificacion'));
  }

  public function editar($id)
  {
    $datantf = Notificacion::Where('id','=',$id)->get();
    foreach($datantf as $ntf){ $numero = $ntf->id;  }
    return view('notificaciones.editntf', compact('datantf') ,['id_notificacion' => $numero]);
  }

  public function actualizar(Request $request)
  {
    $datantf= array_except($request->all(),'_token');
    Notificacion::Where('id','=', $datantf['id'])->update($datantf);
    Session::flash('flash_message','Excelente, notificación actualizada!');
             return back()->withInput();
  }
}
