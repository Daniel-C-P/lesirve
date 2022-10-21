@extends('layouts.dashboard')

@section('content')
<section class="content container-fluid">
  <div class="">
    <div class="col-md-12">

      @includeif('partials.errors')

      <div class="card card-default">
        <div class="card-header">
          <span class="card-title">Editar configuracion</span>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif
        <div class="card-body">

          <div class="box box-info padding-1">
            <div class="box-body">

              @include('tenant.admin.configuracion.formulario')
              <!-- Boton para el modal de las plantillas -->
              <div class="form-group">
                <button type="button" class="btn btn-lg btn-block btn-primary" data-bs-toggle="modal" data-bs-target="#modalPlantilla">Seleccionar plantilla para tu tienda</button>
              </div>
              <!-- Boton para el modal de las redes sociales -->
              <div class="form-group">
                <button type="button" class="btn btn-lg btn-block btn-primary" data-bs-toggle="modal" data-bs-target="#modalRedSocial">Editar informacion de contacto</button>
              </div>
              <!-- Boton para el modal de banners -->
              <div class="form-group">
                <a class="btn btn-lg btn-block btn-primary" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalSlider" class="tooltip-top" data-tippy-content="Revisar">
                  <span>Editar Sliders</span>
                </a>
              </div>
              <div class="form-group">
                <a class="btn btn-lg btn-block btn-primary" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalBanner" class="tooltip-top" data-tippy-content="Revisar">
                  <span>Editar Banners</span>
                </a>
              </div>


              <!-- Seccion de modales -->
              @include('tenant.admin.configuracion.modals.sliders')
              @include('tenant.admin.configuracion.modals.banners')
              @include('tenant.admin.configuracion.modals.redes-sociales')
              @include('tenant.admin.configuracion.modals.plantillas')

              <!-- Fin seccion modales -->
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
  </div>
</section>
@stop
