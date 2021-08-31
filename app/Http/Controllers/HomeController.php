<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Iva;
use App\Ica;
use App\Rtf;
use App\Accionista;
use App\Proveedor;
use DB;
use Hash;
use App\Noticia;
use Illuminate\Support\Facades\Mail;
use App\Mail\Soporte;
use Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role_id == 4 ){
          $usuarios = User::orderBy('id','desc')->paginate(20);
          return view('usuarios.list', compact('usuarios'),['usersf' => 'todos']);
        } else {
            if(Auth::user()->uploaded != 0 ){
              return redirect('cambiarclave');
            }
          $noticias = Noticia::orderBy('updated_at', 'desc')->paginate(9);
          return view('noticias.lista', compact('noticias'));
      }
    }
    public function showChangePasswordForm(){
      return view('auth.changepassword');
    }
    public function cambiaclave(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","La clave ingresada no coincide con la almacenada en el sistema. Por favor intenta nuevamente.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","La nueva clave no puede ser igual a la que tienes actualmente. Por favor ingresa una clave diferente.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->uploaded = 0;
        $user->save();
        return redirect('home')->with("alert_success","Clave actualizada exitosamente!");
    }
    public function politicas()
    {
        return view('politicas');
    }
    public function normatividad()
    {
          return view('normatividad');
    }
    public function manual()
    {
      $manual_admin = public_path("/docs/manual_admin.pdf");
      $manual_proveedor = public_path("/docs/manual_proveedor.pdf");
      $headers = ['Content-Type: application/pdf'];
          if(Auth::user()->role_id != 3 ){
            return response()->download($manual_admin, 'manual_admin.pdf', $headers, 'inline');
            } else {
            return response()->download($manual_proveedor, 'manual_proveedor.pdf', $headers, 'inline');
            }
    }
    public function ivaexport()
    {
      if(Auth::user()->role_id == 4 ){
        $ivas = Iva::join('empresa', 'ivas.id_empresa', '=', 'empresa.id_empresa')
          ->orderBy('Ano','desc')->paginate(20);
        $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
        // $anios = DB::table('anios')->orderBy('anios','desc')->get();
        return view('ivaf',compact('ivas','empresas'));
      } else {
      $nit_user = Auth::user()->Nit;
      $ivas = Iva::join('empresa', 'ivas.id_empresa', '=', 'empresa.id_empresa')
        ->where('Nit', $nit_user)
        ->orderBy('Ano','desc')->paginate(20);
      $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
      return view('Iva.ivaexport',compact('ivas','empresas'));
      }
    }
    public function ica()
    {
      $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
      if(Auth::user()->role_id == 4 ){
        $icas = Ica::join('empresa', 'icas.id_empresa', '=', 'empresa.id_empresa')
          ->orderBy('Ano','desc')->paginate(20);
        return view('icaf',compact('icas','empresas'));
      } else {
      $nit_user = Auth::user()->Nit;
      $icas = Ica::buscar($nit_user)->paginate(20);
      return view('ica',compact('icas','empresas'));
    }
    }
    public function rtf()
    {
      if(Auth::user()->role_id == 4 ){
        $rtfs = Rtf::join('empresa', 'rtfs.id_empresa', '=', 'empresa.id_empresa')
          ->orderBy('Ano','desc')->paginate(20);
        $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
        return view('rtff',compact('rtfs','empresas'));
      } else {
        $nit_user = Auth::user()->Nit;
        $rtfs = Rtf::buscar($nit_user)->paginate(20);
        $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
        return view('rtf',compact('rtfs','empresas'));
      }
    }
    public function accionista()
    {
      $empresas = DB::table('empresa')->orderBy('id_empresa','desc')->get();
      if(Auth::user()->role_id == 4 ){
        $accionistas = Accionista::join('empresa', 'accionistas.id_empresa', '=', 'empresa.id_empresa')
          ->orderBy('id','desc')->paginate(20);
        return view('accionista.accionistaf',compact('accionistas','empresas'));
      } else {
        $nit_user = Auth::user()->Nit;
        $accionistas = Accionista::buscar($nit_user)->paginate(20);
        return view('accionista.accionista',compact('accionistas','empresas'));
      }
    }
    public function editprofile()
    {
        return view('editprofile');
    }
    public function edusrprof()
    {
        return view('edituserprofile');
    }
    public function soporte()
    {
        return view('soporte');
    }
    public function soportesf()
    {
        return view('sgf.soportesf');
    }
    public function mailsoporte(Request $request)
    {
        $datamail = array_except($request->all(),'_token');
        Mail::to('webmaster@actituddigital.com')->send(new Soporte($datamail));
        Session::flash('flash_message','Gracias! en breve nos pondremos en contacto contigo.');
        return back()->withInput();
    }
    public function savedata(Request $request)
   {
      $clave = $request->input('password');
      if (!is_null($clave)) {
            User::where('id', $request->input('id'))
            ->update([  'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'Ciudad' => $request->input('Ciudad'),
                        'Direccion' => $request->input('Direccion'),
                        'ciiu' => $request->input('ciiu'),
                        'Tel' => $request->input('Tel'),
                        'password' =>  bcrypt($request->input('password'))
                ]);
        } else {
            User::where('id', $request->input('id'))
            ->update([  'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'Ciudad' => $request->input('Ciudad'),
                        'Direccion' => $request->input('Direccion'),
                        'ciiu' => $request->input('ciiu'),
                        'Tel' => $request->input('Tel')
                ]);
        }
        Session::flash('flash_message','Perfil Actualizado!');
        return redirect()->route('editar-perfil');
    }
    public function infoproveedor()
    {
      if(Auth::user()->role_id == 4 ){
        return redirect()->route('home');
      } else {
        $dataprv = Proveedor::Where('numero_nit_cc','=',Auth::user()->Nit)->get();
        foreach($dataprv as $prov){ $razon_social = $prov->nombre_razon_social;  }
        return view('proveedor.viewiproveedor', compact('dataprv') ,['razon_social' => $razon_social]);
      }
    }
    public function documentosoporte()
    {
      if(Auth::user()->role_id == 4 ){
        return redirect()->route('home');
      } else {
        $dataprv = Proveedor::Where('numero_nit_cc','=',Auth::user()->Nit)->get();
        foreach($dataprv as $prov){ $razon_social = $prov->nombre_razon_social;  }
        return view('proveedor.documentosoporte', compact('dataprv') ,['razon_social' => $razon_social]);
      }
    }
}
