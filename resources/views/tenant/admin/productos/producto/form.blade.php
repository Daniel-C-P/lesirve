<div class="box box-info padding-1">
  <div class="box-body">

    <div class="form-group">
      {{ Form::label('categoria') }}
      {{ Form::select('id_categoria', $categorias, $producto->id_categoria, ['class' => 'form-control select2' . ($errors->has('id_categoria') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una categoria']) }}
      {!! $errors->first('id_categoria', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
      {{ Form::label('nombre') }}
      {{ Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
      {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
      {{ Form::label('precio') }}
      {{ Form::number('precio', $producto->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'precio']) }}
      {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
      {{ Form::label('descripcion_corta') }}
      <div class="editor-space">
        {{ Form::textarea('descripcion_corta', $producto->descripcion_corta, ['class' => 'form-control' . ($errors->has('descripcion_corta') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Corta']) }}
      </div>
      {!! $errors->first('descripcion_corta', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
      {{ Form::label('descripcion_larga') }}
      <div class="editor-space">
        {{ Form::textarea('descripcion_larga', $producto->descripcion_larga, ['class' => 'form-control' . ($errors->has('descripcion_larga') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Larga']) }}
      </div>
      {!! $errors->first('descripcion_larga', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
      {{ Form::label('valor_descuento') }}
      {{ Form::number('valor_descuento', $producto->valor_descuento, ['class' => 'form-control' . ($errors->has('valor_descuento') ? ' is-invalid' : ''), 'placeholder' => 'Valor Descuento']) }}
      {!! $errors->first('valor_descuento', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
      {{ Form::label('en_oferta') }}
      <div class="form-switch">
        {{ Form::checkbox('en_oferta', $producto->en_oferta, $producto->en_oferta, ['class' => 'form-control form-check-input' . ($errors->has('en_oferta') ? ' is-invalid' : ''), 'placeholder' => 'en_oferta']) }}
      </div>
      {!! $errors->first('en_oferta', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group" id="imagenes-productos" style="width: 25%;">
      @if (isset($imagenes))
      @for ($i = 1; $i <= count($imagenes); $i++) <div class="card mb-3 lista-imagen">
        {!! $errors->first('imagen_1', '<div class="invalid-feedback">:message</div>') !!}
        <h5>Imagen {{ $i }} <a class="btn btn-link btn-lg eliminar-imagen"><i class="fa fa-trash-o"></i></a></h5>
        <input type="hidden" name="esta" value="1">
        <div class="imagen-producto card-img-top">
          <input imagen="{{ $i }}" type="file" name="imagen_{{ $i }}" class="input-imagen-producto" />
          <img id="imagen_{{ $i }}" src="{{global_asset($imagenes[$i-1] ?? '/img/big-deal/pets/product/1.jpg')}}" />
          <div class="icon-wrapper">
            <i class="fa fa-upload fa-5x"></i>
          </div>
        </div>
    </div>
    @endfor
    @else
    <div class="card mb-3 lista-imagen">
      {!! $errors->first('imagen_1', '<div class="invalid-feedback">:message</div>') !!}
      <h5>Imagen 1<a class="btn btn-link btn-lg eliminar-imagen"><i class="fa fa-trash-o"></i></a></h5>
      <input type="hidden" name="esta" value="{{ $producto->imagen_1 == 'NULL' ? '1' : '0' }}">
      <div class="imagen-producto card-img-top">
        <input imagen="1" type="file" name="imagen_1" class="input-imagen-producto" />
        <img id="imagen_1" src="{{global_asset('/img/big-deal/pets/product/1.jpg')}}" />
        <div class="icon-wrapper">
          <i class="fa fa-upload fa-5x"></i>
        </div>
      </div>
    </div>
    @endif
    <div class="form-group" id="btnAgregarImagenGroup">
      <button type="button" class="btn btn-success btn-block" id="btnAgregarImagen">Agregar imagen</button>
    </div>
  </div>

</div>
<div class="box-footer mt20">
  <button type="submit" class="btn btn-primary btn-block">Enviar</button>
</div>