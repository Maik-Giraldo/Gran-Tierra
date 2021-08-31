<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Rtf;
use App\Empresa;
use PDF;
use NumberToWords\NumberToWords;
use Excel;
use App\User;
use Session;
use Config;
use Auth;
use Illuminate\Support\Facades\DB;

class RtfController extends Controller
{
    public function downrtf(Request $request)
   {
        $inputs = $request->all();
        $ano= $inputs['anio']; $empresa= $inputs['id_empresa'];
        $nit= $inputs['nit'];
        $datosempr = \App\Empresa::validartf($nit, $ano, $empresa);
        $datosrtf = Rtf::valida($nit, $ano, $empresa);
        $ret = Rtf::ciudadrt($nit, $ano, $empresa);
        foreach ($datosempr as $key => $value) {
          $nempresa  = $value->nombre_empresa;
        }
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('es');
        $sumaretenido   = 0;
        foreach ($datosrtf as $key => $value) {
          $sumaretenido  += $value->Retenido;
        }
       $convertido = $numberTransformer->toWords($sumaretenido);
      if (!$datosrtf->isEmpty()) {
        $pdf = PDF::loadView('voyager::rtf.certificado_rtf',
        compact('datosrtf','ano','datosempr','ret'),['letras' => $convertido]);
        DB::table('registros')->insert(
                ['nit' => Auth::user()->Nit, 'usuario' => Auth::user()->name,
                'fecha' => date("Y/m/d"), 'hora' => date("h:i:s"), 'anio'=>$ano,
                'accion'=> 'Exportó Rtf', 'hasta'=>date("Y/m/d"), 'periodo'=>'1',
                'empresa'=>$nempresa]
            );
        return $pdf->stream('certificado_rtf.pdf',array('Attachment'=>0));
      } else {
        echo "no se trajeron datos"; exit();
      }
   }

   public function rtfreport($nit, $ano, $empresa)
  {
       $datosempr = \App\Empresa::validartf($nit, $ano, $empresa);
       $datosrtf = Rtf::valida($nit, $ano, $empresa);
       $ret = Rtf::ciudadrt($nit, $ano, $empresa);
       foreach ($datosempr as $key => $value) {
         $nempresa  = $value->nombre_empresa;
       }
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('es');
        $sumaretenido   = 0;
        foreach ($datosrtf as $key => $value) {
          $sumaretenido  += $value->Retenido;
        }
       $convertido = $numberTransformer->toWords($sumaretenido);
     if (!$datosrtf->isEmpty()) {
       $pdf = PDF::loadView('voyager::rtf.certificado_rtf',
       compact('datosrtf','ano','datosempr','ret'),['letras' => $convertido]);
       DB::table('registros')->insert(
               ['nit' => Auth::user()->Nit, 'usuario' => Auth::user()->name,
               'fecha' => date("Y/m/d"), 'hora' => date("h:i:s"), 'anio'=>$ano,
               'accion'=> 'Exportó Rtf', 'hasta'=>date("Y/m/d"), 'periodo'=>'1',
                'empresa'=>$nempresa]
           );
       return $pdf->stream('certificado_rtf.pdf',array('Attachment'=>0));
     } else {
       echo "no se trajeron datos"; exit();
     }
  }

  public function rtfimport()
  {
    $empresas = Empresa::get();
    return view('importrtf', compact('empresas'));
  }

  public function buscar(Request $request)
  {
    $rtfs = Rtf::join('empresa', 'rtfs.id_empresa', '=', 'empresa.id_empresa')
            ->filter($request->all())->orderBy('Ano','desc')->paginate(20);
    return view('rtfindex', compact('rtfs'));
  }

