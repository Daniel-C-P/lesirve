<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('producto') }}
            {{ Form::select('id_producto', $productos, $etiquetasProducto->id_producto,['class' => 'form-control select2' . ($errors->has('id_producto') ? ' is-invalid' : '')]) }}
            {!! $errors->first('id_producto', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('etiquetas') }}
            {{ Form::select('id_etiqueta', $etiquetas, $etiquetasProducto->id_etiqueta,['class' => 'form-control select2' . ($errors->has('id_etiqueta') ? ' is-invalid' : '')]) }}
            {!! $errors->first('id_etiqueta', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
