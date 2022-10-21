<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Menú') }}
            {{ Form::select('id_menu', $menus, null, ['class' => 'form-control select2' . ($errors->has('id_menu') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un menu']) }}
            {!! $errors->first('id_menu', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Categoria') }}
            {{ Form::select('id_categoria', $categorias, null, ['class' => 'form-control select2' . ($errors->has('id_categoria') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una categoria']) }}
            {!! $errors->first('id_categoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>