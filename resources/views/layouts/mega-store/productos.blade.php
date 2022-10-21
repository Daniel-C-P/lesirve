<?php $proIndex = 1; ?>
<!--tab product-->
<section class="section-pt-space">
  <div class="tab-product-main">
    <div class="tab-product-contain">
      <ul class="tabs tab-title">
        @foreach($categorias as $categoria)
        <li class="{{ $categoria->id == $primeraCategoria ? 'current' : '' }}"><a href="tab-{{ $categoria->categoria }}">{{ $categoria->categoria }}</a></li>
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
            @if(isset($listaProductos))
            @foreach($listaProductos as $index=>$productos)
            <div id="tab-{{$index}}" class="tab-content {{ $index == $primeraCategoriaNombre ? 'active default' : '' }} row gallery-block">
              <div class="col-md-12 product-slide-5 product-m no-arrow product">
                  @foreach($productos as $producto)
                  @include("layouts.$plantilla.producto")
                  @endforeach
              </div>
            </div>
            @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--media banner end-->