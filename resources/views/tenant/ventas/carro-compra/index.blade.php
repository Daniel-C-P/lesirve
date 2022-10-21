@extends('adminlte::page')

@section('template_title')
    Carro Compra
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Carro Compra') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('carro-compras.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Id Cliente</th>
										<th>Id Producto</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carroCompras as $carroCompra)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $carroCompra->id_cliente }}</td>
											<td>{{ $carroCompra->id_producto }}</td>

                                            <td>
                                                <form action="{{ route('carro-compras.destroy',$carroCompra->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('carro-compras.show',$carroCompra->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('carro-compras.edit',$carroCompra->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $carroCompras->links() !!}
            </div>
        </div>
    </div>
@endsection
