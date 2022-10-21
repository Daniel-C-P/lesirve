<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Producto;
use App\Models\Tenant\Categoria;
use Illuminate\Http\Request;
use App\Traits\Template;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
  use Template;

  public function vistaComprar(Request $request){
    $tenant = PlantillaConfigController::obtenerConfiguracion() ?? $valuesDefault;
    $formasPagos = PlantillaConfigController::obtenerMediosPago();
    $producto = Producto::find($request->id);
    return view(
      "tenant.pages.productos.comprar",
      compact('producto','formasPagos', 'tenant',)
    );
  }

  public function listarDescuentos()
  {
    $productos = Producto::where('en_oferta', true)->paginate();
    return view(
      "tenant.pages.productos.descuentos",
      compact('productos')
    );
  }

  public function buscarProductos(Request $request)
  {
    $criterios = (object)$request->only('categoria', 'producto');
    $criterios->producto = trim($criterios->producto);
    $productos = null;
    if (isset($criterios->categoria) && $criterios->categoria != 'all') {
      $categoria = Categoria::where('categoria', $criterios->categoria)->first()->id ?? null;
      $productos = Producto::where('nombre', 'like', "%$criterios->producto%")->where('id_categoria', $categoria)->get();
    } else {
      $productos = Producto::where('nombre', 'like', "%$criterios->producto%")->get();
    }
    $criterios->categoria = $criterios->categoria == 'all' ? 'Todas' : $criterios->categoria;
    $criterios->producto = $criterios->producto == '' ? 'Todos' : $criterios->producto;
    return view(
      "tenant.pages.productos.buscar-producto",
      compact(
        'productos',
        'criterios'
      )
    );
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $productos = Producto::paginate();
    return view('tenant.admin.productos.producto.index', compact('productos'))
      ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $producto = new Producto();
    $categorias = Categoria::pluck('categoria', 'id');
    return view('tenant.admin.productos.producto.create', compact('producto', 'categorias'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request['en_oferta'] = isset($request['en_oferta']);
    if ($request['esta'] == 0) {
      request()->validate(Producto::$rules);
    }
    $data = request()->except(['_token', '_method']);
    if (isset($data['imagen_1'])) {
      $data['imagen_1'] = ProductoController::moveImage($request, $this->traerNombre(), 'imagen_1', Str::uuid().'_imagen_1');
    }
    if (isset($data['imagen_2'])) {
      $data['imagen_2'] = ProductoController::moveImage($request, $this->traerNombre(), 'imagen_2', Str::uuid().'_imagen_2');
    }
    if (isset($data['imagen_3'])) {
      $data['imagen_3'] = ProductoController::moveImage($request, $this->traerNombre(), 'imagen_3', Str::uuid().'_imagen_3');
    }
    if (isset($data['imagen_4'])) {
      $data['imagen_4'] = ProductoController::moveImage($request, $this->traerNombre(), 'imagen_4', Str::uuid().'_imagen_4');
    }

    $producto = Producto::create($data);

    return redirect()->route('productos.index')
      ->with('success', 'Producto created successfully.');
  }

  public static function obtenerProductosNuevos($limit = 5)
  {
    return Producto::orderBy('created_at', 'desc')
      ->limit($limit)
      ->get();
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $producto = Producto::find($id);
    return view('tenant.admin.productos.producto.show', compact('producto'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $producto = Producto::find($id);
    $imagenes = [
      $producto->imagen_1,
    ];
    if ($producto->imagen_2 != 'NULL') array_push($imagenes, $producto->imagen_2);
    if ($producto->imagen_3 != 'NULL') array_push($imagenes, $producto->imagen_3);
    if ($producto->imagen_4 != 'NULL') array_push($imagenes, $producto->imagen_4);
    $categorias = Categoria::pluck('categoria', 'id');
    return view('tenant.admin.productos.producto.edit', compact('producto', 'categorias', 'imagenes'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  Producto $producto
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Producto $producto)
  {
    $request['en_oferta'] = isset($request['en_oferta']);

    if ($request['esta'] == 0) {
      request()->validate(Producto::$rules);
    }
    $data = request()->except(['_token', '_method']);
    if (isset($data['imagen_1'])) {
      $data['imagen_1'] = ProductoController::moveImage($request, $this->traerNombre(), 'imagen_1', Str::uuid().'_imagen_1');
    }
    if (isset($data['imagen_2'])) {
      $data['imagen_2'] = ProductoController::moveImage($request, $this->traerNombre(), 'imagen_2', Str::uuid().'_imagen_2');
    }
    if (isset($data['imagen_3'])) {
      $data['imagen_3'] = ProductoController::moveImage($request, $this->traerNombre(), 'imagen_3', Str::uuid().'_imagen_3');
    }
    if (isset($data['imagen_4'])) {
      $data['imagen_4'] = ProductoController::moveImage($request, $this->traerNombre(), 'imagen_4', Str::uuid().'_imagen_4');
    }

    $producto->update($data);

    return redirect()->route('productos.index')
      ->with('success', 'Producto updated successfully');
  }

  /**
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   * @throws \Exception
   */
  public function destroy($id)
  {
    $producto = Producto::find($id)->delete();

    return redirect()->route('productos.index')
      ->with('success', 'Producto deleted successfully');
  }
}
