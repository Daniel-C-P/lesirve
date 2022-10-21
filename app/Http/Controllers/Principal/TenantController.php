<?php

namespace App\Http\Controllers\Principal;

use App\Http\Controllers\Controller;
use App\Models\Principal\Tenant;
use Illuminate\Http\Request;
use App\Models\Principal\CentralUser;
use App\Models\Principal\Domain;
use App\Models\Tenant\Categoria;
use App\Models\Tenant\Configuracione;
use App\Models\Tenant\Banners;
use App\Models\Tenant\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Tenant\TiposPago;
use App\Models\Tenant\EstadosVenta;
use App\Models\Tenant\EstadosPago;
use App\Models\Tenant\Menu;
use App\Models\Tenant\Producto;
use Illuminate\Support\Facades\Hash;

/**
 * Class TenantController
 * @package App\Http\Controllers
 */
class TenantController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $tenants = Domain::paginate();
    return view('principal.tenant.index', compact('tenants'))
      ->with('i', (request()->input('page', 1) - 1) * $tenants->perPage());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $tenant = new Tenant();
    $clientes = CentralUser::pluck('correo', 'id');
    return view('principal.tenant.create', compact('tenant', 'clientes'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $request->validate([
      'id' => ['required', 'unique:tenants'],
      'id_cliente' => ['required']
    ]);
    $id = $request->id;
    $cliente = $request->id_cliente;
    $infoCliente = CentralUser::findOrFail($cliente);
    $dominio = $_SERVER['SERVER_NAME'];
    $dominio = $dominio == "127.0.0.1" ? "localhost" : $dominio;
    $tenant = Tenant::create([
      'id' => $id
    ]);
    $tenant->domains()->create([
      'domain' => "$id.$dominio",
      'cliente_id' => $cliente
    ]);
    $rutas = [
      'img',
      'menu'
    ];
    foreach ($rutas as $ruta) {
      mkdir("./tenants/$id/$ruta", 0755, true);
    }

    $tenant->run(function () {
      $rol1 = Role::create(['name' => 'tenant.admin']);
      $rol2 = Role::create(['name' => 'tenant.usuarios']);

      Permission::create(['name' => 'tenant.admin.home'])->syncRoles([$rol1]);
      Permission::create(['name' => 'tenant.usuarios.home'])->syncRoles([$rol2]);

      Permission::create(['name' => 'tenant.admin.tenants.update'])->syncRoles([$rol1]);
      Permission::create(['name' => 'tenant.admin.tenants.edit'])->syncRoles([$rol1]);
      Permission::create(['name' => 'tenant.admin.tenants.index'])->syncRoles([$rol1]);

      Permission::create(['name' => 'tenant.admin.usuarios.update'])->syncRoles([$rol2]);
      Permission::create(['name' => 'tenant.admin.usuarios.edit'])->syncRoles([$rol2]);
      Permission::create(['name' => 'tenant.admin.usuarios.index'])->syncRoles([$rol2]);
      for ($j = 1; $j <= 7; $j++) {
        if(rand(1, 10) > 5){
          $cat = Categoria::create(['categoria' => 'Categoria '.$j, 'descripcion' => 'categoria generada automaticamente.', 'destacada' => true]);
        }else{
          $cat = Categoria::create(['categoria' => 'Categoria '.$j, 'descripcion' => 'categoria generada automaticamente.']);
        }
        for ($i = 1; $i <= 10; $i++) {
          Producto::create([
            'id_categoria' => $cat->id,
            'nombre' => "Producto $i",
            'precio' => rand(10000, 52000),
            'descripcion_corta' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
              nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
              deserunt mollit anim id est laborum.',
            'descripcion_larga' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
              nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
              deserunt mollit anim id est laborum.',
            'imagen_1' => 'img/producto-default.png',
            'valor_descuento' => 0,
          ]);
        }
      }
    });

    //Ejecutamos las migraciones, para crear los roles por defecto
    /* Artisan::call('tenants:seed', [
      '--database' => $tenant->tenancy_db_name,
    ]); */
    tenancy()->initialize($tenant);

    $duenio = new User();
    $duenio->name = $infoCliente->nombre;
    $duenio->email = $infoCliente->correo;
    $duenio->password = $infoCliente->contrasenia;
    $duenio->save();

    $config = new Configuracione();
    $config->id_plantilla = 'big-deal';
    $config->nombre_tienda = $id;
    $config->logo = 'img/general/logo.jpg';
    $config->imagen_banner_1 = './img/big-deal/pets/menu-banner/1920x800.png';
    $config->imagen_banner_2 = './img/big-deal/pets/menu-banner/1920x800.png';
    $config->imagen_banner_3 = './img/big-deal/pets/menu-banner/1920x800.png';
    $config->save();


    $banner = new Banners();
    $banner->id_configuracion = $config->id;
    $banner->titulo_imagen = 'Banner 1';
    $banner->texto_boton = 'Boton 1';
    $banner->URL_imagen = './img/big-deal/pets/menu-banner/600x400.png';
    $banner->save();
    $banner = new Banners();
    $banner->id_configuracion = $config->id;
    $banner->titulo_imagen = 'Banner 2';
    $banner->texto_boton = 'Boton 2';
    $banner->URL_imagen = './img/big-deal/pets/menu-banner/600x400.png';
    $banner->save();
    $banner = new Banners();
    $banner->id_configuracion = $config->id;
    $banner->titulo_imagen = 'Banner 3';
    $banner->texto_boton = 'Boton 3';
    $banner->URL_imagen = './img/big-deal/pets/menu-banner/1920x800.png';
    $banner->save();
    $banner = new Banners();
    $banner->id_configuracion = $config->id;
    $banner->titulo_imagen = 'Banner 4';
    $banner->texto_boton = 'Boton 4';
    $banner->URL_imagen = './img/big-deal/pets/menu-banner/600x400.png';
    $banner->save();
    $banner = new Banners();
    $banner->id_configuracion = $config->id;
    $banner->titulo_imagen = 'Banner 5';
    $banner->texto_boton = 'Boton 5';
    $banner->URL_imagen = './img/big-deal/pets/menu-banner/600x400.png';
    $banner->save();
    $banner = new Banners();
    $banner->id_configuracion = $config->id;
    $banner->titulo_imagen = 'Banner 6';
    $banner->texto_boton = 'Boton 6';
    $banner->URL_imagen = './img/big-deal/pets/menu-banner/600x400.png';
    $banner->save();

    $menu = new Menu();
    $menu->nombre = 'Descuentos';
    $menu->url = '/descuentos';
    $menu->save();

    TiposPago::create(['descripcion' => 'TRANSFERENCIA']);
    EstadosVenta::create(['descripcion' => 'PENDIENTE DE PAGO']);
    EstadosPago::create(['descripcion' => 'PENDIENTE']);

    return redirect()->route('tiendas.index')
      ->with('success', 'Se registro el tenant con exito.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function show($tenant)
  {
    $puerto = $_SERVER['SERVER_PORT'];
    return redirect("http://$tenant:$puerto");
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $tenant = Tenant::find($id);
    $clientes = CentralUser::pluck('nombre', 'id');

    return view('principal.tenant.edit', compact('tenant', 'clientes'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  Tenant $tenant
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Tenant $tenant)
  {
    //request()->validate(Tenant::$rules);

    $tenant->update($request->all());

    return redirect()->route('tiendas.index')
      ->with('success', 'Tenant updated successfully');
  }

  /**
   * @param int $id
   * @return \Illuminate\Http\RedirectResponseyy
   * @throws \Exception
   */
  public function destroy($id)
  {
    $tenant = Tenant::find($id);
    $db_tenant = $tenant->tenancy_db_name;
    $tenant->delete();
    system("rm -rf ./tenants/$id");

    return redirect()->route('tiendas.index')
      ->with('success', 'Tenant deleted successfully');
  }
}
