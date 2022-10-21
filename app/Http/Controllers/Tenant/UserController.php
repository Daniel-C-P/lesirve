<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Models\Tenant\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::paginate();
        return view('tenant.admin.user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('tenant.admin.user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('tenant.admin.users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = Role::all();

        return view('tenant.admin.user.editrol', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('tenant.admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate([
          User::$rules
      ]);

        $user->update($request->all());

        return redirect()->route('tenant.admin.users.index')
            ->with('success', 'Usuario actualizado satisfactoriamente');
    }

    public function mostrarFormCambiarPassword($id)
    {
      $user = User::find($id);
      return view('tenant.admin.user.cambiar-contrasena', compact('user','message'));
    }

    public function cambiarPassword(Request $request, User $user){
      request()->validate(['password' => ['required', 'min:8', 'confirmed']]);
      $password = Hash::make($request->password);
      $user->update([
          'password' => $password,
          'config' => '1'
        ]);
      return redirect()->route('tenant.admin.users.index')
      ->with('success', 'Se cambio la contraseña satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('tenant.admin.users.index')
            ->with('success', 'User deleted successfully');
    }

    public function updateRol(Request $request, User $user)
    {
        $user->assignRole($request->roles);
        return redirect()->route('tenant.admin.asignar', $user)->with('info', 'Se asignaron los roles correctamente');
    }

}
