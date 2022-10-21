<?php
$nuevo = isset($nuevo);
$sale = isset($sale);
?>
<div>
  <div class="product-box product-box2">
    <div class="product-imgbox">
      <div class="product-front">
        <a href="{{ route('producto.comprar', ['id' => $producto->id]) }}">
          <img src="{{ global_asset($producto->imagen_1) }}" class="img-fluid" alt="product">
        </a>
      </div>
      <div class="product-icon  icon-inline ">
        <button class="tooltip-top add-cartnoty" id-producto="{{$producto->id}}" data-tippy-content="Agregar al carro">
          <i data-feather="shopping-cart"></i>
        </button>
        <a href="{{ route('producto.comprar', ['id'=> $producto->id]) }}" class="tooltip-top" data-tippy-content="Revisar">
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
    <div class="product-detail product-detail2 ">
      <a href="">
        <h3>{{ $producto->nombre }}</h3>
      </a>
      <h5>
        @if($producto->en_oferta)
        ${{ number_format($producto->valor_descuento, 0, ',', '.') }}
        <span>
          ${{ number_format($producto->precio, 0, ',', '.') }}
        </span>
        @elseif ($producto->precio <= 0)
        consaultar
        @else
        ${{ number_format($producto->precio, 0, ',', '.') }}
        @endif
      </h5>
    </div>
  </div>
</div>
