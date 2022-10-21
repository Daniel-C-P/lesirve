@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">

            <span id="card_title">
              {{ __('Producto') }}
            </span>

            <div class="float-right">
              <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                {{ __('Create New') }}
              </a>
            </div>
          </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead class="thead">
                <tr>
                  <th>No</th>

                  <th>Categoria</th>
                  <th>Nombre</th>
                  <th>Descripcion Corta</th>
                  <th>Imagen</th>
                  <th>En Oferta</th>
                  <th>Descuento</th>

                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($productos as $producto)
                <tr>
                  <td>{{ ++$i }}</td>

                  <td>{{ $producto->categoria->categoria }}</td>
                  <td>{{ $producto->nombre }}</td>
                  <td>{{ $producto->descripcion_corta }}</td>
                  <td><img src="{{ global_asset($producto->imagen_1) }}" width="40px"></td>
                  <td>{{ $producto->en_oferta > 0 ? 'Valido' : 'No valido' }}</td>
                  <td>{{ $producto->valor_descuento }}</td>

                  <td>
                    <form action="{{ route('productos.destroy',$producto->id) }}" method="POST" class="form-delete">
                      <a class="btn btn-sm btn-primary " href="{{ route('productos.show',$producto->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                      <a class="btn btn-sm btn-success" href="{{ route('productos.edit',$producto->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      {!! $productos->links() !!}
    </div>
  </div>
</div>
@stop

@section('js')

    <script src="{{ global_asset('js/plugins/sweetalert.js') }}"></script>

@endsection