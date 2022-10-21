<?php $index = 1; ?>

<!--title start-->
<div class="title4">
  <h4>nuestros <span>productos</span></h4>
</div>
<!--title end-->

<!-- product tab start -->
<!--media banner start-->
<section class="section-big-pb-space ratio_square product">
  <div class="custom-container">
    <div class="row m-3">
      <div class="col pr-0 product-slide-5 product-m no-arrow">
        @foreach($productosNuevos as $producto)
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
