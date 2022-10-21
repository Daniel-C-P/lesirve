<!-- Modal plantillas -->
<div class="modal fade" id="modalPlantilla" tabindex="-1" aria-labelledby="modalPlantillaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{ route('tenant.admin.configuracion') }}" method="post">
        @method('patch')
        @csrf
        <div class="modal-header text-center">
          <h5 class="modal-title" id="modalPlantillaLabel">Plantillas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="carouselPlantillas" data-bs-interval="false" class="carousel carousel-dark slide" data-ride="carousel">
            <input type="hidden" id="cantidad-plantilla" value="{{ count($listaPlantillas) }}">
            <div class="carousel-indicators">
              <?php $plantillas = ''; ?>
              @foreach($listaPlantillas as $index => $plantilla)
              <?php $plantillas .= $plantilla->id .';'; ?>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$index}}" class="{{ $configuracion->id_plantilla == $plantilla->id ? 'active' : '' }}" aria-current="true" aria-label="Slide 1"></button>
              @endforeach
              <input type="hidden" id="nombres-plantillas" value="{{ substr($plantillas, 0, -1) }}">
            </div>
            <div class="carousel-inner">
              @foreach($listaPlantillas as $index => $plantilla)
              <div class="carousel-item {{ $configuracion->id_plantilla == $plantilla->id ? 'active' : '' }} lista-plantillas" data-interval="8000">
                <img src="{{ global_asset($plantilla->imagen) }}" class="d-block w-100 img-fluid">
                <div class="carousel-caption d-none d-md-block">
                  <strong class="fs-3">Plantilla {{ $plantilla->nombre }}</strong>
                </div>
              </div>
              @endforeach
            </div>
            <input type="hidden" name="id_plantilla" value="{{ $configuracion->id_plantilla }}" id="plantilla-actual">
            <button id="prev-plantilla" class="carousel-control-prev" type="button" data-bs-target="#carouselPlantillas" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Atras</span>
            </button>
            <button id="next-plantilla" class="carousel-control-next" type="button" data-bs-target="#carouselPlantillas" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Siguiente</span>
            </button>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-block">Seleccionar plantilla</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Fin modal plantilla -->