@extends('layouts.dashboard')

@section('content')
<section class="content container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="float-left">
            <span class="card-title">Show Servicio</span>
          </div>
          <div class="float-right">
            <a class="btn btn-primary" href="{{ route('servicios.index') }}"> Back</a>
          </div>
        </div>

        <div class="card-body">

          <div class="form-group">
            <strong>Nombre:</strong>
            {{ $servicio->nombre }}
          </div>
          <div class="form-group">
            <strong>Descripción:</strong>
            {{ $servicio->descripcion }}
          </div>
          <div class="form-group" style="width: 25%;">
                <strong>Imagen:</strong>
                @if ($servicio->imagen == "NULL" || $servicio->imagen == "")
                    <p>Image not found.</p>
                @else
                    <img src="{{ global_asset($servicio->imagen) }}" class="img-fluid rounded d-block" alt="Imagen obenida del producto {{ $servicio->nombre }}" width="50%">
                @endif
            </div>

        </div>
      </div>
    </div>
  </div>
</section>
@stop