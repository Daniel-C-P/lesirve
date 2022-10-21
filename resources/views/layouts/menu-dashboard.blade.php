<ul class="sidebar-menu">
  <li><a class="sidebar-header" href="{{ route('tenant.admin.home') }}"><i data-feather="home"></i><span>Dashboard</span></a></li>
  <li><a class="sidebar-header" href="javascript:void(0)"><i data-feather="box"></i> <span>Menus</span><i class="fa fa-angle-right pull-right"></i></a>
    <ul class="sidebar-submenu">
      <li>
        <a href="{{ route('menus.index') }}">
          <span>Títulos</span>
        </a>
      </li>
      <li>
        <a href="{{ route('submenus.index') }}">
          <span>Submenus</span>
        </a>
      </li>
    </ul>
  </li>
  <li><a class="sidebar-header" href="javascript:void(0)"><i data-feather="users"></i> <span>Usuarios</span><i class="fa fa-angle-right pull-right"></i></a>
    <ul class="sidebar-submenu">
      <li>
        <a href="{{ route('tenant.admin.users.index') }}">
          <span>Usuarios</span>
        </a>
      </li>
      <li>
        <a href="{{ route('tenant.clientes.index') }}">
          <span>Clientes</span>
        </a>
      </li>
    </ul>
  </li>
  <li><a class="sidebar-header" href="javascript:void(0)"><i data-feather="box"></i> <span>Estados</span><i class="fa fa-angle-right pull-right"></i></a>
    <ul class="sidebar-submenu">
      <li>
        <a href="{{ route('tenant.estados.ventas.index') }}">
          <span>Ventas</span>
        </a>
      </li>
      <li>
        <a href="{{ route('tenant.estados.pagos.index') }}">
          <span>Pagos</span>
        </a>
      </li>
    </ul>
  </li>
  <li><a class="sidebar-header" href="javascript:void(0)"><i data-feather="box"></i> <span>Productos</span><i class="fa fa-angle-right pull-right"></i></a>
    <ul class="sidebar-submenu">
      <li>
        <a href="{{ route('categorias.index') }}">
          <span>Categorias</span>
        </a>
      </li>
      <li>
        <a href="{{ route('productos.index') }}">
          <span>Productos</span>
        </a>
      </li>
    </ul>
  </li>
  <li><a class="sidebar-header" href="javascript:void(0)"><i data-feather="box"></i> <span>Servicios</span><i class="fa fa-angle-right pull-right"></i></a>
    <ul class="sidebar-submenu">
      <li>
        <a href="{{ route('servicios.index') }}">
          <span>Servicios</span>
        </a>
      </li>
      <li>
        <a href="{{ route('reserva-servicios.index') }}">
          <span>Reservas</span>
        </a>
      </li>
    </ul>
  </li>
  <li><a class="sidebar-header" href="javascript:void(0)"><i data-feather="dollar-sign"></i> <span>Ventas</span><i class="fa fa-angle-right pull-right"></i></a>
    <ul class="sidebar-submenu">
      <li>
        <a href="{{ route('tenant.productos.ventas.index') }}">
          <span>Productos</span>
        </a>
      </li>
    </ul>
  </li>
  <li>
    <a class="sidebar-header" href="{{ route('medios-pagos.index') }}"><i data-feather="credit-card"></i><span>Metodos de Pago</span></a>
  </li>
  <li>
    <a class="sidebar-header" href="{{ route('tenant.admin.configuracion') }}"><i data-feather="settings"></i><span>Configuracion</span></a>
  </li>
  <li>
    <a class="sidebar-header" href="{{ route('logout.tenant.admin') }}"><i data-feather="log-in"></i><span>Cerrar sesion</span></a>
  </li>
</ul>
