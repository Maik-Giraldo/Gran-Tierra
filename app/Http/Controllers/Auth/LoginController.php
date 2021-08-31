<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Carbon\Carbon;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    function authenticated(Request $request)
    {
      $agent = new Agent();

      \DB::table('user_visit_log')->insert(
            [
            'token' => '5bc0d3d3ee5e7',
            'user_agent' => $request->server('HTTP_USER_AGENT'),
            'user' => Auth::user()->Nit,
            'language' =>  substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2),
            'os' => $agent->platform(),
            'browser' => $agent->browser(),
            'ip' => $request->ip(),
            'visit_time' => Carbon::now(),
            'created_at' => Carbon::now()]
          );
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        $field = $this->field($request);

        return [
            $field => $request->get($this->username()),
            'password' => $request->get('password'),
            'activo'=>'1'
        ];
    }

    /**
     * Determine if the request field is email or username.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function field(Request $request)
    {
        $email = $this->username();

        return filter_var($request->get($email), FILTER_VALIDATE_EMAIL) ? $email : 'Nit';
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $field = $this->field($request);

        $messages = ["{$this->username()}.exists" => 'La cuenta a la que estas intentando ingresar se encuentra inactiva.'];

        $this->validate($request, [
            $this->username() => "required|exists:users,{$field}",
            'password' => 'required',
        ], $messages);
    }
}
