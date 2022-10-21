<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tenant\ProductoController;
use App\Models\Tenant\Categoria;
use App\Models\Tenant\Configuracione;
use App\Models\Tenant\Banners;
use App\Models\Tenant\MediosPago;
use App\Models\Tenant\Producto;
use App\Models\Tenant\Servicio;

class PlantillaConfigController extends Controller
{
  public function configDefecto()
  {

    $categorias = Categoria::paginate();
    $productos = $this->obtenerProductos();
    $listaProductos = array();
    foreach ($productos as $producto) {
      $categoria = $producto->categoria->categoria;
      $listaProductos[$categoria] = array();
    }
    foreach ($productos as $producto) {
      array_push($listaProductos[$producto->categoria->categoria], $producto);
    }

    return [
      'tenant' => PlantillaConfigController::obtenerConfiguracion(),
      'servicios' => $this->obtenerServicios(),
      'productos' => $productos,
      'mediosPago' => $this->obtenerMediosPago(),
      'productosNuevos' => ProductoController::obtenerProductosNuevos(),
      'servicio' => $this->obtenerServicios(),
    ];
  }

  public static function obtenerConfiguracion()
  {
    $config = Configuracione::first();
    $banners = Banners::all();
    return (object)[
      'id_plantilla' => $config->id_plantilla,
      'id' => explode('.', $_SERVER['HTTP_HOST'])[0],
      'logo' => $config->logo,
      'nombre_tienda' => $config->nombre_tienda,
      'descripcion' => $config->descripcion,
      'direccion' => $config->direccion,
      'telefono' => $config->telefono,
      'correo' => $config->correo,
      'banner1' => $config->imagen_banner_1,
      'banner2' => $config->imagen_banner_2,
      'banner3' => $config->imagen_banner_3,
      'titulo_banner_1' => $config->titulo_banner_1,
      'titulo_banner_2' => $config->titulo_banner_2,
      'titulo_banner_3' => $config->titulo_banner_3,
      'descripcion_banner_1' => $config->descripcion_banner_1,
      'descripcion_banner_2' => $config->descripcion_banner_2,
      'descripcion_banner_3' => $config->descripcion_banner_3,
      'facebook' => $config->facebook,
      'twitter' => $config->twitter,
      'whatsapp' => $config->whatsapp,
      'instagram' => $config->instagram,
      'youtube' => $config->youtube,
      'color_primario' => $config->color_p,
      'color_secundario' => $config->color_s,

       'id_banner_4' => $banners[0]['id'] ,
       'url_banner_4' => $banners[0]['URL_funcion'],
       'texto_banner_4' => $banners[0]['titulo_imagen'],
       'boton_banner_4' => $banners[0]['texto_boton'],
       'imagen_banner_4' => $banners[0]['URL_imagen'],

       'id_banner_5' => $banners[1]['id'] ,
       'url_banner_5' => $banners[1]['URL_funcion'],
       'texto_banner_5' => $banners[1]['titulo_imagen'],
       'boton_banner_5' => $banners[1]['texto_boton'],
       'imagen_banner_5' => $banners[1]['URL_imagen'],

       'id_banner_6' => $banners[2]['id'] ,
       'url_banner_6' => $banners[2]['URL_funcion'],
       'texto_banner_6' => $banners[2]['titulo_imagen'],
       'boton_banner_6' => $banners[2]['texto_boton'],
       'imagen_banner_6' => $banners[2]['URL_imagen'],

       'id_banner_7' => $banners[3]['id'] ,
       'url_banner_7' => $banners[3]['URL_funcion'],
       'texto_banner_7' => $banners[3]['titulo_imagen'],
       'boton_banner_7' => $banners[3]['texto_boton'],
       'imagen_banner_7' => $banners[3]['URL_imagen'],

       'id_banner_8' => $banners[4]['id'] ,
       'url_banner_8' => $banners[4]['URL_funcion'],
       'texto_banner_8' => $banners[4]['titulo_imagen'],
       'boton_banner_8' => $banners[4]['texto_boton'],
       'imagen_banner_8' => $banners[4]['URL_imagen'],

       'id_banner_9' => $banners[5]['id'] ,
       'url_banner_9' => $banners[5]['URL_funcion'],
       'texto_banner_9' => $banners[5]['titulo_imagen'],
       'boton_banner_9' => $banners[5]['texto_boton'],
       'imagen_banner_9' => $banners[5]['URL_imagen'],


    ];
  }

  public static function obtenerCategorias(){
    return Categoria::paginate();
  }

  public function obtenerServicios()
  {
    return Servicio::paginate();
  }

  public function obtenerProductos()
  {
    return Producto::paginate();
  }

  public static function obtenerMediosPago()
  {
    return MediosPago::where('habilitado', true)
      ->paginate();
  }

}