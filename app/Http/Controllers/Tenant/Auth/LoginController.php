<?php

namespace App\Http\Controllers\Tenant\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

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

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  protected $redirectTo = '/';

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest:cliente')->except('logout');
  }

  protected function showLoginForm(){
    $title = 'Iniciar sesión';
    return view('tenant.auth.clientes.login', compact('title'));
  }

  protected function guard()
  {
    return Auth::guard('cliente');
  }

  protected function username()
  {
    return 'correo';
  }

  protected function credentials(Request $request)
  {
    return $request->only($this->username(), 'password');
  }

  protected function validateLogin(Request $request)
  {
    $request->validate([
      $this->username() => 'required|string',
      'password' => 'required|string',
    ]);
  }
}
