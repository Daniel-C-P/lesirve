<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\ReservaServicio;
use App\Models\Tenant\Servicio;
use App\Models\Tenant\Cliente;
use Illuminate\Http\Request;

/**
 * Class ReservaServicioController
 * @package App\Http\Controllers
 */
class ReservaServicioController extends Controller
{

  public function vistaReservas($servicio)
  {
    $reservaServicio = new ReservaServicio();
    $servicio = Servicio::where('nombre', $servicio)->first();

    return view(
      "tenant.pages.servicios.reservas",
      compact(
        'servicio',
        'reservaServicio'
      )
    );
  }

  public function serviciosSolicitados()
  {
    $servicios = ReservaServicio::where('id_cliente', auth('cliente')->user()->id)->orderByDesc('fecha')->paginate();
    return view(
      "tenant.pages.servicios.solicitudes",
      compact(
        'plantilla',
        'servicios'
      )
    )->with('i', (request()->input('page', 1) - 1) * $servicios->perPage());
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $reservaServicios = ReservaServicio::paginate();

    return view('tenant.admin.servicios.reserva-servicio.index', compact('reservaServicios'))
      ->with('i', (request()->input('page', 1) - 1) * $reservaServicios->perPage());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $reservaServicio = new ReservaServicio();
    $servicios = Servicio::pluck('nombre', 'id');
    $clientes = Cliente::pluck('correo', 'id');
    return view('tenant.admin.servicios.reserva-servicio.create', compact('reservaServicio', 'servicios', 'clientes'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    request()->validate(ReservaServicio::$rules);

    $reservaServicio = ReservaServicio::create($request->all());
    if(isset($request['reservar'])) return redirect('/');
    return redirect()->route('reserva-servicios.index')
      ->with('success', 'ReservaServicio created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $reservaServicio = ReservaServicio::find($id);

    return view('tenant.admin.servicios.reserva-servicio.show', compact('reservaServicio'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $reservaServicio = ReservaServicio::find($id);
    $servicios = Servicio::pluck('nombre', 'id');
    $clientes = Cliente::pluck('correo', 'id');
    return view('tenant.admin.servicios.reserva-servicio.edit', compact('reservaServicio', 'servicios', 'clientes'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  ReservaServicio $reservaServicio
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, ReservaServicio $reservaServicio)
  {
    request()->validate(ReservaServicio::$rules);

    $reservaServicio->update($request->all());

    return redirect()->route('reserva-servicios.index')
      ->with('success', 'ReservaServicio updated successfully');
  }

  /**
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   * @throws \Exception
   */
  public function destroy($id)
  {
    $reservaServicio = ReservaServicio::find($id)->delete();

    return redirect()->route('reserva-servicios.index')
      ->with('success', 'ReservaServicio deleted successfully');
  }
}
