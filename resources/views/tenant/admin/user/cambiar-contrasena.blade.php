@extends('layouts.app-password')

@section('content')
<section class="content container-fluid">
  <div class="">
    <div class="col-md-12">

      @includeif('partials.errors')

      <div class="card card-default">
        <div class="card-header">
            <span class="card-title">Cambiar contraseña para: {{ $user->email }}</span>
            <div class="float-right">
                <a class="btn btn-danger" href="{{ route('principal.admin.users.index') }}"> Cancelar</a>
            </div>
        </div>
        @if (isset($message))
            <div class="alert alert-warning">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card-body">
          <form method="POST" action="{{ route('tenant.admin.users.cambiar-contrasena', $user) }}" role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf

            <div class="form-group">
              {{ Form::label('password','Contraseña') }}
              {{ Form::password('password', ['placeholder'=>'*********','class' => 'form-control']) }}
            </div>
            <div class="form-group">
              {{ Form::label('password','Confirmar contraseña') }}
              {{ Form::password('password_confirmation', ['placeholder'=>'*********','class' => 'form-control']) }}
            </div>
            <div class="box-footer mt20">
              <button type="submit" class="btn btn-primary btn-block">Cambiar contraseña</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
