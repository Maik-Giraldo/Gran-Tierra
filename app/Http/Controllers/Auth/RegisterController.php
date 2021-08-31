<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Proveedor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Mail\NewProveedor;
use App\Mail\BienvenidoProveedor;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'Nit' => ['required', 'string', 'max:255', 'unique:users'],
            'empresa' => ['required', 'string', 'max:255'],
            'Ciudad' => ['required', 'string', 'max:255'],
            'pais' => ['required', 'string', 'max:255'],
            'tipo_persona' => ['required', 'string', 'max:255'],
            'Direccion' => ['required', 'string', 'max:255'],
            'Tel' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    public function register(Request $request)
    {
    $this->validator($request->all())->validate();
    event(new Registered($user = $this->create($request->all())));
    return redirect($this->redirectTo)->with('message', 'Usuario registrado Exitosamente!
     Su cuenta será activada en el transcurso de 72 horas. Usted recibirá un correo de confirmación cuando esté activado en el sistema. ');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Mail::to($data['email'])->send(new BienvenidoProveedor($data));
        if($data['tipo_persona'] == 'Cliente'){
            Mail::to('administracionseguimientoDOP@Mercacentro.com')->send(new NewProveedor($data));
        } else {
            Mail::to('pagoproveedoresdgc@Mercacentro.com')->send(new NewProveedor($data));
        }        
        Proveedor::create([
            'nombre_razon_social' => $data['name'],
            'telefono' => $data['Tel'],
            'ciudad' => $data['Ciudad'],
            'direccion' => $data['Direccion'],
            'email' => $data['email'],
            'tipo_persona' => $data['tipo_persona'],
            'nombre_comercial' => $data['empresa'],
            'contacto_pedidos' => $data['name'],
            'numero_nit_cc' => $data['Nit'],
            'codigo_ciiu' => $data['ciiu'],
        ]);
        return User::create([
            'name' => $data['name'],
            'role_id' => 3,
            'Empresa' => $data['empresa'],
            'tipo_persona' => $data['tipo_persona'],
            'Nit' => $data['Nit'],
            'email' => $data['email'],
            'Tel' => $data['Tel'],
            'pais' => $data['pais'],
            'Ciudad' => $data['Ciudad'],
            'ciiu' => $data['ciiu'],
            'Direccion' => $data['Direccion'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
