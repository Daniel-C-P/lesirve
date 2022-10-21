<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Categoria;
use App\Models\Tenant\CategoriasMenu;
use App\Models\Tenant\Menu;
use Illuminate\Http\Request;

/**
 * Class CategoriasMenuController
 * @package App\Http\Controllers
 */
class CategoriasMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriasMenus = CategoriasMenu::paginate();

        return view('tenant.admin.submenu.index', compact('categoriasMenus'))
            ->with('i', (request()->input('page', 1) - 1) * $categoriasMenus->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::pluck('nombre', 'id');
        $categorias = Categoria::pluck('categoria', 'id');
        return view('tenant.admin.submenu.create', compact('menus', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CategoriasMenu::$rules);

        $categoriasMenu = CategoriasMenu::create($request->all());

        return redirect()->route('submenus.index')
            ->with('success', 'CategoriasMenu created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoriasMenu = CategoriasMenu::find($id);

        return view('tenant.admin.submenu.show', compact('categoriasMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriasMenu = CategoriasMenu::find($id);
        $menus = Menu::pluck('nombre', 'id');
        $categorias = Categoria::pluck('categoria', 'id');
        return view('tenant.admin.submenu.edit', compact('categoriasMenu', 'menus', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CategoriasMenu $categoriasMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriasMenu $categoriasMenu)
    {
        request()->validate(CategoriasMenu::$rules);

        $categoriasMenu->update($request->all());

        return redirect()->route('submenus.index')
            ->with('success', 'CategoriasMenu updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $categoriasMenu = CategoriasMenu::find($id)->delete();

        return redirect()->route('submenus.index')
            ->with('success', 'CategoriasMenu deleted successfully');
    }
}
