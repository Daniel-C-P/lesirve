<?php

$url = $url ?? 'home';

$valuesDefault = (object)[
  'logo' => './img/big-deal/pets/logo.png',
  'banner1' => './img/big-deal/pets/menu-banner/1.jpg',
  'banner2' => './img/big-deal/pets/menu-banner/2.jpg',
  'banner3' => './img/big-deal/pets/menu-banner/bg.jpg',
  'direccion' => 'big deal store demo store india-3654123',
  'telefono' => '123-456-7898',
  'correo' => 'support@bigdeal.com',
  'nombre_tienda' => 'Bigdeal - Multi-purpopse E-commerce Html Template',
  'descripcion' => 'It is a long established fact that a reader will be distracted by the readable content.',
  'color_primario' => '#a03b41',
  'color_secundario' => '#f56449',
];

$tenant = isset($tenant) ? $tenant : (object)[
  'id' => null,
  'logo' => $valuesDefault->logo,
  'nombre_tienda' => $valuesDefault->nombre_tienda,
  'descripcion' => $valuesDefault->descripcion,
  'direccion' => $valuesDefault->direccion,
  'telefono' => $valuesDefault->telefono,
  'correo' => $valuesDefault->correo,
  'banner1' => $valuesDefault->banner1,
  'banner2' => $valuesDefault->banner2,
  'banner3' => $valuesDefault->banner3,
  'color_primario' => $valuesDefault->color_primario,
  'color_secundario' => $valuesDefault->color_secundario,
  'banner3' => $valuesDefault->banner3,
  'facebook' => 'javascript:void(0)',
  'twitter' => 'javascript:void(0)',
  'whatsapp' => 'javascript:void(0)',
  'instagram' => 'javascript:void(0)',
  'youtube' => 'javascript:void(0)',
];

$mediosPagos = isset($mediosPagos) ? $mediosPagos : array(
  (object)[
    'logo' => './img/big-deal/layout-1/pay/1.png',
    'nombre' => 'visa',
  ],
  (object)[
    'logo' => './img/big-deal/layout-1/pay/2.png',
    'nombre' => 'mastercard',
  ],
  (object)[
    'logo' => './img/big-deal/layout-1/pay/3.png',
    'nombre' => 'paypal',
  ],
  (object)[
    'logo' => './img/big-deal/layout-1/pay/4.png',
    'nombre' => 'express',
  ],
  (object)[
    'logo' => './img/big-deal/layout-1/pay/5.png',
    'nombre' => 'pay',
  ],
);

$productosNuevos = isset($productosNuevos) ? $productosNuevos : [
  (object)array(
    'nombre' => 'producto 1',
    'precio' => 1200,
    'imagen_1' => 'img/big-deal/pets/product/1.jpg',
    'imagen_2' => 'img/big-deal/pets/product/2.jpg',
  ),
  (object)array(
    'nombre' => 'producto 2',
    'precio' => 500,
    'imagen_1' => 'img/big-deal/pets/product/1.jpg',
    'imagen_2' => 'img/big-deal/pets/product/2.jpg',
  ),
  (object)array(
    'nombre' => 'producto 3',
    'precio' => 6000,
    'imagen_1' => 'img/big-deal/pets/product/1.jpg',
    'imagen_2' => 'img/big-deal/pets/product/2.jpg',
  ),
  (object)array(
    'nombre' => 'producto 4',
    'precio' => 2100,
    'imagen_1' => 'img/big-deal/pets/product/1.jpg',
    'imagen_2' => 'img/big-deal/pets/product/2.jpg',
  ),
  (object)array(
    'nombre' => 'producto 5',
    'precio' => 3200,
    'imagen_1' => 'img/big-deal/pets/product/1.jpg',
    'imagen_2' => 'img/big-deal/pets/product/2.jpg',
  )
];

if (isset($categorias) && count($categorias) > 0) {
  $primeraCategoria = $categorias[0]->id;
  $primeraCategoriaNombre = $categorias[0]->categoria;
}

