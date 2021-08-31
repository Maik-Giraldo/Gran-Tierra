<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Accionista;
use App\Empresa;
use PDF;
use NumberToWords\NumberToWords;
use Excel;
use App\User;
use Session;
use Config;
use Auth;
use Illuminate\Support\Facades\DB;

class AccionistaController extends Controller
{
  public function downaccionista(Request $request)
 {
      $inputs = $request->all();
      $ano= $inputs['anio']; $empresa= $inputs['id_empresa'];
      $nit= $inputs['nit'];
      $datosempr = \App\Empresa::validaaccionista($nit, $ano, $empresa);
      $datosaccionista = Accionista::valida($nit, $ano, $empresa);
      $ret = Accionista::ciudadrt($nit, $ano, $empresa);
      $numberToWords = new NumberToWords();
      $numberTransformer = $numberToWords->getNumberTransformer('es');
      foreach ($datosempr as $key => $value) {
        $nempresa  = $value->nombre_empresa;
      }
      if (!$datosaccionista->isEmpty()) {
        $pdf = PDF::loadView('voyager::accionista.certificado_accionista',
        compact('datosaccionista','ano','datosempr','ret'),['letrasnominal' => $numberTransformer, 'viv' => $numberTransformer]
        );
        DB::table('registros')->insert(
                ['nit' => Auth::user()->Nit, 'usuario' => Auth::user()->name,
                'fecha' => date("Y/m/d"), 'hora' => date("h:i:s"), 'anio'=>$ano,
                'accion'=> 'Exportó accionista', 'hasta'=>date("Y/m/d"), 'periodo'=>'1',
                'empresa'=>$nempresa]
            );
        return $pdf->stream('certificado_accionista.pdf',array('Attachment'=>0));
      } else {
        echo "no se trajeron datos"; exit();
      }
 }

