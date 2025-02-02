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
<header id="stickyheader" class="header-style2">
  <div class="mobile-fix-option"></div>
  <div class="top-header2">
    <div class="custom-container">
      <div class="row">
        <div class="col-md-8 col-sm-12">
          <div class="top-header-left">
            <ul>
              <li> <a href="javascript:void(0)">{{ $tenant->nombre_tienda }}</a>
              </li>
              <li> <a href="tel:{{$tenant->telefono}}"><i class="fa fa-phone"></i>Llamanos:
                  {{ $tenant->telefono }}</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <div class="top-header-right">
            <ul>
              <li onclick="openAccount()"> <a href="javascript:void(0)"><i class="fa fa-user"></i>mi perfil</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header7">
    <div class="custom-container">
      <div class="row">
        <div class="col-12">
          <div class="header-contain">
            <div class="logo-block">
              <div class="mobilecat-toggle"> <i class="fa fa-bars sidebar-bar"></i> </div>
              <div class="brand-logo logo-sm-center">
                <a href="{{route('tenant.cliente.home')}}">
                  <img src="{{ global_asset($tenant->logo) }}" class="img-fluid logo" alt="logo">
                </a>
              </div>
            </div>
            <div class="header-search ajax-search the-basics">
              <div class="input-group">
                <div class="input-group-text">
                  <select id="categoriaBuscar">
                    <option value="all">todos</option>
                    @if(isset($categorias))
                    @foreach($categorias as $categoria)
                    <option value="{{$categoria->categoria}}">{{$categoria->categoria}}</option>
                    @endforeach
                    @else
                    <option>cocina</option>
                    <option>productos para bebe</option>
                    <option>herramientas de jardin</option>
                    <option>limpieza</option>
                    @endif
                  </select>
                </div>
                <input type="search" id="productoBuscar" class="form-control typeahead" placeholder="Buscar producto">
                <div id="btnBuscar" class="input-group-text">
                  <i class="fa fa-search"></i>
                </div>
              </div>
            </div>
            <div class="icon-block">
              <ul class="theme-color">
                <li class="mobile-search icon-md-block">
                  <svg enable-background="new 0 0 512.002 512.002" viewBox="0 0 512.002 512.002" xmlns="http://www.w3.org/2000/svg">
                    <g>
                      <path d="m495.594
                                    416.408-134.086-134.095c14.685-27.49 22.492-58.333 22.492-90.312
                                    0-50.518-19.461-98.217-54.8-134.31-35.283-36.036-82.45-56.505-132.808-57.636-1.46-.033-2.92-.054-4.392-.054-105.869
                                    0-192 86.131-192 192s86.131 192 192 192c1.459 0 2.93-.021 4.377-.054
                                    30.456-.68 59.739-8.444 85.936-22.436l134.085 134.075c10.57 10.584 24.634
                                    16.414 39.601 16.414s29.031-5.83 39.589-16.403c10.584-10.577 16.413-24.639
                                    16.413-39.597s-5.827-29.019-16.407-39.592zm-299.932-64.453c-1.211.027-2.441.046-3.662.046-88.224
                                    0-160-71.776-160-160s71.776-160 160-160c1.229 0 2.449.019 3.671.046 86.2 1.935
                                    156.329 73.69 156.329 159.954 0 86.274-70.133 158.029-156.338 159.954z" />
                      <path d="m192 320.001c-70.58 0-128-57.42-128-128s57.42-128 128-128 128 57.42 128
                                    128-57.42 128-128 128z" />
                    </g>
                  </svg>
                </li>
                <li class="mobile-user icon-desk-none" onclick="openAccount()">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512
                              512;" xml:space="preserve">
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
                <li class="mobile-cart
                           item-count" onclick="openCart()">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512
                              512;" xml:space="preserve">
                    <g>
                      <g>
                        <path d="M443.209,442.24l-27.296-299.68c-0.736-8.256-7.648-14.56-15.936-14.56h-48V96c0-25.728-9.984-49.856-28.064-67.936
                                       C306.121,10.24,281.353,0,255.977,0c-52.928,0-96,43.072-96,96v32h-48c-8.288,0-15.2,6.304-15.936,14.56L68.809,442.208
                                       c-1.632,17.888,4.384,35.712,16.48,48.96S114.601,512,132.553,512h246.88c17.92,0,35.136-7.584,47.232-20.8
                                       C438.793,477.952,444.777,460.096,443.209,442.24z
                                       M319.977,128h-128V96c0-35.296,28.704-64,64-64
                                       c16.96,0,33.472,6.784,45.312,18.656C313.353,62.72,319.977,78.816,319.977,96V128z" />
                      </g>
                    </g>
                  </svg>
                  @if($cantidadCarrito > 0)
                  <div class="item-count-contain inverce"> {{$cantidadCarrito}} </div>
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
        <div class="input-group-append">
          <span class="input-group-text">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28.931px" height="28.932px" viewBox="0 0 28.931 28.932" style="enable-background:new 0 0 28.931 28.932;" xml:space="preserve">
              <g>
                <path d="M28.344,25.518l-6.114-6.115c1.486-2.067,2.303-4.537,2.303-7.137c0-3.275-1.275-6.355-3.594-8.672C18.625,1.278,15.543,0,12.266,0C8.99,0,5.909,1.275,3.593,3.594C1.277,5.909,0.001,8.99,0.001,12.266c0,3.276,1.275,6.356,3.592,8.674c2.316,2.316,5.396,3.594,8.673,3.594c2.599,0,5.067-0.813,7.136-2.303l6.114,6.115c0.392,0.391,0.902,0.586,1.414,0.586c0.513,0,1.024-0.195,1.414-0.586C29.125,27.564,29.125,26.299,28.344,25.518z M6.422,18.111c-1.562-1.562-2.421-3.639-2.421-5.846S4.86,7.983,6.422,6.421c1.561-1.562,3.636-2.422,5.844-2.422s4.284,0.86,5.845,2.422c1.562,1.562,2.422,3.638,2.422,5.845s-0.859,4.283-2.422,5.846c-1.562,1.562-3.636,2.42-5.845,2.42S7.981,19.672,6.422,18.111z" />
              </g>
            </svg>
          </span>
        </div>
        <input type="text" class="form-control" placeholder="search your product">
        <div class="input-group-append">
          <span class="input-group-text close-searchbar">
            <svg viewBox="0 0 329.26933 329" xmlns="http://www.w3.org/2000/svg">
              <path d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0" />
            </svg>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="category-header7">
    <div class="custom-container">
      <div class="row">
        <div class="col-12">
          <div class="category-contain" id="category-contain">
            <div class="category-left">
              <div class="header-category3">
                <a class="category-toggle "><i class="ti-layout-grid2-alt"></i>Comprar por categoria</a>
                <div class="category-heandle open">
                  <div class="heandle-left">
                    <div class="point"></div>
                  </div>
                  <div class="heandle-right">
                    <div class="point"></div>
                  </div>
                </div>
                <ul class="collapse-category open">
                  <li class="back-btn"><i class="fa fa-angle-left"></i> back</li>
                  @if(isset($categorias))
                  @foreach($categorias as $categoria)
                  <li>
                    <a href="{{url('categorias/'.$categoria->categoria)}}">{{ $categoria->categoria}}</a>
                  </li>
                  @endforeach
                  @else
                  @endif
                </ul>
              </div>
              <div class="logo-block">
                <div class="mobilecat-toggle "> <i class="fa fa-bars sidebar-bar"></i> </div>
                <div class="brand-logo logo-sm-center">
                  <img src="{{ global_asset($tenant->logo) }}" class="img-fluid" alt="logo">
                </div>
              </div>
            </div>
            <div class="category-right">
              <div class="menu-block">
                <nav id="main-nav">
                  <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                  <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                    <li>
                      <div class="mobile-back text-right">Back<i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <!--HOME-->
                    <li>
                      <a class="dark-menu-item" id="inicio" href="/">inicio</a>
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
            <div class="icon-block">
              <ul class="theme-color">
                <li class="mobile-search icon-md-block">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 612.01 612.01" style="enable-background:new 0 0 612.01 612.01;" xml:space="preserve">
                    <g>
                      <g id="_x34__4_">
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
                </li>
                <li class="mobile-user icon-desk-none" onclick="openAccount()">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 480 480" style="enable-background:new 0 0 480 480;" xml:space="preserve">
                    <g>
                      <g>
                        <path d="M386.816,323.456l-69.984-14.016c-7.424-1.472-12.832-8.064-12.832-15.68v-16.064c4.608-6.4,8.928-14.944,13.408-23.872
                                c3.424-6.752,8.576-16.928,10.88-19.328c13.568-13.28,28.032-29.76,32.448-51.232c4-19.456,0-29.568-4.64-37.568
                                c0-15.648,0-44.288-5.44-64.928c-0.544-24.928-5.12-39.008-16.608-51.552c-8.128-8.768-20.096-10.816-29.696-12.448
                                c-3.808-0.64-9.024-1.536-10.848-2.528C276.896,5.056,260.032,0.512,239.392,0c-42.24,1.6-94.08,28.384-111.424,76.544
                                c-5.28,14.624-4.768,38.624-4.384,57.92l-0.448,11.232c-4.064,8-8.064,18.112-4.032,37.536
                                c4.416,21.568,18.88,38.016,32.384,51.232c2.336,2.432,7.552,12.672,11.008,19.424c4.544,8.896,8.896,17.44,13.504,23.84v16.032
                                c0,7.616-5.408,14.208-12.864,15.68l-69.984,14.016C48.448,332.384,16,371.968,16,417.568V448c0,17.632,14.368,32,32,32h384
                                c17.632,0,32-14.368,32-32v-30.432C464,371.968,431.552,332.384,386.816,323.456z M432,448H48v-30.432
                                c0-30.4,21.632-56.8,51.456-62.752l69.952-14.016C191.776,336.384,208,316.576,208,293.76V272c0-4.288-1.728-8.416-4.768-11.392
                                c-2.752-2.688-8.672-14.336-12.224-21.28c-6.016-11.776-11.2-21.952-17.12-27.712c-10.624-10.368-20.768-21.76-23.456-34.816
                                c-2.08-10.112-0.64-12.96,1.216-16.576c1.632-3.2,4.064-8,4.064-14.528l-0.16-11.872c-0.288-13.984-0.768-37.408,2.496-46.432
                                C170.464,52.96,209.856,33.152,239.584,32c14.656,0.384,26.176,3.424,38.4,10.24c6.592,3.648,14.272,4.928,21.024,6.08
                                c3.808,0.64,10.176,1.728,11.488,2.56c4.32,4.704,7.904,10.368,8.16,32.384c0,1.44,0.224,2.88,0.64,4.288
                                c4.768,16.352,4.768,44.576,4.768,58.144c0,6.528,2.464,11.328,4.064,14.528c1.856,3.616,3.296,6.464,1.216,16.608
                                c-2.656,12.992-12.864,24.416-23.456,34.784c-5.952,5.824-11.104,16-17.056,27.808c-3.456,6.912-9.312,18.496-12.032,21.152
                                c-3.072,3.008-4.8,7.136-4.8,11.424v21.76c0,22.816,16.224,42.624,38.592,47.072l69.984,14.016
                                c29.792,5.92,51.424,32.32,51.424,62.72V448z" />
                      </g>
                    </g>
                  </svg>
                </li>
                <li class="mobile-cart item-count" onclick="openCart()">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve">
                    <g>
                      <g>
                        <path d="M435.099,29.815h-71.361V0H148.262v29.814H76.901L40.464,181.549H0.008v103.359h30.969l34.508,227.091h381.029
                                    l34.509-227.091h30.968V181.55h-40.456L435.099,29.815z M178.261,29.999h155.477v29.629H178.261V29.999z M100.549,59.813h47.714
                                    v29.814h215.475V59.813h47.714l29.233,121.736H71.316L100.549,59.813z M420.73,482.001H91.27L61.32,284.909h389.36L420.73,482.001
                                    z M481.993,254.91H30.007v-43.361h451.986V254.91z" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <rect x="241.002" y="326.38" width="29.999" height="114.156" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <rect x="143.436" y="326.38" width="29.999" height="114.156" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <rect x="338.559" y="326.38" width="29.999" height="114.156" />
                      </g>
                    </g>
                  </svg>
                  @if($cantidadCarrito > 0)
                  <div class="item-count-contain inverce"> {{$cantidadCarrito}} </div>
                  @endif
                </li>
              </ul>
              <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
            </div>
            <!-- <div class="store-locator">
                <select>
                  <option value="">store locations</option>
                  <option value="store1">new delhi</option>
                  <option value="store2">mumbai</option>
                  <option value="store3">ludhiyana</option>
                  <option value="store4">kolkata</option>
                  <option value="store5">pune</option>
                  <option value="store6">hariyana</option>
                  <option value="store7">pondicheri</option>
                </select>
              </div> -->
          </div>
        </div>
      </div>
    </div>
    <div class="searchbar-input ajax-search the-basics">
      <div class="input-group">
        <span class="input-group-text">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28.931px" height="28.932px" viewBox="0 0 28.931 28.932" style="enable-background:new 0 0 28.931 28.932;" xml:space="preserve">
            <g>
              <path d="M28.344,25.518l-6.114-6.115c1.486-2.067,2.303-4.537,2.303-7.137c0-3.275-1.275-6.355-3.594-8.672C18.625,1.278,15.543,0,12.266,0C8.99,0,5.909,1.275,3.593,3.594C1.277,5.909,0.001,8.99,0.001,12.266c0,3.276,1.275,6.356,3.592,8.674c2.316,2.316,5.396,3.594,8.673,3.594c2.599,0,5.067-0.813,7.136-2.303l6.114,6.115c0.392,0.391,0.902,0.586,1.414,0.586c0.513,0,1.024-0.195,1.414-0.586C29.125,27.564,29.125,26.299,28.344,25.518z M6.422,18.111c-1.562-1.562-2.421-3.639-2.421-5.846S4.86,7.983,6.422,6.421c1.561-1.562,3.636-2.422,5.844-2.422s4.284,0.86,5.845,2.422c1.562,1.562,2.422,3.638,2.422,5.845s-0.859,4.283-2.422,5.846c-1.562,1.562-3.636,2.42-5.845,2.42S7.981,19.672,6.422,18.111z" />
            </g>
          </svg>
        </span>
        <input type="search" id="inputProductoBuscar" class="form-control typeahead" placeholder="buscar producto">
        <span class="input-group-text close-searchbar">
          <svg viewBox="0 0 329.26933 329" xmlns="http://www.w3.org/2000/svg">
            <path d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0" />
          </svg>
        </span>
      </div>
    </div>
  </div>
</header>
<!--header end-->


<!-- Agregar al carro bar -->
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
      @if($cantidadCarrito == 0)
      <span>En este momento no tienes productos en tu carrito de compras</span>
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
              <a href="">
                <!-- URL PRODUCTO VENTA (VER) -->
                <img class="me-3" src="{{ global_asset($producto->imagen_1) }}">
              </a>
              <div class="media-body">
                <a href="">
                  <!-- URL PRODUCTO VENTA (VER) -->
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
            Subtotal : <span class="total-carrito">${{ $total }}</span>
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
