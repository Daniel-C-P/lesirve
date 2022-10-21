<?php

use App\Http\Controllers\Tenant\PlantillaConfigController;

$plantilla = PlantillaConfigController::obtenerConfiguracion()->id_plantilla;
$formasPago = PlantillaConfigController::obtenerMediosPago();
?>
@extends("layouts.$plantilla.index")

@section('content')
<!-- checkout start -->
<section class="checkout-second section-big-py-space b-g-light">
  <div class="custom-container" id="grad1">
    <div class="row justify-content-center">
      <div class="col-md-11">
        <div class=" checkout-box">
          <div class="checkout-header">
            <h2>Obtén tus productos</h2>
            <h4>Completa todos los campos para continuar</h4>
          </div>
          <div class="checkout-body ">
            <form class="checkout-form" method="POST" action="{{ route('tenant.form.compra.medio') }}">
              @csrf
              <input type="hidden" id="productos" name="productos" value="{{ json_encode($productos) }}">
              <input type="hidden" id="cliente[id]" name="cliente[id]" value="{{ auth('cliente')->user()->id }}">
              <!-- chek menu bar -->
              <ul class="menu-bar">
                <li class="active" id="personal">
                  <div class="icon">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                      <g>
                        <g>
                          <path d="M255.999,0c-74.443,0-135,60.557-135,135s60.557,135,135,135s135-60.557,135-135S330.442,0,255.999,0z" />
                        </g>
                      </g>
                      <g>
                        <g>
                          <path d="M478.48,398.68C438.124,338.138,370.579,302,297.835,302h-83.672c-72.744,0-140.288,36.138-180.644,96.68l-2.52,3.779V512h450h0.001V402.459L478.48,398.68z" />
                        </g>
                      </g>
                    </svg>
                  </div>
                  Personal
                </li>
                <li id="payment">
                  <div class="icon">
                    <svg enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                      <g>
                        <path d="m512 163v-27c0-30.928-25.072-56-56-56h-400c-30.928 0-56 25.072-56 56v27c0 2.761 2.239 5 5 5h502c2.761 0 5-2.239 5-5z" />
                        <path d="m0 205v171c0 30.928 25.072 56 56 56h400c30.928 0 56-25.072 56-56v-171c0-2.761-2.239-5-5-5h-502c-2.761 0-5 2.239-5 5zm128 131c0 8.836-7.164 16-16 16h-16c-8.836 0-16-7.164-16-16v-16c0-8.836 7.164-16 16-16h16c8.836 0 16 7.164 16 16z" />
                      </g>
                    </svg>
                  </div>

                  Pago
                </li>
              </ul>
              <!-- chekout contian -->
              <div class="checkout-fr-box">
                <div class="form-card">
                  <h3 class="form-title">Información personal</h3>
                  <div class="form-group">
                    <input type="text" readonly placeholder="Nombre completo" class="form-control" value="{{ auth('cliente')->user()->nombre }}">
                  </div>
                  <div class="form-group">
                    <input type="text" name="cliente[telefono]" placeholder="Teléfono" class="form-control" value="{{ auth('cliente')->user()->telefono }}">
                  </div>
                  <div class="form-group">
                    <input type="text" name="cliente[ciudad]" placeholder="Ciudad del envio" class="form-control" value="{{ auth('cliente')->user()->ciudad }}">
                  </div>
                  <div class="form-group">
                    <input type="text" name="cliente[direccion]" placeholder="Dirección de envio" class="form-control" value="{{ auth('cliente')->user()->direccion }}">
                  </div>
                </div>
                <button type="button" name="next" class=" btn btn-normal next action-button">Siguiente</button>
              </div>
              <div class="checkout-fr-box">
                <div class="form-card">
                  <h3 class="form-title"> Formas de Pago</h3>

                  @include('tenant.pages.ventas.form')


                </div>
                <button type="button" name="previous" class="previous btn btn-normal ">Anterior</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- checkout end -->
@stop

@section('js')
<!-- Checkout js-->
<script src="{{ global_asset('js/general/checkout.js') }}"></script>
<script src="{{ global_asset('js/tenant/cliente/mediosdepago.js') }}"></script>
@stop
