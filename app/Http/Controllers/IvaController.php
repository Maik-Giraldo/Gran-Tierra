<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use TCG\Voyager\Facades\Voyager;
use App\Iva;
use PDF;
use Excel;
use App\User;
use App\Empresa;
use NumberToWords\NumberToWords;
use DB;
use Session;
use Config;
use Auth;

class IvaController extends Controller
{
  public function downiva(Request $request)
 {
    $inputs = $request->all(); $ano= $inputs['anio'];
    $emprtodas = [];
    if($ano >= 2019){
      $civad = 'certificado_ivad_2019';
      $civa = 'certificado_iva_2019';
    } else {
      $civad = 'certificado_ivad';
      $civa = 'certificado_iva';
    }
    $desde= $inputs['pdesde']; $nit= $inputs['nit'];
    $hasta= $inputs['phasta']; $empresa= $inputs['id_empresa'];
    $datosiva = Iva::valida($nit, $ano, $desde, $hasta, $empresa);
    $datosempr = \App\Empresa::valida($nit, $ano, $desde, $hasta, $empresa);
    $ret = Iva::ciudadrt($nit, $ano, $desde, $hasta, $empresa);
    $numberToWords = new NumberToWords();
    $numberTransformer = $numberToWords->getNumberTransformer('es');
    $sumaretenido   = 0;
      foreach ($datosiva as $key => $value) {
        $sumaretenido  += $value->Retenido;
      }
    $convertido = $numberTransformer->toWords($sumaretenido);
    foreach ($datosempr as $key => $value) {
        $nempresa  = $value->nombre_empresa;
      }
    if (!$datosiva->isEmpty()) {
      if($empresa = 'todas'){
        $pdf = PDF::loadView('voyager::iva.'.$civad,
        compact('datosiva','ano','desde','hasta','datosempr','ret'),['letras' => $convertido]);
      } else {
        $pdf = PDF::loadView('voyager::iva.'.$civa,
        compact('datosiva','ano','desde','hasta','datosempr','ret'),['letras' => $convertido]);
      }
      DB::table('registros')->insert(
              ['nit' => Auth::user()->Nit, 'usuario' => Auth::user()->name,
              'fecha' => date("Y/m/d"), 'hora' => date("h:i:s"), 'anio'=>$ano,
              'accion'=> 'Exportó Iva', 'hasta'=> date("Y/m/d"), 'periodo'=>$desde.' a '.$hasta,
              'empresa'=>$nempresa]
          );
      return $pdf->stream('certificado_iva.pdf',array('Attachment'=>0));
    } else {
      echo "no se trajeron datos"; exit();
    }
 }
 public function ivareport($nit, $ano, $periodo, $empresa)
{
     $hasta= $periodo; $desde = $periodo;
     $datosempr = \App\Empresa::validax($nit, $ano, $periodo, $empresa)->get();
     $datosiva = Iva::validarp($nit, $ano, $periodo, $empresa);
     $ret = Iva::ciudadrp($nit, $ano, $periodo, $empresa);
     $numberToWords = new NumberToWords();
     $numberTransformer = $numberToWords->getNumberTransformer('es');
     $sumaretenido   = 0;
     if($ano >= 2019){
      $civad = 'certificado_ivad_2019';
      $civa = 'certificado_iva_2019';
      } else {
        $civad = 'certificado_ivad';
        $civa = 'certificado_iva';
      }
      foreach ($datosiva as $key => $value) {
        $sumaretenido  += $value->Retenido;
      }
      $convertido = $numberTransformer->toWords($sumaretenido);
      foreach ($datosempr as $key => $value) {
       $nempresa  = $value->nombre_empresa;
      }
     if (!$datosiva->isEmpty()) {
       $pdf = PDF::loadView('voyager::iva.'.$civa,
       compact('datosiva','ano','desde','hasta','datosempr','ret'),['letras' => $convertido]);
       DB::table('registros')->insert(
               ['nit' => Auth::user()->Nit, 'usuario' => Auth::user()->name,
               'fecha' => date("Y/m/d"), 'hora' => date("h:i:s"), 'anio'=>$ano,
               'accion'=> 'Exportó Iva', 'hasta'=>date("Y/m/d"), 'periodo'=>$periodo.' a '.$hasta,
               'empresa'=>$nempresa]
           );
       return $pdf->stream('certificado_iva.pdf',array('Attachment'=>0));
       } else {
         echo "no se trajeron datos"; exit();
       }
    }
  public function buscar(Request $request)
  {
    $ivas = Iva::join('empresa', 'ivas.id_empresa', '=', 'empresa.id_empresa')
            ->filter($request->all())->orderBy('id','desc')->paginate(20);
    return view('ivaindex', compact('ivas'));
  }
  public function find(Request $request)
  {
    $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
    $ivas = Iva::join('empresa', 'ivas.id_empresa', '=', 'empresa.id_empresa')
    ->filter($request->all())->where('Nit','=', Auth::user()->Nit)->orderBy('id','desc')->paginate(20);
    return view('Iva.ivaexport',compact('ivas','empresas'));
  }
  public function findadm(Request $request)
  {
    $ivas = Iva::join('empresa', 'ivas.id_empresa', '=', 'empresa.id_empresa')
    ->filter($request->all())->orderBy('id','desc')->paginate(20);
    $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
    return view('ivaf',compact('ivas','empresas'));
  }
  public function ivaimport()
 {
   $empresas = Empresa::get();
   return view('importiva',compact('empresas'));
 }
 public function ivaindex()
{
  // $ivas = Iva::orderBy('Ano','desc')->paginate(20);
  $ivas = DB::table('ivas')
            ->join('empresa', 'ivas.id_empresa', '=', 'empresa.id_empresa')
            ->orderBy('Ano','desc')
            ->paginate(20);
  return view('ivaindex', compact('ivas'));
}
// public function ivajaxindex()
// {
//  return Datatables::of(Iva::orderBy('Ano','desc'))
//        ->addColumn('action', function ($iva) {
//                       return '<a href="iva-view-'.$iva->id.'" title="Ver" aria-label="Ver">
//                         <span class="glyphicon glyphicon-eye-open"></span></a>
//                          <a href="iva-edit-'.$iva->id.'" title="Actualizar" aria-label="Actualizar">
//                            <span class="glyphicon glyphicon-pencil"></span></a>
//                            <a href="#" name="'.$iva->id.'" id="borrarivaitem" title="Eliminar" aria-label="Eliminar">
//                              <span class="glyphicon glyphicon-trash"></span></a>';
//                   })
//       ->make(true);
// }
public function ivacreate()
{
    $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
    return view('ivacreate', compact('empresas'));
}

public function ivacreateone(Request $request)
{
$inputs = $request->all();
$datosiva = array();
$datosiva['Nit'] = $inputs['nit_tercero'];
$datosiva['Nombre'] = $inputs['nombre_tercero'];
$datosiva['Base'] = $inputs['base_gravable'];
$datosiva['Concepto'] = $inputs['concepto'];
$datosiva['Porcentaje'] = $inputs['porcentaje'];
$datosiva['Retenido'] = $inputs['valor_retenido'];
$datosiva['Ano'] = $inputs['anio'];
$datosiva['Ciudad_expedido'] = $inputs['ciudad_expedido'];
$datosiva['Ciudad_pago'] = $inputs['ciudad_pago'];
$datosiva['Banco_pago'] = $inputs['banco_pago'];
$datosiva['id_empresa'] = $inputs['id_empresa'];
$datosiva['Fecha_expedicion'] = $inputs['fecha_expedicion'];
$datosiva['Iva'] = $inputs['iva'];
$datosiva['Periodo'] = $inputs['periodo'];
 $ivaid = Iva::create($datosiva);
 Session::flash('flash_message','Excelente, registro insertado!');
          return back()->withInput();
}

public function ivaview($id)
{
 $dataiva = Iva::join('empresa', 'ivas.id_empresa', '=', 'empresa.id_empresa')
 ->where('id','=',$id)->get();
 return view('viewiva',compact('dataiva'));
}
public function ivaedit($id)
{
 $dataiva = Iva::join('empresa', 'ivas.id_empresa', '=', 'empresa.id_empresa')
 ->where('id','=',$id)->get();
 $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
 return view('editiva',compact('dataiva','empresas'),['ivaid' => $id]);
}
public function updateoneiva(Request $request)
{
  $inputs = $request->all();
  $datosiva = array();
  $datosiva['Nit'] = $inputs['nit_tercero'];
  $datosiva['Nombre'] = $inputs['nombre_tercero'];
  $datosiva['Base'] = $inputs['base_gravable'];
  $datosiva['Concepto'] = $inputs['concepto'];
  $datosiva['Porcentaje'] = $inputs['porcentaje'];
  $datosiva['Retenido'] = $inputs['valor_retenido'];
  $datosiva['Ano'] = $inputs['anio'];
  $datosiva['Ciudad_Expedido'] = $inputs['ciudad_expedido'];
  $datosiva['Ciudad_Pago'] = $inputs['ciudad_pago'];
  $datosiva['Banco_pago'] = $inputs['banco_pago'];
  $datosiva['fecha_expedicion'] = $inputs['fecha_expedicion'];
  $datosiva['Iva'] = $inputs['valor_iva'];
  $datosiva['Periodo'] = $inputs['periodo'];
   $editiva = Iva::Where('id','=', $inputs['ivaid'])->update($datosiva);
   Session::flash('flash_message','Excelente, registro actualizado!');
            return back()->withInput();
}
public function deleteoneiva($id)
{
        Iva::where('id', $id)->delete();
}

