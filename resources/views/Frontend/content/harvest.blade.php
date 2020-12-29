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
          <li class="active"><a href="#topone" data-toggle="tab"> Peta Lokasi Produksi Pertanian</a></li>
          <li><a href="#topthree" data-toggle="tab">Daftar Produksi Pertanian</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="topone">
            <div style="overflow-x:auto;">
              <div id="map" style="width: 1000px; height: 400px;"></div>
            </div>
          </div>
          <div class="tab-pane" id="topthree">
          <form action="{{ url('/hasil/pertanian/search')}}" method="get" >
            <div class="input-append">
              <input class="span2" name="search" id="appendedInputButton" type="text" placeholder="Cari disini...">
              <button class="btn btn-theme" type="submit">Search</button>
            </div>
          </form>
            <div style="overflow-x:auto;">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Hasil Panen</th>
                  <th>Komoditas
                  <th>Luas Tanam</th>
                  <th>Luas Panen</th>
                  <th>Produksi/ton</th>
                  <th>Dusun</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                @foreach($harvests as $data=>$dt)
                <tr>
                <td>{{$no++}}</td>
                <td>{{$dt->produk}}</td>
                <td>{{$dt->jenis}}</td>
                <td>{{$dt->luas_tanam}}</td>
                <td>{{$dt->luas_panen}}</td>
                <td>{{$dt->produksi_ton}}</td>
                <td>{{$dt->dusun}}</td>
                <td>
                <a href="#" id-harvest="{{$dt->code_harvest}}" class="btn btn-success">Detail</a>
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
          </div>
          <div class="pagination">
            {{$harvests->links()}}
            </div>
        </div>
      </div>      
    </div>
   
  </div>
  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <a href="{{url('/hasil/pertanian')}}" class="close" aria-label="Close">
        <span aria-hidden="true">×</span></a>
      <h3 id="myModalLabel">Hasil pertanian</h3>
    </div>
    <div class="modal-body">
        <p class="card-description">  </p>
          <form action="#" id="myform" method="post" class="form-inlane" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="span3 control-group">
                  <label>Hasil pertanian</label>
                  <input type="text" id="nama" name="produk"  class="span3" disabled>
                </div>
                <div class="span3 control-group">
                  <label>Jenis</label>
                  <input type="text" name="jenis" class="span3" disabled>
                </div>
                <div class="span3 control-group">
                  <label>Nama kelompok tani</label>
                  <input type="text" name="kelompok" class="span3" disabled>
                </div>
              </div>
              <div class="row">
                <div class="span3 control-group">
                  <label>Desa</label>
                  <input type="text" id="nama" name="desa"  class="span3" disabled>
                </div>
                <div class="span3 control-group">
                  <label>Luas tanam</label>
                  <input type="text" name="tanam" class="span3" disabled>
                </div>
                <div class="span3 control-group">
                  <label>Luas panen</label>
                  <input type="text" name="panen" class="span3" disabled>
                </div>
              </div>
              <div class="row">
                <div class="span3 control-group">
                  <label>Produksi/ton</label>
                  <input type="text" id="nama" name="produk"  class="span3" disabled>
                </div>
                <div class="span3 control-group">
                  <label>produk/kwintal</label>
                  <input type="text" name="kwintal" class="span3" disabled>
                </div>
              </div>
              <div class="row">
              <div class="span3 control-group">
                <label>Latitude </label>
                <input type="text" id="lat" name="latitude" maxlength="100" class="span3" disabled>
              </div>
              <div class="span3 control-group">
                <label>Longtitude</label>
                <input type="text" id="long" name="longtitude" maxlength="100" class="span3" disabled>
              </div>
            </div>
            <div id="Idmap" style="width: 920px; height: 400px;"></div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>

      @include('frontend.layouts.footer')

@endsection
@section('scripts')
<script type="text/javascript">
  //peta leaflet
  var mymap = L.map('map').setView([-7.682251, 111.475755], 12);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);

  var cordinate = {!!json_encode($harvest)!!};
    for (i = 0; i < cordinate.length; i++){
      
      var data = cordinate[i];
      var long = data.harvest_longtitude;
      var lat  = data.harvest_latitude;
      var lokasi = data.dusun;
      var produk = data.produk;
      var ton    = data.produksi_ton;
     
  L.marker([lat,long]).addTo(mymap)
    .bindPopup( "penanaman " +produk + "berlokasi di " +lokasi + "dengan jumlah produk " +ton + " ton").openPopup();
  

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

  //peta detail
  //button detail
  $('body').on('click','.btn-success',function(e){
      e.preventDefault();
      var code = $(this).attr('id-harvest');
      $.ajax({
      'type':'get',
      'url':"{{url('hasil/pertanian/get')}}"+'/'+code,
      success: function(data){
        console.log(data)
        $('#myModal').find("input[name='produk']").val(data.produk);
        $('#myModal').find("input[name='kelompok']").val(data.kelompok);
        $('#myModal').find("input[name='tanam']").val(data.tanam);
        $('#myModal').find("input[name='panen']").val(data.panen);
        $('#myModal').find("input[name='desa']").val(data.desa);
        $('#myModal').find("input[name='ton']").val(data.ton);
        $('#myModal').find("input[name='kwintal']").val(data.kwintal)
        $('#myModal').find("input[name='latitude']").val(data.latitude);
        $('#myModal').find("input[name='longtitude']").val(data.longtitude);
        $('#myModal').find("input[name='jenis']").val(data.jenis);
        
        var mymap = L.map('Idmap').setView([data.latitude, data.longtitude], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(mymap);

        L.marker([data.latitude, data.longtitude]).addTo(mymap)
          .bindPopup ("lokasi penanaman " +data.produk + "dengan hasil produksi" +data.ton +  "ton") .openPopup();


        var popup = L.popup();
        }
      });

        $('#myModal').modal('show');

      });

    //clear form
    $('.close').click(function(e){
      
      location.reload(); 
    });
  </script>
@endsection
