@extends('adminlte::page')

@section('template_title')
    Update Etiqueta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Etiqueta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('etiquetas.update', $etiqueta->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tenant.productos.etiqueta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
