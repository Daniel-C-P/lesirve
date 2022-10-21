@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Categorias Menu') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('submenus.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Id Menu</th>
										<th>Id Categoria</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoriasMenus as $categoriasMenu)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $categoriasMenu->menu->nombre }}</td>
											<td>{{ $categoriasMenu->categoria->categoria }}</td>

                                            <td>
                                                <form action="{{ route('submenus.destroy',$categoriasMenu->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('submenus.show',$categoriasMenu->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('submenus.edit',$categoriasMenu->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $categoriasMenus->links() !!}
            </div>
        </div>
    </div>
@endsection
