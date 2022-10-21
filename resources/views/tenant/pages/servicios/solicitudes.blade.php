<?php

use App\Http\Controllers\Tenant\PlantillaConfigController;

$plantilla = PlantillaConfigController::obtenerConfiguracion()->id_plantilla;
?>
@extends("layouts.$plantilla.index")

@section('content')
<div class="container-fluid mt-2 mb-2">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">

            <span id="card_title">
              {{ __('Mis reservas de servicios') }}
            </span>
          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead class="thead">
                <tr>
                  <th>No</th>
                  <th>Servicio</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($servicios as $servicio)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $servicio->servicio->nombre }}</td>
                  <td>{{ $servicio->fecha }}</td>
                  <td>{{ $servicio->hora }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      {!! $servicios->links() !!}
    </div>
  </div>
</div>
@stop