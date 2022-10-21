@extends('adminlte::page')

@section('template_title')
    Update Carro Compra
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Carro Compra</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('carro-compras.update', $carroCompra->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tenant.ventas.carro-compra.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
