<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Cliente;
use Illuminate\Http\Request;

/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class ClienteController extends Controller
{

  public function actualizarPerfil(Request $request)
  {
    $id = auth('cliente')->user()->id;
    Cliente::find($id)->update($request->all());
    return redirect('/');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::paginate();

        return view('tenant.admin.cliente.index', compact('clientes'))
            ->with('i', (request()->input('page', 1) - 1) * $clientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = new Cliente();
        return view('tenant.admin.cliente.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cliente::$rules);
        $cliente = Cliente::create($request->all());

        return redirect()->route('tenant.clientes.index')
            ->with('success', 'Cliente created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);

        return view('tenant.admin.cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);

        return view('tenant.admin.cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idCliente)
    {
        request()->validate(Cliente::$rules);
        $cliente = Cliente::find($idCliente);
        $cliente->update($request->all());

        return redirect()->route('tenant.clientes.index')
            ->with('success', 'Cliente updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
      try{
        $cliente = Cliente::find($id)->delete();

        return redirect()->route('tenant.clientes.index')
            ->with('success', 'Cliente deleted successfully');
      }catch(\Exception $e){
        return redirect()->route('tenant.clientes.index')
            ->with('error', 'No se pudo eliminar el cliente por que tiene registros de gran utilidad en la base de datos.');
      }
    }
}
