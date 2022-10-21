<div class="box box-info padding-1">
  <div class="box-body">

    <div class="form-group">
      {{ Form::label('nombre') }}
      {{ Form::text('nombre', $menu->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
      {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
      {{ Form::label('url') }}
      {{ Form::text('url', $menu->url, ['class' => 'form-control' . ($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'url']) }}
      {!! $errors->first('url', '<div class="invalid-feedback">:message</div>') !!}
      <small class="form-text text-muted">
        Nota: Si tienes un link, esté menú no podrá tener submenus.
      </small>
    </div>
    <div class="form-group">
      {{ Form::label('visible') }}
      <div class="form-switch">
        {{ Form::checkbox('visible', $menu->visible, $menu->visible, ['class' => 'form-control form-check-input' . ($errors->has('visible') ? ' is-invalid' : ''), 'placeholder' => 'visible']) }}
      </div>
      {!! $errors->first('visible', '<div class="invalid-feedback">:message</div>') !!}
    </div>
  </div>
  <div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>