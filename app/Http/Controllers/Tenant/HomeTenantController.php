<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\Categoria;
use App\Models\Tenant\Cliente;
use App\Models\Tenant\Configuracione;
use App\Models\Tenant\MediosPago;
use App\Models\Tenant\Producto;
use App\Models\Tenant\Servicio;

class HomeTenantController extends Controller
{
  public function index()
  {
    $cliente = auth('cliente')->check() ? auth('cliente')->user() : null;
    $servicios = Servicio::paginate();
    $productos = Producto::paginate();
    $listaProductos = array();
    foreach ($productos as $producto) {
      $categoria = $producto->categoria->categoria;
      $listaProductos[$categoria] = array();
    }
    foreach ($productos as $producto) {
      array_push($listaProductos[$producto->categoria->categoria], $producto);
    }
    $mediosPagos = MediosPago::where('habilitado', true)
      ->paginate();
    $productosNuevos = Producto::orderBy('created_at', 'desc')
      ->limit(10)
      ->get();
    $cantidad_carrito = 0;
    return view(
      'index',
      compact(
        'servicios',
        'listaProductos',
        'mediosPagos',
        'productosNuevos'
      )
    );
  }
}
