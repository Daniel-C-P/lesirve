@extends('layouts.dashboard')

@section('content')
<section class="content container-fluid">
  <div class="">
    <div class="col-md-12">

      @includeif('partials.errors')

      <div class="card card-default">
        <div class="card-header">
          <span class="card-title">Update Producto</span>
          <div class="float-right">
            <a class="btn btn-primary" href="{{ route('productos.index') }}"> Back</a>
          </div>
        </div>        
        <div class="card-body">
          <form method="POST" action="{{ route('productos.update', $producto->id) }}" role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf

            @include('tenant.admin.productos.producto.form')


          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@stop