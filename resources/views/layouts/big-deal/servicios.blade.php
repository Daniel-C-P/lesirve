<!--title start-->
<div class="title4 ">
  <h4>Nuestros <span>servicios</span></h4>
</div>
<!--title end-->

<!-- services start -->
<section class="services1 section-big-pb-space  block style2">
  <div class="custom-container">
    <div class="row">
      <div class="col-12 pr-0">
        <div class="services-slide4 no-arrow">
          @if(isset($servicios))
          @foreach($servicios as $servicio)
          <div>
            <div class="services-box">
              <div class="media">
                <div class="media-body">
                  <h4>{{ $servicio->nombre }}</h4>
                  <p> {{ $servicio->descripcion }} </p>
                </div>
                <div>
                  <a href="{{url('reservar-servicio/'.$servicio->nombre)}}" class="btn btn-rounded btn-sm">Reservar</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
<!-- services end -->