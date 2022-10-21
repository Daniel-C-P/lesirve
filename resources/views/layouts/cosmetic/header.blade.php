<?php

use App\Models\Tenant\Cliente;
use App\Models\Tenant\Menu;
use App\Models\Tenant\Producto;

$idCliente = auth('cliente')->user()->id ?? null;
$carroCompras = $idCliente ? Cliente::find($idCliente)->carroCompras : [];
$productosCar = [];
foreach ($carroCompras as $carroProducto) {
  $productoCar = Producto::find($carroProducto->id_producto);
  $productoCar->cantidad = $carroProducto->cantidad;
  array_push($productosCar, $productoCar);
}
$carroCompras = $productosCar;
$cantidadCarrito = count($carroCompras);
$total = 0;

$menus = Menu::where('visible', true)->paginate();
?>
<!--header start-->
<header id="stickyheader">
  <div class="mobile-fix-option"></div>
  <div class="top-header2">
    <div class="custom-container">
      <div class="row">
        <div class="col-md-8 col-sm-12">
          <div class="top-header-left">
            <ul>
              <li>
                <a href="javascript:void(0)">{{ $tenant->nombre_tienda }}</a>
              </li>
              <li>
                <a href="javascript:void(0)"><i class="fa fa-phone"></i>Llamanos: {{ $tenant->telefono }}</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <div class="top-header-right">
            <ul>
              <li onclick="openAccount()">
                <a href="javascript:void(0)"><i class="fa fa-user"></i> mi perfil</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="searchbar-main header7">
    <div class="custom-container">
      <div class="row">
        <div class="col-12">
          <div class="header-contain">
            <div class="logo-block">
              <div class="brand-logo">
                <a href="/">
                  <img src="{{ global_asset($tenant->logo) }}" class="img-fluid logo " alt="logo">
                </a>
              </div>
            </div>
            <div class="menu-block">
              <nav id="main-nav">
                <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                  <li>
                    <div class="mobile-back text-right">Back<i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  <!--HOME-->
                  <li>
                    <a class="dark-menu-item" href="javascript:void(0)">Inicio</a>
                  </li>
                  @foreach($menus as $menu)
                  <li>
                    <a class="dark-menu-item" target="{{ $menu->url ? '_blank' : '' }}" href="{{ $menu->url ?? 'javascript:void(0)' }}">{{ $menu->nombre }}</a>
                    @if($menu->url == null && count($menu->categorias) > 0)
                    <ul>
                      @foreach($menu->categorias as $categoriaMenu)
                      <li>
                        <a href='{{ url("categorias/$categoriaMenu->categoria") }}'>
                          {{ $categoriaMenu->categoria }}
                        </a>
                      </li>
                      @endforeach
                    </ul>
                    @endif
                  </li>
                  @endforeach
                  <!--HOME-END-->
                </ul>
              </nav>
            </div>
            <div class="icon-block">
              <ul class="theme-color">
                <li class="mobile-user icon-desk-none" onclick="openAccount()">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <g>
                      <g>
                        <path d="M255.999,0c-74.443,0-135,60.557-135,135s60.557,135,135,135s135-60.557,135-135S330.442,0,255.999,0z" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path d="M478.48,398.68C438.124,338.138,370.579,302,297.835,302h-83.672c-72.744,0-140.288,36.138-180.644,96.68l-2.52,3.779V512h450h0.001V402.459L478.48,398.68z" />
                      </g>
                    </g>
                  </svg>
                </li>
                <li class="mobile-cart item-count" onclick="openCart()">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <g>
                      <g>
                        <path d="M443.209,442.24l-27.296-299.68c-0.736-8.256-7.648-14.56-15.936-14.56h-48V96c0-25.728-9.984-49.856-28.064-67.936
                                    C306.121,10.24,281.353,0,255.977,0c-52.928,0-96,43.072-96,96v32h-48c-8.288,0-15.2,6.304-15.936,14.56L68.809,442.208
                                    c-1.632,17.888,4.384,35.712,16.48,48.96S114.601,512,132.553,512h246.88c17.92,0,35.136-7.584,47.232-20.8
                                    C438.793,477.952,444.777,460.096,443.209,442.24z M319.977,128h-128V96c0-35.296,28.704-64,64-64
                                    c16.96,0,33.472,6.784,45.312,18.656C313.353,62.72,319.977,78.816,319.977,96V128z" />
                      </g>
                    </g>
                  </svg>
                  @if($cantidadCarrito > 0)
                  <div class="item-count-contain inverce">
                    {{ $cantidadCarrito }}
                  </div>
                  @endif
                </li>
              </ul>
              <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="searchbar-input">
      <div class="input-group">
        <span class="input-group-text"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28.931px" height="28.932px" viewBox="0 0 28.931 28.932" style="enable-background:new 0 0 28.931 28.932;" xml:space="preserve">
            <g>
              <path d="M28.344,25.518l-6.114-6.115c1.486-2.067,2.303-4.537,2.303-7.137c0-3.275-1.275-6.355-3.594-8.672C18.625,1.278,15.543,0,12.266,0C8.99,0,5.909,1.275,3.593,3.594C1.277,5.909,0.001,8.99,0.001,12.266c0,3.276,1.275,6.356,3.592,8.674c2.316,2.316,5.396,3.594,8.673,3.594c2.599,0,5.067-0.813,7.136-2.303l6.114,6.115c0.392,0.391,0.902,0.586,1.414,0.586c0.513,0,1.024-0.195,1.414-0.586C29.125,27.564,29.125,26.299,28.344,25.518z M6.422,18.111c-1.562-1.562-2.421-3.639-2.421-5.846S4.86,7.983,6.422,6.421c1.561-1.562,3.636-2.422,5.844-2.422s4.284,0.86,5.845,2.422c1.562,1.562,2.422,3.638,2.422,5.845s-0.859,4.283-2.422,5.846c-1.562,1.562-3.636,2.42-5.845,2.42S7.981,19.672,6.422,18.111z" />
            </g>
          </svg></span>
        <input type="text" class="form-control" placeholder="search your product">
        <span class="input-group-text close-searchbar"><svg viewBox="0 0 329.26933 329" xmlns="http://www.w3.org/2000/svg">
            <path d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0" />
          </svg></span>
      </div>
    </div>
  </div>
