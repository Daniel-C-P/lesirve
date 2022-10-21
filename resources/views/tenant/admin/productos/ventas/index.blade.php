@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ventas Producto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tenant.productos.ventas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Cliente</th>
										<th>Tipo Pago</th>
										<th>Estado Venta</th>
										<th>Estado Pago</th>
										<th>Total</th>
										<th>Telefono</th>
										<th>Ciudad</th>
										<th>Direccion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ventasProductos as $ventasProducto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $ventasProducto->cliente->nombre }}</td>
											<td>{{ $ventasProducto->tiposPagos->descripcion }}</td>
											<td>{{ $ventasProducto->estadosVentas->descripcion }}</td>
											<td>{{ $ventasProducto->estadosPagos->descripcion }}</td>
											<td>${{ $ventasProducto->total }}</td>
											<td>{{ $ventasProducto->telefono }}</td>
											<td>{{ $ventasProducto->ciudad }}</td>
											<td>{{ $ventasProducto->direccion }}</td>

                                            <td>
                                                <form action="{{ route('tenant.productos.ventas.destroy',$ventasProducto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tenant.productos.ventas.show',$ventasProducto->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tenant.productos.ventas.edit',$ventasProducto->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $ventasProductos->links() !!}
            </div>
        </div>
    </div>
@endsection
