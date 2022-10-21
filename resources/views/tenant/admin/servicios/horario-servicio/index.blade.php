@extends('adminlte::page')

@section('template_title')
    Horario Servicio
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Horario Servicio') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('horario-servicios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Dia</th>
										<th>Servicio</th>
										<th>Hora Inicio</th>
										<th>Hora Fin</th>
										<th>Habilitado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($horarioServicios as $horarioServicio)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $horarioServicio->fecha }}</td>
											<td>{{ $horarioServicio->servicio->nombre }}</td>
											<td>{{ $horarioServicio->hora_inicio }}</td>
											<td>{{ $horarioServicio->hora_fin }}</td>
											<td>{{ $horarioServicio->habilitado > 0 ? 'Verdadero' : 'Falso' }}</td>

                                            <td>
                                                <form action="{{ route('horario-servicios.destroy',$horarioServicio->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('horario-servicios.show',$horarioServicio->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('horario-servicios.edit',$horarioServicio->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $horarioServicios->links() !!}
            </div>
        </div>
    </div>
@endsection
