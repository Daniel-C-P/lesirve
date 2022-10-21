<!--home slider start-->
<section class="pets-slide home-slide">
  <div class="custom-container">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carusel">
      <div class="container-fluid" id="container-slider" >
       <ol class="carousel-indicators">
        <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" ></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="1" ></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="2" ></li>
       </ol>
       <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ global_asset($tenant->banner1) }}" class="d-block w-100"  alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{ global_asset($tenant->banner2) }}" class="d-block w-100"  alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{ global_asset($tenant->banner3) }}" class="d-block w-100"  alt="...">
        </div>
      </div>
      <a class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </a>
    </div>
  </div>
  </div>
</section>
<!--home slider end-->
