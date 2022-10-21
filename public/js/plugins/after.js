$("#btnAgregarBanner").on("click", function () {
    const lastBanner = $(".lista-banner").toArray().length + 1;
    const image = `/img/big-deal/pets/menu-banner/${lastBanner}.png`;
    const code = `<div class="card mb-3 lista-banner">
    <h5 class="card-title">
      Banner ${lastBanner}
      <a class="btn btn-link btn-lg eliminar-banner"><i class="fa fa-trash-o"></i></a>
    </h5>
    <img src="${image}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><input style="width: 100%;" type="text" name="titulo_banner_${lastBanner}" placeholder="Título"></h5>
      <p class="card-text"><input style="width: 100%;" type="text" name="descripcion_banner_${lastBanner}" placeholder="Descripción"></p>
    </div>
  </div>`;
    $("#btnAgregarBannerGroup").before(code);
    if (lastBanner == 3) $("#btnAgregarBannerGroup").css("display", "none");
});

$(".eliminar-banner").on("click", function () {
    $(this).remove();
});

$(".input-imagen-banner").on("change", function () {
    const dimensionesBanners = [
        {
            ancho: 533,
            alto: 620,
        },
        {
            ancho: 1300,
            alto: 550,
        },
        {
            ancho: 600,
            alto: 400,
        },
        {
            ancho: 400,
            alto: 300,
        },
    ];
    const img = new Image();
    const image = this.files[0];
    const banner = $(this).attr("banner");
    if (!image) return;
    const reader = new FileReader();
    reader.addEventListener("load", function () {
        img.src = reader.result;
        var dimensiones;
        setTimeout(function () {
            if (banner <= 3 || banner == 6 ) {
                dimensiones = dimensionesBanners[1];
            }else if (banner >= 4 && banner < 6 ) {

                dimensiones = dimensionesBanners[2];
            }else if(banner >= 7){
                dimensiones = dimensionesBanners[3];
            }

            if (
                img.naturalHeight != dimensiones.alto &&
                img.naturalWidth != dimensiones.ancho
            )
                return alert(
                    `La imagen debe cumplir con un ancho de ${dimensiones.ancho}px y alto de ${dimensiones.alto}px`
                );
            $(`#imagen_banner_${banner}`).attr("src", reader.result);
        }, 500);
    });
    reader.readAsDataURL(image);
});

// Codigo de after para las imagenes
$("#btnAgregarImagen").on("click", function () {
    const lastImage = $(".lista-imagen").toArray().length + 1;
    const image = `/img/big-deal/pets/product/${lastImage}.jpg`;
    const code = `<div class="card mb-3 lista-imagen">
            <h5>Imagen ${lastImage}<a class="btn btn-link btn-lg eliminar-imagen"><i class="fa fa-trash-o"></i></a></h5>
            <div class="imagen-producto card-img-top">
                <input imagen="${lastImage}" type="file" name="imagen_${lastImage}" class="input-imagen-producto" />
                <img id="imagen_${lastImage}" src="${image}" />
            <div class="icon-wrapper">
                <i class="fa fa-upload fa-5x"></i>
            </div>
        </div>`;

    $("#imagenes-productos").append($(code));
    if (lastImage == 4) $("#btnAgregarImagenGroup").css("display", "none");
});

$(".eliminar-imagen").on("click", function () {
    $(this).remove();
});

$(".input-imagen-banner").on("change", function () {
    const dimensionesBanners = [
        {
            ancho: 533,
            alto: 620,
        },
        {
            ancho: 1300,
            alto: 550,
        },
        {
            ancho: 600,
            alto: 400,
        },
        {
            ancho: 400,
            alto: 300,
        },
    ];
    const img = new Image();
    const image = this.files[0];
    const banner = $(this).attr("banner");
    if (!image) return;
    const reader = new FileReader();
    reader.addEventListener("load", function () {
        img.src = reader.result;
        var dimensiones;
        setTimeout(function () {
            if (banner <= 3 || banner == 6 ) {
                dimensiones = dimensionesBanners[1];
            }else if (banner >= 4 && banner < 6 ) {

                dimensiones = dimensionesBanners[2];
            }else if(banner >= 7){
                dimensiones = dimensionesBanners[3];
            }

            if (
                img.naturalHeight != dimensiones.alto &&
                img.naturalWidth != dimensiones.ancho
            )
                return alert(
                    `La imagen debe cumplir con un ancho de ${dimensiones.ancho}px y alto de ${dimensiones.alto}px`
                );
            $(`#imagen_${banner}`).attr("src", reader.result);
        }, 500);
    });
    reader.readAsDataURL(image);
});

// Vista previa imagen en productos
$("#imagenes-productos").on(
    "change",
    "input.input-imagen-producto",
    function () {
        const img = new Image();
        const image = this.files[0];
        if (!image) return;
        const reader = new FileReader();
        const imagen = $(this).attr("imagen");
        reader.addEventListener("load", function () {
            img.src = reader.result;
            $(`#imagen_${imagen}`).attr("src", reader.result);
        });
        reader.readAsDataURL(image);
    }
);

$("#imagenes-servicios").on(
  "change",
  "input.input-imagen-servicios",
  function () {
      const img = new Image();
      const image = this.files[0];
      if (!image) return;
      const reader = new FileReader();
      reader.addEventListener("load", function () {
          img.src = reader.result;
          $(`#imagen`).attr("src", reader.result);
      });
      reader.readAsDataURL(image);
  }
);

// Vista previa imagen en configuracion
$(".input-img-logo").on("change", function () {
    const img = new Image();
    const image = this.files[0];
    if (!image) return;
    const reader = new FileReader();
    reader.addEventListener("load", function () {
        img.src = reader.result;
        $(`#img-logo`).attr("src", reader.result);
    });
    reader.readAsDataURL(image);
});
