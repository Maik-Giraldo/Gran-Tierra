<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use Session;
use DB;

class NoticiaController extends Controller
{
  public function indexn()
 {
   $noticias = Noticia::sortable()->paginate(20);
   return view('noticias.indexn', compact('noticias'));
 }
   public function create()
  {
    return view('noticias.create');
  }
  public function save(Request $request)
  {
    $inputs = $request->all();
    $datosnw = array();
    $request->validate([
    'imagen_de_noticia' => 'required|max:2024|image',
    ]);
    $datosnw['titulo'] = $inputs['titulo'];
    $datosnw['contenido'] = $inputs['contenido'];
    $datosnw['fecha'] = $inputs['fecha'];
    $datosnw['imagen'] = $inputs['imagen_de_noticia'];
    $datosnw['status'] = $inputs['status'];
    $destinationPath = public_path().'/images/noticias';
    if ($request->hasFile('imagen_de_noticia')) {
      $imagen = $request->file('imagen_de_noticia');
      $nameimg=str_random(5).$imagen->getClientOriginalName();
      $imagen->move($destinationPath,$nameimg);
      array_set($datosnw, 'imagen', $nameimg);
    }
    $nwid = Noticia::create($datosnw);
    Session::flash('flash_message','Excelente, noticia registrada!');
             return back()->withInput();
  }
  public function veruno($id)
  {
      $datanw = Noticia::Where('id','=',$id)->get();
      foreach($datanw as $nw){ $numero = $nw->id; $titulo = $nw->titulo;  }
      return view('noticias.viewnw', compact('datanw'),['id_noticia' => $numero, 'titulo' => $titulo]);
  }
  public function editar($id)
  {
    $datanw = Noticia::Where('id','=',$id)->get();
    foreach($datanw as $nw){ $numero = $nw->id;  }
    return view('noticias.editnw', compact('datanw') ,['id_noticia' => $numero]);
  }
  public function actualizar(Request $request)
  {
    $datanw= array_except($request->all(),'_token');
    $destinationPath = public_path().'/images/noticias';
    $request->validate([
    'imagen' => 'max:2024|image',
    ]);
    if ($request->hasFile('imagen')) {
      $imagen = $request->file('imagen');
      $nameimg=str_random(5).$imagen->getClientOriginalName();
      $imagen->move($destinationPath,$nameimg);
      array_set($datanw, 'imagen', $nameimg);
    }
    Noticia::Where('id','=', $datanw['id'])->update($datanw);
    Session::flash('flash_message','Excelente, noticia actualizada!');
             return back()->withInput();
  }
  public function deleteone($id, $table)
  {
          DB::table($table)->where('id', $id)->delete();
  }
  public function listar()
 {
   $noticias = Noticia::orderBy('updated_at', 'desc')->paginate(9);
   return view('noticias.lista', compact('noticias'));
 }
}
