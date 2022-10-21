@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')
<link rel="shortcut icon" href="{{ global_asset('favicons/favicon.ico') }}" />
@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

<body class="hold-transition login-page" style="background: #f7ffc7;">
    <!-- Document body -->
    @yield('content')

</body>
