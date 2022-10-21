@extends("layouts.$plantilla.index")

@section('content')

<!--section start-->
<section class="login-page section-big-py-space b-g-light">
  <div class="custom-container">
    <div class="row">
      <div class="col-lg-4 offset-lg-4">
        <div class="theme-card">
          <h3 class="text-center">registrarse</h3>
          <form class="theme-form">
            <div class="row g-3">
              <div class="col-md-12 form-group">
                <label for="nombre">nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Jhon Doe" required="">
                @error('nombre')
                <span role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="col-md-12 form-group">
                <label for="telefono">teléfono</label>
                <input type="text" class="form-control" name="telefono" id="telefono" placeholder="123-456-7890" required="">
                @error('telefono')
                <span role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="row g-3">
              <div class="col-md-12 form-group">
                <label for="ciudad">ciudad</label>
                <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Cali" required="">
                @error('ciudad')
                <span role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="col-md-12 form-group">
                <label for="direccion">dirección</label>
                <input type="text" class="form-control" name="direccion" id="direccion" placeholder="calle ## ##-##" required="">
                @error('direccion')
                <span role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="row g-3">
              <div class="col-md-12 form-group">
                <label for="correo">correo</label>
                <input type="text" class="form-control" name="correo" id="correo" placeholder="usuario@dominio.com" required="">
                @error('correo')
                <span role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="col-md-12 form-group">
                <label for="contrasenia">contraseña</label>
                <input type="password" class="form-control" id="contrasenia" name="contrasenia" placeholder="******" required="">
                @error('contrasenia')
                <span role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="col-md-12 form-group">
                <label for="contrasenia_confirmation">confirmar contraseña</label>
                <input type="password" class="form-control" id="contrasenia_confirmation" name="contrasenia_confirmation" placeholder="******" required="">
                @error('contrasenia_confirmation')
                <span role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="col-md-12 form-group"><a href="javascript:void(0)" class="btn btn-normal">registrarse</a></div>
            </div>
            <div class="row g-3">
              <div class="col-md-12 ">
                <p>Ya tienes una cuenta? <a href="{{ route('tenant.show.login') }}" class="txt-default">iniciar sesión</a></p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Section ends-->
@stop
