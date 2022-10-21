<?php

use App\Http\Controllers\Tenant\PlantillaConfigController;

 $plantilla = PlantillaConfigController::obtenerConfiguracion()->id_plantilla;
 ?>
@extends("layouts.$plantilla.index")

@section('content')
<!--section start-->
<section class="login-page section-big-py-space b-g-light">
  <div class="custom-container">
    <div class="row">
      <div class="col-xl-4 col-lg-6 col-md-8 offset-xl-4 offset-lg-3 offset-md-2">
        <div class="theme-card">
          <h3 class="text-center">Iniciar sesión</h3>
          <form method="POST" class="theme-form" action="{{ route('tenant.login') }}">
            @csrf
            <div class="form-group">
              <label>correo</label>
              <input name="correo" type="text" class="form-control" placeholder="usuario@dominio.com" required="">
              @error('correo')
              <span role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label>contraseña</label>
              <input name="password" type="password" class="form-control" placeholder="*********" required="">
              @error('password')
              <span role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <button type="submit" class="btn btn-normal">iniciar sesión</button>
          </form>
          <div class="row g-3">
            <div class="col-md-12 ">
              <p>Aún no tienes una cuenta? <a href="{{ route('tenant.show.register') }}" class="txt-default">registrarse</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Section ends-->
@stop