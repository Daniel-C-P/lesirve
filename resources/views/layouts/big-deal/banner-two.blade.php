<section class="collection-banner  layout-7">
  <div class="custom-container" >
    <div class="row layout-3-collection" >
      <div class="col-md-6" >
        <div class="collection-banner-main banner-3  text-center p-right" >
          <a href="{{$tenant->url_banner_4}}">
          <div class="collection-img bg-size" style="background-image: url(&quot;../assets/images/furniture1/collection-banner/6.jpg&quot;); background-size: cover; background-position: center center; display: block;">
            <img src="{{ global_asset($tenant->imagen_banner_4) }}" class="img-fluid bg-img " alt="banner" style="display: none;">
          </div>
          <div class="collection-banner-contain ">
              <div>
                <h2 class="text-danger" ><strong>{{$tenant->texto_banner_4}}</strong></h2>
                <br>
              </div>
          </div>
          </a>
        </div>
      </div>
      <div class="col-md-6" >
        <div class="collection-banner-main banner-3 text-center p-right">
          <a href="{{$tenant->url_banner_5}}">
          <div class="collection-img bg-size" style="background-image: url(&quot;../assets/images/furniture1/collection-banner/7.jpg&quot;); background-size: cover; background-position: center center; display: block;">
            <img src="{{ global_asset($tenant->imagen_banner_5) }}" class="img-fluid bg-img " alt="banner" style="display: none;">
          </div>
          <div class="collection-banner-contain ">
            <div>
              <h2 class="text-danger" ><strong>{{$tenant->texto_banner_5}}</strong></h2>
              <br>
            </div>
          </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>