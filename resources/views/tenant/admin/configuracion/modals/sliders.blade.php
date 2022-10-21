<!-- Modal banners -->
<div class="modal fade" id="modalSlider" tabindex="-1" aria-labelledby="modalBannerLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title" id="modalRedSocialLabel">Edita tus Sliders</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="POST" action="{{ route('tenant.admin.configuracion') }}" role="form" enctype="multipart/form-data">
          {{ method_field('PATCH') }}
          @csrf
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">
                Slider 1
              </h5>
              <!-- <a class="btn btn-link btn-lg eliminar-banner"><i class="fa fa-trash-o"></i></a> -->
            </div>
            <div class="imagen-banner card-img-top">
              <input banner="1" type="file" name="imagen_banner_1" class="input-imagen-banner" />
              <img id="imagen_banner_1" src="{{global_asset($configuracion->imagen_banner_1 ?? 'img/big-deal/pets/menu-banner/1.png')}}" />
              <div class="icon-wrapper">
                <i class="fa fa-upload fa-5x"></i>
              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title"><input style="width: 100%;" type="text" value="{{$configuracion->titulo_banner_1}}" name="titulo_banner_1" placeholder="Título"></h5>
              <p class="card-text"><input style="width: 100%;" type="text" value="{{$configuracion->descripcion_banner_1}}" name="descripcion_banner_1" placeholder="Descripción"></p>
            </div>
          </div>
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">
                slider 2
                <!-- <a class="btn btn-link btn-lg eliminar-banner"><i class="fa fa-trash-o"></i></a> -->
              </h5>
            </div>
            <div class="imagen-banner card-img-top">
              <input type="file" banner="2" name="imagen_banner_2" class="input-imagen-banner" />
              <img id="imagen_banner_2" src="{{global_asset($configuracion->imagen_banner_2 ?? 'img/big-deal/pets/menu-banner/2.png')}}" />
              <div class="icon-wrapper">
                <i class="fa fa-upload fa-5x"></i>
              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title"><input style="width: 100%;" type="text" value="{{$configuracion->titulo_banner_2}}" name="titulo_banner_2" placeholder="Título"></h5>
              <p class="card-text"><input style="width: 100%;" type="text" value="{{$configuracion->descripcion_banner_2}}" name="descripcion_banner_2" placeholder="Descripción"></p>
            </div>
          </div>
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">
                slider 3
                <!-- <a class="btn btn-link btn-lg eliminar-banner"><i class="fa fa-trash-o"></i></a> -->
              </h5>
            </div>
            <div class="imagen-banner card-img-top">
              <input banner="3" type="file" name="imagen_banner_3" class="input-imagen-banner" />
              <img id="imagen_banner_3" src="{{global_asset($configuracion->imagen_banner_3 ?? 'img/big-deal/pets/menu-banner/3.png')}}" />
              <div class="icon-wrapper">
                <i class="fa fa-upload fa-5x"></i>
              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title"><input style="width: 100%;" type="text" value="{{$configuracion->titulo_banner_3}}" name="titulo_banner_3" placeholder="Título"></h5>
              <p class="card-text"><input style="width: 100%;" type="text" value="{{$configuracion->descripcion_banner_3}}" name="descripcion_banner_3" placeholder="Descripción"></p>
            </div>
          </div>
          <!--
                        <div class="form-group" id="btnAgregarBannerGroup">
                          <button type="button" class="btn btn-success btn-block" id="btnAgregarBanner">Agregar banner</button>
                        </div> -->
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
<!-- Fin modal banners -->
