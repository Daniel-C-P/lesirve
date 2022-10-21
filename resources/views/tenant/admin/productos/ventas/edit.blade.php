@extends('layouts.dashboard')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Venta Producto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tenant.productos.ventas.update', $ventasProducto->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('tenant.admin.productos.ventas.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
