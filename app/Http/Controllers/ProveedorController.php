<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use Session;
use Auth;

class ProveedorController extends Controller
{
  public function crear()
  {
      return view('proveedor.regproveedor');
  }
  public function registrar(Request $request)
  {
    $dataprv = array_except($request->all(),'_token');
    $destinationPath = public_path().'/images/proveedores';
    $request->validate([
    'doc_rut' => 'required|max:2024',
    'doc_certificado_existencia_representacion' => 'required|max:2024',
    'doc_certificacion_bancaria' => 'required|max:2024',
    'doc_cedula_rep_legal' => 'required|max:2024',
    'doc_referencia_comercial_1' => 'required|max:2024',
    'doc_referencia_comercial_2' => 'required|max:2024',
    ]);
    if ($request->hasFile('doc_rut')) {
      $doc_rut = $request->file('doc_rut');
      $namerut=str_random(5).$doc_rut->getClientOriginalName();
      $doc_rut->move($destinationPath,$namerut);
      array_set($dataprv, 'doc_rut', $namerut);
    }
    if ($request->hasFile('doc_certificado_existencia_representacion')) {
      $dcer = $request->file('doc_certificado_existencia_representacion');
      $namedcer=str_random(5).$dcer->getClientOriginalName();
      $dcer->move($destinationPath,$namedcer);
      array_set($dataprv, 'doc_certificado_existencia_representacion', $namedcer);
    }
    if ($request->hasFile('doc_certificacion_bancaria')) {
      $dcb = $request->file('doc_certificacion_bancaria');
      $namedcb=str_random(5).$dcb->getClientOriginalName();
      $dcb->move($destinationPath,$namedcb);
      array_set($dataprv, 'doc_certificacion_bancaria', $namedcb);
    }
    if ($request->hasFile('doc_cedula_rep_legal')) {
      $dcrl = $request->file('doc_cedula_rep_legal');
      $namedcrl=str_random(5).$dcrl->getClientOriginalName();
      $dcrl->move($destinationPath,$namedcrl);
      array_set($dataprv, 'doc_cedula_rep_legal', $namedcrl);
    }
    if ($request->hasFile('doc_referencia_comercial_1')) {
      $drc1 = $request->file('doc_referencia_comercial_1');
      $namedrc1=str_random(5).$drc1->getClientOriginalName();
      $drc1->move($destinationPath,$namedrc1);
      array_set($dataprv, 'doc_referencia_comercial_1', $namedrc1);
    }
    if ($request->hasFile('doc_referencia_comercial_2')) {
      $drc2 = $request->file('doc_referencia_comercial_2');
      $namedrc2=str_random(5).$drc2->getClientOriginalName();
      $drc2->move($destinationPath,$namedrc2);
      array_set($dataprv, 'doc_referencia_comercial_2', $namedrc2);
    }
    $icaid = Proveedor::create($dataprv);
    Session::flash('flash_message','Excelente, registro insertado!');
             return back()->withInput();
  }
  public function listar()
  {
      $proveedores = Proveedor::sortable()->paginate(20);
      return view('proveedor.proveedores', compact('proveedores'));
  }
  public function veruno($id)
  {
      $dataprv = Proveedor::Where('id','=',$id)->get();
      foreach($dataprv as $prov){ $razon_social = $prov->nombre_razon_social;  }
      return view('proveedor.viewproveedor', compact('dataprv') ,['razon_social' => $razon_social]);
  }
  public function editar($id)
  {
      $dataprv = Proveedor::Where('id','=',$id)->get();
      foreach($dataprv as $prov){ $razon_social = $prov->nombre_razon_social;  }
      return view('proveedor.editarprvdr', compact('dataprv') ,['razon_social' => $razon_social]);
  }
  public function editiproveedor()
  {
      $dataprv = Proveedor::Where('numero_nit_cc','=',Auth::user()->Nit)->get();
      foreach($dataprv as $prov){ $razon_social = $prov->nombre_razon_social;  }
      return view('proveedor.editiproveedor', compact('dataprv') ,['razon_social' => $razon_social]);
  }
  public function soldocusoporte(Request $request)
  {
      $dataprv = Proveedor::Where('numero_nit_cc','=',Auth::user()->Nit)->get();
      $bienesoserv = $request->input('bienes');
      $valor_total = $request->input('valor_total');
      foreach($dataprv as $prov){ $razon_social = $prov->nombre_razon_social;  }
      return view('proveedor.docusuccess', compact('dataprv') ,['razon_social' => $razon_social, 'bienes' => $bienesoserv, 'valor_total' => $valor_total]);
  }
  public function actualizar(Request $request)
  {
    $dataprv= array_except($request->all(),'_token');
    $destinationPath = public_path().'/images/proveedores';
    $request->validate([
    'doc_rut' => 'max:2024',
    'doc_certificado_existencia_representacion' => 'max:2024',
    'doc_certificacion_bancaria' => 'max:2024',
    'doc_cedula_rep_legal' => 'max:2024',
    'doc_referencia_comercial_1' => 'max:2024',
    'doc_referencia_comercial_2' => 'max:2024',
    ]);
    if ($request->hasFile('doc_rut')) {
      $doc_rut = $request->file('doc_rut');
      $namerut=str_random(5).$doc_rut->getClientOriginalName();
      $doc_rut->move($destinationPath,$namerut);
      array_set($dataprv, 'doc_rut', $namerut);
    }
    if ($request->hasFile('doc_certificado_existencia_representacion')) {
      $dcer = $request->file('doc_certificado_existencia_representacion');
      $namedcer=str_random(5).$dcer->getClientOriginalName();
      $dcer->move($destinationPath,$namedcer);
      array_set($dataprv, 'doc_certificado_existencia_representacion', $namedcer);
    }
    if ($request->hasFile('doc_certificacion_bancaria')) {
      $dcb = $request->file('doc_certificacion_bancaria');
      $namedcb=str_random(5).$dcb->getClientOriginalName();
      $dcb->move($destinationPath,$namedcb);
      array_set($dataprv, 'doc_certificacion_bancaria', $namedcb);
    }
    if ($request->hasFile('doc_cedula_rep_legal')) {
      $dcrl = $request->file('doc_cedula_rep_legal');
      $namedcrl=str_random(5).$dcrl->getClientOriginalName();
      $dcrl->move($destinationPath,$namedcrl);
      array_set($dataprv, 'doc_cedula_rep_legal', $namedcrl);
    }
    if ($request->hasFile('doc_referencia_comercial_1')) {
      $drc1 = $request->file('doc_referencia_comercial_1');
      $namedrc1=str_random(5).$drc1->getClientOriginalName();
      $drc1->move($destinationPath,$namedrc1);
      array_set($dataprv, 'doc_referencia_comercial_1', $namedrc1);
    }
    if ($request->hasFile('doc_referencia_comercial_2')) {
      $drc2 = $request->file('doc_referencia_comercial_2');
      $namedrc2=str_random(5).$drc2->getClientOriginalName();
      $drc2->move($destinationPath,$namedrc2);
      array_set($dataprv, 'doc_referencia_comercial_2', $namedrc2);
    }
    $editprv = Proveedor::Where('id','=', $dataprv['id'])->update($dataprv);
    Session::flash('flash_message','Excelente, datos actualizados!');
             // return back()->withInput();
    if(Auth::user()->role_id == 4 ){
        return back()->withInput();
      } else {
      	return redirect()->route('inscripcion-proveedor');
      }
  }
  public function deleteoneprv($id)
  {
          Proveedor::where('id', $id)->delete();
  }
  public function sinrevisar()
  {
      $proveedores = Proveedor::where('estado','=','Sin revisar')->sortable()->paginate(20);
      return view('prvsinrevi', compact('proveedores'));
  }

  public function buscar(Request $request)
  {
    $proveedores = Proveedor::filter($request->all())->sortable()->paginate(20);
    return view('proveedor.proveedoresrch', compact('proveedores'));
  }
  public function updtstatus($id, $status)
  {
    Proveedor::Where('id','=', $id)->update(['estado' => $status]);
    Session::flash('flash_message','Estado de Proveedor actualizado a: '.$status);
    return back()->withInput();
  }

}
