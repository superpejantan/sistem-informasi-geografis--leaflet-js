@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.navigation')
<section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="inner-heading">
              <ul class="breadcrumb">
                <li><a href="index.html">Home</a> <i class="icon-angle-right"></i></li>
                <li class="active">{{$title}}</li>
              </ul>
              <h2>{{$title}}</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
<div class="container">
<div class="row">
          <div class="span12">
            <div class="tabbable tabs-left">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#topone" data-toggle="tab"> Peta Lokasi Bendungan</a></li>
                <li><a href="#topthree" data-toggle="tab">Daftar Bendungan</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="topone">
                  <div id="mapid" style="width: 1000px; height: 400px;"></div>
                </div>
                <div class="tab-pane" id="topthree">
            @foreach($dam as $datas => $dt)
              <article class="single">
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3>Bendungan Air {{$dt->lokasi}}</h3>
                    </div>
                    <img  style="width: 900px; height: 300px;"src="{{asset('Foto/Dam/'.$dt->path)}}">
                  </div>
                  <div class="meta-post">
                    <ul>
                      <li><i class="icon-file"></i></li>
                      <li>By <a href="#" class="author">Admin</a></li>
                      <li>On <a href="#" class="date">10 Jun, 2013</a></li>
                      <li>Tags: <a href="#">Design</a>, <a href="#">Blog</a></li>
                    </ul>
                  </div>
                  <p>
                    Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper laoreet perfecto ad qui, est rebum nulla argumentum ei. Fierent adipisci iracundia est ei, usu timeam persius
                    ea. Usu ea justo malis, pri quando everti electram ei, ex homero omittam salutatus sed. Dicam appetere ne qui, no has scripta appellantur. Mazim alienum appellantur eu cum, cu ullum officiis pro, pri at eius erat accusamus. Eos id
                    hinc fierent indoctum, ad accusam consetetur voluptatibus sit. His at quod impedit. Eu zril quando perfecto mel, sed eu eros debet.
                  </p>
                  <blockquote>
                    Lorem ipsum dolor sit amet, ei quod constituto qui. Summo labores expetendis ad quo, lorem luptatum et vis. No qui vidisse signiferumque...
                  </blockquote>
                  <p>
                    Fierent adipisci iracundia est ei, usu timeam persius ea. Usu ea justo malis, pri quando everti electram ei, ex homero omittam salutatus sed. Dicam appetere ne qui, no has scripta appellantur. Mazim alienum appellantur eu cum, cu ullum officiis pro, pri
                    at eius erat accusamus.
                  </p>



                </div>
              </div>
              </article>
            @endforeach
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
      @include('frontend.layouts.footer')

@endsection
@section('scripts')
<script type="text/javascript">
  var mymap = L.map('mapid').setView([-7.6827668, 111.4812472], 12);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);

  var cordinate = {!!json_encode($dam)!!};
    for (i = 0; i < cordinate.length; i++){
      var data = cordinate[i];
      var long = data.longtitude;
      var lat  = data.latitude;
      var dusun = data.lokasi;
  L.marker([lat,long]).addTo(mymap)
    .bindPopup('Bendungan Air <br>' +dusun).openPopup();
  

  L.circle([lat,long], 100, {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5
  }).addTo(mymap).bindPopup("I am a circle.");
  }

  var popup = L.popup();

  function onMapClick(e) {
    popup
      .setLatLng(e.latlng)
      .setContent("kamu klik pada lokasi " + e.latlng.toString())
      .openOn(mymap);
  }

  mymap.on('click', onMapClick);
  </script>
@endsection
