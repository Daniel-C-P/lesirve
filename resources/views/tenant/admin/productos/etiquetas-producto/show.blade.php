@extends('adminlte::page')

@section('template_title')
    {{ $etiquetasProducto->name ?? 'Show Etiquetas Producto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Etiquetas Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('etiquetas-productos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Id Producto:</strong>
                            {{ $etiquetasProducto->id_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Id Etiqueta:</strong>
                            {{ $etiquetasProducto->id_etiqueta }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
