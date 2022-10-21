<?php

use App\Models\Tenant\Cliente;
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
?>
<!--header start-->
<header id="stickyheader">
  <div class="mobile-fix-option"></div>
  <div class="top-header">
    <div class="custom-container">
      <div class="row">
        <div class="col-xl-5 col-md-7 col-sm-6">
          <div class="top-header-left">
            <div class="shpping-order">
              <h6>{{ $tenant->nombre_tienda }} - {{ $tenant->correo }}</h6>
            </div>
          </div>
        </div>

        <div class="col-xl-7 col-md-5 col-sm-6">
          <div class="top-header-right">
            <div class="top-menu-block">
              <ul>
              </ul>
            </div>
            <div class="language-block">
              <div class="curroncy-dropdown">
                <li onclick="openAccount()">
                  <span class="curroncy-dropdown-click">
                    <i class="fa fa-user"></i> mi perfil
                  </span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <div class="top-header-right">
            <ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="layout-header2">
    <div class="container">
      <div class="col-md-12">
        <div class="main-menu-block">
          <div class="header-left">
            <div class="sm-nav-block">
              <span class="sm-nav-btn">
                <i class="fa fa-bars"></i>
              </span>
              <ul class="nav-slide">
                <li>
                  <div class="nav-sm-back">
                    back <i class="fa fa-angle-right ps-2"></i>
                  </div>
                </li>
                <li><a href="category-page(left-sidebar).html">western ware</a></li>
                <li><a href="category-page(left-sidebar).html">TV, Appliances</a></li>
                <li><a href="category-page(left-sidebar).html">Pets Products</a></li>
                <li><a href="category-page(left-sidebar).html">Car, Motorbike</a></li>
                <li><a href="category-page(left-sidebar).html">Industrial Products</a></li>
                <li><a href="category-page(left-sidebar).html">Beauty, Health Products</a></li>
                <li><a href="category-page(left-sidebar).html">Grocery Products </a></li>
                <li><a href="category-page(left-sidebar).html">Sports</a></li>
                <li><a href="category-page(left-sidebar).html">Bags, Luggage</a></li>
                <li><a href="category-page(left-sidebar).html">Movies, Music </a></li>
                <li><a href="category-page(left-sidebar).html">Video Games</a></li>
                <li><a href="category-page(left-sidebar).html">Toys, Baby Products</a></li>
                <li class="mor-slide-open">
                  <ul>
                    <li><a href="category-page(left-sidebar).html">Bags, Luggage</a></li>
                    <li><a href="category-page(left-sidebar).html">Movies, Music </a></li>
                    <li><a href="category-page(left-sidebar).html">Video Games</a></li>
                    <li><a href="category-page(left-sidebar).html">Toys, Baby Products</a></li>
                  </ul>
                </li>
                <li>
                  <a class="mor-slide-click">
                    mor category
                    <i class="fa fa-angle-down pro-down"></i>
                    <i class="fa fa-angle-up pro-up"></i>
                  </a>
                </li>
              </ul>
            </div>
            <div class="brand-logo logo-sm-center">
              <a href="/">
                <img src="{{ global_asset($tenant->logo) }}" class="img-fluid  logo" alt="logo">
              </a>
            </div>
          </div>
          <div class="input-block">
            <div class="input-box">
              <form class="big-deal-form ">
                <div class="input-group ">
                  <div class="input-group-text" id="btnBuscar">
                    <span class="search"><i class="fa fa-search"></i></span>
                  </div>
                  <input type="search" id="productoBuscar" class="form-control" placeholder="Buscar producto">
                  <div class="input-group-text">
                    <select id="categoriaBuscar">
                      <option value="all">todos</option>
                      @foreach($categorias as $categoria)
                      <option value="{{$categoria->categoria}}">{{$categoria->categoria}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="header-right">
            <div class="icon-block">
              <ul>
                <li class="mobile-search">
                  <a href="javascript:void(0)">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 612.01 612.01" style="enable-background:new 0 0 612.01 612.01;" xml:space="preserve">
                      <g>
                        <g>
                          <g>
                            <path d="M606.209,578.714L448.198,423.228C489.576,378.272,515,318.817,515,253.393C514.98,113.439,399.704,0,257.493,0
                              C115.282,0,0.006,113.439,0.006,253.393s115.276,253.393,257.487,253.393c61.445,0,117.801-21.253,162.068-56.586
                              l158.624,156.099c7.729,7.614,20.277,7.614,28.006,0C613.938,598.686,613.938,586.328,606.209,578.714z M257.493,467.8
                              c-120.326,0-217.869-95.993-217.869-214.407S137.167,38.986,257.493,38.986c120.327,0,217.869,95.993,217.869,214.407
                              S377.82,467.8,257.493,467.8z" />
                          </g>
                        </g>
                      </g>
                    </svg>
                  </a>
                </li>
                <li class="mobile-user " onclick="openAccount()">
                  <a href="javascript:void(0)">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                      <g>
                        <g>
                          <path d="M256,0c-74.439,0-135,60.561-135,135s60.561,135,135,135s135-60.561,135-135S330.439,0,256,0z M256,240
                              c-57.897,0-105-47.103-105-105c0-57.897,47.103-105,105-105c57.897,0,105,47.103,105,105C361,192.897,313.897,240,256,240z" />
                        </g>
                      </g>
                      <g>
                        <g>
                          <path d="M297.833,301h-83.667C144.964,301,76.669,332.951,31,401.458V512h450V401.458C435.397,333.05,367.121,301,297.833,301z
                               M451.001,482H451H61v-71.363C96.031,360.683,152.952,331,214.167,331h83.667c61.215,0,118.135,29.683,153.167,79.637V482z" />
                        </g>
                      </g>
                    </svg>
                  </a>
                </li>
                <li class="mobile-setting">
                </li>
                <li class="mobile-wishlist item-count">
                </li>
                <li class="mobile-cart item-count" onclick="openCart()">
                  <a href="javascript:void(0)">
                    <div class="cart-block">
                      <div class="cart-icon">
                        <svg enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                          <g>
                            <path d="m497 401.667c-415.684 0-397.149.077-397.175-.139-4.556-36.483-4.373-34.149-4.076-34.193 199.47-1.037-277.492.065 368.071.065 26.896 0 47.18-20.377 47.18-47.4v-203.25c0-19.7-16.025-35.755-35.725-35.79l-124.179-.214v-31.746c0-17.645-14.355-32-32-32h-29.972c-17.64 0-31.99 14.351-31.99 31.99v31.594l-133.21-.232-9.985-54.992c-2.667-14.694-15.443-25.36-30.378-25.36h-68.561c-8.284 0-15 6.716-15 15s6.716 15 15 15c72.595 0 69.219-.399 69.422.719 16.275 89.632 5.917 26.988 49.58 306.416l-38.389.2c-18.027.069-32.06 15.893-29.81 33.899l4.252 34.016c1.883 15.06 14.748 26.417 29.925 26.417h26.62c-18.8 36.504 7.827 80.333 49.067 80.333 41.221 0 67.876-43.813 49.067-80.333h142.866c-18.801 36.504 7.827 80.333 49.067 80.333 41.22 0 67.875-43.811 49.066-80.333h31.267c8.284 0 15-6.716 15-15s-6.716-15-15-15zm-209.865-352.677c0-1.097.893-1.99 1.99-1.99h29.972c1.103 0 2 .897 2 2v111c0 8.284 6.716 15 15 15h22.276l-46.75 46.779c-4.149 4.151-10.866 4.151-15.015 0l-46.751-46.779h22.277c8.284 0 15-6.716 15-15v-111.01zm-30 61.594v34.416h-25.039c-20.126 0-30.252 24.394-16.014 38.644l59.308 59.342c15.874 15.883 41.576 15.885 57.452 0l59.307-59.342c14.229-14.237 4.13-38.644-16.013-38.644h-25.039v-34.254l124.127.214c3.186.005 5.776 2.603 5.776 5.79v203.25c0 10.407-6.904 17.4-17.18 17.4h-299.412l-35.477-227.039zm-56.302 346.249c0 13.877-11.29 25.167-25.167 25.167s-25.166-11.29-25.166-25.167 11.29-25.167 25.167-25.167 25.166 11.291 25.166 25.167zm241 0c0 13.877-11.289 25.167-25.166 25.167s-25.167-11.29-25.167-25.167 11.29-25.167 25.167-25.167 25.166 11.291 25.166 25.167z" />
                          </g>
                        </svg>
                      </div>
                      <div class="cart-item">
                        <h5>Carrito</h5>
                        <h5>compras</h5>
                      </div>
                    </div>
                  </a>
                  @if($cantidadCarrito > 0)
                  <div class="item-count-contain">
                    {{ $cantidadCarrito }}
                  </div>
                  @endif
                </li>
              </ul>
            </div>
            <div class="menu-nav">
              <span class="toggle-nav">
                <i class="fa fa-bars "></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="searchbar-input">
      <div class="input-group">
        <span class="input-group-text">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28.931px" height="28.932px" viewBox="0 0 28.931 28.932" style="enable-background:new 0 0 28.931 28.932;" xml:space="preserve">
            <g>
              <path d="M28.344,25.518l-6.114-6.115c1.486-2.067,2.303-4.537,2.303-7.137c0-3.275-1.275-6.355-3.594-8.672C18.625,1.278,15.543,0,12.266,0C8.99,0,5.909,1.275,3.593,3.594C1.277,5.909,0.001,8.99,0.001,12.266c0,3.276,1.275,6.356,3.592,8.674c2.316,2.316,5.396,3.594,8.673,3.594c2.599,0,5.067-0.813,7.136-2.303l6.114,6.115c0.392,0.391,0.902,0.586,1.414,0.586c0.513,0,1.024-0.195,1.414-0.586C29.125,27.564,29.125,26.299,28.344,25.518z M6.422,18.111c-1.562-1.562-2.421-3.639-2.421-5.846S4.86,7.983,6.422,6.421c1.561-1.562,3.636-2.422,5.844-2.422s4.284,0.86,5.845,2.422c1.562,1.562,2.422,3.638,2.422,5.845s-0.859,4.283-2.422,5.846c-1.562,1.562-3.636,2.42-5.845,2.42S7.981,19.672,6.422,18.111z" />
            </g>
          </svg>
        </span>
        <input type="text" class="form-control" placeholder="search your product">
        <span class="input-group-text close-searchbar">
          <svg viewBox="0 0 329.26933 329" xmlns="http://www.w3.org/2000/svg">
            <path d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0" />
          </svg>
        </span>
      </div>
    </div>
  </div>
  <div class="category-header-2">
    <div class="custom-container">
      <div class="row">
        <div class="col-12">
          <div class="navbar-menu">
            <div class="logo-block">
              <div class="brand-logo logo-sm-center">
                <a href="/">
                  <img src="{{ global_asset($tenant->logo) }}" class="img-fluid logo " alt="logo">
                </a>
              </div>
            </div>
            <div class="nav-block">

              <div class="nav-left">

                <nav class="navbar" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent">
                  <button class="navbar-toggler" type="button">
                    <span class="navbar-icon"><i class="fa fa-arrow-down"></i></span>
                  </button>
                  <h5 class="mb-0  text-white title-font">comprar por categoria</h5>
                </nav>
                <div class="collapse  nav-desk" id="navbarToggleExternalContent">
                  <ul class="nav-cat title-font">
                    @foreach($categorias as $categoria)
                    <li>
                      <a href="{{url('categorias/'.$categoria->categoria)}}">{{ $categoria->categoria}}</a>
                    </li>
                    @endforeach
                  </ul>
                </div>
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
                    <a class="dark-menu-item" href="/">inicio</a>
                  </li>
                  <!--HOME-END-->
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
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="searchbar-input">
      <div class="input-group">
        <span class="input-group-text">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28.931px" height="28.932px" viewBox="0 0 28.931 28.932" style="enable-background:new 0 0 28.931 28.932;" xml:space="preserve">
            <g>
              <path d="M28.344,25.518l-6.114-6.115c1.486-2.067,2.303-4.537,2.303-7.137c0-3.275-1.275-6.355-3.594-8.672C18.625,1.278,15.543,0,12.266,0C8.99,0,5.909,1.275,3.593,3.594C1.277,5.909,0.001,8.99,0.001,12.266c0,3.276,1.275,6.356,3.592,8.674c2.316,2.316,5.396,3.594,8.673,3.594c2.599,0,5.067-0.813,7.136-2.303l6.114,6.115c0.392,0.391,0.902,0.586,1.414,0.586c0.513,0,1.024-0.195,1.414-0.586C29.125,27.564,29.125,26.299,28.344,25.518z M6.422,18.111c-1.562-1.562-2.421-3.639-2.421-5.846S4.86,7.983,6.422,6.421c1.561-1.562,3.636-2.422,5.844-2.422s4.284,0.86,5.845,2.422c1.562,1.562,2.422,3.638,2.422,5.845s-0.859,4.283-2.422,5.846c-1.562,1.562-3.636,2.42-5.845,2.42S7.981,19.672,6.422,18.111z" />
            </g>
          </svg>
        </span>
        <input type="text" class="form-control" placeholder="search your product">
        <span class="input-group-text close-searchbar">
          <svg viewBox="0 0 329.26933 329" xmlns="http://www.w3.org/2000/svg">
            <path d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0" />
          </svg>
        </span>
      </div>
    </div>
  </div>
  <!-- Add to cart bar -->
  <div id="cart_side" class="add_to_cart top ">
    <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
    <div class="cart-inner">
      <div class="cart_top">
        <h3>carrito de compras</h3>
        <div class="close-cart">
          <a href="javascript:void(0)" onclick="closeCart()">
            <i class="fa fa-times" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <div class="cart_media">
        @if($cantidadCarrito <= 0) <span>En este momento no tienes productos en tu carrito de compras</span>
          @else
          <form action="{{ route('tenant.form.compra') }}" method="post">
            @csrf
            <ul class="cart_product">
              <?php $index = 0; ?>
              @foreach($carroCompras as $producto)
              <input type="hidden" name="productos[{{ $index }}][id]" value="{{ $producto->id }}">
              <input type="hidden" id="inputCantidad" name="productos[{{ $index }}][cantidad]" value="{{ $producto->cantidad }}">
              <input type="hidden" name="productos[{{ $index }}][precio]" value="{{ $producto->precio }}">
              <?php $index++; ?>

              <li>
                <div class="media">
                  <a href="product-page(left-sidebar).html">
                    <img alt="{{ $producto->nombre }}" class="me-3" src="{{ $producto->imagen_1 }}">
                  </a>
                  <div class="media-body">
                    <a href="product-page(left-sidebar).html">
                      <h4>{{ $producto->nombre }}</h4>
                    </a>
                    <h6>
                      ${{ $producto->precio }}
                    </h6>
                    <div class="addit-box">
                      <div class="qty-box">
                        <div class="input-group">
                          <button type="button" class="qty-minus"></button>
                          <input id-producto="{{$producto->id}}" class="qty-adj form-control cantidad-producto" min="1" type="number" value="{{ $producto->cantidad }}" />
                          <button type="button" class="qty-plus"></button>
                        </div>
                      </div>
                      <?php $total += $producto->cantidad * $producto->precio; ?>

                      <div class="pro-add">
                        <a href="javascript:void(0)">
                          <i data-feather="trash-2"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
            <ul class="cart_total">
              <li>
                subtotal : <span class="total-carrito">${{ $total }}</span>
              </li>
              <li>
                <div class="total">
                  total<span class="total-carrito">${{ $total }}</span>
                </div>
              </li>
              <li>
                <div class="buttons">
                  <button type="submit" class="btn btn-solid btn-sm " name="btnCarritoCompras">Pagar</button>
                </div>
              </li>
            </ul>
          </form>
          @endif
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
</header>
<!--header end-->