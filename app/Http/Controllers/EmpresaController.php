<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use Session;
use Validator;

class EmpresaController extends Controller
{
  public function ver($id)
  {
      $dataempresa = Empresa::where('id_empresa', $id)->get();
      return view('viewempresa', compact('dataempresa'));
  }
  public function editar($id)
  {
    $dataempresa = Empresa::where('id_empresa', $id)->get();
    return view('editempresa',compact('dataempresa'));
  }
  public function actualizar(Request $request)
  {
    $dataempresa= array_except($request->all(),'_token');
      $destinationPath = public_path().'/images/empresa';
    if ($request->hasFile('logotipo')) {
      $logotipo = $request->file('logotipo');
      $lgtname=str_random(5).$logotipo->getClientOriginalName();
      $logotipo->move($destinationPath,$lgtname);
      array_set($dataempresa, 'logotipo', $lgtname);
    }
    if ($request->hasFile('logotipo_color')) {
      $logotipo_color = $request->file('logotipo_color');
      $nameltc=str_random(5).$logotipo_color->getClientOriginalName();
      $logotipo_color->move($destinationPath,$nameltc);
      array_set($dataempresa, 'logotipo_color', $nameltc);
    }
    if ($request->hasFile('imagen_firma')) {
      $imagen_firma = $request->file('imagen_firma');
      $nameif=str_random(5).$imagen_firma->getClientOriginalName();
      $imagen_firma->move($destinationPath,$nameif);
      array_set($dataempresa, 'imagen_firma', $nameif);
    }
    $editiva = Empresa::Where('id_empresa','=', $dataempresa['id_empresa'])->update($dataempresa);
    Session::flash('flash_message','Excelente, registro actualizado!');
             return back()->withInput();
  }
  public function createe(Request $request)
  {
      return view('empresas.create');
  }
  public function crearempresa(Request $request)
  {
      $dataempresa= array_except($request->all(),'_token');
      $validator = Validator::make($request->all(), [
            'nit_empresa' => 'required|unique:empresa|max:255',
            'nombre_empresa' => 'required|unique:empresa',
        ]);
        if ($validator->fails()) {
            return redirect('empresa/create/form')
                        ->withErrors($validator)
                        ->withInput();
        } else {
          $idempresa = Empresa::create($dataempresa);
          Session::flash('flash_message','se registró la empresa con id: '.$idempresa->id_empresa.' y con el Nit: '.$idempresa->nit_empresa,'.');
                   return back()->withInput();
        }
  }
  public function listaremp()
  {
      $dataempresas = Empresa::orderBy('id_empresa')->paginate(20);
      return view('empresas.viewempresas', compact('dataempresas'));
  }
}
