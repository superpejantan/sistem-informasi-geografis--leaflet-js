@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Pasar</h4>
                    <div class="card-description"> 
                      <div class="row">
                        <div class="col-md-9">
                        <a href="#" data-toggle="modal" class="btn btn-primary btn-fw" data-target="#modal-edit">
                              <i class="mdi mdi-star-outline"></i>Input Pasar</a>
                        </div>
                        <div class="col-md-3"> 
                        <a href="#" class="btn btn-success btn-fw peta">
                              <i class="mdi mdi-map-outline"></i>Lihat Peta</a>
                        </div>
                      </div>
                    </div>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> Foto Pasar </th>
                          <th> Lokasi </th>
                          <th> Longtitude </th>
                          <th> Latitude </th>
                          <th> Aksi </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($market as $datas => $psr)
                        <tr>
                          <td class="py-1">
                           <img src="{{asset('Foto/Market/'.$psr->path)}}"/>
                             </td>
                          <td> {{$psr->lokasi}}</td>
                          <td>{{$psr->longtitude}}</td>
                          <td>{{$psr->latitude}}</td>
                          <td>
                            <a href="#" class="btn btn-danger">Hapus</a>    
                            <a href="#" id-market="{{$psr->id}}" class="btn btn-warning btn-edit">Update</a>
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
<!--modal-->
<div class="modal modal-default fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
      </div>
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Pasar</h4>
                    <p class="card-description"> Input Lokasi Pasar </p>
                    <form action="{{url('admin/pasar/input')}}" method="post" class="form-sample" enctype="multipart/form-data">
                      @csrf
                      <p class="card-description"></p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Pasar</label>
                            <div class="col-sm-9">
                              <input type="text" value="" name="nama"class="form-control" placeholder="Nama Pasar" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Lokasi</label>
                            <div class="col-sm-9">
                              <input type="text" value="" name="lokasi"class="form-control" placeholder="Lokasi Pasar" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Latitude</label>
                            <div class="col-sm-9">
                              <input type="text" value="" name="latitude"class="form-control" placeholder="Latitude" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Longtitude</label>
                            <div class="col-sm-9">
                              <input class="form-control" value="" name="longtitude"placeholder="Longtitude" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Upload Foto Bendungan</label>
                            <div class="col-sm-9">
                              <input class="form-control" value="" name="image" placeholder="Upload Foto Bendungan" type="file">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="mapid" style="width: 800px; height: 400px;"></div>
                      <input class="form-control" value="" name="id"  type="hide">
                      <input class="form-control" value="" name="code"  type="hide">

                      <button type="submit" class="btn btn-success mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
  </div>
  <div class="modal modal-default fade" id="modal-peta">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close">
            <span aria-hidden="true">×</span></button>
        </div>
          <div class="card">
            <div class="card-body">
              <div class="col-md-12">
                <div id="map" style="width: 800px; height: 400px;"></div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

    
  
@endsection
@section('scripts')
 
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>

<script type="text/javascript">
  
   $('body').on('click','.btn-edit',function(e){
      var id = $(this).attr('id-market');
      $.ajax({
      'type':'get',
      'url':"{{url('admin/pasar/detail')}}"+'/'+id,
      success: function(data){
        
        $('#modal-edit').find("input[name='id']").val(data.id);
        $('#modal-edit').find("input[name='nama']").val(data.nama);
        $('#modal-edit').find("input[name='latitude']").val(data.latitude);
        $('#modal-edit').find("input[name='code']").val(data.code);
        $('#modal-edit').find("input[name='lokasi']").val(data.lokasi);
        $('#modal-edit').find("input[name='longtitude']").val(data.longtitude);

        var mymap = L.map('mapid').setView([data.latitude,data.longtitude], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(mymap);

        L.marker([data.latitude, data.longtitude]).addTo(mymap)
        .bindPopup (data.nama) .openPopup();


        var popup = L.popup();
            
      }
    });
        $('#modal-edit').modal();
      });

    //peta leaflet

    $('body').on('click', '.peta', function(){
     
     $.ajax({
       success: function(){
         var mapid = L.map('map').setView([-7.682859, 	111.475423], 13);

         L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
       attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
       }).addTo(mapid);

       var cordinate = {!!json_encode($market)!!};
       for (i = 0; i < cordinate.length; i++){
         var data = cordinate[i];
         var long = data.longtitude;
         var lat  = data.latitude;
         var nama  = data.nama_pasar;
        
         

       L.marker([lat,long]).addTo(mapid)
       .bindPopup(nama)
       .openPopup();
       }
       }
     });
     $('#modal-peta').modal('show');
   });
  
  
    
  
</script>
@endsection