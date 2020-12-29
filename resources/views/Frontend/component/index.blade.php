@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.navigation')
@include('frontend.layouts.slide')
<section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
          <div class="aligncenter">
          <h3><strong>Misi</strong></h3>
          </div>
            <div class="row">
              <div class="span4">
                <div class="box flyLeft">
                  <div class="icon">
                    <i class="ico icon-circled icon-bgdark icon-star active icon-3x"></i>
                  </div>
                  <div class="text">
                    <p>
                      Mengembangkan progam dan informasi penyuluhan pertanian sesuai dengan kebutuhan pelaku utama dan pelaku usaha
                    </p>
                  </div>
                </div>
              </div>

              <div class="span4">
                <div class="box flyIn">
                  <div class="icon">
                    <i class="ico icon-circled icon-bgdark icon-star active icon-3x"></i>
                  </div>
                  <div class="text">
                    <p>
                      Mengembangkan kelembagaan penyuluhan pertanian yang andal dan ketenagaan penyuluh pertanian yang profesional
                    </p>
                  </div>
                </div>
              </div>
              <div class="span4">
                <div class="box flyRight">
                  <div class="icon">
                    <i class="ico icon-circled icon-bgdark icon-star active icon-3x"></i>
                  </div>
                  <div class="text">
                    <p>
                      Memberdayakan kelembagaan petani dan usaha tani yang kuat, mandiri dan berdaya saing
                    </p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="row">
          <div class="span12">
            <div class="solidline"></div>
          </div>
        </div>

        <div class="row">
          <div class="span12">
            <div class="row">
              <div class="span12">
                <div class="aligncenter">
                  <h3><strong>Visi</strong></h3>
                  <h4>Mewujudkan pusat penyuluhan pertanian andal untuk mewujudkan pelaku utama dan pelaku
                  usaha yang profesional, kreatif, inovatof dan berwawasan global
                  </h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="container">
    <div class="solidline"></div>
    <!--Peta-->
      <div id="mapid" style="width: 1165px; height: 400px;"></div>
    </div>
    @include('frontend.layouts.footer')
  </div>
@endsection
@section('scripts')
<script>

	var mymap = L.map('mapid').setView([-7.683569, 111.462750], 12);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);

	L.marker([-7.683569, 111.462750]).addTo(mymap)
		.bindPopup("BPP Takeran").openPopup();

	L.circle([-7.683569, 111.462750], 100, {
		color: 'red',
		fillColor: '#f03',
		fillOpacity: 0.5
	}).addTo(mymap).bindPopup("I am a circle.");

	var popup = L.popup();

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent("Letak posisi klik pada " + e.latlng.toString())
			.openOn(mymap);
	}

	mymap.on('click', onMapClick);

</script>
@endsection