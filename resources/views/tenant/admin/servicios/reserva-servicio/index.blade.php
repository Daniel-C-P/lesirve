@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Reserva Servicio') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('reserva-servicios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Servicio</th>
										<th>Fecha</th>
										<th>Hora</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservaServicios as $reservaServicio)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $reservaServicio->cliente->nombre }} ({{ $reservaServicio->cliente->correo }})</td>
											<td>{{ $reservaServicio->servicio->nombre }}</td>
											<td>{{ $reservaServicio->fecha }}</td>
											<td>{{ $reservaServicio->hora }}</td>

                                            <td>
                                                <form action="{{ route('reserva-servicios.destroy',$reservaServicio->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('reserva-servicios.show',$reservaServicio->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('reserva-servicios.edit',$reservaServicio->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $reservaServicios->links() !!}
            </div>
        </div>
    </div>
@stop
