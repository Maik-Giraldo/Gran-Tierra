<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Ica;
use App\Empresa;
use PDF;
use Excel;
use App\User;
use DB;
use Session;
use NumberToWords\NumberToWords;
use Config;
use Auth;

class IcaController extends Controller
{
    public function downica(Request $request)
   {
      $inputs = $request->all(); $ano= $inputs['anio'];
      $desde= $inputs['pdesde']; $nit= $inputs['nit'];
      $hasta= $inputs['phasta']; $ciudad = $inputs['ciudad'];
      $empresa= $inputs['id_empresa'];
      $datosempr = \App\Empresa::validaica($nit, $ano, $desde, $hasta, $empresa);
      $datosica = Ica::valida($nit, $ano, $desde, $hasta, $ciudad, $empresa);
      $ret = Ica::ciudadrt($nit, $ano, $desde, $hasta, $ciudad, $empresa);
      foreach ($datosempr as $key => $value) {
        $nempresa  = $value->nombre_empresa;
      }
      $numberToWords = new NumberToWords();
      $numberTransformer = $numberToWords->getNumberTransformer('es');
      $sumaretenido   = 0;
      foreach ($datosica as $key => $value) {
        $sumaretenido  += $value->Retenido;
      }
      $convertido = $numberTransformer->toWords($sumaretenido);
      if (!$datosica->isEmpty()) {
        try {
          $pdf = PDF::loadView('voyager::ica.certificado_ica',
        compact('datosica','ano','desde','hasta','datosempr',
                'ret'),['letras' => $convertido]);
        DB::table('registros')->insert(
                ['nit' => Auth::user()->Nit, 'usuario' => Auth::user()->name,
                'fecha' => date("Y/m/d"), 'hora' => date("h:i:s"), 'anio'=>$ano,
                'accion'=> 'Exportó Ica', 'hasta'=>date("Y/m/d"), 'periodo'=>$desde.' a '.$hasta,
                'empresa'=>$nempresa]
            );
        return $pdf->stream('certificado_ica.pdf',array('Attachment'=>0));
        } catch (\Throwable $th) {
          echo($th); exit();
        }
        
      } else {
        echo "no se encontraron datos"; exit();
      }
   }

   public function icareport($nit, $ano, $periodo, $ciudad, $empresa)
  {
       $hasta= $periodo; $desde = $periodo;
       $datosempr = \App\Empresa::validaica($nit, $ano, $desde, $hasta, $empresa);
       $datosica = Ica::valida($nit, $ano, $desde, $hasta, $ciudad, $empresa);
       $ret = Ica::ciudadrt($nit, $ano, $desde, $hasta, $ciudad, $empresa);
       foreach ($datosempr as $key => $value) {
         $nempresa  = $value->nombre_empresa;
       }
       $numberToWords = new NumberToWords();
       $numberTransformer = $numberToWords->getNumberTransformer('es');
       $sumaretenido   = 0;
        foreach ($datosica as $key => $value) {
         $sumaretenido  += $value->Retenido;
        }
        $convertido = $numberTransformer->toWords($sumaretenido);
        if (!$datosica->isEmpty()) {
         $pdf = PDF::loadView('voyager::ica.certificado_ica',
         compact('datosica','ano','desde','hasta','datosempr',
                 'ret'),['letras' => $convertido]);
         DB::table('registros')->insert(
                 ['nit' => Auth::user()->Nit, 'usuario' => Auth::user()->name,
                 'fecha' => date("Y/m/d"), 'hora' => date("h:i:s"), 'anio'=>$ano,
                 'accion'=> 'Exportó Iva', 'hasta'=>date("Y/m/d"), 'periodo'=>$periodo.' a '.$hasta,
                 'empresa'=>$nempresa]
             );
         return $pdf->stream('certificado_ica.pdf',array('Attachment'=>0));
       } else {
         echo "no se trajeron datos"; exit();
       }
    }
  public function icaimport()
  {
    $empresas = Empresa::get();
    return view('importica', compact('empresas'));
  }

  public function icaindex()
 {
   $icas = DB::table('icas')
             ->join('empresa', 'icas.id_empresa', '=', 'empresa.id_empresa')
             ->orderBy('Ano','desc')
             ->paginate(20);
   return view('icaindex', compact('icas'));
 }

