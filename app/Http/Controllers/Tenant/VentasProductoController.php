<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Cliente;
use App\Models\Tenant\EstadosPago;
use App\Models\Tenant\EstadosVenta;
use App\Models\Tenant\TiposPago;
use App\Models\Tenant\VentasProducto;
use Illuminate\Http\Request;

/**
 * Class VentasProductoController
 * @package App\Http\Controllers
 */
class VentasProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventasProductos = VentasProducto::paginate();

        return view('tenant.admin.productos.ventas.index', compact('ventasProductos'))
            ->with('i', (request()->input('page', 1) - 1) * $ventasProductos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ventasProducto = new VentasProducto();
        $clientes = Cliente::pluck('correo', 'id');
        $estadosPagos = EstadosPago::pluck('descripcion', 'id');
        $estadosVentas = EstadosVenta::pluck('descripcion', 'id');
        $tiposPagos = TiposPago::pluck('descripcion', 'id');
        return view('tenant.admin.productos.ventas.create', compact('ventasProducto', 'clientes', 'tiposPagos', 'estadosPagos','estadosVentas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(VentasProducto::$rules);

        $ventasProducto = VentasProducto::create($request->all());

        return redirect()->route('tenant.productos.ventas.index')
            ->with('success', 'VentasProducto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ventasProducto = VentasProducto::find($id);
        $clientes = Cliente::pluck('correo', 'id');

        return view('tenant.admin.productos.ventas.show', compact('ventasProducto', 'clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ventasProducto = VentasProducto::find($id);
        $clientes = Cliente::pluck('correo', 'id');
        $estadosPagos = EstadosPago::pluck('descripcion', 'id');
        $estadosVentas = EstadosVenta::pluck('descripcion', 'id');
        $tiposPagos = TiposPago::pluck('descripcion', 'id');
        return view('tenant.admin.productos.ventas.edit', compact('ventasProducto', 'clientes', 'tiposPagos', 'estadosPagos','estadosVentas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  VentasProducto $ventasProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VentasProducto $ventasProducto)
    {
        request()->validate(VentasProducto::$rules);

        $ventasProducto->update($request->all());

        return redirect()->route('tenant.productos.ventas.index')
            ->with('success', 'VentasProducto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ventasProducto = VentasProducto::find($id)->delete();

        return redirect()->route('tenant.productos.ventas.index')
            ->with('success', 'VentasProducto deleted successfully');
    }
}
