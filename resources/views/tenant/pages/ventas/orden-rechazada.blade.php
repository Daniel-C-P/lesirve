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
          <div class="success-text"><i class="fa fa-times-circle" aria-hidden="false"></i>
            <h2>lo sentimos no pudimos realizar su compra</h2>
            <p>no se pudo procesar el pago con el medio de pago seleccionado</p>
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
