<div class="box box-info padding-1">
  <div class="box-body">

    <div class="form-group">
      {{ Form::label('nombre') }}
      {{ Form::text('nombre', $servicio->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
      {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
      {{ Form::label('descripcion') }}
      {{ Form::text('descripcion', $servicio->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
      {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group" id="imagenes-servicios" style="width: 25%;">
      <div class="card mb-3 lista-imagen">
        {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
        <h5>Imagen<a class="btn btn-link btn-lg eliminar-imagen"><i class="fa fa-trash-o"></i></a></h5>
        <input type="hidden" name="esta" value="{{ $servicio->imagen == 'NULL' ? '1' : '0' }}">
        <div class="imagen-servicio card-img-top">
          <input type="file" name="imagen" class="input-imagen-servicios" />
          <img id="imagen" src="{{global_asset($servicio->imagen ?? '/img/big-deal/pets/product/1.jpg')}}" />
          <div class="icon-wrapper">
            <i class="fa fa-upload fa-5x"></i>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>