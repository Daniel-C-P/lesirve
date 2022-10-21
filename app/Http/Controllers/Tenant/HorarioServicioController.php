<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\HorarioServicio;
use Illuminate\Http\Request;
use App\Models\Tenant\Servicio;

/**
 * Class HorarioServicioController
 * @package App\Http\Controllers
 */
class HorarioServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarioServicios = HorarioServicio::paginate();

        return view('tenant.servicios.horario-servicio.index', compact('horarioServicios'))
            ->with('i', (request()->input('page', 1) - 1) * $horarioServicios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horarioServicio = new HorarioServicio();
        $servicios = Servicio::pluck('nombre', 'id');
        return view('tenant.servicios.horario-servicio.create', compact('horarioServicio', 'servicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(HorarioServicio::$rules);

        $horarioServicio = HorarioServicio::create($request->all());

        return redirect()->route('horario-servicios.index')
            ->with('success', 'HorarioServicio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $horarioServicio = HorarioServicio::find($id);

        return view('tenant.servicios.horario-servicio.show', compact('horarioServicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $horarioServicio = HorarioServicio::find($id);
        $servicios = Servicio::pluck('nombre', 'id');
        return view('tenant.servicios.horario-servicio.edit', compact('horarioServicio', 'servicios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  HorarioServicio $horarioServicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HorarioServicio $horarioServicio)
    {
        request()->validate(HorarioServicio::$rules);

        $horarioServicio->update($request->all());

        return redirect()->route('horario-servicios.index')
            ->with('success', 'HorarioServicio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $horarioServicio = HorarioServicio::find($id)->delete();

        return redirect()->route('horario-servicios.index')
            ->with('success', 'HorarioServicio deleted successfully');
    }
}
