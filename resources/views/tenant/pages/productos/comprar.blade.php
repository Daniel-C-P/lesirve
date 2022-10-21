<?php

use App\Http\Controllers\Tenant\PlantillaConfigController;

$plantilla = PlantillaConfigController::obtenerConfiguracion()->id_plantilla;
?>
@extends("layouts.$plantilla.index")

@section('css')
<style>
  .formateo ul li{
    display: list-item;
  }

</style>
@stop

@section('content')
<!-- section start -->
<form action="{{ route('tenant.form.compra') }}" method="post">

  <section class="section-big-pt-space b-g-light">
    <div class="collection-wrapper">
      <div class="custom-container">
        <div class="row">
          <div class="col-lg-5">
            <div class="product-slick no-arrow">
              <div><img src="{{ global_asset($producto->imagen_1) }}" alt="" class="img-fluid image_zoom_cls-0"></div>
              @if($producto->imagen_2 != 'NULL')
              <div><img src="{{ global_asset($producto->imagen_2) }}" alt="" class="img-fluid  image_zoom_cls-1"></div>
              @endif
              @if($producto->imagen_3 != 'NULL')
              <div><img src="{{ global_asset($producto->imagen_3) }}" alt="" class="img-fluid  image_zoom_cls-2"></div>
              @endif
              @if($producto->imagen_4 != 'NULL')
              <div><img src="{{ global_asset($producto->imagen_4) }}" alt="" class="img-fluid  image_zoom_cls-3"></div>
              @endif
            </div>
            <div class="row">
              <div class="col-12 p-0">
                <div class="slider-nav">
                  <div><img src="{{ global_asset($producto->imagen_1) }}" alt="" class="img-fluid"></div>
                  @if($producto->imagen_2 != 'NULL')
                  <div><img src="{{ global_asset($producto->imagen_2) }}" alt="" class="img-fluid"></div>
                  @endif
                  @if($producto->imagen_3 != 'NULL')
                  <div><img src="{{ global_asset($producto->imagen_3) }}" alt="" class="img-fluid"></div>
                  @endif
                  @if($producto->imagen_4 != 'NULL')
                  <div><img src="{{ global_asset($producto->imagen_4) }}" alt="" class="img-fluid"></div>
                  @endif
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-7 rtl-text">
            <div class="product-right">
              <div class="pro-group">
                <h2>{{ $producto->nombre }}</h2>
                <ul class="pro-price">
                  @if($producto->en_oferta)
                  <li>${{ number_format($producto->valor_descuento, 0, ',', '.') }}</li>
                  <li><span>${{ number_format($producto->precio, 0, ',', '.') }}</span></li>
                  <li>{{ number_format(100 - (($producto->valor_descuento / $producto->precio) * 100), 2) }}% dcto</li>
                  @elseif ($producto->precio <= 0)

                  @else
                  <li>${{ number_format($producto->precio, 0, ',', '.') }}</li>
                  @endif
                </ul>
              </div>
              @if ($formasPagos->all() == null || $producto->precio <= 0 )
              <div id="selectSize" class="pro-group addeffect-section product-description border-product mb-0">
                <h6 class="product-title">solicita el producto en los siguientes enlaces</h6>
                <section class="p-4 text-left w-100">
                    @if($tenant->facebook != null)
                    <!-- Facebook -->
                    <a href="{{ $tenant->facebook }}" target="_blank"><i class="fa fa-facebook-f fa-2x me-3" style="color: #3b5998;"></i></a>
                    @endif
                    @if($tenant->twitter != null)
                    <!-- Twitter -->
                    <a href="{{ $tenant->twitter }}" target="_blank"><i class="fa fa-twitter fa-2x me-3" style="color: #55acee;"></i></a>
                    @endif
                    @if($tenant->instagram != null)
                    <!-- Instagram -->
                    <a href="{{ $tenant->instagram }}" target="_blank"><i class="fa fa-instagram fa-2x me-3" style="color: #ac2bac;"></i></a>
                    @endif
                    @if($tenant->youtube != null)
                    <!-- Youtube -->
                    <a href="{{ $tenant->youtube }}" target="_blank"><i class="fa fa-youtube fa-2x me-3" style="color: #ed302f;"></i></a>
                    @endif
                    @if($tenant->whatsapp != null)
                    <!-- Whatsapp -->
                    <a href="https://api.whatsapp.com/send?phone={{ $tenant->whatsapp }}" target="_blank"><i class="fa fa-whatsapp fa-2x me-3" style="color: #25d366;"></i></a>
                    @endif
                  </section>
              </div>
              @else
              <div id="selectSize" class="pro-group addeffect-section product-description border-product mb-0">
                <h6 class="product-title">cantidad</h6>
                <div class="qty-box">
                    <div class="input-group">
                        <button class="button minus decrement  btn-number" type="button" disabled="disabled" data-type="minus" data-field="quant[1]"></button>
                        <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="10" name="productos[0][cantidad]">
                        <button class="button plus increment  btn-number" type="button" btn-number" data-type="plus" data-field="quant[1]"></button>
                    </div>
                    {{-- <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="10">
                    <span class="input-group-append">
                        <button type="button" class="btn btn-outline-secondary btn-number" data-type="plus" data-field="quant[1]">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span> --}}
                </div>
                <div class="product-buttons">
                  <button type="button" id-producto="{{$producto->id}}" id="cartEffect" class="btn cart-btn btn-normal tooltip-top add-cartnoty" data-tippy-content="Add to cart">
                    <i class="fa fa-shopping-cart"></i>
                    Agregar al carrito
                  </button>
                  @csrf
                  <input type="hidden" name="productos[0][id]" value="{{ $producto->id }}">
                  <input type="hidden" name="productos[0][precio]" value="{{ $producto->precio }}">
                  <button type="submit" id="cartEffect" class="btn cart-btn btn-normal tooltip-top" data-tippy-content="Comprar">
                    <i class="fa fa-shopping-basket"></i>
                    Comprar ahora
                  </button>
                </div>
              </div>
              @endif
              <div class="pro-group">
                <h6 class="product-title">breve descripción</h6>
                <p>{!! $producto->descripcion_corta !!}</p>
              </div>
              <div class="pro-group">
                <h6 class="product-title">información del producto</h6>
                <div class="formateo">{!!$producto->descripcion_larga !!}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>
<!-- Section ends -->
@stop

@section('js')
<!-- elevatezoom js-->
<script src="{{ global_asset('js/general/jquery.elevatezoom.js') }}"></script>
<script src="{{ global_asset('js/tenant/cliente/aumDis.js') }}"></script>
@stop
