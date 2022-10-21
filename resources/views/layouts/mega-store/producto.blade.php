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
    <div class="product-icon icon-inline">
      <button class="tooltip-top add-cartnoty" id-producto="{{$producto->id}}" data-tippy-content="Agregar al carro">
        <i data-feather="shopping-cart"></i>
      </button>
      <a href="{{ route('producto.comprar', ['id'=> $producto->id]) }}" data-bs-toggle="modal" data-bs-target="" class="tooltip-top" data-tippy-content="Revisar">
        <i data-feather="eye"></i>
      </a>
    </div>
    @if($nuevo)
    <div class="new-label1">
      <div>nuevo</div>
    </div>
    @endif
    @if($sale)
    <div class="on-sale1">
      en venta
    </div>
    @endif
  </div>
  <div class="product-detail detail-inline">
    <div class="detail-title">
      <div class="detail-left">
        <a href="product-page(left-sidebar).html">
          <h6 class="price-title">
            {{ $producto->nombre }}
          </h6>
        </a>
      </div>
      <div class="detail-right">
        <div class="check-price">
          $ {{ number_format($producto->precio, 0, ',', '.') }}
        </div>
        <div class="price">
          <div class="price">
            $ {{ number_format($producto->valor_descuento, 0, ',', '.') }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>