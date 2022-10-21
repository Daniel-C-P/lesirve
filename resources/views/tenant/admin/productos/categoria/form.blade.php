<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('categoria') }}
            {{ Form::text('categoria', $categoria->categoria, ['class' => 'form-control' . ($errors->has('categoria') ? ' is-invalid' : ''), 'placeholder' => 'Categoria']) }}
            {!! $errors->first('categoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $categoria->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="form-group">
      {{ Form::label('destacada') }}
      <div class="form-switch">
        {{ Form::checkbox('destacada', $categoria->destacada, $categoria->destacada, ['class' => 'form-control form-check-input' . ($errors->has('destacada') ? ' is-invalid' : ''), 'placeholder' => 'destacada']) }}
      </div>
      {!! $errors->first('destacada', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
    </div>
</div>
