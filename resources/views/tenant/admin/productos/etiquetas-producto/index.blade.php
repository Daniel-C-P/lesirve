@extends('adminlte::page')

@section('template_title')
    Etiquetas Producto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Etiquetas Producto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('etiquetas-productos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Producto</th>
										<th>Etiqueta</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($etiquetasProductos as $etiquetasProducto)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $etiquetasProducto->producto->nombre }}</td>
											<td>{{ $etiquetasProducto->etiqueta->descripcion }}</td>

                                            <td>
                                                <form action="{{ route('etiquetas-productos.destroy',$etiquetasProducto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('etiquetas-productos.show',$etiquetasProducto->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('etiquetas-productos.edit',$etiquetasProducto->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $etiquetasProductos->links() !!}
            </div>
        </div>
    </div>
@endsection
