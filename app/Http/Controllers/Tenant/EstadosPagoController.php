<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\EstadosPago;
use Illuminate\Http\Request;

/**
 * Class EstadosPagoController
 * @package App\Http\Controllers
 */
class EstadosPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadosPagos = EstadosPago::paginate();

        return view('tenant.admin.estados.pagos.index', compact('estadosPagos'))
            ->with('i', (request()->input('page', 1) - 1) * $estadosPagos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estadosPago = new EstadosPago();
        return view('tenant.admin.estados.pagos.create', compact('estadosPago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EstadosPago::$rules);

        $estadosPago = EstadosPago::create($request->all());

        return redirect()->route('tenant.estados.pagos.index')
            ->with('success', 'EstadosPago created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estadosPago = EstadosPago::find($id);

        return view('tenant.admin.estados.pagos.show', compact('estadosPago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estadosPago = EstadosPago::find($id);

        return view('tenant.admin.estados.pagos.edit', compact('estadosPago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EstadosPago $estadosPago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pago)
    {
        request()->validate(EstadosPago::$rules);
        $estadosPago = EstadosPago::find($pago);
        $estadosPago->update($request->all());

        return redirect()->route('tenant.estados.pagos.index')
            ->with('success', 'EstadosPago updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estadosPago = EstadosPago::find($id)->delete();

        return redirect()->route('tenant.estados.pagos.index')
            ->with('success', 'EstadosPago deleted successfully');
    }
}
