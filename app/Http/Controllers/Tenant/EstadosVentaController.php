<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\EstadosVenta;

/**
 * Class EstadosVentaController
 * @package App\Http\Controllers
 */
class EstadosVentaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $estadosVentas = EstadosVenta::paginate();

    return view('tenant.admin.estados.ventas.index', compact('estadosVentas'))
      ->with('i', (request()->input('page', 1) - 1) * $estadosVentas->perPage());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $estadosVenta = new EstadosVenta();
    return view('tenant.admin.estados.ventas.create', compact('estadosVenta'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    request()->validate(EstadosVenta::$rules);

    $estadosVenta = EstadosVenta::create($request->all());

    return redirect()->route('tenant.estados.ventas.index')
      ->with('success', 'EstadosVenta created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $estadosVenta = EstadosVenta::find($id);

    return view('tenant.admin.estados.ventas.show', compact('estadosVenta'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $estadosVenta = EstadosVenta::find($id);

    return view('tenant.admin.estados.ventas.edit', compact('estadosVenta'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  EstadosVenta $estadosVenta
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $pago)
  {

    request()->validate(EstadosVenta::$rules);
    $estadoVenta = EstadosVenta::find($pago);
    $estadoVenta->update($request->all());

    return redirect()->route('tenant.estados.ventas.index')
      ->with('success', 'EstadosVenta updated successfully');
  }

  /**
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   * @throws \Exception
   */
  public function destroy($id)
  {
    $estadosVenta = EstadosVenta::find($id)->delete();

    return redirect()->route('tenant.estados.ventas.index')
      ->with('success', 'EstadosVenta deleted successfully');
  }
}
