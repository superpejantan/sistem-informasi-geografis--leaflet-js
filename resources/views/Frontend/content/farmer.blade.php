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
                <li class="active"><a href="#topone" data-toggle="tab"> Peta Lahan Kelompok Tani</a></li>
                <li><a href="#topthree" data-toggle="tab">Daftar Kelompok Tani</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="topone">
                  <div style="overflow-x:auto;">
                    <div id="mapid" style="width: 1000px; height: 400px;"></div>
                  </div>
                </div>
                <div class="tab-pane " id="topthree">
                  <div style="overflow-x:auto;">
                   <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Kelompok Tani</th>
                        <th>Dusun</th>
                        <th>Desa</th>
                        <th>Jumlah Anggota</th>
                        <th>Detail</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; ?>
                      @foreach($farmer as $data => $frm)
                      <tr>
                        <td>{{$no++}}</td>
                        <td>{{$frm->nama_kelompok}}</td>
                        <td>{{$frm->dusun}}</td>
                        <td>{{$frm->desa->desa}}</td>
                        <td>{{$frm->total_anggota}}</td>
                        <td>
                          <a href="#" id-farmer="{{$frm->code}}" class="btn btn-success">Detail</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    </table>
                  </div>
                </div>
                <div class="pagination">
                 
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
                  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                  <a href="{{url('/kelompok/tani')}}" class="close" aria-label="Close">
                      <span aria-hidden="true">×</span></a>
                    <h3 id="myModalLabel">Kelompok Tani</h3>
                  </div>
                  
                  <div class="modal-body">
                    <p class="card-description">  </p>
                      <form action="#" id="myform" method="post" class="form-inlane" enctype="multipart/form-data">
                      @csrf
                    <div style="margin-bottom: 5px;" class="row">
                    <div class="span3 control-group">
                      <label>Kelompok Tani</label>
                      <input type="text" id="nama" value="kelompok"  class="span3" disabled>
                    </div>
                    <div class="span3 control-group">
                      <label>Dusun</label>
                      <input type="text" value="dusun"  maxlength="100" class="span3" disabled>
                    </div>
                    <div class="span3 control-group">
                      <label>Desa </label>
                      <input type="text" value="desa" maxlength="100" class="span3" disabled>
                    </div>
                  </div>
                  <div style="margin-bottom: 5px;" class="row">
                    <div class="span3 control-group">
                      <label>Jumlah Anggota</label>
                      <input type="text" value="anggota" maxlength="100" class="span3" disabled>
                    </div>
                    <div class="span3 control-group">
                      <label>Komoditas Unggulan</label>
                      <input type="text" value="komoditas" maxlength="100" class="span3" disabled>
                    </div>
                    <div class="span3 control-group">
                      <label>Tahun Berdiri</label>
                      <input type="text" value="tahun" maxlength="100" class="span3" disabled>
                    </div>
                  </div>
                  <div style="margin-bottom: 5px;" class="row">
                    <div class="span3 control-group">
                      <label>Ketua Kelompok </label>
                      <input type="text" id-group="" value="ketua" maxlength="100" class="span3" disabled>
                    </div>
                    <div class="span3 control-group">
                      <label>Sekretaris</label>
                      <input type="text" value="sekretaris" maxlength="100" class="span3" disabled>
                    </div>
                    <div class="span3 control-group">
                      <label>Bendahara</label>
                      <input type="text" value="bendahara" maxlength="100" class="span3" disabled>
                    </div>
                  </div>
                  <div style="margin-bottom: 5px;" class="row">
                    <div class="span3 control-group">
                      <label>Penyuluh Pertanian</label>
                      <input type="text" value="penyuluh" maxlength="100" class="span3" disabled>
                    </div>
                    <div class="span3 control-group">
                      <label>Latitude</label>
                      <input type="text" id="lat" value="latitude" maxlength="100" class="span3" disabled>
                    </div>
                    <div class="span3 control-group">
                      <label>Longtitude</label>
                      <input type="text" id="long" value="longtitude" maxlength="100" class="span3" disabled>
                    </div>
                  </div>
                  <div id="Idmap" style="height:500px; width: 800px"></div>
                  <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
              </form>
                  </div>
                </div>
              </div>
              @include('frontend.layouts.footer')
@endsection
@section('scripts')

<script type="text/javascript" language="javascript">
  //peta leaflet
  var mymap = L.map('mapid').setView([-7.682251, 111.475755], 12);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);

  var cordinate = {!!json_encode($farmer)!!};
    for (i = 0; i < cordinate.length; i++){
      var data = cordinate[i];
      var long = data.longtitude;
      var lat  = data.latitude;
      var dusun = data.nama_kelompok;
  L.marker([lat,long]).addTo(mymap)
    .bindPopup('Kelompok tani <br>'+dusun).openPopup();
  

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
      var code = $(this).attr('id-farmer');
      $.ajax({
      'type':'get',
      'url':"{{url('kelompok/tani/get')}}"+'/'+code,
      success: function(data){
        console.log(data)
        $('#myModal').find("input[value='dusun']").val(data.dusun);
        $('#myModal').find("input[value='kelompok']").val(data.nama);
        $('#myModal').find("input[value='bendahara']").val(data.bendahara);
        $('#myModal').find("input[value='ketua']").val(data.ketua);
        $('#myModal').find("input[value='sekretaris']").val(data.sekretaris);
        $('#myModal').find("input[value='jumlah']").val(data.jumlah);
        $('#myModal').find("input[value='komoditas']").val(data.komoditas);
        $('#myModal').find("inputt[value='penyuluh']").val(data.penyuluh);
        $('#myModal').find("input[value='alamat']").val(data.alamat);
        $('#myModal').find("input[value='desa']").val(data.desa);
        $('#myModal').find("input[value='code']").val(data.code);
        $('#myModal').find("input[value='tahun']").val(data.tahun);
        $('#myModal').find("input[value='latitude']").val(data.latitude);
        $('#myModal').find("input[value='longtitude']").val(data.longtitude);
      
        var mymap = L.map('Idmap').setView([data.latitude, data.longtitude], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(mymap);

        L.marker([data.latitude, data.longtitude]).addTo(mymap)
          .bindPopup (data.nama) .openPopup();


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
