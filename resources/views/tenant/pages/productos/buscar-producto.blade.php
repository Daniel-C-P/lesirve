<?php

use App\Http\Controllers\Tenant\PlantillaConfigController;
$index = 1;
 $plantilla = PlantillaConfigController::obtenerConfiguracion()->id_plantilla; ?>
@extends("layouts.$plantilla.index")

@section('content')
<!--title start-->
<div class="title4">
  <h4>Categoria: <span>{{ $criterios->categoria }}</span></h4>
  <h4>Producto: <span>{{ $criterios->producto }}</span></h4>
</div>
<!--title end-->

<!--media banner start-->
<section class="section-big-pb-space ratio_square product">
  <div class="custom-container">
    <div class="row m-3">
      <div class="col pr-0 product-slide-5 product-m no-arrow">
        @foreach($productos as $producto)
        @include("layouts.$plantilla.producto")
        <?php $index++; ?>
        @if($index % 6 == 0)
      </div>
    </div>
    <div class="row m-3">
      <div class="col pr-0 product-slide-5 product-m no-arrow">
        @endif
        @endforeach
      </div>
    </div>
</section>
<!--media banner end-->
@stop