</header>
<!--header end-->

<!-- Add to cart bar -->
<div id="cart_side" class="add_to_cart right ">
  <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
  <div class="cart-inner">
    <div class="cart_top">
      <h3>Carrito de compras</h3>
      <div class="close-cart">
        <a href="javascript:void(0)" onclick="closeCart()">
          <i class="fa fa-times" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="cart_media">
      <ul class="cart_product">
        @if($cantidadCarrito == 0)
        <li>En este momento no tienes productos en tu carrito de compras</li>
        @else
        <form action="{{ route('tenant.form.compra') }}" method="post">
          @csrf
          <?php $index = 0; ?>
          @foreach($carroCompras as $producto)
          <input type="hidden" name="productos[{{ $index }}][id]" value="{{ $producto->id }}">
          <input type="hidden" id="inputCantidad" name="productos[{{ $index }}][cantidad]" value="{{ $producto->cantidad }}">
          <input type="hidden" name="productos[{{ $index }}][precio]" value="{{ $producto->precio }}">
          <?php $index++; ?>
          <li>
            <div class="media">
              <a href="">
                <img alt="megastore1" class="me-3" src="{{ global_asset($producto->imagen_1) }}">
              </a>
              <div class="media-body">
                <a href="">
                  <h4>{{ $producto->nombre }}</h4>
                </a>
                <h6>
                  ${{ number_format($producto->precio, 2, '.') }}
                </h6>
                <div class="addit-box">
                  <div class="qty-box">
                    <div class="input-group">
                      <button type="button" class="qty-minus"></button>
                      <input id-producto="{{$producto->id}}" class="qty-adj form-control cantidad-producto" min="1" type="number" value="{{ $producto->cantidad }}" />
                      <button type="button" class="qty-plus"></button>
                    </div>
                  </div>
                  <div class="pro-add">
                    <a href="javascript:void(0)">
                      <i data-feather="trash-2"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <?php $total += $producto->cantidad * $producto->precio; ?>
          @endforeach
        </form>
        @endif
      </ul>
      <ul class="cart_total">
        <li>
          subtotal : <span class="total-carrito">${{ number_format($total, 2, '.') }}</span>
        </li>
        <li>
          <div class="total">
            total<span class="total-carrito">${{ number_format($total, 2, '.') }}</span>
          </div>
        </li>
        <li>
          <div class="buttons">
            <button type="submit" class="btn btn-solid btn-sm " name="btnCarritoCompras">Pagar</button>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- Add to cart bar end-->

