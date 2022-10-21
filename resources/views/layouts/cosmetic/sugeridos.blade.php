<!--hot deal start-->
<section class=" hot-deal b-g-white hotdeal-first collection-banner section-big-pb-space space-abjust">
  <div class="custom-container">
    <div class="row hot-2">
      <div class="col-12">
        <!--title start-->
        <div class="title3 title-big b-g-white text-left">
          <h4>Productos sugeridos</h4>
        </div>
        <!--titel end-->
      </div>
      <div class="col-lg-9">
        <div class="slide-1 no-arrow">
          <div>
            <div class="hot-deal-contain ">
              <div class="row hot-deal-subcontain hotdeal-block1">
                <div class="col-lg-4 col-md-4  ">
                  <div class="hotdeal-right-slick border-0">
                    <a href="{{ route('producto.comprar', ['id' => $productosNuevos[0]->id]) }}">
                      <div class="img-wrraper">
                        <div>
                          <img src="{{ global_asset($productosNuevos[0]->imagen_1) }}" alt="hot-deal" class="img-fluid  bg-img">
                        </div>
                      </div>
                    </a>
                    <a href="{{ route('producto.comprar', ['id' => $productosNuevos[0]->id]) }}">
                      <div class="img-wrraper">
                        <div>
                          <img src="{{ global_asset($productosNuevos[0]->imagen_2) }}" alt="hot-deal" class="img-fluid  bg-img">
                        </div>
                      </div>
                    </a>
                    <a href="{{ route('producto.comprar', ['id' => $productosNuevos[0]->id]) }}">
                      <div class="img-wrraper">
                        <div>
                          <img src="{{ global_asset($productosNuevos[0]->imagen_3) }}" alt="hot-deal" class="img-fluid  bg-img">
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 deal-order-3">
                  <div class="hotdeal-right-slick border-0">
                    <div>
                      <div>
                        <a href="{{ route('producto.comprar', ['id' => $productosNuevos[0]->id]) }}">
                          <h5>{{ $productosNuevos[0]->nombre }}</h5>
                        </a>
                        <p>
                          {{ $productosNuevos[0]->descripcion_corta }}
                        </p>
                        <h6>
                          @if($productosNuevos[0]->en_oferta)
                          ${{ number_format($productosNuevos[0]->valor_descuento, 0, ',', '.') }}
                          <span>${{ number_format($productosNuevos[0]->precio, 0, ',', '.') }}</span>
                          @else
                          ${{ number_format($productosNuevos[0]->precio, 0, ',', '.') }}
                          @endif
                        </h6>
                        <a href="{{ route('producto.comprar', ['id' => $productosNuevos[0]->id]) }}" class="btn btn-normal btn-md ">Comprar ahora</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-2 ">
                  <div class="hotdeal-right-nav"><!-- 
                    <div><img src="../assets/images/cosmetic/hot-deal/1.jpg" alt="hot-dea" class="img-fluid  "></div>
                    <div><img src="../assets/images/cosmetic/hot-deal/2.jpg" alt="hot-dea" class="img-fluid  "></div>
                    <div><img src="../assets/images/cosmetic/hot-deal/3.jpg" alt="hot-dea" class="img-fluid  "></div>
                    <div><img src="../assets/images/cosmetic/hot-deal/2.jpg" alt="hot-dea" class="img-fluid  "></div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="collection-banner-main p-center p-top text-center banner-style1 banner-15">
          <div class="collection-img">
            <img src="{{ global_asset($productosNuevos[0]->imagen_1) }}" class="img-fluid bg-img  " alt="banner">
          </div>
          <div class="collection-banner-contain text-center">
            <div>
              <h3>{{ $productosNuevos[0]->nombre }}</h3>
              <h4>{{ $productosNuevos[0]->descripcion_corta }}</h4>
              <div class="shop">
                <a href="{{ route('producto.comprar', ['id' => $productosNuevos[0]->id]) }}" class="btn btn-solid btn-sm">
                  comprar ahora
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--hot deal start-->
