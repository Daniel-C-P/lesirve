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

$productosNuevos = $productosNuevos ?? [
  (object)array(
    'id' => 1,
    'en_oferta' => false,
    'nombre' => 'producto 1',
    'descripcion_corta' => 'texto corto',
    'precio' => 1200,
    'imagen_1' => 'img/big-deal/pets/product/1.jpg',
    'imagen_2' => 'img/big-deal/pets/product/2.jpg',
    'imagen_3' => 'img/big-deal/pets/product/2.jpg',
  ),
  (object)array(
    'id' => 1,
    'en_oferta' => false,
    'nombre' => 'producto 2',
    'descripcion_corta' => 'texto corto',
    'precio' => 500,
    'imagen_1' => 'img/big-deal/pets/product/1.jpg',
    'imagen_2' => 'img/big-deal/pets/product/2.jpg',
    'imagen_3' => 'img/big-deal/pets/product/2.jpg',
  ),
  (object)array(
    'id' => 1,
    'en_oferta' => false,
    'nombre' => 'producto 3',
    'descripcion_corta' => 'texto corto',
    'precio' => 6000,
    'imagen_1' => 'img/big-deal/pets/product/1.jpg',
    'imagen_2' => 'img/big-deal/pets/product/2.jpg',
    'imagen_3' => 'img/big-deal/pets/product/2.jpg',
  ),
  (object)array(
    'id' => 1,
    'en_oferta' => false,
    'nombre' => 'producto 4',
    'descripcion_corta' => 'texto corto',
    'precio' => 2100,
    'imagen_1' => 'img/big-deal/pets/product/1.jpg',
    'imagen_2' => 'img/big-deal/pets/product/2.jpg',
    'imagen_3' => 'img/big-deal/pets/product/2.jpg',
  ),
  (object)array(
    'id' => 1,
    'en_oferta' => false,
    'nombre' => 'producto 5',
    'descripcion_corta' => 'texto corto',
    'precio' => 3200,
    'imagen_1' => 'img/big-deal/pets/product/1.jpg',
    'imagen_2' => 'img/big-deal/pets/product/2.jpg',
    'imagen_3' => 'img/big-deal/pets/product/2.jpg',
  )
];

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
  <link rel="icon" href="{{ $tenant->logo }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ $tenant->logo }}" type="image/x-icon">

  @include('layouts.cosmetic.styles')
  @yield('css')
</head>

<body class="bg-light">
  <!-- <body class="b-g-light"> -->

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

  @include('layouts.cosmetic.header')

  @section('content')
  @include('layouts.cosmetic.banner')
  @include('layouts.cosmetic.servicios')
  @include('layouts.cosmetic.nuevos-productos')
  @include('layouts.cosmetic.alternativo')
  @if(count($productosNuevos) > 0)
  @include('layouts.cosmetic.sugeridos')
  @endif
  @show

  @include('layouts.cosmetic.footer')

  @include('layouts.cosmetic.scripts')
  @yield('js')
</body>

</html>