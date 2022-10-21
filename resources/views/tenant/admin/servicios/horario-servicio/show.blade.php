@extends('adminlte::page')

@section('template_title')
    {{ $horarioServicio->name ?? 'Show Horario Servicio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Horario Servicio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('horario-servicios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Dia:</strong>
                            {{ $horarioServicio->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Id Servicio:</strong>
                            {{ $horarioServicio->id_servicio }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Inicio:</strong>
                            {{ $horarioServicio->hora_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Fin:</strong>
                            {{ $horarioServicio->hora_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Habilitado:</strong>
                            {{ $horarioServicio->habilitado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
