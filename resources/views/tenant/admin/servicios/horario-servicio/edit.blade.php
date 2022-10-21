@extends('adminlte::page')

@section('template_title')
    Update Horario Servicio
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Horario Servicio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('horario-servicios.update', $horarioServicio->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tenant.servicios.horario-servicio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
