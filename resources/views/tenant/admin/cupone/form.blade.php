<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('codigo') }}
            {{ Form::text('codigo', $cupone->codigo, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo']) }}
            {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_creado') }}
            {{ Form::date('fecha_creado', date('Y-m-d'), ['class' => 'form-control' . ($errors->has('fecha_creado') ? ' is-invalid' : ''),'disabled']) }}
            {!! $errors->first('fecha_creado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::select('estado', ['1' => 'Valido', '0' => 'No valido'], $cupone->estado, ['class' => 'form-control select2' . ($errors->has('value') ? ' is-invalid' : '')]); }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('valor') }}
            {{ Form::number('valor', $cupone->valor, ['class' => 'form-control' . ($errors->has('valor') ? ' is-invalid' : ''), 'placeholder' => 'Valor']) }}
            {!! $errors->first('valor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_cupon') }}
            {{ Form::number('tipo_cupon', $cupone->tipo_cupon, ['class' => 'form-control' . ($errors->has('tipo_cupon') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Cupon']) }}
            {!! $errors->first('tipo_cupon', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
