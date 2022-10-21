<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Menu;
use Illuminate\Http\Request;

/**
 * Class MenuController
 * @package App\Http\Controllers
 */
class MenuController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $menus = Menu::paginate();

    return view('tenant.admin.menu.index', compact('menus'))
      ->with('i', (request()->input('page', 1) - 1) * $menus->perPage());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $menu = new Menu();
    return view('tenant.admin.menu.create', compact('menu'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    request()->validate(Menu::$rules);

    $request['visible'] = isset($request['visible']);

    $menu = Menu::create($request->all());

    return redirect()->route('menus.index')
      ->with('success', 'Menu created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $menu = Menu::find($id);

    return view('tenant.admin.menu.show', compact('menu'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $menu = Menu::find($id);

    return view('tenant.admin.menu.edit', compact('menu'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  Menu $menu
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Menu $menu)
  {
    $request['visible'] = isset($request['visible']);
    request()->validate(Menu::$rules);

    $menu->update($request->all());

    return redirect()->route('menus.index')
      ->with('success', 'Menu updated successfully');
  }

  /**
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   * @throws \Exception
   */
  public function destroy($id)
  {
    $menu = Menu::find($id)->delete();

    return redirect()->route('menus.index')
      ->with('success', 'Menu deleted successfully');
  }
}
