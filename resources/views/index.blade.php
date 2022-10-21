<?php

use App\Http\Controllers\Tenant\PlantillaConfigController;

$plantilla = PlantillaConfigController::obtenerConfiguracion()->id_plantilla;
?>
@extends("layouts.$plantilla.index")

@section('js')
<script src="{{ global_asset('js/general/slider-animat-two.js') }}"></script>
@stop