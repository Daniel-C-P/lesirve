<!--title-start-->
<div class="title8 section-big-my-space ">
  <h4>Nuestros servicios</h4>
</div>
<!--title-end-->

<!--category start-->
<section class="category2 section-pt-space">
  <div class="custom-container">
    <div class="row">
      <div class="col-12 pr-0">
        <div class="category-slide6 no-arrow">
          @if(isset($servicios))
          @foreach($servicios as $servicio)
          <div>
            <a href="javascript:void(0)">
              <div class="category-box">
                <div>
                  <div class="icon-wrapper">
                    <!-- imagen -->
                  </div>
                  <div class="category-details">
                    <h6>
                      {{ $servicio->nombre }}
                    </h6>
                  </div>
                </div>
              </div>
            </a>
          </div>
          @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
<!--category end-->