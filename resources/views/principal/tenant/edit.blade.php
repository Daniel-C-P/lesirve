@extends('adminlte::page')

@section('template_title')
    Update Tenant
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Tenant</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tiendas.update', $tenant->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('principal.tenant.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