 public function accionistareport($nit, $ano, $empresa)
{
     $datosempr = \App\Empresa::validaaccionista($nit, $ano, $empresa);
     $datosaccionista = Accionista::valida($nit, $ano, $empresa);
     $ret = Accionista::ciudadrt($nit, $ano, $empresa);
     $numberToWords = new NumberToWords();
     $numberTransformer = $numberToWords->getNumberTransformer('es');
     $valor_nominal = 0;
     $valor_intrinseco_valorizado = 0;
     foreach ($datosaccionista as $key => $value) {
       $valor_nominal  += $value->Valor_Nominal;
       $valor_intrinseco_valorizado  += $value->Valor_Intrinseco_Valorizado;
     }
     foreach ($datosempr as $key => $value) {
       $nempresa  = $value->nombre_empresa;
     }
     if (!$datosaccionista->isEmpty()) {
       $pdf = PDF::loadView('voyager::accionista.certificado_accionista',
       compact('datosaccionista','ano','datosempr','ret'),['letrasnominal' => $numberTransformer, 'viv' => $numberTransformer]);
       DB::table('registros')->insert(
               ['nit' => Auth::user()->Nit, 'usuario' => Auth::user()->name,
               'fecha' => date("Y/m/d"), 'hora' => date("h:i:s"), 'anio'=>$ano,
               'accion'=> 'Exportó accionista', 'hasta'=>date("Y/m/d"), 'periodo'=>'1',
                'empresa'=>$nempresa]
           );
     return $pdf->stream('certificado_accionista.pdf',array('Attachment'=>0));
      } else {
     echo "no se trajeron datos"; exit();
   }
}

public function accionistaimport()
{
  $empresas = Empresa::get();
  return view('accionista.importaccionista', compact('empresas'));
}

public function buscar(Request $request)
{
  $accionistas = Accionista::join('empresa', 'accionistas.id_empresa', '=', 'empresa.id_empresa')
          ->filter($request->all())->orderBy('id','desc')->paginate(20);
  return view('accionista.accionistaindex', compact('accionistas'));
}

public function find(Request $request)
{
  $accionistas = Accionista::join('empresa', 'accionistas.id_empresa', '=', 'empresa.id_empresa')
  ->filter($request->all())->orderBy('id','desc')->paginate(20);
  $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
  return view('accionista.accionistaf',compact('accionistas','empresas'));
}
public function findf(Request $request)
{
  $accionistas = Accionista::join('empresa', 'accionistas.id_empresa', '=', 'empresa.id_empresa')->filter($request->all())->where('Nit_accionista','=', Auth::user()->Nit)->orderBy('id','desc')->paginate(20);
  $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
  return view('accionista.accionista',compact('accionistas','empresas'));
}
public function uploadaccionista(Request $request)
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
         $thereaccionista=Accionista::caccionista($ano, 1, $empresa);
         if (!$thereaccionista->isEmpty()) {
                 Session::flash('alert_message',"Ya hay información de la misma empresa, del mismo año y periodo, desea borrarla?. <a href='delinfoaccionista-".$ano."'>Si</a>");
                   return back()->withInput();
               }
         foreach($thereaccionista as $therare=>$value){
             $nits[]=$value->nit;
         }
         $arrayupdate=[];
         $arrayinsert=[];
         $arraynotfound=[];
         $errores=[];
         $rules = Config::get('Acntrules');
         if(!empty($data) && $data->count()){
             foreach ($data as $key => $value) {
               if(($value->ano != $ano)){
                 Session::flash('alert_message',"Hay errores en el archivo de excel, por favor verifique el año, periodo o empresa.");
                  return back()->withInput();
               } else {
                 $valueaccionista = ['nit_accionista' => $value->nit_accionista,
                 'id_empresa' => $value->id_empresa,
                 'accionista' => $value->accionista,
                 'cantidad' => $value->cantidad,
                 'tipo' => $value->tipo,
                 'valor_nominal' => $value->valor_nominal,
                 'valor_intrinseco_valorizado' => $value->valor_intrinseco_valorizado,
                 'valor_intrinseco_sin_valorizar' => $value->valor_intrinseco_sin_valorizar,
                 'total_utilidades_2016_anteriores' => $value->total_utilidades_2016_anteriores,
                 'total_utilidades_2017_siguientes' => $value->total_utilidades_2017_siguientes,
                 'gravado_utilidades_2016_anteriores' => $value->gravado_utilidades_2016_anteriores,
                 'gravado_utilidades_2017_siguientes' => $value->gravado_utilidades_2017_siguientes,
                 'no_gravado_utilidades_2016_anteriores' => $value->no_gravado_utilidades_2016_anteriores,
                 'no_gravado_utilidades_2017_siguientes' => $value->no_gravado_utilidades_2017_siguientes,
                 'rtf_utilidades_2016_anteriores' => $value->rtf_utilidades_2016_anteriores,
                 'total_utilidades_2017_siguientes' => $value->total_utilidades_2017_siguientes,
                 'rtf_utilidades_2017_siguientes' => $value->rtf_utilidades_2017_siguientes,
                 'ano' => $ano,
                 'direccion' => $value->direccion,
                 'contador' => $value->contador,
                 'ciudad_expedido' => $value->ciudad_expedido,
                 'tp_no' => $value->tp_no,
                 'fecha_expedicion' => $value->fecha_expedicion
               ];
                  if (!in_array($valueaccionista['nit_accionista'],$nitsusr)) {
                        $arraynotfound=array_prepend($arraynotfound,$valueaccionista);
                     }
                  $arrayinsert=array_prepend($arrayinsert,$valueaccionista);
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
           DB::table('accionistas')->insert($arraysmall);
         }
        }
        DB::table('registros')->insert(
             ['nit' => Auth::user()->Nit, 'usuario' => Auth::user()->name,
             'fecha' => date("Y/m/d"), 'hora' => date("h:i:s"), 'anio'=>$ano,
             'accion'=> 'Importó accionista', 'hasta'=>date("Y/m/d"), 'periodo'=>1]
         );
         $resultado[] =['inserteds' => $inserteds,
         'updates' => $updates,'errores' => '0'];

         if($usercount > 0){
           $request->session()->put('arraynotfound', $arraynotfound);
           return view('accionista.resultusers',compact('arraynotfound'))
           ->with('resultado', $resultado);
         }

          return back()->with('resultado', $resultado);
        }
     }

 }

public function deleteaccionista($ano)
{
   $deletedRows = Accionista::where('ano', $ano)->delete();
   Session::flash('alert_success',"Información borrada correctamente! Ya puede importar nuevamente la información que corresponda.");
     return back()->withInput();
}
public function accionistaindex()
{
 $accionistas = DB::table('accionistas')
           ->join('empresa', 'accionistas.id_empresa', '=', 'empresa.id_empresa')
           ->orderBy('id','desc')
           ->paginate(20);
 return view('accionista.accionistaindex', compact('accionistas'));
}

public function accionistacreate()
{
 $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
 return view('accionista.accionistacreate', compact('empresas'));
}

