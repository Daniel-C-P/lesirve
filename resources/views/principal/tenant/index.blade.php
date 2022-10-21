@extends('layouts.app')

@section('template_title')
    Tenant
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tenant') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tiendas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Nombre</th>
										<th>Cliente</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tenants as $tenant)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $tenant->tenant_id }}</td>
											<td>{{ $tenant->cliente->nombre }} ({{$tenant->cliente->correo}})</td>

                                            <td>
                                                <form action="{{ route('tiendas.destroy',$tenant->tenant_id) }}" method="POST" class="form-delete">
                                                    <a class="btn btn-sm btn-primary" target="_blank" href="{{ route('tiendas.show',$tenant->domain) }}"><i class="fa fa-fw fa-eye"></i> Visitar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tiendas.edit',$tenant->tenant_id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $tenants->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>

@endsection