  public function find(Request $request)
  {
    $rtfs = Rtf::join('empresa', 'rtfs.id_empresa', '=', 'empresa.id_empresa')
    ->filter($request->all())->orderBy('id','desc')->paginate(20);
    $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
    return view('rtff',compact('rtfs','empresas'));
  }
  public function findf(Request $request)
  {
    $rtfs = Rtf::join('empresa', 'rtfs.id_empresa', '=', 'empresa.id_empresa')
    ->filter($request->all())->where('Nit','=', Auth::user()->Nit)->orderBy('id','desc')->paginate(20);
    $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
    return view('rtf',compact('rtfs','empresas'));
  }
  public function uploadrtf(Request $request)
  {
     $inputs = $request->all(); $ano= $inputs['anio'];
     $empresa= $inputs['id_empresa'];
    if(Input::hasFile('excelfile')){
           $path = Input::file('excelfile')->getRealPath();
           $data = Excel::load($path, function($reader) {
           })->get();
           $thereusers = User::all('nit');
           foreach($thereusers as $therare=>$value){
               $nitsusr[]=$value->nit;
           }
           $therertf=Rtf::crtf($ano, 1, $empresa);
           if (!$therertf->isEmpty()) {
                   Session::flash('alert_message',"Ya hay información del mismo año y periodo, desea borrarla?. <a href='delinfortf-".$ano."'>Si</a>");
                     return back()->withInput();
                 }
           foreach($therertf as $therare=>$value){
               $nits[]=$value->nit;
           }
           $arrayupdate=[];
           $arrayinsert=[];
           $arraynotfound=[];
           $errores=[];
//            $rules = Config::get('Rtfrules');
           if(!empty($data) && $data->count() && $empresa != 'todas'){
               foreach ($data as $key => $value) {
                 if(($value->ano != $ano) || ($value->id_empresa != $empresa)){
                   Session::flash('alert_message',"Hay errores en el archivo de excel, por favor verifique que el año o empresa.");
                    return back()->withInput();
                 } else {
                   $valuertf = ['nit' => $value->nit,
                   'id_empresa' => $value->id_empresa,
                   'cuenta' => $value->cuenta,
                   'nombre' => $value->nombre,
                   'concepto' => $value->concepto,
                   'porcentaje' => $value->porcentaje,
                   'base' => $value->base,
                   'retenido' => $value->retenido,
                   'ano' => $ano,
                   'Mes' => '1',
                   'ciudad_pago' => $value->ciudad_pago,
                   'ciudad_expedido' => $value->ciudad_expedido,
                   'fecha_expedicion' => $value->fecha_expedicion,
                   'banco_pago' => $value->banco_pago];

                    if (!in_array($valuertf['nit'],$nitsusr)) {
                          $arraynotfound=array_prepend($arraynotfound,$valuertf);
                       }
                    $arrayinsert=array_prepend($arrayinsert,$valuertf);
       }
     }
       $updates= 0;
       $usercount= 0;
       $usercount = count($arraynotfound);
       $inserteds = count($arrayinsert);

       if (!($inserteds)){ $inserteds = '0'; }
           if (!empty($arrayinsert)){
           $arraybig=(array_chunk($arrayinsert, 10));
           foreach($arraybig as $arraysmall){
             DB::table('rtfs')->insert($arraysmall);
           }
          }
          DB::table('registros')->insert(
               ['nit' => Auth::user()->Nit, 'usuario' => Auth::user()->name,
               'fecha' => date("Y/m/d"), 'hora' => date("h:i:s"), 'anio'=>$ano,
               'accion'=> 'Importó Rtf', 'hasta'=>date("Y/m/d"), 'periodo'=>1]
           );
           $resultado[] =['inserteds' => $inserteds,
           'updates' => $updates,'errores' => '0'];

           if($usercount > 0){
             $request->session()->put('arraynotfound', $arraynotfound);
             return view('rtf.resultusers',compact('arraynotfound'))
             ->with('resultado', $resultado);
           }

            return back()->with('resultado', $resultado);
          } elseif(!empty($data) && $data->count() && $empresa == 'todas'){
              foreach ($data as $key => $value) {
                 if($value->ano != $ano){
                   Session::flash('alert_message',"Hay errores en el archivo de excel, por favor verifique que el año o empresa.");
                    return back()->withInput();
                 } else {
                   $valuertf = ['nit' => $value->nit,
                   'id_empresa' => $value->id_empresa,
                   'cuenta' => $value->cuenta,
                   'nombre' => $value->nombre,
                   'concepto' => $value->concepto,
                   'porcentaje' => $value->porcentaje,
                   'base' => $value->base,
                   'retenido' => $value->retenido,
                   'ano' => $ano,
                   'Mes' => '1',
                   'ciudad_pago' => $value->ciudad_pago,
                   'ciudad_expedido' => $value->ciudad_expedido,
                   'fecha_expedicion' => $value->fecha_expedicion,
                   'banco_pago' => $value->banco_pago];

                    if (!in_array($valuertf['nit'],$nitsusr)) {
                          $arraynotfound=array_prepend($arraynotfound,$valuertf);
                       }
                    $arrayinsert=array_prepend($arrayinsert,$valuertf);
       }
     }
       $updates= 0;
       $usercount= 0;
       $usercount = count($arraynotfound);
       $inserteds = count($arrayinsert);

       if (!($inserteds)){ $inserteds = '0'; }
           if (!empty($arrayinsert)){
           $arraybig=(array_chunk($arrayinsert, 10));
           foreach($arraybig as $arraysmall){
             DB::table('rtfs')->insert($arraysmall);
           }
          }
          DB::table('registros')->insert(
               ['nit' => Auth::user()->Nit, 'usuario' => Auth::user()->name,
               'fecha' => date("Y/m/d"), 'hora' => date("h:i:s"), 'anio'=>$ano,
               'accion'=> 'Importó Rtf', 'hasta'=>date("Y/m/d"), 'periodo'=>1]
           );
           $resultado[] =['inserteds' => $inserteds,
           'updates' => $updates,'errores' => '0'];

           if($usercount > 0){
             $request->session()->put('arraynotfound', $arraynotfound);
             return view('rtf.resultusers',compact('arraynotfound'))
             ->with('resultado', $resultado);
           }

            return back()->with('resultado', $resultado);
          }
       }

   }

