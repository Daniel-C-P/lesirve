<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait Template
{
  //script para subir o mover la imagen
  public static function moveImage(Request $request, $name, $filename, $endFilename = null)
  {

    if ($request->hasFile($filename)) {
      $image = $request->file($filename);
      $basePath = "tenants/$name/img/";
      $file = $endFilename ?? $filename;
      $path = "$basePath$file." . $image->guessExtension();
      if (file_exists($path)) unlink($path);
      $route = public_path($basePath);
      $image->move($route, $file . '.' . $image->guessExtension());
      return $path;
    } else {
      return 'NULL';
    }
  }

  //Traemos el nombre del tenant
  public function traerNombre()
  {
    $url = $_SERVER['HTTP_HOST'];
    $partes = explode('.', $url);
    return $partes[0];
  }

  //Traer usuario logeado
  public function traerUsuario($ruta, $id)
  {
    switch ($ruta) {
      case 'tenant':
        $user = \App\Models\Tenant\User::find($id);
        return $user;
        break;
      default:
        $user = \App\Models\Principal\User::find($id);
        return $user;
        break;
    }
  }

  //Preguntar configuracion de usuario logeado
  public function traerConfiguracion($user)
  {
    $respuesta = $user['config'] == '1' ? true : false;
    return $respuesta;
  }

  public static function deleteImage($path){
    if (file_exists($path)) unlink($path);
  }
}