$opcionesMenu = $tenant->id != null ? array_slice(scandir("tenants/$tenant->id/menu"), 2) : ['menu 1', 'menu 2'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>{{ $tenant->nombre_tienda }}</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description" content="big-deal">
  <meta name="keywords" content="big-deal">
  <meta name="author" content="big-deal">
  <link rel="icon" href="{{ global_asset($tenant->logo) }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ global_asset($tenant->logo) }}" type="image/x-icon">
  @auth('cliente')
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="id-cliente" content="{{ auth('cliente')->user()->id }}" />
  @endauth

  <!--Google font-->
  <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Chau+Philomene+One:ital@0;1&display=swap" rel="stylesheet">


  <!--icon css-->
  <link rel="stylesheet" type="text/css" href="{{ global_asset('css/plugins/font-awesome.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ global_asset('css/general/themify.css') }}">

  <!--Slick slider css-->
  <link rel="stylesheet" type="text/css" href="{{ global_asset('css/general/slick.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ global_asset('css/general/slick-theme.css') }}">

  <!--Animate css-->
  <link rel="stylesheet" type="text/css" href="{{ global_asset('css/general/animate.css') }}">
  <!-- Bootstrap css -->
  <link rel="stylesheet" type="text/css" href="{{ global_asset('css/general/bootstrap.css') }}">

  <!-- Theme css -->
  <link rel="stylesheet" type="text/css" href="{{ global_asset('css/general/color13.css') }}" media="screen" id="color">
  <link rel="stylesheet" href="{{ global_asset('css/general/auth.css') }}">
  <link rel="stylesheet" href="{{ global_asset('css/style.css') }}">
</head>

<body class="bg-light ">
  @if(
  $errors->has('nombre') ||
  $errors->has('telefono') ||
  $errors->has('direccion') ||
  $errors->has('correo') ||
  $errors->has('contrasenia') ||
  $errors->has('contrasenia_confirmation')
  )
  <script>
    document.addEventListener("DOMContentLoaded", function(event) {
      mostrarRegistro();
      openAccount();
    });
  </script>
  @endif
  <?php
  echo "
  <script>
    document.documentElement.style.setProperty(
      '--color-primario', '$tenant->color_primario'
    );
    document.documentElement.style.setProperty(
      '--color-secundario', '$tenant->color_secundario'
    );
  </script>";
  ?>
  <!-- loader start -->
  <div class="loader-wrapper">
    <div>
      <img src="{{ global_asset('./img/big-deal/pets/loader.gif') }}" alt="loader">
    </div>
  </div>
  <!-- loader end -->

  @include('plantilla.big-deal.header')

  @if($url == 'home')
  
    @include('plantilla.big-deal.banner')
    @include('plantilla.big-deal.servicios')
    @include('plantilla.big-deal.home')

  @else
    @include("plantilla.big-deal.containers.$url")
  @endif

  @include('plantilla.big-deal.footer')

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
        <form class="theme-form active" action="{{route('tenant.clientes.logout')}}" method="get">
          Estás registrado
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
            <label for="direccion_register">Dirección</label>
            <input value="{{ old('direccion') }}" name="direccion" type="text" class="form-control" id="direccion_register" placeholder="Calle # ##-##" required="">
            @error('direccion')
            <span role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="ciudad_register">Ciudad</label>
            <input value="{{ old('ciudad') }}" name="ciudad" type="text" class="form-control" id="ciudad_register" placeholder="Calle # ##-##" required="">
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

  <!-- latest jquery-->
  <script src="{{ global_asset('js/general/jquery.min.js') }}"></script>

  <!-- slick js-->
  <script src="{{ global_asset('js/general/slick.js') }}"></script>

  <!-- gallary js -->
  <script src="{{ global_asset('js/general/gallery.js') }}"></script>

  <!-- tool tip js -->
  <script src="{{ global_asset('js/general/tippy-popper.min.js') }}"></script>
  <script src="{{ global_asset('js/general/tippy-bundle.iife.min.js') }}"></script>

  <!-- popper js-->
  <script src="{{ global_asset('js/general/popper.min.js') }}"></script>

  <!-- menu js-->
  <script src="{{ global_asset('js/general/menu.js') }}"></script>

  <!-- ajax search js -->
  <script src="{{ global_asset('js/general/typeahead.bundle.min.js') }}"></script>
  <script src="{{ global_asset('js/general/typeahead.jquery.min.js') }}"></script>
  <script src="{{ global_asset('js/general/ajax-custom.js') }}"></script>

  <!-- father icon -->
  <script src="{{ global_asset('js/general/feather.min.js') }}"></script>
  <script src="{{ global_asset('js/general/feather-icon.js') }}"></script>


  <!-- Bootstrap js-->
  <script src="{{ global_asset('js/general/bootstrap.js') }}"></script>

  <!-- Bootstrap js-->
  <script src="{{ global_asset('js/general/bootstrap-notify.min.js') }}"></script>

  <!-- Theme js-->
  @if($url == 'home')
  <script src="{{ global_asset('js/general/slider-animat-two.js') }}"></script>
  @endif
  <script src="{{ global_asset('js/general/script.js') }}"></script>
  <script src="{{ global_asset('js/general/modal.js') }}"></script>
  <script src="{{ global_asset('js/script.js') }}"></script>
</body>

</html>