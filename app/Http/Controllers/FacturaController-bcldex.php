<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Excel;
use Session;
use App\Factura;
use Config;
use DB;
use Auth;

class FacturaController extends Controller
{

  public function sgf()
  {
      return view('importfacts');
  }
  public function crear()
  {
      return view('sgf.crear');
  }
  public function save(Request $request)
  {
    $validator = Validator::make($request->all(), [
          'nombre_proveedor' => ['required', 'string'],
          'nit' => ['required', 'string'],
          'numero_factura' => ['required', 'string'],
          'fecha_factura' => ['required', 'string'],
          'fecha_vencimiento' => ['required', 'string'],
          'moneda' => ['required', 'string'],
          'valor_a_pagar' => ['required', 'numeric'],
          'valor_total' => ['required', 'numeric'],
          'iva' => ['required', 'numeric'],
          'ica' => ['required', 'numeric'],
          'rtf' => ['required', 'numeric'],
          'estado' => ['required', 'string']
        ]);
     if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

    $datafact= array_except($request->all(),'_token');
    $datafact = Factura::create($datafact);
    Session::flash('flash_message','Excelente, registro insertado!');
             return back()->withInput();
  }
  public function veruno($id)
  {
      $datafact = Factura::Where('id','=',$id)->get();
      foreach($datafact as $fact){ $numero = $fact->numero_documento;  }
      return view('sgf.viewsfact', compact('datafact') ,['numero_documento' => $numero]);
  }
  public function editar($id)
  {
    $datafact = Factura::Where('id','=',$id)->get();
    foreach($datafact as $fact){ $numero = $fact->numero_documento;  }
    return view('sgf.editsfact', compact('datafact') ,['numero_documento' => $numero]);
  }

  public function actualizar(Request $request)
  {
    $validator = Validator::make($request->all(), [
          'nombre_proveedor' => ['required', 'string'],
          'nit' => ['required', 'string'],
          'numero_factura' => ['required', 'string'],
          'fecha_factura' => ['required', 'string'],
          'fecha_vencimiento' => ['required', 'string'],
          'moneda' => ['required', 'string'],
          'valor_total' => ['required', 'numeric'],
          'valor_a_pagar' => ['required', 'numeric'],
          'iva' => ['required', 'numeric'],
          'ica' => ['required', 'numeric'],
          'rtf' => ['required', 'numeric'],
          'estado' => ['required', 'string'],
        ]);
     if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    $datafact= array_except($request->all(),'_token');
    $datafact = Factura::Where('id','=', $datafact['id'])->update($datafact);
    Session::flash('flash_message','Excelente, seguimiento de factura actualizado!');
             return back()->withInput();
  }

  public function sgfindex()
  {
      if(Auth::user()->role_id == 4 ){
      $facturas = Factura::sortable()->paginate(20);
      return view('sgf.facturaindex', compact('facturas'));
    } else {
        $facturas = Factura::sortable()->where('nit','=',Auth::user()->Nit)->paginate(20);
        return view('sgf.facturaindexp', compact('facturas'));
    }
  }

  public function buscar(Request $request)
  {
    if(Auth::user()->role_id == 4 ){
      $facturas = Factura::filter($request->all())->sortable()->paginate(20);
      return view('sgf.facturaindex', compact('facturas'));
    } else {
      $facturas = Factura::filter($request->all())->where('nit','=',Auth::user()->Nit)->sortable()->paginate(20);
      return view('sgf.facturaindexp', compact('facturas'));
    }

  }

  public function deleteone($id)
  {
          Factura::where('id', $id)->delete();
  }

  public function deleteonef($id)
  {
          Factura::where('id', $id)->delete();
          Session::flash('alert_success',"Seguimiento de factura borrado exitosamente!");
          return redirect()->route('sgfindex');
  }

  public function uploadsgf(Request $request)
  {
    $inputs = $request->all(); $fecha= $inputs['importdate'];
   if(Input::hasFile('excelfile')){
          $path = Input::file('excelfile')->getRealPath();
          $data = Excel::load($path, function($reader) {
          })->get();
          $therertf=Factura::csgf($fecha);
          if (!$therertf->isEmpty()) {
                  Session::flash('alert_message',"Ya hay información de la misma fecha de importación, desea borrarla?. <a href='delinfosgf-".$fecha."'>Si</a>");
                    return back()->withInput();
                }
          foreach($therertf as $therare=>$value){
              $nits[]=$value->nit;
          }
          $arrayupdate=[];
          $arrayinsert=[];
          $errores=[];
          $rules = Config::get('Facturarules');
          if(!empty($data) && $data->count()){
              foreach ($data as $key => $value) {
                  $valuesgf = ['id' => NULL,
                  'nombre_proveedor' => $value->nombre_proveedor,
                  'nit' => $value->nit,
                  'numero_factura' => $value->numero_factura,
                  'fecha_factura' => $value->fecha_factura,
                  'valor_a_pagar' => $value->valor_a_pagar,
                  'valor_total' => $value->valor_total,
                  'iva' => $value->iva,
                  'ica' => $value->ica,
                  'rtf' => $value->rtf,
                  'estado' => $value->estado,
                  'fecha_vencimiento' => $value->fecha_vencimiento,
                  'moneda' => $value->moneda];
                  try {
                 $validator = \Validator::make($valuesgf, $rules);
                 if ($validator->fails()) {
                     $errores=array_prepend($errores,$validator->errors()->all());
                     $errores=array_prepend($errores,$valuesgf['nit']);
                 }
                    else{
                    if(!isset($nits)){
                        $arrayinsert=array_prepend($arrayinsert,$valuesgf);
                    }
                    else {
                     if (in_array($valuesgf['nit'],$nits)) {
                     $arrayupdate=array_prepend($arrayupdate,$valuesgf);
                     }
                     else{
                     $arrayinsert=array_prepend($arrayinsert,$valuesgf);
                     }
                }
                }
                 } catch (Exception $e) {
                     \Log::info('Error Insertando datos: '.$e);
                     return \Response::json(['created' => false], 500);
                 }
            }
      $updates= 0;
      $inserteds = count($arrayinsert);
      if (!($inserteds)){ $inserteds = '0'; }
          if (!empty($arrayinsert)){
          $arraybig=(array_chunk($arrayinsert, 10));
          foreach($arraybig as $arraysmall){
            DB::table('seguimiento_facturas')->insert($arraysmall);
          }
         }
         DB::table('registros')->insert(
              ['nit' => Auth::user()->Nit, 'usuario' => Auth::user()->name,
              'fecha' => date("Y/m/d"), 'hora' => date("h:i:s"), 'anio'=>date("Y"),
              'accion'=> 'Importó Seguimento Facturas', 'hasta'=>date("Y/m/d"), 'periodo'=>$fecha]
          );
          if (!empty($errores)){
          $errorsitos = json_encode($errores);
          $cuentaerrores = count($errores)/2;
          $resultado[] =['inserteds' => $inserteds];
           return view('sgf.errores',compact('resultado'), ['cuentaerrores' => $cuentaerrores])
              ->with('errores', compact('errorsitos'));}
            else {
              $resultado[] =['inserteds' => $inserteds,
              'updates' => $updates,'errores' => '0'];
               return back()->with('resultado', $resultado);
            }
         }
      }
  }

  public function delinfosgf($fecha)
  {
      $deletedRows = Factura::where('fecha_vencimiento', $fecha)->delete();
      Session::flash('alert_success',"Información borrada correctamente! Ya puede importar nuevamente la información que corresponda.");
        return back()->withInput();
  }


}