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
          <li class="active"><a href="#topone" data-toggle="tab"> Peta Lokasi Pasar</a></li>
          <li><a href="#topthree" data-toggle="tab">Daftar Pasar</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="topone">
            <div style="overflow-x:auto;">
              <div id="mapid" style="width: 1000px; height: 400px;"></div>
            </div>
          </div>
          <div class="tab-pane" id="topthree">
            <div style="overflow-x:auto;">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pasar</th>
                    <th>Lokasi</th>
                    <th>Detail</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;                       
                    ?>
                  @foreach($market as $mrkt)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$mrkt->nama_pasar}}</td>
                      <td>{{$mrkt->lokasi}}</td>
                      <td>
                      <a href="#" id-market="{{$mrkt->id}}" class="btn btn-success">Detail</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    
    </div>
  </div>
   <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
      <a href="{{url('/lokasi/pasar')}}" class="close" aria-label="Close">
          <span aria-hidden="true">×</span></a>
        <h3 id="myModalLabel">Lokasi pasar</h3>
      </div>
      
      <div class="modal-body">
        <p class="card-description">  </p>
          <form action="#" id="myform" method="post" class="form-inlane" enctype="multipart/form-data">
          @csrf
        <div class="row">
        <div class="span4 control-group">
          <label>Nama Pasar</label>
          <input type="text" id="nama" value="nama_pasar"  class="span4" disabled>
        </div>
        <div class="span4 control-group">
          <label>Lokasi</label>
          <input type="text" value="lokasi"  maxlength="100" class="span4" disabled>
        </div>
        </div>
        <div class="row">
        <div class="span4 control-group">
          <label>Latitude </label>
          <input type="text" id="lat" value="latitude" maxlength="100" class="span4" disabled>
        </div>
        <div class="span4 control-group">
          <label>Longtitude</label>
          <input type="text" id="long" value="longtitude" maxlength="100" class="span4" disabled>
        </div>
      </div>
      <div id="Idmap" style="width: 920px; height: 400px;"></div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary">Save changes</button>
    </div>
  </form>
      </div>
    </div>
  </div>
  @include('frontend.layouts.footer')
</div>

@endsection
@section('scripts')

<script type="text/javascript" language="javascript">
  //peta leaflet
  var mymap = L.map('mapid').setView([-7.682251, 111.475755], 12);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);

  var cordinate = {!!json_encode($market)!!};
    for (i = 0; i < cordinate.length; i++){
      
      var data = cordinate[i];
      var long = data.longtitude;
      var lat  = data.latitude;
      var lokasi = data.nama_pasar;
  L.marker([lat,long]).addTo(mymap)
    .bindPopup("pasar " +lokasi).openPopup();
  

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


  //button detail
  $('body').on('click','.btn-success',function(e){
      e.preventDefault();
      var id = $(this).attr('id-market');
      $.ajax({
      'type':'get',
      'url':"{{url('lokasi/pasar/get')}}"+'/'+id,
      success: function(data){
        
        $('#myModal').find("input[value='nama_pasar']").val(data.nama_pasar);
        $('#myModal').find("input[value='lokasi']").val(data.lokasi);
        $('#myModal').find("input[value='latitude']").val(data.latitude);
        $('#myModal').find("input[value='longtitude']").val(data.longtitude);
        
        var mymap = L.map('Idmap').setView([data.latitude, data.longtitude], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(mymap);

        L.marker([data.latitude, data.longtitude]).addTo(mymap)
          .bindPopup("pasar " + data.lokasi).openPopup();


        var popup = L.popup();
        }
      });

        $('#myModal').modal('show');

      });

    //clear form
    $('body').on('click','.close',function(e){
      document.getElementById("myForm").reset(); 
      location.reload();
    });

    

  
  </script>
@endsection
