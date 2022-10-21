<?php

namespace App\Http\Controllers\Tenant\AdminAuth;

use App\Http\Controllers\Controller;
use App\Traits\Template;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    use Template;
    private $ruta = 'tenant';
    public function index()
    {
      $message = 'Bienvenido, comienza cambiando tu contraseña.';
      $user = HomeAdminController::traerUsuario($this->ruta, auth()->id());
      $respuesta = HomeAdminController::traerConfiguracion($user);
      if($respuesta){
        return view('tenant.admin.home');
      }else{
        return view('tenant.admin.user.cambiar-contrasena', compact('user', 'message'));
      }
      
    }
}
