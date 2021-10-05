<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
// use Illuminate\Support\Facades\DB as $db;
use Illuminate\Support\Facades\Validator;
use Excel;
use Session;
use App\Factura;
use App\HojaEntrada;
use App\Retenciones;
use App\Empresa;
use Config; 
use DB;
use Auth;
use Throwable;

class FacturaController extends Controller
{
 
  public function sgf()
  {
      $empresas = Empresa::where('id_grupo_empresa', 1)->orderBy('id_empresa')->get();
      return view('importfacts', compact('empresas'));
  }
  public function crear()
  {
   $empresas = Empresa::where('id_grupo_empresa', 1)->orderBy('id_empresa')->get();
      return view('sgf.crear', compact('empresas'));
  }
  public function save(Request $request)
  {
    $validator = Validator::make($request->all(), [
          'nombre_proveedor' => ['required', 'string'],
          'nit' => ['required', 'string'],
          'numero_factura' => ['required', 'string'],
          'fecha_factura' => ['required', 'string'],
          'fecha_pago' => ['required'],
          'moneda' => ['required', 'string'],
          'valor_a_pagar' => ['required', 'numeric'],
          'valor_total' => ['required', 'numeric'],
          'iva' => ['required', 'numeric'],
          'ica' => ['required', 'numeric'],
          'rtf' => ['required', 'numeric'],
          'estado' => ['required', 'string'],
          'texto' => ['required', 'string']
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
      $datafact = Factura::join('empresa as enterprise', 'seguimiento_facturas.id_empresa', '=', 'enterprise.id_empresa')->where('enterprise.id_grupo_empresa',1)->Where('id','=',$id)->get();
      foreach($datafact as $fact){ $numero = $fact->numero_documento;  }
      return view('sgf.viewsfact', compact('datafact') ,['numero_documento' => $numero]);
  }
  public function verdetalle($id)
  {
      $datafact = Factura::join('empresa as enterprise', 'seguimiento_facturas.id_empresa', '=', 'enterprise.id_empresa')->where('enterprise.id_grupo_empresa',1)->where('nit','=',Auth::user()->Nit)->Where('id','=',$id)->get();
      foreach($datafact as $fact){ $numero = $fact->numero_documento;  }
      return view('sgf.verdetalle', compact('datafact') ,['numero_documento' => $numero]);
  }
  public function sale($id)
  {
      $datafact = Factura::join('empresa as enterprise', 'seguimiento_facturas.id_empresa', '=', 'enterprise.id_empresa')->where('enterprise.id_grupo_empresa',1)->where('nit','=',Auth::user()->Nit)->Where('id','=',$id)->get();
      foreach($datafact as $fact){ $numero = $fact->numero_documento;  }
      return view('sgf.ventafactura', compact('datafact') ,['numero_documento' => $numero]);
  }
  public function editar($id)
  {
    $datafact = Factura::join('empresa as enterprise', 'seguimiento_facturas.id_empresa', '=', 'enterprise.id_empresa')->where('enterprise.id_grupo_empresa',1)->Where('id','=',$id)->get();
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
          'fecha_pago' => ['required', 'string'],
          'moneda' => ['required', 'string'],
          'valor_total' => ['required', 'numeric'],
          'valor_a_pagar' => ['required', 'numeric'],
          'iva' => ['required', 'numeric'],
          'ica' => ['required', 'numeric'],
          'rtf' => ['required', 'numeric'],
          'estado' => ['required', 'string'],
          'texto' => ['required', 'string']
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
    try {
      $role_id = Auth::user()->role_id;
      $nit = Auth::user()->Nit;
      if(Auth::user()->role_id == 4 ){
        $transacciones = Factura::sortable()->join('empresa', 'seguimiento_transaccional.id_empresa', '=', 'empresa.id_empresa')->where('empresa.id_grupo_empresa',1)->orderBy('id','desc')->paginate(20);
        $empresas = Empresa::where('id_grupo_empresa', 1)->orderBy('id_empresa')->get();
        return view('sgf.facturaindex', compact('transacciones', 'empresas', 'role_id', 'nit'));
      } else {
          $transacciones = Factura::sortable()->join('empresa as enterprise', 'seguimiento_transaccional.id_empresa', '=', 'enterprise.id_empresa')->where('enterprise.id_grupo_empresa',1)->where('nit','=',Auth::user()->Nit)->orderBy('id','desc')->paginate(20);
          $empresas = Empresa::where('id_grupo_empresa', 1)->orderBy('nombre_empresa')->get();
          return view('sgf.facturaindexp', compact('transacciones','empresas', 'role_id', 'nit'));
      }
    } catch(Throwable $th){
      return $th;
    };
      
  }

  //API sgfindex
  public function apisgfindex($rol, $nit)
  {
    try {
      if(str_contains($nit, "'") || str_contains($rol, "'")){
        return null;
      };
      if($rol == 4 ){
        $hoja_entrada = DB::select("SELECT he.*, st.nit FROM hoja_entrada he, seguimiento_transaccional st WHERE st.nit = $nit");
        return $hoja_entrada;
      } else {
        $hoja_entrada = DB::select("SELECT he.*, st.nit FROM hoja_entrada he, seguimiento_transaccional st WHERE st.nit = $nit");
          return $hoja_entrada;
      }
    } catch(Throwable $th){
      return $th;
    };
      
  }

  public function sgfhist()
  {
      if(Auth::user()->role_id == 4 ){
      $facturas = Factura::sortable()->join('empresa', 'seguimiento_facturas.id_empresa', '=', 'empresa.id_empresa')->where('empresa.id_grupo_empresa',1)->orderBy('id','desc')->paginate(20);
      $empresas = Empresa::where('id_grupo_empresa', 1)->orderBy('id_empresa')->get();
      return view('sgf.facturaindex', compact('facturas', 'empresas'));
    } else {
        $facturas = Factura::sortable()->join('empresa as enterprise', 'seguimiento_facturas.id_empresa', '=', 'enterprise.id_empresa')->where('enterprise.id_grupo_empresa',1)->where('nit','=',Auth::user()->Nit)->orderBy('id','desc')->paginate(20);
        $empresas = Empresa::where('id_grupo_empresa', 1)->orderBy('nombre_empresa')->get();
        return view('sgf.facturahistory', compact('facturas','empresas'));
    }
  }

  public function venderfacts()
  {
      if(Auth::user()->role_id == 4 ){
      $facturas = Factura::sortable()->join('empresa', 'seguimiento_facturas.id_empresa', '=', 'empresa.id_empresa')->where('empresa.id_grupo_empresa',1)->orderBy('id','desc')->paginate(20);
      $empresas = Empresa::where('id_grupo_empresa', 1)->orderBy('id_empresa')->get();
      return view('sgf.venderadm', compact('facturas', 'empresas'));
    } else {
        $facturas = Factura::sortable()->join('empresa as enterprise', 'seguimiento_facturas.id_empresa', '=', 'enterprise.id_empresa')->where('enterprise.id_grupo_empresa',1)->where('nit','=',Auth::user()->Nit)->orderBy('id','desc')->paginate(20);
        $empresas = Empresa::where('id_grupo_empresa', 1)->orderBy('nombre_empresa')->get();
        return view('sgf.venderprov', compact('facturas','empresas'));
    }
  }

  public function vender(Request $request)
  {
    $datafacts= array_except($request->all(),['_token','grid-bulk-actions']);
    foreach ($datafacts as $datafact) {
      $idsfac[]= $datafact;
    }
    $facturas = Factura::select("*")->whereIn('id', $idsfac)->get();
    return view('sgf.facturassale', compact('facturas'),['fechainicio' => '12/03/2019', 'fechafin' => '13/01/2020', 'nit'=>'58465454']);
  }
  public function entramite(Request $request)
  {
    $facturas = Factura::sortable()->join('empresa as enterprise', 'seguimiento_facturas.id_empresa', '=', 'enterprise.id_empresa')->where('enterprise.id_grupo_empresa',1)->where('nit','=',Auth::user()->Nit)->orderBy('id','desc')->paginate(20);
        $empresas = Empresa::where('id_grupo_empresa', 1)->orderBy('nombre_empresa')->get();
    return view('sgf.tramites', compact('facturas','empresas'));
  }

  public function qryporfechas(Request $request)
  {
  	$inputs = $request->all(); $fechainicio= $inputs['fecha_pago_inicio'];
    $fechafin= $inputs['fecha_pago_fin']; $nit=$inputs['nit'];
	  if(Auth::user()->role_id == 4 && $inputs['id_empresa'] == 'todas'){
	  $facturas = Factura::join('empresa as enterprise', 'seguimiento_facturas.id_empresa', '=', 'enterprise.id_empresa')->where('enterprise.id_grupo_empresa',1)->where('nit',$inputs['nit'])->whereBetween('fecha_pago',[$fechainicio,$fechafin])->orderBy('fecha_pago','desc')->get();
	  return view('sgf.facturasbydate', compact('facturas'),['fechainicio' => $fechainicio, 'fechafin' => $fechafin, 'nit'=>$nit]);
    } elseif(Auth::user()->role_id == 4 && $inputs['id_empresa'] != 'todas'){
        $facturas = Factura::join('empresa as enterprise', 'seguimiento_facturas.id_empresa', '=', 'enterprise.id_empresa')->where('enterprise.id_grupo_empresa',1)->where('seguimiento_facturas.id_empresa',$inputs['id_empresa'])->where('nit',$inputs['nit'])->whereBetween('fecha_pago',[$fechainicio,$fechafin])->orderBy('fecha_pago','desc')->get();
	  return view('sgf.facturasbydate',compact('facturas'),['fechainicio' => $fechainicio, 'fechafin' => $fechafin, 'nit'=>$nit]);
    } elseif(Auth::user()->role_id != 4 && $inputs['id_empresa'] != 'todas'){
        $facturas = Factura::join('empresa as enterprise', 'seguimiento_facturas.id_empresa', '=', 'enterprise.id_empresa')->where('enterprise.id_grupo_empresa',1)->where('seguimiento_facturas.id_empresa',$inputs['id_empresa'])->where('nit',$inputs['nit'])->whereBetween('fecha_pago',[$fechainicio,$fechafin])->orderBy('fecha_pago','desc')->get();
    return view('sgf.facturasbydatep',compact('facturas'),['fechainicio' => $fechainicio, 'fechafin' => $fechafin, 'nit'=>$nit]);
    }else{
      $facturas = Factura::join('empresa as enterprise', 'seguimiento_facturas.id_empresa', '=', 'enterprise.id_empresa')->where('enterprise.id_grupo_empresa',1)->where('nit',$inputs['nit'])->whereBetween('fecha_pago',[$fechainicio,$fechafin])->orderBy('fecha_pago','desc')->get();
    return view('sgf.facturasbydatep', compact('facturas'),['fechainicio' => $fechainicio, 'fechafin' => $fechafin, 'nit'=>$nit]);
    }
  }

  public function buscar(Request $request)
  {
    if(Auth::user()->role_id == 4 ){
      $facturas = Factura::filter($request->all())->join('empresa as enterprise', 'seguimiento_facturas.id_empresa', '=', 'enterprise.id_empresa')->where('enterprise.id_grupo_empresa',1)->orderBy('id','desc')->sortable()->paginate(20);
      $empresas = Empresa::where('id_grupo_empresa', 1)->orderBy('nombre_empresa')->get();
      return view('sgf.facturaindex', compact('facturas', 'empresas'));
    } else {
      $facturas = Factura::filter($request->all())->join('empresa as enterprise', 'seguimiento_facturas.id_empresa', '=', 'enterprise.id_empresa')->where('enterprise.id_grupo_empresa',1)->where('nit','=',Auth::user()->Nit)->orderBy('id','desc')->sortable()->paginate(20);
      $empresas = Empresa::where('id_grupo_empresa', 1)->orderBy('nombre_empresa')->get();
      return view('sgf.facturaindexp', compact('facturas','empresas'));
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
    $empresa= $inputs['id_empresa'];
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
          if(!empty($data) && $data->count() && $empresa != 'todas'){
              foreach ($data as $key => $value) {
                if($value->sociedad != $empresa){
                  Session::flash('alert_message',"Hay errores en el archivo de excel, por favor verifique que el id de la emmpresa corresponda.");
                     return back()->withInput();
                   }
                  $valuesgf = ['id' => NULL,
                  'id_empresa' => $value->sociedad,
                  'nombre_proveedor' => $value->nombre,
                  'nit' => $value->identifica,
                  'numero_factura' => $value->no_factura,
                  'moneda' => $value->moneda,
                  'fecha_factura' => $value->fecha_fact,
                  'valor_total' => $value->importe_ml,
                  'iva' => $value->iva,
                  'rtf' => $value->retefuente,
                  'reteiva' => $value->reteiva,
                  'ica' => $value->reteica,
                  'valor_a_pagar' => $value->valor_pago,
                  'fecha_pago' => $value->fecha_comp,
                  'banco_receptor' => $value->banco,
                  'cuenta_bancaria' => $value->no_cuenta,
                  'estado' => $value->estado,
                  'texto' => $value->texto,
                  'fecha_importacion' => $fecha];
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
              ['nit' => Auth::user()->Nit, 'usuario' => Auth::user()->contacto ? '' : '1',
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
         } elseif(!empty($data) && $data->count() && $empresa == 'todas'){
           foreach ($data as $key => $value) {
                  $valuesgf = ['id' => NULL,
                  'id_empresa' => $value->sociedad,
                  'nombre_proveedor' => $value->nombre,
                  'nit' => $value->identifica,
                  'numero_factura' => $value->no_factura,
                  'moneda' => $value->moneda,
                  'fecha_factura' => $value->fecha_fact,
                  'valor_total' => $value->importe_ml,
                  'iva' => $value->iva,
                  'rtf' => $value->retefuente,
                  'reteiva' => $value->reteiva,
                  'ica' => $value->reteica,
                  'valor_a_pagar' => $value->valor_pago,
                  'fecha_pago' => $value->fecha_comp,
                  'banco_receptor' => $value->banco,
                  'cuenta_bancaria' => $value->no_cuenta,
                  'estado' => $value->estado,
                  'texto' => $value->texto,
                  'fecha_importacion' => $fecha];
                  $id_empresas = ['1A00','1I00','1H00','1F00'];
                  if (in_array($valuesgf['id_empresa'],$id_empresas)) {}
                  else{
                  Session::flash('alert_message',"Hay errores en el archivo de excel, por favor verifique que los ids de las empresas correspondan.");
                  return back()->withInput();
                  }
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
              ['nit' => Auth::user()->Nit, 'usuario' => Auth::user()->contacto ? '' : '1',
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
      $deletedRows = Factura::where('fecha_importacion', $fecha)->delete();
      Session::flash('alert_success',"Información borrada correctamente! Ya puede importar nuevamente la información que corresponda.");
        return back()->withInput();
  }


}