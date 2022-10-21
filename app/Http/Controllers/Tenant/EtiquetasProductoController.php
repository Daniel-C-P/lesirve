<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\EtiquetasProducto;
use App\Models\Tenant\Etiqueta;
use App\Models\Tenant\Producto;
use Illuminate\Http\Request;

/**
 * Class EtiquetasProductoController
 * @package App\Http\Controllers
 */
class EtiquetasProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etiquetasProductos = EtiquetasProducto::paginate();

        return view('tenant.productos.etiquetas-producto.index', compact('etiquetasProductos'))
            ->with('i', (request()->input('page', 1) - 1) * $etiquetasProductos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etiquetasProducto = new EtiquetasProducto();
        $productos = Producto::pluck('nombre', 'id');
        $etiquetas = Etiqueta::pluck('descripcion', 'id');
        return view('tenant.productos.etiquetas-producto.create', compact('etiquetasProducto', 'productos', 'etiquetas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EtiquetasProducto::$rules);

        $etiquetasProducto = EtiquetasProducto::create($request->all());

        return redirect()->route('etiquetas-productos.index')
            ->with('success', 'EtiquetasProducto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etiquetasProducto = EtiquetasProducto::find($id);

        return view('tenant.productos.etiquetas-producto.show', compact('etiquetasProducto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etiquetasProducto = EtiquetasProducto::find($id);
        $productos = Producto::pluck('nombre', 'id');
        $etiquetas = Etiqueta::pluck('descripcion', 'id');
        return view('tenant.productos.etiquetas-producto.edit', compact('etiquetasProducto', 'productos', 'etiquetas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EtiquetasProducto $etiquetasProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EtiquetasProducto $etiquetasProducto)
    {
        request()->validate(EtiquetasProducto::$rules);

        $etiquetasProducto->update($request->all());

        return redirect()->route('etiquetas-productos.index')
            ->with('success', 'EtiquetasProducto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $etiquetasProducto = EtiquetasProducto::find($id)->delete();

        return redirect()->route('etiquetas-productos.index')
            ->with('success', 'EtiquetasProducto deleted successfully');
    }
}
