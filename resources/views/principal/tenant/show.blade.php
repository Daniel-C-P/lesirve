@extends('adminlte::page')

@section('template_title')
    {{ $tenant->name ?? 'Show Tenant' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tenant</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tiendas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Data:</strong>
                            {{ $tenant->data }}
                        </div>
                        <div class="form-group">
                            <strong>Id Cliente:</strong>
                            {{ $tenant->id_cliente }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
