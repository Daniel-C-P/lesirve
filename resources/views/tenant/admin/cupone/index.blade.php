@extends('adminlte::page')

@section('template_title')
    Cupone
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cupone') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('cupones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Codigo</th>
										<th>Fecha Creado</th>
										<th>Estado</th>
										<th>Valor</th>
										<th>Tipo Cupon</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cupones as $cupone)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $cupone->codigo }}</td>
											<td>{{ $cupone->fecha_creado }}</td>
                                            <td>{{ $cupone->estado > 0 ? 'Valido' : 'No valido' }}</td>
											<td>{{ $cupone->valor }}</td>
											<td>{{ $cupone->tipo_cupon }}</td>

                                            <td>
                                                <form action="{{ route('cupones.destroy',$cupone->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('cupones.show',$cupone->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('cupones.edit',$cupone->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $cupones->links() !!}
            </div>
        </div>
    </div>
@endsection