 public function deletertf($ano)
 {
     $deletedRows = Rtf::where('ano', $ano)->delete();
     Session::flash('alert_success',"Información borrada correctamente! Ya puede importar nuevamente la información que corresponda.");
       return back()->withInput();
 }
  public function rtfindex()
 {
   $rtfs = DB::table('rtfs')
             ->join('empresa', 'rtfs.id_empresa', '=', 'empresa.id_empresa')
             ->orderBy('Ano','desc')
             ->paginate(20);
   return view('rtfindex', compact('rtfs'));
 }

 public function rtfcreate()
 {
   $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
   return view('rtfcreate', compact('empresas'));
 }

 public function rtfcreateone(Request $request)
 {
 $inputs = $request->all();
 $datosrtf = array();
 $datosrtf['Nit'] = $inputs['nit_tercero'];
 $datosrtf['Nombre'] = $inputs['nombre_tercero'];
 $datosrtf['Base'] = $inputs['base_gravable'];
 $datosrtf['Concepto'] = $inputs['concepto'];
 $datosrtf['Porcentaje'] = $inputs['porcentaje'];
 $datosrtf['Retenido'] = $inputs['valor_retenido'];
 $datosrtf['Ano'] = $inputs['anio'];
 $datosrtf['Ciudad_Expedido'] = $inputs['ciudad_expedido'];
 $datosrtf['Ciudad_Pago'] = $inputs['ciudad_pago'];
 $datosrtf['fecha_expedicion'] = $inputs['fecha_expedicion'];
 $datosrtf['id_empresa'] = $inputs['id_empresa'];
 $datosrtf['Mes'] = $inputs['periodo'];
  $icaid = Rtf::create($datosrtf);
  Session::flash('flash_message','Excelente, registro insertado!');
           return back()->withInput();
 }

 public function rtfview($id)
 {
  $datartf = Rtf::join('empresa', 'rtfs.id_empresa', '=', 'empresa.id_empresa')
  ->where('id','=',$id)->get();
  return view('viewrtf',compact('datartf'));
 }
 public function rtfedit($id)
 {
  $datartf = Rtf::join('empresa', 'rtfs.id_empresa', '=', 'empresa.id_empresa')
  ->where('id','=',$id)->get();
  $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
  return view('editrtf',compact('datartf', 'empresas'),['rtfid' => $id]);
 }
 public function updateonertf(Request $request)
 {
   $inputs = $request->all();
   $datosrtf = array();
   $datosrtf['Nit'] = $inputs['nit_tercero'];
   $datosrtf['Nombre'] = $inputs['nombre_tercero'];
   $datosrtf['Base'] = $inputs['base_gravable'];
   $datosrtf['Concepto'] = $inputs['concepto'];
   $datosrtf['Porcentaje'] = $inputs['porcentaje'];
   $datosrtf['Retenido'] = $inputs['valor_retenido'];
   $datosrtf['Ano'] = $inputs['anio'];
   $datosrtf['Ciudad_Expedido'] = $inputs['ciudad_expedido'];
   $datosrtf['Ciudad_Pago'] = $inputs['ciudad_pago'];
   $datosrtf['fecha_expedicion'] = $inputs['fecha_expedicion'];
   $datosrtf['Mes'] = $inputs['periodo'];
    $editiva = Rtf::Where('id','=', $inputs['rtfid'])->update($datosrtf);
    Session::flash('flash_message','Excelente, registro actualizado!');
             return back()->withInput();
 }
 public function deleteonertf($id)
 {
         Rtf::where('id', $id)->delete();
 }
 public function rtfdeunr(Request $request)
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
