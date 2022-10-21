@extends('layouts.dashboard')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Medios Pago</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('medios-pagos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $mediosPago->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Logo:</strong>
                            {{ $mediosPago->logo }}
                        </div>
                        <div class="form-group">
                            <strong>Habilitado:</strong>
                            {{ $mediosPago->habilitado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
