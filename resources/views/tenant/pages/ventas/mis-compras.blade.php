<?php

use App\Http\Controllers\Tenant\PlantillaConfigController;

$plantilla = PlantillaConfigController::obtenerConfiguracion()->id_plantilla;
?>
@extends("layouts.$plantilla.index")

@section('content')
<!--section start-->
<section class="cart-section order-history section-big-py-space">
  <div class="custom-container">
    <div class="row">
      <div class="col-sm-12">
        <table class="table cart-table table-responsive-xs">
          <thead>
            <tr class="table-head">
              <th scope="col">orden</th>
              <th scope="col">total</th>
              <th scope="col">fecha</th>
              <th scope="col">tipo de pago</th>
              <th scope="col">estado pago</th>
              <th scope="col">estado de envio</th>
              <th scope="col">acciones</th>
            </tr>
          </thead>
          @foreach($compras as $compra)
          <tbody>
            <tr>
              <td>
                {{ $compra->id }}
              </td>
              <td>
                ${{ $compra->total }}
              </td>
              <td>
                {{ $compra->created_at }}
              </td>
              <td>
                {{ $compra->tiposPagos->descripcion }}
              </td>
              <td>
                {{ $compra->estadosPagos->descripcion }}
              </td>
              <td>
                {{ $compra->estadosVentas->descripcion }}
              </td>
              <th>
                <a href="javascript:void(0)" class="btn btn-normal next action-button">ver</a>
              </th>
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</section>
<!--section end-->
@stop