<!--title-start-->
<div class="title8 section-big-my-space ">
  <h4>Nuevos productos</h4>
</div>
<!--title-end-->

<!--product start-->
<section class="product section-big-pb-space">
  <div class="custom-container">
    <div class="row ">
      <div class="col pr-0">
        <div class="product-slide-6 no-arrow mb--5">
          @foreach($productosNuevos as $producto)
          <div>
            @include('layouts.cosmetic.producto')
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
<!--product end-->