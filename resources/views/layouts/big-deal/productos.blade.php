<?php

use App\Models\Tenant\Categoria;
use App\Models\Tenant\Producto;

  $catDestacadas = Categoria::where('destacada', true)->limit(5)->get();
  if(count($catDestacadas) > 0){
    $pCat = str_replace(' ', '_', $catDestacadas[0]->categoria);
  }
  $catsProds = array();
  foreach($catDestacadas as $catDestacada){
    $catsProds[$catDestacada->categoria] = Producto::where('id_categoria', $catDestacada->id)->limit(10)->get();
  }
?>

<!--tab product-->
<section class="section-pb-space">
  <div class="tab-product-main tab-second">
    <div class="tab-product-contain">
      <ul class="tabs tab-title">
        @foreach($catDestacadas as $categoria)
        @php
        $nomCat = str_replace(' ', '_', $categoria->categoria)
        @endphp
        <li class="{{ $nomCat == $pCat ? 'current' : '' }}"><a href="tab-{{ $nomCat }}">{{ $categoria->categoria }}</a></li>
        @endforeach
      </ul>
    </div>
  </div>
</section>
<!--tab product-->

<!--media banner start-->
<section class="our-gallery section-big-py-space">
  <div class="custom-container">
    <div class="row">
      <div class="col-12">
        <div class="theme-tab mb--5">
          <div class="tab-content-cls">
            @foreach($catsProds as $index=>$productos)
            @php 
            $nomCat = str_replace(' ', '_', $index)
            @endphp

            <div id="tab-{{$nomCat}}" class="tab-content {{ $nomCat == $pCat ? 'active default' : '' }} row gallery-block">
              <div class="col-md-12 product-slide-5 product-m no-arrow product">
                @foreach($productos as $producto)
                @include("layouts.$plantilla.producto")
                @endforeach
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--media banner end-->