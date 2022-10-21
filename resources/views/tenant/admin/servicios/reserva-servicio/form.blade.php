<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Cliente') }}
            {{ Form::select('id_cliente', $clientes, $reservaServicio->id_cliente,['class' => 'form-control select2' . ($errors->has('id_cliente') ? ' is-invalid' : '')]) }}
            {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Servicio') }}
            {{ Form::select('id_servicio', $servicios, $reservaServicio->id_servicio,['class' => 'form-control select2' . ($errors->has('id_servicio') ? ' is-invalid' : '')]) }}
            {!! $errors->first('id_servicio', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::date('fecha', $reservaServicio->fecha, ['min' => date('Y-m-d'), 'class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Hora') }}
            {{ Form::text('hora', $reservaServicio->hora, ['class' => 'form-control' . ($errors->has('hora') ? ' is-invalid' : ''), 'placeholder' => 'Hora']) }}
            {!! $errors->first('hora', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
