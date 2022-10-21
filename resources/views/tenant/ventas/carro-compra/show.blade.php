@extends('adminlte::page')

@section('template_title')
    {{ $carroCompra->name ?? 'Show Carro Compra' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Carro Compra</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('carro-compras.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Id Cliente:</strong>
                            {{ $carroCompra->id_cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Id Producto:</strong>
                            {{ $carroCompra->id_producto }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
