<form method="POST" action="{{ route('tenant.admin.configuracion') }}" role="form" enctype="multipart/form-data">
  @METHOD('patch')
  @csrf

  <div class="form-group">
    {{ Form::label('nombre_tienda', 'Nombre de la tienda:') }}
    {{ Form::text('nombre_tienda', $configuracion->nombre_tienda, ['class' => 'form-control', ($errors->has('nombre_tienda') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de la tienda']) }}
    {!! $errors->first('nombre_tienda', '<div class="invalid-feedback">:message</div>') !!}
  </div>
  <div class="form-group">
    {{ Form::label('descripcion', 'Descripcion de la tienda:') }}
    {{ Form::text('descripcion', $configuracion->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Breve descripcion de tu tienda']) }}
    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
  </div>
  <!-- Pickers para colores de la plantilla -->
  <div class="form-group">
    <label for="colorP">Color principal:</label>
    <input type="color" class="form-control" value="{{ $configuracion->color_p }}" name="color_p" id="colorP">
  </div>
  <div class="form-group">
    <label for="colorS">Color secundario:</label>
    <input type="color" class="form-control" value="{{ $configuracion->color_s }}" name="color_s" id="colorS">
  </div>
  <!-- File para el logo de la plantilla -->
  <div class="form-group" style="width: 25%;">
    <label for="input-logo">Edita tu logo:</label>
    <div class="card img-logo">
      <input type="file" name="logo" class="input-img-logo" id="input-logo"/>
      <img id="img-logo" src="{{global_asset($configuracion->logo ?? 'img/big-deal/pets/menu-banner/1.png')}}" />
      <div class="icon-wrapper">
        <i class="fa fa-upload fa-5x"></i>
      </div>
    </div>
    {!! $errors->first('logo', '<div class="invalid-feedback">:message</div>') !!}
  </div>
  <div class="form-group mt20">
    <button type="submit" class="btn btn-lg btn-block btn-danger">Actualizar</button>
  </div>
</form>