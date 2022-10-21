<?php
$nuevo = isset($nuevo);
$sale = isset($sale);
?>
<div class="product-box">
  <div class="product-imgbox">
    <div class="product-front">
      <a href="{{ route('producto.comprar', ['id' => $producto->id]) }}">
        <img src="{{ global_asset($producto->imagen_1) }}" class="img-fluid  " alt="product">
      </a>
    </div>
  </div>
  <div class="product-detail detail-center ">
    <div class="detail-title">
      <div class="detail-left">
        <a href="{{ route('producto.comprar', ['id' => $producto->id]) }}">
          <h6 class="price-title">
            {{ $producto->nombre }}
          </h6>
        </a>
      </div>
      <div class="detail-right">
        @if($producto->en_oferta)
        <div class="check-price">
          ${{ number_format($producto->precio, 0, ',', '.') }}
        </div>
        <div class="price">
          <div class="price">
            ${{ number_format($producto->valor_descuento, 0, ',', '.') }}
          </div>
        </div>
        @else
        <div class="price">
          <div class="price">
            ${{ number_format($producto->precio, 0, ',', '.') }}
          </div>
        </div>
        @endif

      </div>
    </div>
    <div class="icon-detail">
      <button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart">
        <i data-feather="shopping-cart"></i>
      </button>
      <a href="{{ route('producto.comprar', ['id'=> $producto->id]) }}" class="tooltip-top" data-tippy-content="Revisar">
        <i data-feather="eye"></i>
      </a>
    </div>
  </div>
</div>