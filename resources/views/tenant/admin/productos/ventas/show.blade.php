@extends('layouts.dashboard')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Información de la venta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tenant.productos.ventas.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cliente:</strong>
                            {{ $ventasProducto->cliente->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Pago:</strong>
                            {{ $ventasProducto->tiposPagos->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Estado Venta:</strong>
                            {{ $ventasProducto->estadosVentas->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Estado Pago:</strong>
                            {{ $ventasProducto->estadosPagos->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            ${{ $ventasProducto->total }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $ventasProducto->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Ciudad:</strong>
                            {{ $ventasProducto->ciudad }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $ventasProducto->direccion }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
