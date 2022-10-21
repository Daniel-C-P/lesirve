<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Servicio;
use App\Traits\Template;
use Illuminate\Http\Request;

/**
 * Class ServicioController
 * @package App\Http\Controllers
 */
class ServicioController extends Controller
{
  use Template;

  public function listarServicios()
  {
    $servicios = Servicio::all();
    return view('tenant.pages.servicios.lista', compact('servicios'));
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $servicios = Servicio::paginate();

    return view('tenant.admin.servicios.servicio.index', compact('servicios'))
      ->with('i', (request()->input('page', 1) - 1) * $servicios->perPage());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $servicio = new Servicio();
    return view('tenant.admin.servicios.servicio.create', compact('servicio'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    request()->validate(Servicio::$rules);
    $data = $request->all();
    if (isset($data['imagen'])) {
      $data['imagen'] = ServicioController::moveImage($request, $this->traerNombre(), 'imagen', "servicio_$data[nombre]");
    }
    $servicio = Servicio::create($data);

    return redirect()->route('servicios.index')
      ->with('success', 'Servicio created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $servicio = Servicio::find($id);

    return view('tenant.admin.servicios.servicio.show', compact('servicio'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $servicio = Servicio::find($id);

    return view('tenant.admin.servicios.servicio.edit', compact('servicio'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  Servicio $servicio
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Servicio $servicio)
  {
    $data = $request->all();
    if (isset($data['imagen'])) {
      $data['imagen'] = ServicioController::moveImage($request, $this->traerNombre(), 'imagen', "servicio_$data[nombre]");
    }
    $servicio->update($data);

    return redirect()->route('servicios.index')
      ->with('success', 'Servicio updated successfully');
  }

  /**
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   * @throws \Exception
   */
  public function destroy($id)
  {
    $servicio = Servicio::find($id);
    ServicioController::deleteImage($servicio->imagen);
    $servicio->delete();
    return redirect()->route('servicios.index')
      ->with('success', 'Servicio deleted successfully');
  }
}
