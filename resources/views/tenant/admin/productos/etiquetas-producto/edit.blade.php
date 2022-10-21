@extends('adminlte::page')

@section('template_title')
    Update Etiquetas Producto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Etiquetas Producto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('etiquetas-productos.update', $etiquetasProducto->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tenant.productos.etiquetas-producto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
