<!-- footer start -->
<footer>
  <div class="footer1">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="footer-main">
            <div class="footer-box">
              <div class="footer-title mobile-title">
                <h5>about</h5>
              </div>
              <div class="footer-contant">
                <div class="footer-logo">
                  <a href="/">
                    <img src="{{ global_asset($tenant->logo) }}" class="img-fluid" alt="logo">
                  </a>
                </div>
                <p>{{ $tenant->descripcion }}.</p>

                <ul class="payment">
                  Medios de pagos: 
                  @foreach($mediosPagos as $medioPago)
                  <li><img src="{{ global_asset($medioPago->logo) }}" style="width: 50px;" class="img-fluid" alt="{{ $medioPago->nombre }}" title="{{ $medioPago->nombre }}" alt="logo {{ $medioPago->nombre }}"></li>
                  @endforeach
                </ul>
              </div>
            </div>

            <div class="footer-box">
              <div class="footer-title">
                <h5>contactanos</h5>
              </div>
              <div class="footer-contant">
                <ul class="contact-list">
                  @if($tenant->direccion != null)
                  <li><i class="fa fa-map-marker"></i>dirección: <span>{{ $tenant->direccion }}</span></li>
                  @endif
                  @if($tenant->telefono != null)
                  <li><i class="fa fa-phone"></i>teléfono: <span>{{ $tenant->telefono }}</span></li>
                  @endif
                  @if($tenant->correo != null)
                  <li><i class="fa fa-envelope-o"></i>correo: <span>{{ $tenant->correo }}</span></li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="subfooter dark-footer ">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-md-8 col-sm-12">
          <div class="footer-left">
            <p>2019-20 Copy Right by Themeforest Powered by pixel strap</p>
          </div>
        </div>
        <div class="col-xl-6 col-md-4 col-sm-12">
          <div class="footer-right">
            <ul class="sosiyal">
              @if($tenant->facebook != null)
              <li><a href="{{ $tenant->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
              @endif
              @if($tenant->twitter != null)
              <li><a href="{{ $tenant->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
              @endif
              @if($tenant->whatsapp != null)
              <li><a href="{{ $tenant->whatsapp }}" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
              @endif
              @if($tenant->instagram != null)
              <li><a href="{{ $tenant->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
              @endif
              @if($tenant->youtube != null)
              <li><a href="{{ $tenant->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
              @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- footer end -->