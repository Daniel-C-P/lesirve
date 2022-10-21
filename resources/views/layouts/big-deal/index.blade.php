<?php

use App\Http\Controllers\Tenant\PlantillaConfigController;

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

$tenant = PlantillaConfigController::obtenerConfiguracion() ?? $valuesDefault;

$mediosPagos = PlantillaConfigController::obtenerMediosPago() ?? array(
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


$categorias = PlantillaConfigController::obtenerCategorias();

if (isset($categorias) && count($categorias) > 0) {
  $primeraCategoria = $categorias[0]->id;
  $primeraCategoriaNombre = $categorias[0]->categoria;
}

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

  @include('layouts.big-deal.styles')
  @yield('css')
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
      <img src="{{ global_asset('./img/general/loader.png') }}" alt="loader">
    </div>
  </div>
  <!-- loader end -->

  @include('layouts.big-deal.header')

  @section('content')
  @include('layouts.big-deal.slider')
  @if (isset($servicios) && count($servicios))
     @include('layouts.big-deal.servicios')
  @endif
  @if (isset($productosNuevos)&& count($productosNuevos))
     @include('layouts.big-deal.nuevos-productos')
  @endif
  @include('layouts.big-deal.banner-two')
  @include('layouts.big-deal.productos')
  @include('layouts.big-deal.banner-one')
  @include('layouts.big-deal.banner-three')
  @show

  @include('layouts.big-deal.footer')


  @include('layouts.big-deal.scripts')
  @yield('js')
</body>

</html>