 public function find(Request $request)
 {
   $icas = Ica::filter($request->all())->where('Nit','=', Auth::user()->Nit)->orderBy('id','desc')->paginate(20);
   return view('ica',compact('icas', 'empresas'));
 }
 public function findf(Request $request)
 {
   $icas = Ica::join('empresa', 'icas.id_empresa', '=', 'empresa.id_empresa')
   ->filter($request->all())->where('Nit','=', Auth::user()->Nit)->orderBy('id','desc')->paginate(20);
   $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
   return view('ica',compact('icas','empresas'));
 }
 public function findadm(Request $request)
  {
    $icas = Ica::join('empresa', 'icas.id_empresa', '=', 'empresa.id_empresa')
    ->filter($request->all())->orderBy('id','desc')->paginate(20);
    $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
    return view('icaf',compact('icas','empresas'));
  }
 public function icacreate()
 {
   $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
   return view('icacreate', compact('empresas'));
 }

 public function buscarica(Request $request)
 {
   $icas = Ica::join('empresa', 'icas.id_empresa', '=', 'empresa.id_empresa')
           ->filter($request->all())->orderBy('id','desc')->paginate(20);
   return view('icaindex', compact('icas'));
 }

 public function icacreateone(Request $request)
 {
 $inputs = $request->all();
 $datosica = array();
 $datosica['Nit'] = $inputs['nit_tercero'];
 $datosica['Nombre'] = $inputs['nombre_tercero'];
 $datosica['Base'] = $inputs['base_gravable'];
 $datosica['Concepto'] = $inputs['concepto'];
 $datosica['Porcentaje'] = $inputs['porcentaje'];
 $datosica['Retenido'] = $inputs['valor_retenido'];
 $datosica['Ano'] = $inputs['anio'];
 $datosica['Ciudad_Expedido'] = $inputs['ciudad_expedido'];
 $datosica['Ciudad_Pago'] = $inputs['ciudad_pago'];
 $datosica['fecha_expedicion'] = $inputs['fecha_expedicion'];
 $datosica['id_empresa'] = $inputs['id_empresa'];
 $datosica['Periodo'] = $inputs['periodo'];
  $icaid = Ica::create($datosica);
  Session::flash('flash_message','Excelente, registro insertado!');
           return back()->withInput();
 }

