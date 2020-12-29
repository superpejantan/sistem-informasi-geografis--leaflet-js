<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Informasi Geografis</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/iconfonts/ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/iconfonts/typicons/src/font/typicons.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/css/vendor.bundle.base.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/css/vendor.bundle.addons.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/shared/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/demo_1/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('js/dataTable/jquery.datatables.min.css')}}">
    
</head>
<body>
    
        @include('backend.layouts.component.top-nav')
        @include('backend.layouts.component.sidebar')        
        <div class="main-panel">
            @yield('content')
        </div>
        <script type="text/javascript" src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/demo_1/dashboard.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/demo_1/sweetalert.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/shared/chart.js')}}"></script>
        

        <!--dataTable-->
        
        <script type="text/javascript" src="{{asset('js/dataTable/table/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/dataTable/table/dataTables.buttons.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/dataTable/table/buttons.print.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/dataTable/table/buttons.flash.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/dataTable/table/jszip.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/dataTable/table/buttons.html5.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/dataTable/table/vfs_fonts.js')}}"></script>
        
        
        
        
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>

        @yield('scripts')
</body>
</html>
