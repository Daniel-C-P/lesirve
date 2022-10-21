@extends('adminlte::page')

@section('template_title')
    {{ $cupone->name ?? 'Show Cupone' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Cupone</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cupones.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $cupone->codigo }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Creado:</strong>
                            {{ $cupone->fecha_creado }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $cupone->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Valor:</strong>
                            {{ $cupone->valor }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Cupon:</strong>
                            {{ $cupone->tipo_cupon }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