 public function icaview($id)
 {
  $dataica = Ica::join('empresa', 'icas.id_empresa', '=', 'empresa.id_empresa')
  ->where('id','=',$id)->get();
  return view('viewica',compact('dataica'));
 }
 public function icaedit($id)
 {
  $dataica = Ica::join('empresa', 'icas.id_empresa', '=', 'empresa.id_empresa')
  ->where('id','=',$id)->get();
  $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
  return view('editica',compact('dataica','empresas'),['icaid' => $id]);
 }
 public function updateoneica(Request $request)
 {
   $inputs = $request->all();
   $datosica = array();
   $datosica['Nit'] = $inputs['nit_tercero'];
   $datosica['Nombre'] = $inputs['nombre_tercero'];
   $datosica['Base'] = $inputs['base_gravable'];
   $datosica['Concepto'] = $inputs['concepto'];
   $datosica['Porcentaje'] = $inputs['porcentaje'];
   $datosica['Retenido'] = $inputs['valor_retenido'];
   $datosica['Ano'] = $inputs['anio'];
   $datosica['Ciudad_Expedido'] = $inputs['ciudad_expedido'];
   $datosica['Ciudad_Pago'] = $inputs['ciudad_pago'];
   $datosica['fecha_expedicion'] = $inputs['fecha_expedicion'];
   $datosica['Periodo'] = $inputs['periodo'];   
   $editiva = Ica::Where('id','=', $inputs['icaid'])->update($datosica);
    Session::flash('flash_message','Excelente, registro actualizado!');
             return back()->withInput();
 }
 public function deleteoneica($id)
 {
         Ica::where('id', $id)->delete();
 }
  public function uploadica(Request $request)
  {
     $inputs = $request->all(); $ano= $inputs['anio'];
     $periodo= $inputs['periodo']; $empresa= $inputs['id_empresa'];
    if(Input::hasFile('excelfile')){
           $path = Input::file('excelfile')->getRealPath();
           $data = Excel::load($path, function($reader) {
           })->get();
           $thereica=Ica::cica($ano, $periodo, $empresa);
           // dd($ano,$periodo,$empresa);
           $thereusers = User::all('nit');
           foreach($thereusers as $therare=>$value){
               $nitsusr[]=$value->nit;
           }
           if ($thereica) {
             foreach($thereica as $therare=>$value){
                 $nits[]=$value->nit;
             }
            }
           $arrayupdate=[];
           $arrayinsert=[];
           $arraynotfound=[];
           $errores=[];
           $rules = Config::get('Icarules');
           // dd($thereica);
           if(!empty($data) && $data->count() && $empresa != 'todas'){
               foreach ($data as $key => $value) {
                 if(((int)$value->ano != $ano) || ((int)$value->periodo != $periodo) || ($value->id_empresa != $empresa) ){
                    Session::flash('alert_message',"Hay errores en el archivo de excel, por favor verifique que el año, periodo o empresa");
                     return back()->withInput();
                 } else {
                   $valueiva = ['nit' => $value->nit,
                   'id_empresa' => $value->id_empresa,
                   'cuenta' => $value->cuenta,
                   'nombre' => $value->nombre,
                   'concepto' => $value->concepto,
                   'porcentaje' => $value->porcentaje,
                   'base' => $value->base,
                   'retenido' => $value->retenido,
                   'ano' => $ano,
                   'periodo' => $periodo,
                   'ciudad_pago' => $value->ciudad_pago,
                   'ciudad_expedido' => $value->ciudad_expedido,
                   'banco_pago' => $value->banco_pago,
                   'fecha_expedicion' => $value->fecha_expedicion,
                   'ind_ica' => $value->ind_ica,];
                   if (!in_array($valueiva['nit'],$nitsusr)) {
                      $arraynotfound=array_prepend($arraynotfound,$valueiva);
                   }
                try {
               $validator = \Validator::make($valueiva, $rules);
               if ($validator->fails()) {
                   $errores=array_prepend($errores,$validator->errors()->all());
                   $errores=array_prepend($errores,$valueiva['nit']);
               }
                  else{
                  if(!isset($nits)){
                      $arrayinsert=array_prepend($arrayinsert,$valueiva);
                  }
                  else {
                   if (in_array($valueiva['nit'],$nits)) {
                   $arrayupdate=array_prepend($arrayupdate,$valueiva);
                   }
                   else{
                   $arrayinsert=array_prepend($arrayinsert,$valueiva);
                   }
              }
              }
       } catch (Exception $e) {
           \Log::info('Error Insertando datos: '.$e);
           return \Response::json(['created' => false], 500);
       }
       if (!empty($arrayupdate)){
       Session::flash('alert_message',"Ya hay información del mismo año y periodo, desea borrarla?. <a href='delinfoica-".$ano."-".$periodo."'>Si</a>");
            return back()->withInput();
       }
       }
     }
       $updates= count($arrayupdate);
       $inserteds = count($arrayinsert);
       $usercount= 0;
       $usercount = count($arraynotfound);
       if (!($inserteds)){ $inserteds = '0'; } if (!isset($updates)){$updates = 0; }
           if (!empty($arrayinsert)){
           $arraybig=(array_chunk($arrayinsert, 10));
           foreach($arraybig as $arraysmall){
             DB::table('icas')->insert($arraysmall);
           }
          }
          DB::table('registros')->insert(
               ['nit' => Auth::user()->Nit, 'usuario' => Auth::user()->name,
               'fecha' => date("Y/m/d"), 'hora' => date("h:i:s"), 'anio'=>$ano,
               'accion'=> 'Importó Ica', 'hasta'=>date("Y/m/d"), 'periodo'=>$periodo]
           );
           $resultado[] =['inserteds' => $inserteds,
           'updates' => $updates,'errores' => '0'];

           if($usercount > 0){
             $request->session()->put('arraynotfound', $arraynotfound);
             return view('ica.resultusers',compact('arraynotfound'))
             ->with('resultado', $resultado);
           }

            return back()->with('resultado', $resultado);
            } elseif(!empty($data) && $data->count() && $empresa == 'todas'){
              foreach ($data as $key => $value) {
                 if(((int)$value->ano != $ano) || ((int)$value->periodo != $periodo)){
                    Session::flash('alert_message',"Hay errores en el archivo de excel, por favor verifique que el año, periodo o empresa");
                     return back()->withInput();
                 } else {
                   $valueiva = ['nit' => $value->nit,
                   'id_empresa' => $value->id_empresa,
                   'cuenta' => $value->cuenta,
                   'nombre' => $value->nombre,
                   'concepto' => $value->concepto,
                   'porcentaje' => $value->porcentaje,
                   'base' => $value->base,
                   'retenido' => $value->retenido,
                   'ano' => $ano,
                   'periodo' => $periodo,
                   'ciudad_pago' => $value->ciudad_pago,
                   'ciudad_expedido' => $value->ciudad_expedido,
                   'banco_pago' => $value->banco_pago,
                   'fecha_expedicion' => $value->fecha_expedicion,
                   'ind_ica' => $value->ind_ica,];
                   if (!in_array($valueiva['nit'],$nitsusr)) {
                      $arraynotfound=array_prepend($arraynotfound,$valueiva);
                   }
                try {
               $validator = \Validator::make($valueiva, $rules);
               if ($validator->fails()) {
                   $errores=array_prepend($errores,$validator->errors()->all());
                   $errores=array_prepend($errores,$valueiva['nit']);
               }
                  else{
                  if(!isset($nits)){
                      $arrayinsert=array_prepend($arrayinsert,$valueiva);
                  }
                  else {
                   if (in_array($valueiva['nit'],$nits)) {
                   $arrayupdate=array_prepend($arrayupdate,$valueiva);
                   }
                   else{
                   $arrayinsert=array_prepend($arrayinsert,$valueiva);
                   }
              }
              }
       } catch (Exception $e) {
           \Log::info('Error Insertando datos: '.$e);
           return \Response::json(['created' => false], 500);
       }
       if (!empty($arrayupdate)){
       Session::flash('alert_message',"Ya hay información del mismo año y periodo, desea borrarla?. <a href='delinfoica-".$ano."-".$periodo."'>Si</a>");
            return back()->withInput();
       }
       }
     }
       $updates= count($arrayupdate);
       $inserteds = count($arrayinsert);
       $usercount= 0;
       $usercount = count($arraynotfound);
       if (!($inserteds)){ $inserteds = '0'; } if (!isset($updates)){$updates = 0; }
           if (!empty($arrayinsert)){
           $arraybig=(array_chunk($arrayinsert, 10));
           foreach($arraybig as $arraysmall){
             DB::table('icas')->insert($arraysmall);
           }
          }
          DB::table('registros')->insert(
               ['nit' => Auth::user()->Nit, 'usuario' => Auth::user()->name,
               'fecha' => date("Y/m/d"), 'hora' => date("h:i:s"), 'anio'=>$ano,
               'accion'=> 'Importó Ica', 'hasta'=>date("Y/m/d"), 'periodo'=>$periodo]
           );
           $resultado[] =['inserteds' => $inserteds,
           'updates' => $updates,'errores' => '0'];

           if($usercount > 0){
             $request->session()->put('arraynotfound', $arraynotfound);
             return view('ica.resultusers',compact('arraynotfound'))
             ->with('resultado', $resultado);
           }

            return back()->with('resultado', $resultado);
            }
       }
  }

  public function deleteica($ano, $periodo)
  {
      $deletedRows = Ica::where('ano', $ano)->where('periodo', $periodo)->delete();
      Session::flash('alert_success',"Información borrada correctamente! Ya puede importar nuevamente la información que corresponda.");
        return back()->withInput();
  }

  public function icadeunr(Request $request)
  {
    if ($request->session()->has('arraynotfound')) {
        $arraynotfound = $request->session()->get('arraynotfound');
        return Excel::create('usuarios_no_registrados', function($excel) use ($arraynotfound) {
        $excel->sheet('usuarios no registrados', function($sheet) use ($arraynotfound)
        {
            $sheet->fromArray($arraynotfound);
        }); })->download('xlsx');
    }
  }
}
