<?php

namespace App\Http\Controllers\Principal;

use App\Http\Controllers\Controller;
use App\Models\Principal\CentralUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class ClienteController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $clientes = CentralUser::paginate();

    return view('principal.cliente.index', compact('clientes'))
      ->with('i', (request()->input('page', 1) - 1) * $clientes->perPage());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $cliente = new CentralUser();
    return view('principal.cliente.create', compact('cliente'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    request()->validate(CentralUser::$rules);
    $valuesInto = array(
      "_token" => "RyuTThYIWhNhphUUljtnD7OTHqk4CegQlB8mMWSv",
      "nombre" => $request->nombre,
      "usuario" => $request->usuario,
      "contrasenia" => Hash::make($request->contrasenia),
      "correo" => $request->correo,
      "telefono" => $request->telefono,
    );
    $cliente = CentralUser::create($valuesInto);

    return redirect()->route('clientes.index')
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
    $cliente = CentralUser::find($id);

    return view('principal.cliente.show', compact('cliente'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $cliente = CentralUser::find($id);

    return view('principal.cliente.edit', compact('cliente'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  Cliente $cliente
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, CentralUser $cliente)
  {
    request()->validate(CentralUser::$rules);

    $cliente->update($request->all());

    return redirect()->route('clientes.index')
      ->with('success', 'Cliente updated successfully');
  }

  /**
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   * @throws \Exception
   */
  public function destroy($id)
  {
    $cliente = CentralUser::find($id)->delete();

    return redirect()->route('clientes.index')
      ->with('success', 'Cliente deleted successfully');
  }
}
