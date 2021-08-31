<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Excel;
use Config;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProveedorActivado;
use App\Mail\ActivateUser;
use Validator;

class UsuarioController extends Controller
{
  public function list()
  {
      $usuarios = User::orderBy('id','desc')->paginate(20);
      return view('usuarios.list', compact('usuarios'),['usersf' => 'todos']);
  }
  public function listitems($items)
  {
      $usuarios = User::orderBy('id','desc')->paginate($items);
      return view('usuarios.list', compact('usuarios'),['usersf' => 'todos']);
  }
  public function listfiladm($items)
  {
      $usuarios = User::where('role_id','=','4')->orderBy('id','desc')->paginate($items);
      return view('usuarios.listadm', compact('usuarios'),['usersf' => 'administradores']);
  }
  public function listfilpro($items)
  {
      $usuarios = User::where('role_id','!=','4')->orderBy('id','desc')->paginate($items);
      return view('usuarios.listpro', compact('usuarios'),['usersf' => 'proveedores']);
  }
  public function emailc($q, $items)
  {
      $usuarios = User::where('email_confirmed','=',$q)->orderBy('id','desc')->paginate($items);
      return view('usuarios.list', compact('usuarios'),['usersf' => 'todos'],['email_confirmed' => $q]);
  }
  public function estado($estado, $items)
  {
      $usuarios = User::where('activo','=',$estado)->orderBy('id','desc')->paginate($items);
      return view('usuarios.list', compact('usuarios'),['usersf' => 'todos'],['estado' => $estado]);
  }
  public function searchu(Request $request)
  {
      $usuarios = User::filter($request->all())->orderBy('id','desc')->paginate(20);
      return view('usuarios.list', compact('usuarios'),['usersf' => 'todos']);
  }
  public function createu(Request $request)
  {
      return view('usuarios.createuser');
  }
  public function crtavonu(Request $request)
  {
      $datauser= array_except($request->all(),'_token');
      $validator = Validator::make($request->all(), [
            'Nit' => 'required|unique:users|max:255',
            'email' => 'required|unique:users',
        ]);
        if ($validator->fails()) {
            return redirect('usuarios/create/form')
                        ->withErrors($validator)
                        ->withInput();
        } else {
          $iduser = User::create($datauser);
          Session::flash('flash_message','se registró el usuario con id: '.$iduser->id.' y con el Nit: '.$iduser->Nit,'.');
                   return back()->withInput();
        }
  }

  public function edit($id)
  {
      $datauser = User::where('id', '=',$id)->get();
      return view('usuarios.edituser', compact('datauser'));
  }
  public function uptavonu(Request $request)
  {
      $datauser= array_except($request->all(),'_token');
      $user = User::where('id', '=',$request->input('id'))->get();
      foreach ($user as $key => $value) {
        $estado = $value->activo;
      }
      if($estado == 0 && $request->input('activo') == 1){
          Mail::to($request->input('email'))->send(new ActivateUser($datauser));
      }
      $clave = $request->input('password');
      if (!is_null($clave)) {
          array_set($datauser, 'password', bcrypt($request->input('password')));
          User::where('id', $request->input('id'))->update($datauser);
      } else {        
          $filtdatauser = array_except($datauser, ['password']);
          User::where('id', $request->input('id'))->update($filtdatauser);
      }
      Session::flash('flash_message','Usuario Actualizado!');
      return back()->withInput();
  }
  public function viewone($id)
  {
      $datauser = User::where('id', '=',$id)->get();
      return view('usuarios.viewuser', compact('datauser'));
  }
  public function permisos($id)
  {
      $datauser = User::where('id', '=',$id)->get();
      return view('usuarios.permisos', compact('datauser'));
  }
  public function uptpermisos(Request $request)
  {
    $datauser= array_except($request->all(),'_token');
      if ($request->has('roles')) {
        User::where('id', '=', $request->input('id_user'))->update(['role_id' => 4]);
      } else {
        User::where('id', $request->input('id_user'))->update(['role_id' => 3]);
      }
      Session::flash('flash_message','Usuario Actualizado!');
      return back()->withInput();
  }

  public function export()
  {
      $datauser = User::where('id', '>',0)->get();
      return Excel::create('listado_usuarios', function($excel) use ($datauser) {
        $excel->sheet('usuarios', function($sheet) use ($datauser)
        {
            $sheet->fromArray($datauser);
        }); })->download('xlsx');
  }