 public function uploadiva(Request $request)
  {
     $inputs = $request->all(); $ano= $inputs['anio'];
     $periodo= $inputs['periodo']; $empresa= $inputs['id_empresa'];
    if(Input::hasFile('excelfile')){
           $path = Input::file('excelfile')->getRealPath();
           $data = Excel::load($path, function($reader) {
           })->get();
           $thereiva=Iva::civa($ano, $periodo, $empresa);
           $thereusers = User::all('nit');
           foreach($thereusers as $therare=>$value){
               $nitsusr[]=$value->nit;
           }
           foreach($thereiva as $therare=>$value){
               $nits[]=$value->nit;
           }
           if (!$thereiva->isEmpty()) {
                     Session::flash('alert_message',"Ya hay información del mismo año, periodo, desea borrarla?. <a href='delinfoiva-".$ano."-".$periodo."'>Si</a>");
                       return back()->withInput();
                 }
           $arrayupdate=[];
           $arrayinsert=[];
           $arraynotfound=[];
           $errores=[];
           $rules = Config::get('Ivarules');
           if(!empty($data) && $data->count() && $empresa != 'todas'){
               foreach ($data as $key => $value) {
                 if(($value->ano != $ano) || ($value->periodo != $periodo) || ($value->id_empresa != $empresa) ){
                   Session::flash('alert_message',"Hay errores en el archivo de excel, por favor verifique el año, el periodo y que el codigo de la empresa coincida con el que desea importar.");
                     return back()->withInput();
                 } else {
                   $valueiva = ['nit' => $value->nit,
                   'id_empresa' => $value->id_empresa,
                   'cuenta' => $value->cuenta,
                   'nombre' => $value->nombre,
                   'concepto' => $value->concepto,
                   'porcentaje' => $value->porcentaje,
                   'base' => $value->base,
                   'iva' => $value->iva,
                   'retenido' => $value->retenido,
                   'ano' => $ano,
                   'periodo' => $periodo,
                   'ciudad_pago' => $value->ciudad_pago,
                   'ciudad_expedido' => $value->ciudad_expedido,
                   'banco_pago' => $value->banco_pago,
                   'ind_iva' => $value->ind_iva,
                   'fecha_expedicion' => $value->fecha_expedicion];
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
           Session::flash('alert_message',"Ya hay información del mismo año y periodo,"
                   . " desea borrarla?. <a href='delinfoiva-".$ano."-".$periodo."'>Si</a>");
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
             DB::table('ivas')->insert($arraysmall);
           }
          }
          DB::table('registros')->insert(
               ['nit' => Auth::user()->Nit, 'usuario' => Auth::user()->name,
               'fecha' => date("Y/m/d"), 'hora' => date("h:i:s"), 'anio'=>$ano,
               'accion'=> 'Importó Iva', 'hasta'=>date("Y/m/d"), 'periodo'=>$periodo]
           );

           $resultado[] =['inserteds' => $inserteds,
           'updates' => $updates,'errores' => '0'];

           if($usercount > 0){
             $request->session()->put('arraynotfound', $arraynotfound);
             return view('Iva.resultusers',compact('arraynotfound'),['ano' => $ano])
             ->with('resultado', $resultado)->with('periodo',$periodo);
           }

            return back()->with('resultado', $resultado);

          } elseif (!empty($data) && $data->count() && $empresa == 'todas') {
              foreach ($data as $key => $value) {
                 if(($value->ano != $ano) || ($value->periodo != $periodo)){
                   Session::flash('alert_message',"Hay errores en el archivo de excel, por favor verifique el año, el periodo y que el codigo de la empresa coincida con el que desea importar.");
                     return back()->withInput();
                 } else {
                   $valueiva = ['nit' => $value->nit,
                   'id_empresa' => $value->id_empresa,
                   'cuenta' => $value->cuenta,
                   'nombre' => $value->nombre,
                   'concepto' => $value->concepto,
                   'porcentaje' => $value->porcentaje,
                   'base' => $value->base,
                   'iva' => $value->iva,
                   'retenido' => $value->retenido,
                   'ano' => $ano,
                   'periodo' => $periodo,
                   'ciudad_pago' => $value->ciudad_pago,
                   'ciudad_expedido' => $value->ciudad_expedido,
                   'banco_pago' => $value->banco_pago,
                   'ind_iva' => $value->ind_iva,
                   'fecha_expedicion' => $value->fecha_expedicion];
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
           Session::flash('alert_message',"Ya hay información del mismo año y periodo,"
                   . " desea borrarla?. <a href='delinfoiva-".$ano."-".$periodo."'>Si</a>");
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
             DB::table('ivas')->insert($arraysmall);
           }
          }

          DB::table('registros')->insert(
               ['nit' => Auth::user()->Nit, 'usuario' => Auth::user()->name,
               'fecha' => date("Y/m/d"), 'hora' => date("h:i:s"), 'anio'=>$ano,
               'accion'=> 'Importó Iva', 'hasta'=>date("Y/m/d"), 'periodo'=>$periodo]
           );

           $resultado[] =['inserteds' => $inserteds,
           'updates' => $updates,'errores' => '0'];

           if($usercount > 0){
             $request->session()->put('arraynotfound', $arraynotfound);
             return view('Iva.resultusers',compact('arraynotfound'),['ano' => $ano])
             ->with('resultado', $resultado)->with('periodo',$periodo);
           }

            return back()->with('resultado', $resultado);
          }
       }

  }
  public function deleteiva($ano, $periodo)
  {
      $deletedRows = Iva::where('ano', $ano)->where('periodo', $periodo)->delete();
      Session::flash('alert_success',"Información borrada correctamente! Ya puede importar nuevamente la información que corresponda.");
        return back()->withInput();
  }
  public function deunr(Request $request)
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
