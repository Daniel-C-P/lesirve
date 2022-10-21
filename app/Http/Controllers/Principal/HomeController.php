<?php

namespace App\Http\Controllers\Principal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Template;

class HomeController extends Controller
{
    use Template;
    private $ruta = 'principal';
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $message = 'Bienvenido, comienza cambiando tu contraseña.';
        $user = HomeController::traerUsuario($this->ruta, auth()->id());
        $respuesta = HomeController::traerConfiguracion($user);
        if($respuesta){
            return view('principal.home');
        }else{
            return redirect()->route('principal.admin.users.cambiar-contrasena',$user->id)->with('user',$user, 'message', $message);
            // return view('principal.user.cambiar-contrasena', compact('user', 'message'));
        }
    }
}
