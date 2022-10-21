<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Bigdeal admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, Bigdeal admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <link rel="icon" href="{{ global_asset('img/big-deal/favicon/favicon.png') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ global_asset('img/big-deal/favicon/favicon.png') }}" type="image/x-icon">
  <title>Cambiar contraseña</title>

  <!-- Google font-->
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


  <!-- Font Awesome-->
  <link rel="stylesheet" type="text/css" href="{{ global_asset('css/plugins/font-awesome.css') }}">

  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="{{ global_asset('css/general/flag-icon.css') }}">

  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="{{ global_asset('css/general/icofont.css') }}">

  <!-- Prism css-->
  <link rel="stylesheet" type="text/css" href="{{ global_asset('css/general/prism.css') }}">

  <!-- Chartist css -->
  <link rel="stylesheet" type="text/css" href="{{ global_asset('css/general/chartist.css') }}">

  <!-- vector map css -->
  <link rel="stylesheet" type="text/css" href="{{ global_asset('css/general/vector-map.css') }}">

  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="{{ global_asset('css/general/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ global_asset('css/plugins/bootstrap-colorpicker.min.css') }}">

  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="{{ global_asset('css/general/admin.css') }}">

  <!-- Custom Style css-->
  <link rel="stylesheet" type="text/css" href="{{ global_asset('css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ global_asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ global_asset('css/plugins/select2.min.css') }}">

</head>

<body>

  <!-- page-wrapper Start-->
  <div class="page-wrapper">

      <div class="page-body">

        <!-- Container-fluid starts-->
        @section('content')
        <h1>Panel administrativo</h1>
        @show
        <!-- Container-fluid Ends-->

      </div>

      <!-- footer start-->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 footer-copyright">
              <p class="mb-0">Copyright 2019 © Bigdeal All rights reserved.</p>
            </div>
            <div class="col-md-6">
              <p class="pull-right mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>
            </div>
          </div>
        </div>
      </footer>
      <!-- footer end-->
    </div>

  </div>

  <!-- latest jquery-->
  <script src="{{ global_asset('js/general/jquery.min.js') }}"></script>

  <!-- Bootstrap js-->
  <script src="{{ global_asset('js/general/popper.min.js') }}"></script>
  <script src="{{ global_asset('js/general/bootstrap.js') }}"></script>

  <script src="{{ global_asset('js/general/bootstrap-notify.min.js') }}"></script>


  <!-- feather icon js-->
  <script src="{{ global_asset('js/general/icons/feather-icon/feather.min.js') }}"></script>
  <script src="{{ global_asset('js/general/icons/feather-icon/feather-icon.js') }}"></script>

  <!-- Sidebar jquery-->
  <script src="{{ global_asset('js/general/sidebar-menu.js') }}"></script>

  <!--chartist js-->
  <script src="{{ global_asset('js/general/chart/chartist/chartist.js') }}"></script>


  <!-- lazyload js-->
  <script src="{{ global_asset('js/general/lazysizes.min.js') }}"></script>

  <!--copycode js-->
  <script src="{{ global_asset('js/general/prism/prism.min.js') }}"></script>
  <script src="{{ global_asset('js/general/clipboard/clipboard.min.js') }}"></script>
  <script src="{{ global_asset('js/general/custom-card/custom-card.js') }}"></script>

  <!--counter js-->
  <script src="{{ global_asset('js/general/counter/jquery.waypoints.min.js') }}"></script>
  <script src="{{ global_asset('js/general/counter/jquery.counterup.min.js') }}"></script>
  <script src="{{ global_asset('js/general/counter/counter-custom.js') }}"></script>

  <!--Customizer admin-->
  <script src="{{ global_asset('js/general/admin-customizer.js') }}"></script>

  <!--map js-->
  <script src="{{ global_asset('js/general/vector-map/jquery-jvectormap-2.0.2.min.js') }}"></script>
  <script src="{{ global_asset('js/general/vector-map/map/jquery-jvectormap-world-mill-en.js') }}"></script>

  <!--apex chart js-->
  <script src="{{ global_asset('js/general/chart/apex-chart/apex-chart.js') }}"></script>
  <script src="{{ global_asset('js/general/chart/apex-chart/stock-prices.js') }}"></script>

  <!--chartjs js-->
  <script src="{{ global_asset('js/general/chart/flot-chart/excanvas.js') }}"></script>
  <script src="{{ global_asset('js/general/chart/flot-chart/jquery.flot.js') }}"></script>
  <script src="{{ global_asset('js/general/chart/flot-chart/jquery.flot.time.js') }}"></script>
  <script src="{{ global_asset('js/general/chart/flot-chart/jquery.flot.categories.js') }}"></script>
  <script src="{{ global_asset('js/general/chart/flot-chart/jquery.flot.stack.js') }}"></script>
  <script src="{{ global_asset('js/general/chart/flot-chart/jquery.flot.pie.js') }}"></script>

  <!--dashboard custom js-->
  <script src="{{ global_asset('js/general/dashboard/default.js') }}"></script>

  <!--right sidebar js-->
  <script src="{{ global_asset('js/general/chat-menu.js') }}"></script>

  <!--height equal js-->
  <script src="{{ global_asset('js/general/equal-height.js') }}"></script>

  <!-- lazyload js-->
  <script src="{{ global_asset('js/general/lazysizes.min.js') }}"></script>
  <!--Color Picker-->
  <script src="{{ global_asset('js/plugins/bootstrap-colorpicker.min.js') }}"></script>
  <!--script admin-->
  <script src="{{ global_asset('js/general/admin-script.js') }}"></script>
  <script src="{{ global_asset('js/plugins/after.js') }}"></script>
  <script src="{{ global_asset('js/admin.js') }}"></script>
  <script src="{{ global_asset('js/plugins/select2.min.js') }}"></script>

  <!--ck editor-->
  <script src="{{ global_asset('js/general/editor/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ global_asset('js/general/editor/ckeditor/styles.js') }}"></script>
  <script src="{{ global_asset('js/general/editor/ckeditor/adapters/jquery.js') }}"></script>
  <script src="{{ global_asset('js/general/editor/ckeditor/ckeditor.custom.js') }}"></script>

  <!-- Sweetalert2 for alerts more nice -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script language="JavaScript">
    $(document).ready(() => {
      $('.select2').select2();


      CKEDITOR.replace('descripcion_larga', {
        on: {
          contentDom: function(evt) {
            // Allow custom context menu only with table elemnts.
            evt.editor.editable().on('contextmenu', function(contextEvent) {
              var path = evt.editor.elementPath();

              if (!path.contains('table')) {
                contextEvent.cancel();
              }
            }, null, null, 5);
          }
        }
      });


    });
    history.forward();
  </script>
  {{-- Custom Scripts --}}
  @stack('js')
  @yield('js')
</body>

</html>
