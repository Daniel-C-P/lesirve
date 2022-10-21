@extends('layouts.dashboard')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Reserva Servicio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reserva-servicios.update', $reservaServicio->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tenant.admin.servicios.reserva-servicio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
