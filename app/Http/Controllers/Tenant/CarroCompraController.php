<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\CarroCompra;
use Illuminate\Http\Request;

/**
 * Class CarroCompraController
 * @package App\Http\Controllers
 */
class CarroCompraController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $carroCompras = CarroCompra::paginate();

    return view('tenant.ventas.carro-compra.index', compact('carroCompras'))
      ->with('i', (request()->input('page', 1) - 1) * $carroCompras->perPage());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $carroCompra = new CarroCompra();
    return view('tenant.ventas.carro-compra.create', compact('carroCompra'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    request()->validate(CarroCompra::$rules);
    $validar = CarroCompra::where('id_cliente', $request->id_cliente)
      ->where('id_producto', $request->id_producto)
      ->get();
    
    if(count($validar) > 0){
      return [
        'type' => 'error',
        'title' => 'Error!',
        'msg' => 'Este producto ya está en su carrito.'
      ];
    }
    $carroCompra = CarroCompra::create($request->all());
    $carroCompras = CarroCompra::where('id_cliente', $request->id_cliente)->get();
    return [
      'type' => 'success',
      'title' => 'Exito!',
      'msg' => 'El producto se agrego al carrito de compras',
      'carro_compras' => $carroCompras,
    ];
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $carroCompra = CarroCompra::find($id);

    return view('tenant.ventas.carro-compra.show', compact('carroCompra'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $carroCompra = CarroCompra::find($id);

    return view('tenant.ventas.carro-compra.edit', compact('carroCompra'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  CarroCompra $carroCompra
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, CarroCompra $carroCompra)
  {
    request()->validate(CarroCompra::$rules);
    $carroCompra = CarroCompra::where('id_cliente', $request->id_cliente)
      ->where('id_producto', $request->id_producto)
      ->update([
        'cantidad' => $request->cantidad
      ]);

    $productos = CarroCompra::where('id_cliente', $request->id_cliente)
    ->get();
    $nuevoTotal = 0;
    foreach($productos as $producto){
      $nuevoTotal += $producto->cantidad * $producto->producto->precio;
    }
    echo $nuevoTotal;
    
  }

  /**
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   * @throws \Exception
   */
  public function destroy($id)
  {
    $carroCompra = CarroCompra::find($id)->delete();

    return redirect()->route('carro-compras.index')
      ->with('success', 'CarroCompra deleted successfully');
  }
}
