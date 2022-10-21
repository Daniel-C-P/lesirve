@extends('layouts.dashboard')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Reserva Servicio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('reserva-servicios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Id Cliente:</strong>
                            {{ $reservaServicio->id_cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Id Servicio:</strong>
                            {{ $reservaServicio->id_servicio }}
                        </div>
                        <div class="form-group">
                            <strong>Dia:</strong>
                            {{ $reservaServicio->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $reservaServicio->hora }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
