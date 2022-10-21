<?php

namespace App\Http\Controllers\Tenant\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tenant\PlantillaConfigController;
use App\Models\Tenant\Cliente;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

  protected function showRegisterForm(){
    $plantilla = PlantillaConfigController::obtenerConfiguracion()->id_plantilla;
    $title = 'Iniciar sesión';
    return view('tenant.auth.clientes.register', compact('title','plantilla'));
  }

  /**
   * Where to redirect users after registration.
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
    $this->middleware('guest:cliente');
  }

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
    $validator = Validator::make(
      $data,
      [
        'nombre' => ['required', 'string', 'max:100'],
        'telefono' => ['required', 'string', 'max:10'],
        'direccion' => ['required', 'string', 'max:50'],
        'correo' => ['required', 'string', 'email', 'unique:clientes'],
        'contrasenia' => ['required', 'string', 'min:8', 'confirmed'],
        'ciudad' => ['required', 'string'],
      ]
    );

    if ($validator->fails()) {
      $validator->errors()->add('error_register', true);
    }

    return $validator;
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\Models\Cliente
   */
  protected function create(array $data)
  {
    return Cliente::create([
      'nombre' => $data['nombre'],
      'telefono' => $data['telefono'],
      'direccion' => $data['direccion'],
      'correo' => $data['correo'],
      'ciudad' => $data['ciudad'],
      'contrasenia' => Hash::make($data['contrasenia']),
    ]);
  }

  protected function guard()
  {
    return Auth::guard('cliente');
  }

  protected function username()
  {
    return 'correo';
  }
}