  public function selections(Request $request)
  {
    $datauser= array_except($request->all(),'_token');
    foreach ($datauser as $key => $value) {
      $users_to_delete  = $value;
    }
    User::Wherein('id', $users_to_delete)->delete();
  }
  public function activate(Request $request)
  {
    $datauser= array_except($request->all(),'_token');
    foreach ($datauser as $key => $value) {
      $users_to_delete  = $value;
    }
    User::Wherein('id', $users_to_delete)->update(['activo' => 1]);
  }
  public function desactivate(Request $request)
  {
    $datauser= array_except($request->all(),'_token');
    foreach ($datauser as $key => $value) {
      $users_to_delete  = $value;
    }
    User::Wherein('id', $users_to_delete)->update(['activo' => 0]);
  }

  public function importusr()
  {
      return view('usuarios.importusers');
  }

  public function uploadusers(Request $request)
   {
     $request->validate([
     'excelfile' => 'required|max:2024',
     ]);
     if(Input::hasFile('excelfile')){
            $path = Input::file('excelfile')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            $thereiva=User::all();
            foreach($thereiva as $therare=>$value){
                $nits[]=$value->Nit;
            }
            $arraydelete=[];
            $arrayinsert=[];
            $errores=[];
            $rules = Config::get('Userules');
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $valueusers = ['name' => $value->name,
                    'email' => $value->email,
                    'password' => bcrypt($value->password),
                    'nit' => $value->nit,
                    'tel' => $value->tel,
                    'direccion' => $value->direccion,
                    'activo' => '1',
                    'ciiu' => $value->ciiu,
                    'ciudad' => $value->ciudad,
                    'empresa' => $value->empresa,
                    'email_confirmed' => $value->email_confirmed,
                    ];
                 try {
                $validator = \Validator::make($valueusers, $rules);
                if ($validator->fails()) {
                    $errores=array_prepend($errores,$validator->errors()->all());
                    $errores=array_prepend($errores,$valueusers['nit']);
                }
                else{
                      $arrayinsert=array_prepend($arrayinsert,$valueusers);
                        if (in_array($valueusers['nit'],$nits)) { 
                        $arraydelete=array_prepend($arraydelete,$valueusers['nit']);
                        }
                      }
        } catch (Exception $e) {
            \Log::info('Error Insertando datos: '.$e);
            return \Response::json(['created' => false], 500);
        }
      }
        $inserteds = count($arrayinsert);
        $deleteds = count($arraydelete);

        if (!empty($arraydelete)){
              foreach($arraydelete as $singlearr){    
                DB::table('users')->where('Nit', 'like', $singlearr)
                ->delete();
              }
           }  

        if (!($inserteds)){ $inserteds = '0'; }
            if (!empty($arrayinsert)){
            $arraybig=(array_chunk($arrayinsert, 10));
            foreach($arraybig as $arraysmall){
              DB::table('users')->insert($arraysmall);
            }
           }
           DB::table('registros')->insert(
                ['nit' => Auth::user()->Nit, 'usuario' => Auth::user()->name,
                'fecha' => date("Y/m/d"), 'hora' => date("h:i:s"), 'anio'=>date("Y"),
                'accion'=> 'Importó Usuarios', 'hasta'=>date("Y/m/d"), 'periodo'=>'1']
            );
           if (isset($errores)){
           $errorsitos = json_encode($errores);
           $resultado[] =['inserteds' => $inserteds];
            return view('usuarios.resultados',compact('resultado'))
               ->with('errores', compact('errorsitos'));}
           else {
            $resultado[] =['inserteds' => $inserteds,
            'updates' => $updates,'errores' => '0'];
             return view('usuarios.resultados',compact('resultado'));
           }
        }
        }

   }

  // public function setpass()
  // {
  //     $usuarios = User::where('email_confirmed', '!=',1)->limit(200)->get();
  //     foreach($usuarios as $usuario){
  //       User::where('id', $usuario->id)->update(['password' => bcrypt($usuario->Pass), 'email_confirmed' => 1 ]);
  //     }
  //     return 'Usuarios actualizados!';
  // }
  //  public function setprovider()
  // {
  //     $usuarios = User::where('activo', '!=',5)->limit(600)->get();
  //     foreach($usuarios as $usuario){

  //       DB::table('proveedor')->insert(
  //             ['nombre_razon_social' => $usuario->Empresa, 'telefono' => $usuario->Tel,
  //              'ciudad' => $usuario->Ciudad, 'direccion' => $usuario->Direccion,
  //              'email' => $usuario->email, 'nombre_comercial' => $usuario->Empresa,
  //              'contacto_pedidos' => $usuario->name, 'numero_nit_cc' => $usuario->Nit,
  //              'codigo_ciiu' => $usuario->ciiu ]
  //         );
  //       User::where('id', $usuario->id)->update(['activo' => 5 ]);

  //     }
  //     return 'Usuarios actualizados!';
  // }

}
