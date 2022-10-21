<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Cliente;
use App\Models\Tenant\Configuracione;
use App\Models\Tenant\Banners;
use App\Models\Tenant\Producto;
use Illuminate\Http\Request;
use App\Traits\Template;

/**
 * Class ConfiguracioneController
 * @package App\Http\Controllers
 */
class ConfiguracioneController extends Controller
{
  use Template;

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $configuracion = Configuracione::first();
    $banners= Banners::all();
    $banners=json_decode($banners,true);
    // dd($banners);
    $listaPlantillas = [
      (object)[
        'id' => 'big-deal',
        'imagen' => 'img/plantillas/pets.jpg',
        'nombre' => 'big-deal',
      ],
      (object)[
        'id' => 'mega-store',
        'imagen' => 'img/plantillas/mega-store.jpg',
        'nombre' => 'Mega Store',
      ],
      (object)[
        'id' => 'cosmetic',
        'imagen' => 'img/plantillas/cosmetic.jpg',
        'nombre' => 'Cosmetic',
      ],
    ];

    $total_imagenes = count(glob('img/plantillas/{*.jpg}', GLOB_BRACE));
    return view('tenant.admin.configuracion.index', compact('configuracion', 'total_imagenes', 'listaPlantillas', 'banners'));
  }

  //Creamos una configuracion con los valores del tenant
  public function configDefecto()
  {
    //traemos el nombre del tenant
    $nombre_tienda = $this->traerNombre();
    //Iniciamos el objeto configuracion
    $newConfig = new Configuracione();
    $newConfig->nombre_tienda = $nombre_tienda;
    $newConfig->save();
    return $newConfig;
  }

  public function update(Request $request, Configuracione $conf)
  {

    $data = request()->except(['_token', '_method']);
    if(isset($data['imagen_banner_1'])){
      $data['imagen_banner_1'] = ConfiguracioneController::moveImage($request, $this->traerNombre(), 'imagen_banner_1');
    }
    if(isset($data['imagen_banner_2'])){
      $data['imagen_banner_2'] = ConfiguracioneController::moveImage($request, $this->traerNombre(), 'imagen_banner_2');
    }
    if(isset($data['imagen_banner_3'])){
      $data['imagen_banner_3'] = ConfiguracioneController::moveImage($request, $this->traerNombre(), 'imagen_banner_3');
    }

    if(isset($data['logo'])){
      $data['logo'] = ConfiguracioneController::moveImage($request, $this->traerNombre(), 'logo');
    }

    if(isset($data['imagen_banner_4'])){
        $data['imagen_banner_4'] = ConfiguracioneController::moveImage($request, $this->traerNombre(), 'imagen_banner_4');
    }
    if(isset($data['imagen_banner_5'])){
        $data['imagen_banner_5'] = ConfiguracioneController::moveImage($request, $this->traerNombre(), 'imagen_banner_5');
    }
    if(isset($data['imagen_banner_6'])){
        $data['imagen_banner_6'] = ConfiguracioneController::moveImage($request, $this->traerNombre(), 'imagen_banner_6');
    }
    if(isset($data['imagen_banner_7'])){
        $data['imagen_banner_7'] = ConfiguracioneController::moveImage($request, $this->traerNombre(), 'imagen_banner_7');
    }
    if(isset($data['imagen_banner_8'])){
        $data['imagen_banner_8'] = ConfiguracioneController::moveImage($request, $this->traerNombre(), 'imagen_banner_8');
    }
    if(isset($data['imagen_banner_9'])){
        $data['imagen_banner_9'] = ConfiguracioneController::moveImage($request, $this->traerNombre(), 'imagen_banner_9');
    }



    if (array_key_exists('id_banner_4', $data)) {
      $xx  = " 0 ";
      $y = 4;
    for ($x = 0;$x < count($data); $x++){
        $a = ('id_banner_' .strval($y));
        $b = ('url_banner_' .strval($y));
        $c = ('texto_banner_' .strval($y));
        $d = ('boton_banner_' .strval($y));
        $e = ('imagen_banner_' .strval($y));

        if ( $y <= 9 ) {

            $xx .= (' id_banner_'.strval($data[$a]));
            $xx .= (' url_banner_'.strval($data[$b]));
            $xx .= (' texto_banner_'.strval($data[$c]));
            $xx .= (' boton_banner_'.strval($data[$d]));

            $ban =  Banners::find($data[$a]);
            $ban->URL_funcion = $data[$b];
        	$ban->titulo_imagen = $data[$c];
            $ban->texto_boton = $data[$d];

            $f = array_key_exists($e, $data);
            if ($f) {
                $xx .= (' imagen_banner_'.strval($data[$e]));
                $ban->URL_imagen = $data[$e];
             }

             $ban->save();

            $y++;
        }
    }
  }else{
    $conf->query()->update($data);
  }



    return redirect()->route('tenant.admin.configuracion')
      ->with('success', 'Se actualizó correctamente la configuración');
  }
}
