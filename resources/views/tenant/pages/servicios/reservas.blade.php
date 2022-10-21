<?php

use App\Http\Controllers\Tenant\PlantillaConfigController;

$plantilla = PlantillaConfigController::obtenerConfiguracion()->id_plantilla;
?>
@extends("layouts.$plantilla.index")

@section('content')
<!--title start-->
<div class="title4">
  <h4>Reserva del servicio: <span>{{ $servicio->nombre }}</span></h4>
</div>
<!--title end-->
<!--media banner start-->
<section class="section-big-pb-space ratio_square product">
  <div class="custom-container">
    <form action="{{ route('reserva-servicios.store') }}" method="POST">
      <div class="box box-info padding-1">
        @csrf
        <input type="hidden" name="id_servicio" value="{{$servicio->id}}">
        <input type="hidden" name="id_cliente" value="{{auth('cliente')->user()->id}}">
        <div class="box-body">
          <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::date('fecha', $reservaServicio->fecha, ['min' => date('Y-m-d'), 'class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
          </div>
          <div class="form-group">
            {{ Form::label('Hora') }}
            {{ Form::text('hora', $reservaServicio->hora, ['class' => 'form-control' . ($errors->has('hora') ? ' is-invalid' : ''), 'placeholder' => 'Hora']) }}
            {!! $errors->first('hora', '<div class="invalid-feedback">:message</div>') !!}
          </div>
        </div>
        <div class="box-footer mt20">
          <button name="reservar" type="submit" class="btn btn-primary">Reservar</button>
        </div>
      </div>

    </form>
  </div>
</section>
<!--media banner end-->
@stop