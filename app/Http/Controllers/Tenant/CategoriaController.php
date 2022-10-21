<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tenant\PlantillaConfigController;
use App\Models\Tenant\Categoria;
use App\Models\Tenant\Producto;
use Illuminate\Http\Request;

/**
 * Class CategoriaController
 * @package App\Http\Controllers
 */
class CategoriaController extends Controller
{

  public function listarProductos($categoria)
  {
    $productos = Categoria::where('categoria', $categoria)->first()->productos;
    return view(
      "tenant.pages.productos.categoria",
      compact(
        'productos',
        'categoria',
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
    $categorias = Categoria::paginate();

    return view('tenant.admin.productos.categoria.index', compact('categorias'))
      ->with('i', (request()->input('page', 1) - 1) * $categorias->perPage());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categoria = new Categoria();
    return view('tenant.admin.productos.categoria.create', compact('categoria'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    request()->validate(Categoria::$rules);
    $request['destacada'] = isset($request['destacada']);
    $categoria = Categoria::create($request->all());

    return redirect()->route('categorias.index')
      ->with('success', 'Categoria created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $categoria = Categoria::find($id);
    return view('tenant.admin.productos.categoria.show', compact('categoria'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $categoria = Categoria::find($id);
    return view('tenant.admin.productos.categoria.edit', compact('categoria'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  Categoria $categoria
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Categoria $categoria)
  {
    request()->validate(Categoria::$rules);

    $request['destacada'] = isset($request['destacada']);
    $categoria->update($request->all());

    return redirect()->route('categorias.index')
      ->with('success', 'Categoria updated successfully');
  }

  /**
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   * @throws \Exception
   */
  public function destroy($id)
  {
    //buscamos productos con esta categoria
    $productos = Producto::all()->where('id_categoria', $id)->count();
    //si tiene productos, no deja eliminar
    if ($productos > 0) {
      return redirect()->route('categorias.index')
        ->with('error', 'Categoria with products');
    }

    $categoria = Categoria::find($id)->delete();

    return redirect()->route('categorias.index')
      ->with('success', 'Categoria deleted successfully');
  }
}
