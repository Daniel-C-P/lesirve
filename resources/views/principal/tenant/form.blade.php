<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre del tenant') }}
            {{ Form::text('id', $tenant->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'Nombre del tenant']) }}
            {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cliente') }}
            {{ Form::select('id_cliente', $clientes, null, ['class' => 'form-control select2' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un cliente']) }}
            {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
