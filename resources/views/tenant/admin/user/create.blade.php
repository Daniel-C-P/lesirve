@extends('layouts.dashboard')

@section('content')
<section class="content container-fluid">
  <div class="row">
    <div class="col-md-12">

      @includeif('partials.errors')

      <div class="card card-default">
        <div class="card-header">
          <span class="card-title">Crear Usuario</span>
          <div class="float-right">
            <a class="btn btn-danger" href="{{ route('tenant.admin.users.index') }}"> Cancelar</a>
          </div>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('tenant.admin.users.store') }}" role="form" enctype="multipart/form-data">
            @csrf

            @include('tenant.admin.container.user.form')

          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection