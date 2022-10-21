<!-- Modal banners -->
<div class="modal fade" id="modalBanner" tabindex="-1" aria-labelledby="modalBannerLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title" id="modalRedSocialLabel">Edita tus banners</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="POST" action="{{ route('tenant.admin.configuracion') }}" role="form" enctype="multipart/form-data">
          {{ method_field('PATCH') }}
          @csrf
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">
                Banner 1
              </h5>
              <!-- <a class="btn btn-link btn-lg eliminar-banner"><i class="fa fa-trash-o"></i></a> -->
            </div>
            <div class="imagen-banner card-img-top">
              <input banner="4" type="file" name="imagen_banner_4" class="input-imagen-banner" />
              <img id="imagen_banner_4" src="{{global_asset($banners[0]['URL_imagen']?? 'img/big-deal/pets/menu-banner/1.png')}}" />
              <div class="icon-wrapper">
                <i class="fa fa-upload fa-5x"></i>
              </div>
            </div>
            <div class="card-body"><input style="width: 100%;" type="hidden" value="{{$banners[0]['id']}}" name="id_banner_4" placeholder="Título">
              <h5 class="card-title"><input style="width: 100%;" type="text" value="{{$banners[0]['titulo_imagen']}}" name="texto_banner_4" placeholder="Título"></h5>
              <p class="card-text"><input style="width: 100%;" type="text" value="{{$banners[0]['texto_boton']}}" name="boton_banner_4" placeholder="Boton"></p>
              <p class="card-text"><input style="width: 100%;" type="text" value="{{$banners[0]['URL_funcion']}}" name="url_banner_4" placeholder="URL"></p>

            </div>
          </div>
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">
                Banner 2
                <!-- <a class="btn btn-link btn-lg eliminar-banner"><i class="fa fa-trash-o"></i></a> -->
              </h5>
            </div>
            <div class="imagen-banner card-img-top">
              <input type="file" banner="5" name="imagen_banner_5" class="input-imagen-banner" />
              <img id="imagen_banner_5" src="{{global_asset($banners[1]['URL_imagen']?? 'img/big-deal/pets/menu-banner/2.png')}}" />
              <div class="icon-wrapper">
                <i class="fa fa-upload fa-5x"></i>
              </div>
            </div>
            <div class="card-body"><input style="width: 100%;" type="hidden" value="{{$banners[1]['id']}}" name="id_banner_5" placeholder="Título">
              <h5 class="card-title"><input style="width: 100%;" type="text" value="{{$banners[1]['titulo_imagen']}}" name="texto_banner_5" placeholder="Título"></h5>
              <p class="card-text"><input style="width: 100%;" type="text" value="{{$banners[1]['texto_boton']}}" name="boton_banner_5" placeholder="Boton"></p>
              <p class="card-text"><input style="width: 100%;" type="text" value="{{$banners[1]['URL_funcion']}}" name="url_banner_5" placeholder="URL"></p>

            </div>
          </div>
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">
                Banner 3
                <!-- <a class="btn btn-link btn-lg eliminar-banner"><i class="fa fa-trash-o"></i></a> -->
              </h5>
            </div>
            <div class="imagen-banner card-img-top">
              <input banner="6" type="file" name="imagen_banner_6" class="input-imagen-banner" />
              <img id="imagen_banner_6" src="{{global_asset($banners[2]['URL_imagen'] ?? 'img/big-deal/pets/menu-banner/3.png')}}" />
              <div class="icon-wrapper">
                <i class="fa fa-upload fa-5x"></i>
              </div>
            </div>
            <div class="card-body"><input style="width: 100%;" type="hidden" value="{{$banners[2]['id']}}" name="id_banner_6" placeholder="Título">
              <h5 class="card-title"><input style="width: 100%;" type="text" value="{{$banners[2]['titulo_imagen']}}" name="texto_banner_6" placeholder="Título"></h5>
              <p class="card-text"><input style="width: 100%;" type="text" value="{{$banners[2]['texto_boton']}}" name="boton_banner_6" placeholder="Boton"></p>
              <p class="card-text"><input style="width: 100%;" type="text" value="{{$banners[2]['URL_funcion']}}" name="url_banner_6" placeholder="URL"></p>

            </div>
          </div>
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">
                Banner 4
                <!-- <a class="btn btn-link btn-lg eliminar-banner"><i class="fa fa-trash-o"></i></a> -->
              </h5>
            </div>
            <div class="imagen-banner card-img-top">
              <input banner="7" type="file" name="imagen_banner_7" class="input-imagen-banner" />
              <img id="imagen_banner_7" src="{{global_asset($banners[3]['URL_imagen'] ?? 'img/big-deal/pets/menu-banner/3.png')}}" />
              <div class="icon-wrapper">
                <i class="fa fa-upload fa-5x"></i>
              </div>
            </div>
            <div class="card-body"><input style="width: 100%;" type="hidden" value="{{$banners[3]['id']}}" name="id_banner_7" placeholder="Título">
              <h5 class="card-title"><input style="width: 100%;" type="text" value="{{$banners[3]['titulo_imagen']}}" name="texto_banner_7" placeholder="Título"></h5>
              <p class="card-text"><input style="width: 100%;" type="text" value="{{$banners[3]['texto_boton']}}" name="boton_banner_7" placeholder="Boton"></p>
              <p class="card-text"><input style="width: 100%;" type="text" value="{{$banners[3]['URL_funcion']}}" name="url_banner_7" placeholder="URL"></p>

            </div>
          </div>
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">
                Banner 5
                <!-- <a class="btn btn-link btn-lg eliminar-banner"><i class="fa fa-trash-o"></i></a> -->
              </h5>
            </div>
            <div class="imagen-banner card-img-top">
              <input banner="8" type="file" name="imagen_banner_8" class="input-imagen-banner" />
              <img id="imagen_banner_8" src="{{global_asset($banners[4]['URL_imagen'] ?? 'img/big-deal/pets/menu-banner/3.png')}}" />
              <div class="icon-wrapper">
                <i class="fa fa-upload fa-5x"></i>
              </div>
            </div>
            <div class="card-body"><input style="width: 100%;" type="hidden" value="{{$banners[4]['id']}}" name="id_banner_8" placeholder="Título">
              <h5 class="card-title"><input style="width: 100%;" type="text" value="{{$banners[4]['titulo_imagen']}}" name="texto_banner_8" placeholder="Título"></h5>
              <p class="card-text"><input style="width: 100%;" type="text" value="{{$banners[4]['texto_boton']}}" name="boton_banner_8" placeholder="Boton"></p>
              <p class="card-text"><input style="width: 100%;" type="text" value="{{$banners[4]['URL_funcion']}}" name="url_banner_8" placeholder="URL"></p>
            </div>
          </div>
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">
                Banner 6
                <!-- <a class="btn btn-link btn-lg eliminar-banner"><i class="fa fa-trash-o"></i></a> -->
              </h5>
            </div>
            <div class="imagen-banner card-img-top">
              <input banner="9" type="file" name="imagen_banner_9" class="input-imagen-banner" />
              <img id="imagen_banner_9" src="{{global_asset($banners[5]['URL_imagen'] ?? 'img/big-deal/pets/menu-banner/3.png')}}" />
              <div class="icon-wrapper">
                <i class="fa fa-upload fa-5x"></i>
              </div>
            </div>
            <div class="card-body"><input style="width: 100%;" type="hidden" value="{{$banners[5]['id']}}" name="id_banner_9" placeholder="Título">
              <h5 class="card-title"><input style="width: 100%;" type="text" value="{{$banners[5]['titulo_imagen']}}" name="texto_banner_9" placeholder="Título"></h5>
              <p class="card-text"><input style="width: 100%;" type="text" value="{{$banners[5]['texto_boton']}}" name="boton_banner_9" placeholder="Boton"></p>
              <p class="card-text"><input style="width: 100%;" type="text" value="{{$banners[5]['URL_funcion']}}" name="url_banner_9" placeholder="URL"></p>
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
