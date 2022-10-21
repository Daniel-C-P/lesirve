<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Cupone;
use Illuminate\Http\Request;

/**
 * Class CuponeController
 * @package App\Http\Controllers
 */
class CuponeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cupones = Cupone::paginate();

        return view('tenant.admin.cupone.index', compact('cupones'))
            ->with('i', (request()->input('page', 1) - 1) * $cupones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cupone = new Cupone();
        return view('tenant.admin.cupone.create', compact('cupone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cupone::$rules);
        $cupone = Cupone::create($request->all());

        return redirect()->route('cupones.index')
            ->with('success', 'Cupone created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cupone = Cupone::find($id);

        return view('tenant.admin.cupone.show', compact('cupone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cupone = Cupone::find($id);

        return view('tenant.admin.cupone.edit', compact('cupone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cupone $cupone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cupone $cupone)
    {
        request()->validate(Cupone::$rules);

        $cupone->update($request->all());

        return redirect()->route('cupones.index')
            ->with('success', 'Cupone updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cupone = Cupone::find($id)->delete();

        return redirect()->route('cupones.index')
            ->with('success', 'Cupone deleted successfully');
    }
}
