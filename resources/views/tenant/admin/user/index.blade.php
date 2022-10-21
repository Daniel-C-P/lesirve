@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">

            <span id="card_title">
              {{ __('Usuario') }}
            </span>

            <div class="float-right">
              <a href="{{ route('tenant.admin.users.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                  <th>Correo</th>

                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $users)
                <tr>
                  <td>{{ ++$i }}</td>

                  <td>{{ $users->name }}</td>
                  <td>{{ $users->email }}</td>

                  <td>
                    <form action="{{ route('tenant.admin.users.destroy',$users->id) }}" method="POST" class="form-delete">
                      <a class="btn btn-sm btn-success" href="{{ route('tenant.admin.users.edit',$users->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                      <a class="btn btn-sm btn-warning " href="{{ route('tenant.admin.asignar',$users->id) }}"><i class="fa fa-exclamation-triangle"></i> Asignar rol</a>
                      <a class="btn btn-sm btn-warning " href="{{ route('tenant.admin.users.form.cambiar-contrasena',$users->id) }}"><i class="fa fa-key"></i> Cambiar contraseña</a>
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

    </div>
  </div>
</div>
@endsection

@section('js')

    <script src="{{ global_asset('js/plugins/sweetalert.js') }}"></script>

@endsection