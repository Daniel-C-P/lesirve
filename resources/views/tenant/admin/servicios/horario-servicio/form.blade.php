<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Fecha') }}
            {{ Form::date('Fecha', $horarioServicio->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_servicio') }}
            {{ Form::select('id_servicio', $servicios, $horarioServicio->id_servicio,['class' => 'form-control select2' . ($errors->has('id_servicio') ? ' is-invalid' : '')]) }}
            {!! $errors->first('id_servicio', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora_inicio') }}
            {{ Form::text('hora_inicio', $horarioServicio->hora_inicio, ['class' => 'form-control' . ($errors->has('hora_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Hora Inicio']) }}
            {!! $errors->first('hora_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora_fin') }}
            {{ Form::text('hora_fin', $horarioServicio->hora_fin, ['class' => 'form-control' . ($errors->has('hora_fin') ? ' is-invalid' : ''), 'placeholder' => 'Hora Fin']) }}
            {!! $errors->first('hora_fin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('habilitado') }}
            {{ Form::select('habilitado', ['1' => 'Verdadero', '0' => 'Falso'], $horarioServicio->habilitado,['class' => 'form-control select2' . ($errors->has('habilitado') ? ' is-invalid' : '')]) }}
            {!! $errors->first('habilitado', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