<!-- My account bar start-->
<div id="myAccount" class="add_to_cart right account-bar">
  <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
  <div class="cart-inner">
    <div class="cart_top">
      <h3>mi perfil</h3>
      <div class="close-cart">
        <a href="javascript:void(0)" onclick="closeAccount()">
          <i class="fa fa-times" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="forms-auth">
      @auth('cliente')
      <form class="theme-form active" method="POST" action="{{route('tenant.update-perfil')}}">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="nombre_perfil">Nombre</label>
          <input value="{{ auth('cliente')->user()->nombre }}" name="nombre" type="text" class="form-control" id="nombre_perfil" placeholder="John Doe" required="">
          @error('nombre')
          <span role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="telefono_perfil">Teléfono</label>
          <input value="{{ auth('cliente')->user()->telefono }}" name="telefono" type="text" max="10" class="form-control" id="telefono_perfil" placeholder="123-456-7890" required="">
          @error('telefono')
          <span role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="ciudad_perfil">Ciudad</label>
          <input value="{{ auth('cliente')->user()->ciudad }}" name="ciudad" type="text" class="form-control" id="ciudad_perfil" placeholder="Cali" required="">
          @error('direccion')
          <span role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="direccion_perfil">Dirección</label>
          <input value="{{ auth('cliente')->user()->direccion }}" name="direccion" type="text" class="form-control" id="direccion_perfil" placeholder="Calle ## ##-##" required="">
          @error('direccion')
          <span role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="correo_perfil">Correo</label>
          <input value="{{ auth('cliente')->user()->correo }}" name="correo" type="email" class="form-control" id="correo_perfil" placeholder="correo@dominio.com" required="">
          @error('correo')
          <span role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-solid btn-md btn-block">Actualizar Perfil</button>
        </div>
      </form>
      <hr />
      <form class="theme-form active" action="{{route('tenant.clientes.logout')}}" method="get">
        <div class="form-group">
          <a href="{{route('servicios-solicitados')}}" class="btn btn-solid btn-md btn-block">Servicios Solicitados</a>
        </div>
        <div class="form-group">
          <a href="{{route('tenant.compras.cliente')}}" class="btn btn-solid btn-md btn-block">Mis compras</a>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-solid btn-md btn-block">Cerrar Sesión</button>
        </div>
      </form>
      @else
      <form class="theme-form active " id="form-login" method="POST" action="{{route('tenant.login')}}">
        @csrf
        <div class="form-group">
          <label for="correo-login">Correo</label>
          <input name="correo" type="text" class="form-control" id="correo-login" placeholder="correo@dominio.com" required="">
        </div>
        <div class="form-group">
          <label for="password-login">Contraseña</label>
          <input name="password" type="password" class="form-control" id="password-login" placeholder="Ingrese su contraseña" required="">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-solid btn-md btn-block">Iniciar sesion</button>
        </div>
        <div class="accout-fwd">
          <a href="{{ route('recuperar-cuenta') }}" class="d-block">
            <h5>Olvido su contraseña?</h5>
          </a>
          <a onclick="mostrarRegistro();" href="javascript:void(0)" class="d-block">
            <h6>No tienes una cuenta?<span>registrarse</span></h6>
          </a>
        </div>
      </form>
      <form class="theme-form" id="form-register" method="POST" action="{{route('tenant.register')}}">
        @csrf
        <div class="form-group">
          <label for="nombre_register">Nombre</label>
          <input value="{{ old('nombre') }}" name="nombre" type="text" class="form-control" id="nombre_register" placeholder="John Doe" required="">
          @error('nombre')
          <span role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="telefono_register">Teléfono</label>
          <input value="{{ old('telefono') }}" name="telefono" type="text" max="10" class="form-control" id="telefono_register" placeholder="123-456-7890" required="">
          @error('telefono')
          <span role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="ciudad_register">Ciudad</label>
          <input value="{{ old('ciudad') }}" name="ciudad" type="text" class="form-control" id="ciudad_register" placeholder="Cali" required="">
          @error('direccion')
          <span role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="direccion_register">Dirección</label>
          <input value="{{ old('direccion') }}" name="direccion" type="text" class="form-control" id="direccion_register" placeholder="Calle ## ##-##" required="">
          @error('direccion')
          <span role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="correo_register">Correo</label>
          <input value="{{ old('correo') }}" name="correo" type="email" class="form-control" id="correo_register" placeholder="correo@dominio.com" required="">
          @error('correo')
          <span role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="contrasenia_register">Contraseña</label>
          <input name="contrasenia" type="password" class="form-control" id="contrasenia_register" placeholder="Ingrese su contraseña" required="">
          @error('contrasenia')
          <span role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="contrasenia_confirmation_register">Confirmar contraseña</label>
          <input name="contrasenia_confirmation" type="password" class="form-control" id="contrasenia_confirmation_register" placeholder="Ingrese su contraseña" required="">
          @error('contrasenia_confirmation')
          <span role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-solid btn-md btn-block">Registrarse</button>
        </div>
        <div class="accout-fwd">
          <a onclick="mostrarLogin();" href="javascript:void(0)" class="d-block">
            <h6>Ya tienes una cuenta?<span>iniciar sesion</span></h6>
          </a>
        </div>
      </form>
      @endauth
    </div>
  </div>
</div>
<!-- Add to account bar end-->