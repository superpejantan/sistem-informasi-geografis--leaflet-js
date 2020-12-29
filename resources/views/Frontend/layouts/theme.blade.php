<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Your page description here" />
  <meta name="author" content="" />

  <!-- css -->
  <link href="https://fonts.googleapis.com/css?family=Handlee|Open+Sans:300,400,600,700,800" rel="stylesheet">
  <link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet" />
  <link href="{{asset('frontend/css/bootstrap-responsive.css')}}" rel="stylesheet" />
  <link href="{{asset('frontend/css/flexslider.css')}}" rel="stylesheet" />
  <link href="{{asset('frontend/css/jquery.bxslider.css')}}" rel="stylesheet" />
  <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" />

  <!-- Theme skin -->
  <link href="{{asset('frontend/color/default.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
    
</head>
<body>

		<div class="wrapper">
            @yield('content')
        </div>
	
	<script src="{{asset('frontend/js/jquery.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('frontend/js/bootstrap.js')}}"></script>

  <script src="{{asset('frontend/js/modernizr.custom.js')}}"></script>
  <script src="{{asset('frontend/js/toucheffects.js')}}"></script>
  <script src="{{asset('frontend/js/google-code-prettify/prettify.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.bxslider.min.js')}}"></script>
  

  <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
  <script src="{{asset('frontend/js/portfolio/jquery.quicksand.js')}}"></script>
  <script src="{{asset('frontend/js/portfolio/setting.js')}}"></script>

  <script src="{{asset('frontend/js/jquery.flexslider.js')}}"></script>
  <script src="{{asset('frontend/js/animate.js')}}"></script>
  <script src="{{asset('frontend/js/inview.js')}}"></script>

  <!-- Template Custom JavaScript File -->
  <script src="{{asset('frontend/js/custom.js')}}"></script>
  @yield('scripts')
</body>
</html>