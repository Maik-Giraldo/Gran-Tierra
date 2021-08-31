<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function sendResetLinkEmail(Request $request)
    {
    $this->validate($request, ['email' => 'required|email']);
      $user_check = User::where('email', $request->email)->first();

      if ($user_check->activo != 1 ) {
          return back()->with('error_activation', 'Tu cuenta no ha sido activada por un administrador. Por favor contacta al administrador
          al número: xxxxx ext. xxx o envia un correo a notificaciones@democertiweb.com para que active tu cuenta en el sistema.');
      } else {
          $response = $this->broker()->sendResetLink(
              $request->only('email')
          );

          if ($response === Password::RESET_LINK_SENT) {
              return back()->with('status', trans($response));
          }

          return back()->withErrors(
              ['email' => trans($response)]
          );
      }
    }
}
