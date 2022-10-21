<!-- Modal redes sociales -->
<div class="modal fade" id="modalRedSocial" tabindex="-1" aria-labelledby="modalRedSocialLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title" id="modalRedSocialLabel">Informacion de contacto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="POST" action="{{ route('tenant.admin.configuracion') }}" role="form" enctype="multipart/form-data">
          {{ method_field('PATCH') }}
          @csrf

          <div class="form-group">
            {{ Form::label('telefono') }}
            {{ Form::tel('telefono', $configuracion->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
          </div>
          <div class="form-group">
            {{ Form::label('direccion') }}
            {{ Form::text('direccion', $configuracion->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
          </div>
          <div class="form-group">
            {{ Form::label('correo') }}
            {{ Form::text('correo', $configuracion->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
            {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
          </div>
          <div class="form-group">
            {{ Form::label('facebook') }}
            {{ Form::text('facebook', $configuracion->facebook, ['class' => 'form-control' . ($errors->has('facebook') ? ' is-invalid' : ''), 'placeholder' => 'Facebook']) }}
            {!! $errors->first('facebook', '<div class="invalid-feedback">:message</div>') !!}
          </div>
          <div class="form-group">
            {{ Form::label('twitter') }}
            {{ Form::text('twitter', $configuracion->twitter, ['class' => 'form-control' . ($errors->has('twitter') ? ' is-invalid' : ''), 'placeholder' => 'Twitter']) }}
            {!! $errors->first('twitter', '<div class="invalid-feedback">:message</div>') !!}
          </div>
          <div class="form-group">
            {{ Form::label('whatsapp') }}
            {{ Form::text('whatsapp', $configuracion->whatsapp, ['class' => 'form-control' . ($errors->has('whatsapp') ? ' is-invalid' : ''), 'placeholder' => 'Whatsapp']) }}
            {!! $errors->first('whatsapp', '<div class="invalid-feedback">:message</div>') !!}
          </div>
          <div class="form-group">
            {{ Form::label('instagram') }}
            {{ Form::text('instagram', $configuracion->instagram, ['class' => 'form-control' . ($errors->has('instagram') ? ' is-invalid' : ''), 'placeholder' => 'Instagram']) }}
            {!! $errors->first('instagram', '<div class="invalid-feedback">:message</div>') !!}
          </div>
          <div class="form-group">
            {{ Form::label('youtube') }}
            {{ Form::text('youtube', $configuracion->youtube, ['class' => 'form-control' . ($errors->has('youtube') ? ' is-invalid' : ''), 'placeholder' => 'Youtube']) }}
            {!! $errors->first('youtube', '<div class="invalid-feedback">:message</div>') !!}
          </div>

          <button type="submit" class="btn btn-primary btn-block">Guardar</button>
        </form>

      </div>
    </div>
  </div>
</div>
<!-- Fin modal redes sociales -->