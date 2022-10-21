@extends('layouts.dashboard')

@section('content')
<section class="content container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="float-left">
            <span class="card-title">Show Estados Pago</span>
          </div>
          <div class="float-right">
            <a class="btn btn-primary" href="{{ route('tenant.estados.pagos.index') }}"> Back</a>
          </div>
        </div>

        <div class="card-body">

          <div class="form-group">
            <strong>Descripcion:</strong>
            {{ $estadosPago->descripcion }}
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection