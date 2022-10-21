<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\MediosPago;
use App\Traits\Template;
use Illuminate\Http\Request;

/**
 * Class MediosPagoController
 * @package App\Http\Controllers
 */
class MediosPagoController extends Controller
{
  use Template;
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $mediosPagos = MediosPago::paginate();


    // dd($mediosPagos[0]['cuenta']);
    return view('tenant.admin.medios-pago.index', compact('mediosPagos'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($request)
  {

    dd($request->all());
    $mediosPago = new MediosPago();
    return ('hola');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $mediosPago = MediosPago::find($id);

    return view('tenant.admin.medios-pago.show', compact('mediosPago'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $mediosPago = MediosPago::find($id);

    return view('tenant.admin.medios-pago.edit', compact('mediosPago'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  MediosPago $mediosPago
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, MediosPago $medioP)
  {
    // dd($request);
    $request = $request->all();
    $medioP = Mediospago::where('nombre','wompi')
                     ->count();
    if ($medioP == 0) {

        $medioPago = new MediosPago;
        $medioPago->nombre = 'wompi';
        if ($request['chec'] == null) {
            $medioPago->logo = '';
            $medioPago->habilitado = 0;
            $medioPago->cuenta = '';
        }else{
            $medioPago->logo = $request['prv'];
            $medioPago->habilitado = 1;
            $medioPago->cuenta = $request['pub'];
        }
        $medioPago->save();

        return($medioPago);
    }elseif ($medioP == 1) {
        $medioP = Mediospago::where('nombre','wompi')
                ->get();
        $medioP = Mediospago::findOrFail($medioP[0]["id"]);

        if ($request['chec'] == null) {
            $medioP->habilitado = 0;
        }else{
            $medioP->logo = array_key_exists('prv', $request ) ? $request['prv'] : $medioP->logo;
            $medioP->habilitado = 1;
            $medioP->cuenta = array_key_exists('pub', $request) ? $request['pub'] : $medioP->cuenta;
        }
        $medioP->save();

        return('ok');
    }
    return($request);
  }
  /**
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   * @throws \Exception
   */
  public function destroy($id)
  {
    $mediosPago = MediosPago::find($id)->delete();

    return redirect()->route('medios-pagos.index')
      ->with('success', 'MediosPago deleted successfully');
  }
}

