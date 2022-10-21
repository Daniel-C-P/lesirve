<div class="box box-info padding-1">
  <div class="box-body">
  <div class="form-group">
      {{ Form::label('clientes') }}
      {{ Form::select('id_cliente', $clientes, $ventasProducto->id_cliente, ['class' => 'form-control select2' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un cliente']) }}
      {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
      {{ Form::label('tipo pago') }}
      {{ Form::select('id_tipo_pago', $tiposPagos, $ventasProducto->id_tipo_pago, ['class' => 'form-control select2' . ($errors->has('id_tipo_pago') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un tipo de pago']) }}
      {!! $errors->first('id_tipo_pago', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
      {{ Form::label('estado pago') }}
      {{ Form::select('id_estado_pago', $estadosPagos, $ventasProducto->id_estado_pago, ['class' => 'form-control select2' . ($errors->has('id_estado_pago') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un estado de pago']) }}
      {!! $errors->first('id_estado_pago', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
      {{ Form::label('estado venta') }}
      {{ Form::select('id_estado_venta', $estadosVentas, $ventasProducto->id_estado_venta, ['class' => 'form-control select2' . ($errors->has('id_estado_venta') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un estado de venta']) }}
      {!! $errors->first('id_estado_venta', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
      {{ Form::label('total') }}
      {{ Form::text('total', $ventasProducto->total, ['class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'placeholder' => 'Total']) }}
      {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
      {{ Form::label('telefono') }}
      {{ Form::text('telefono', $ventasProducto->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
      {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
      {{ Form::label('ciudad') }}
      {{ Form::text('ciudad', $ventasProducto->ciudad, ['class' => 'form-control' . ($errors->has('ciudad') ? ' is-invalid' : ''), 'placeholder' => 'Ciudad']) }}
      {!! $errors->first('ciudad', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
      {{ Form::label('direccion') }}
      {{ Form::text('direccion', $ventasProducto->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
      {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
    </div>

  </div>
  <div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>