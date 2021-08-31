<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estadistica;
use App\Registro;

class EstadisticaController extends Controller
{
  public function list()
  {
    $estadisticas = Estadistica::where('id','>',0)->orderby('id','desc')->paginate();
    foreach($estadisticas as $stat){ $numero = $stat->id;  }
    return view('estadisticas.view', compact('estadisticas') ,['id_stat' => $numero]);
  }
  public function others()
  {
    $estadisticas = Registro::sortable()->orderby('id','desc')->paginate(20);
    return view('estadisticas.viewothers', compact('estadisticas'));
  }
  public function search(Request $request)
  {
      $estadisticas = Estadistica::filter($request->all())->orderby('id','desc')->paginate(20);
      return view('estadisticas.view', compact('estadisticas'));
  }
  public function sothers(Request $request)
  {
      $estadisticas = Registro::filter($request->all())->orderby('id','desc')->paginate(20);
      return view('estadisticas.viewothers', compact('estadisticas'));
  }
  public function viewone($id)
  {
      $estadistica = Estadistica::where('id','=',$id)->get();
      return view('estadisticas.veruna', compact('estadistica'));
  }
  public function viewonect($id)
  {
      $estadistica = Registro::where('id','=',$id)->get();
      return view('estadisticas.verunact', compact('estadistica'));
  }
}
