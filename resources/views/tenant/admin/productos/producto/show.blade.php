@extends('layouts.dashboard')

@section('content')
<section class="content container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="float-left">
            <span class="card-title">Show Producto</span>
          </div>
          <div class="float-right">
            <a class="btn btn-primary" href="{{ route('productos.index') }}"> Back</a>
          </div>
        </div>

        <div class="card-body">

          <div class="form-group">
            <strong>Id Categoria:</strong>
            {{ $producto->id_categoria }}
          </div>
          <div class="form-group">
            <strong>Nombre:</strong>
            {{ $producto->nombre }}
          </div>
          <div class="form-group">
            <strong>Descripcion Larga:</strong>
            {{ $producto->descripcion_larga }}
          </div>
          <div class="form-group">
            <strong>En Oferta:</strong>
            {{ $producto->en_oferta > 0 ? 'Valido' : 'No valido' }}
          </div>
          <div class="form-group">
            <strong>Valor Descuento:</strong>
            {{ $producto->valor_descuento }}
          </div>
          <div class="form-group" style="width: 25%;">
            <strong>Imagen 1:</strong>
            @if ($producto->imagen_1 == "NULL" || $producto->imagen_1 == "")
            <p>Image not found.</p>
            @else
            <img src="{{ global_asset($producto->imagen_1) }}" class="img-fluid rounded d-block" alt="Imagen obenida del producto {{ $producto->nombre }}" width="50%">
            @endif
          </div>
          <div class="form-group" style="width: 25%;">
            <strong>Imagen 2:</strong>
            @if ($producto->imagen_2 == "NULL" || $producto->imagen_2 == "")
            <p>Image not found.</p>
            @else
            <img src="{{ global_asset($producto->imagen_2) }}" class="img-fluid rounded d-block" alt="Imagen obenida del producto {{ $producto->nombre }}" width="50%">
            @endif
          </div>
          <div class="form-group" style="width: 25%;">
            <strong>Imagen 3:</strong>
            @if ($producto->imagen_3 == "NULL" || $producto->imagen_3 == "")
            <p>Image not found.</p>
            @else
            <img src="{{ global_asset($producto->imagen_3) }}" class="img-fluid rounded d-block" alt="Imagen obenida del producto {{ $producto->nombre }}" width="50%">
            @endif
          </div>
          <div class="form-group" style="width: 25%;">
            <strong>Imagen 4:</strong>
            @if ($producto->imagen_4 == "NULL" || $producto->imagen_4 == "")
            <p>Image not found.</p>
            @else
            <img src="{{ global_asset($producto->imagen_4) }}" class="img-fluid rounded d-block" alt="Imagen obenida del producto {{ $producto->nombre }}" width="50%">
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop