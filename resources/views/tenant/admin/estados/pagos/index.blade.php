@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">

            <span id="card_title">
              {{ __('Estados Pago') }}
            </span>

            <div class="float-right">
              <a href="{{ route('tenant.estados.pagos.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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

                  <th>Descripcion</th>

                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($estadosPagos as $estadosPago)
                <tr>
                  <td>{{ ++$i }}</td>

                  <td>{{ $estadosPago->descripcion }}</td>

                  <td>
                    <form action="{{ route('tenant.estados.pagos.destroy',$estadosPago->id) }}" method="POST">
                      <a class="btn btn-sm btn-primary " href="{{ route('tenant.estados.pagos.show',$estadosPago->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                      <a class="btn btn-sm btn-success" href="{{ route('tenant.estados.pagos.edit',$estadosPago->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
      {!! $estadosPagos->links() !!}
    </div>
  </div>
</div>
@endsection