public function accionistacreateone(Request $request)
{
$inputs = $request->all();
$datosaccionista = array();
$datosaccionista['Nit_accionista'] = $inputs['nit_accionista'];
$datosaccionista['id_empresa'] = $inputs['id_empresa'];
$datosaccionista['Accionista'] = $inputs['accionista'];
$datosaccionista['Cantidad'] = $inputs['cantidad'];
$datosaccionista['Valor_Nominal'] = $inputs['valor_nominal'];
$datosaccionista['Tipo'] = $inputs['tipo'];
$datosaccionista['Contador'] = $inputs['contador'];
$datosaccionista['Valor_Intrinseco_Valorizado'] = $inputs['valor_intrinseco_valorizado'];
$datosaccionista['Valor_Intrinseco_Sin_Valorizar'] = $inputs['valor_intrinseco_sin_valorizar'];
$datosaccionista['total_utilidades_2016_anteriores'] = $inputs['total_utilidades_2016_anteriores'];
$datosaccionista['total_utilidades_2017_siguientes'] = $inputs['total_utilidades_2017_siguientes'];
$datosaccionista['gravado_utilidades_2016_anteriores'] = $inputs['gravado_utilidades_2016_anteriores'];
$datosaccionista['gravado_utilidades_2017_siguientes'] = $inputs['gravado_utilidades_2017_siguientes'];
$datosaccionista['no_gravado_utilidades_2016_anteriores'] = $inputs['no_gravado_utilidades_2016_anteriores'];
$datosaccionista['no_gravado_utilidades_2017_siguientes'] = $inputs['no_gravado_utilidades_2017_siguientes'];
$datosaccionista['rtf_utilidades_2016_anteriores'] = $inputs['valor_intrinseco_sin_valorizar'];
$datosaccionista['rtf_utilidades_2017_siguientes'] = $inputs['rtf_utilidades_2017_siguientes'];
$datosaccionista['direccion'] = $inputs['direccion'];
$datosaccionista['Ciudad_Expedido'] = $inputs['ciudad_expedido'];
$datosaccionista['Ano'] = $inputs['anio'];
$icaid = Accionista::create($datosaccionista);
Session::flash('flash_message','Excelente, registro insertado!');
         return back()->withInput();
}

public function accionistaview($id)
{
$dataaccionista = Accionista::join('empresa', 'accionistas.id_empresa', '=', 'empresa.id_empresa')
->where('id','=',$id)->get();
return view('accionista.viewaccionista',compact('dataaccionista'));
}
public function accionistaedit($id)
{
$dataaccionista = Accionista::join('empresa', 'accionistas.id_empresa', '=', 'empresa.id_empresa')
->where('id','=',$id)->get();
$empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
return view('accionista.editaccionista',compact('dataaccionista', 'empresas'),['accionistaid' => $id]);
}
public function updateoneaccionista(Request $request)
{
 $inputs = $request->all();
 $datosaccionista = array();
 $datosaccionista['Nit_accionista'] = $inputs['nit_accionista'];
 $datosaccionista['Accionista'] = $inputs['accionista'];
 $datosaccionista['Cantidad'] = $inputs['cantidad'];
 $datosaccionista['Valor_nominal'] = $inputs['valor_nominal'];
 $datosaccionista['Tipo'] = $inputs['tipo'];
 $datosaccionista['Valor_Intrinseco_Valorizado'] = $inputs['valor_intrinseco_valorizado'];
 $datosaccionista['Valor_Intrinseco_Sin_Valorizar'] = $inputs['valor_intrinseco_sin_valorizar'];
 $datosaccionista['total_utilidades_2016_anteriores'] = $inputs['total_utilidades_2016_anteriores'];
 $datosaccionista['total_utilidades_2017_siguientes'] = $inputs['total_utilidades_2017_siguientes'];
 $datosaccionista['gravado_utilidades_2016_anteriores'] = $inputs['gravado_utilidades_2016_anteriores'];
 $datosaccionista['gravado_utilidades_2017_siguientes'] = $inputs['gravado_utilidades_2017_siguientes'];
 $datosaccionista['no_gravado_utilidades_2016_anteriores'] = $inputs['no_gravado_utilidades_2016_anteriores'];
 $datosaccionista['no_gravado_utilidades_2017_siguientes'] = $inputs['no_gravado_utilidades_2017_siguientes'];
 $datosaccionista['rtf_utilidades_2016_anteriores'] = $inputs['valor_intrinseco_sin_valorizar'];
 $datosaccionista['rtf_utilidades_2017_siguientes'] = $inputs['rtf_utilidades_2017_siguientes'];
 $datosaccionista['direccion'] = $inputs['direccion'];
 $datosaccionista['Contador'] = $inputs['contador'];
 $datosaccionista['Ano'] = $inputs['anio'];
 $datosaccionista['Ciudad_Expedido'] = $inputs['ciudad_expedido'];
  $editiva = Accionista::Where('id','=', $inputs['accionistaid'])->update($datosaccionista);
  Session::flash('flash_message','Excelente, registro actualizado!');
           return back()->withInput();
}
public function deleteoneaccionista($id)
{
       Accionista::where('id', $id)->delete();
}
public function accionistadeunr(Request $request)
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
