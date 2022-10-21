<!--deal banner start-->
<section class="deal-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="deal-banner-containe">
          <h2>

          </h2>
          <h1>
            Es hora de ver estos increibles descuentos
          </h1>
        </div>
      </div>
    </div>
  </div>
</section>
<!--deal banner end-->

<!--rounded category start-->
<section class="rounded-category">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="slide-6 no-arrow">
          @foreach($productosDescuentos as $descuento)
          <div>
            <div class="category-contain">
              <div class="img-wrapper">
                <a href="category-page(left-sidebar).html">
                  <img src="{{ global_asset($descuento->imagen_1) }}" alt="category  " class="img-fluid">
                </a>
              </div>
              <a href="category-page(left-sidebar).html" class="btn-rounded">
                {{ $descuento->nombre }}
                <br />
                <span>{{ number_format(100 - (($descuento->valor_descuento / $descuento->precio) * 100), 2) }}% dscto.</span>
              </a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
<!--rounded category end-->