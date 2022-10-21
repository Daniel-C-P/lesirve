@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">

            <span id="card_title">
              {{ __('Servicio') }}
            </span>

            <div class="float-right">
              <a href="{{ route('servicios.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                  <th>Descripcion</th>
                  <th>Imagen</th>

                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($servicios as $servicio)
                <tr>
                  <td>{{ ++$i }}</td>

                  <td>{{ $servicio->nombre }}</td>
                  <td>{{ $servicio->descripcion }}</td>
                  <td><img src="{{ global_asset($servicio->imagen) }}" width="40px"></td>

                  <td>
                    <form action="{{ route('servicios.destroy',$servicio->id) }}" method="POST">
                      <a class="btn btn-sm btn-primary " href="{{ route('servicios.show',$servicio->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                      <a class="btn btn-sm btn-success" href="{{ route('servicios.edit',$servicio->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
      {!! $servicios->links() !!}
    </div>
  </div>
</div>
@stop