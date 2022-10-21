<?php

use App\Http\Controllers\Tenant\PlantillaConfigController;

$plantilla = PlantillaConfigController::obtenerConfiguracion()->id_plantilla;
?>
@extends("layouts.$plantilla.index")

@section('content')

  <!-- thank-you section start -->
  <section class="section-big-py-space light-layout">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="success-text"><i class="fa fa-check-circle" aria-hidden="true"></i>
            <h2>Gracias por tu compra</h2>
            <p>Pago pendiente, favor comunicarse cuando realices la transacción</p>
            <p>Número de orden: {{ $venta->id }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section ends -->


  <!-- order-detail section start -->
  <section class="section-big-py-space mt--5 b-g-light">
    <div class="custom-container">
      <div class="row">
        <div class="col-lg-6">
          <div class="product-order">
            <h3>Detalle de la compra</h3>
            @foreach($productos as $producto)
            <div class="row product-order-detail">
              <div class="col-3"><img src="{{ global_asset($producto->imagen_1) }}" alt="" class="img-fluid "></div>
              <div class="col-3 order_detail">
                <div>
                  <h4>Producto</h4>
                  <h5>{{ $producto->nombre }}</h5>
                </div>
              </div>
              <div class="col-3 order_detail">
                <div>
                  <h4>Cantidad</h4>
                  <h5>{{ $producto->cantidad }}</h5>
                </div>
              </div>
              <div class="col-3 order_detail">
                <div>
                  <h4>Precio</h4>
                  <h5>${{ $producto->precio }}</h5>
                </div>
              </div>
            </div>
            @endforeach
            <div class="total-sec">
              <!-- <ul>
                <li>subtotal <span>$55.00</span></li>
                <li>shipping <span>$12.00</span></li>
                <li>tax(GST) <span>$10.00</span></li>
              </ul> -->
            </div>
            <div class="final-total">
              <h3>total <span>${{ $total }}</span></h3>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="row order-success-sec">
            <div class="col-sm-6">
              <h4>resumen de la compra</h4>
              <ul class="order-detail">
                <li>Número de orden: {{ $venta->id }}</li>
                <li>Fecha: {{ $venta->created_at }}</li>
                <li>Total: ${{ $total }}</li>
              </ul>
            </div>
            <div class="col-sm-6">
              <h4>Dirección de entrega</h4>
              <ul class="order-detail">
                <li>{{ $venta->direccion }}</li>
                <li>{{ $venta->ciudad }}</li>
                <li>Tel. {{ $venta->telefono }}</li>
              </ul>
            </div>
            <div class="col-sm-12 payment-mode">
              <h4>metodo de pago</h4>
              <p>{{ $venta->tiposPagos->descripcion }}</p>
            </div>
            <div class="col-md-12">
              <div class="delivery-sec">
                <h3>fecha de entrega</h3>
                <h2>por confirmar</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section ends -->

</body>
@stop

@section('js')
<!-- Checkout js-->
<script src="{{ global_asset('js/general/checkout.js') }}" ></script>
@stop