<?php
$totalCompra = 0;
?>

<!-- breadcrumb start -->
<div class="breadcrumb-main ">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="breadcrumb-contain">
          <div>
            <h2>Comprar</h2>
            <ul>
              <li><a href="{{route('tenant.cliente.home')}}">inicio</a></li>
              <li><i class="fa fa-angle-double-right"></i></li>
              <li><a href="javascript:void(0)">comprar</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="section-big-py-space b-g-light">
  <div class="custom-container">
    <div class="checkout-page contact-page">
      <div class="checkout-form">
        <form action="{{route('tenant.comprar.ordenar')}}" method="POST">
          @csrf
          <div class="row">
            <div class="col-lg-6 col-sm-12 col-xs-12">
              <div class="checkout-title">
                <h3>Detalle de venta</h3>
              </div>
              <div class="theme-form">
                <div class="row check-out ">

                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label>Nombre</label>
                    <input type="hidden" name="id_cliente" value="{{$cliente->id}}">
                    <input disabled type="text" value="{{$cliente->nombre}}" placeholder="">
                  </div>
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label class="field-label">Teléfono</label>
                    <input disabled type="text" value="{{$cliente->telefono}}" placeholder="">
                  </div>
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label class="field-label">Correo</label>
                    <input disabled type="text" value="{{$cliente->correo}}" placeholder="">
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="field-label">Dirección</label>
                    <input disabled type="text" value="{{$cliente->direccion}}" placeholder="">
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="field-label">Ciudad</label>
                    <input disabled type="text" value="{{$cliente->ciudad}}" placeholder="">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-xs-12">
              <div class="checkout-details theme-form  section-big-mt-space">
                <div class="order-box">
                  <div class="title-box">
                    <div>Producto <span>Total</span></div>
                  </div>
                  <ul class="qty">
                    @foreach($carroCompras as $producto)
                    <?php $totalCompra += $producto->precio * $producto->cantidad; ?>
                    <li>{{$producto->nombre}} × {{$producto->cantidad}} <span>${{ $producto->precio * $producto->cantidad }}</span></li>
                    <input type="hidden" name="productos[]" value='{"id": {{ $producto->id }}, "cantidad": {{$producto->cantidad}}, "precio": {{$producto->precio}}}'>
                    @endforeach
                  </ul>
                  <ul class="sub-total">
                    <li>Subtotal <span class="count">${{ $totalCompra }}</span></li>
                  </ul>
                  <ul class="total">
                    <input type="hidden" name="total" value="{{$totalCompra}}">
                    <li>Total <span class="count">${{ $totalCompra }}</span></li>
                  </ul>
                </div>
                <div class="payment-box">
                  <div class="upper-box">

                  </div>
                  <div class="text-right">
                    <button type="submit" class="btn-normal btn">Ordenar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- section end -->