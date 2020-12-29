@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Bendungan air</h4>
                    <div class="card-description"> 
                      <div class="row">
                        <div class="col-md-9">
                        <a href="#" data-toggle="modal" class="btn btn-primary btn-fw" data-target="#modal-edit">
                              <i class="mdi mdi-star-outline"></i>Bendungan air</a>
                        </div>
                        <div class="col-md-3"> 
                        <a href="#" class="btn btn-success peta">
                              <i class="mdi mdi-map-outline"></i>Lihat Peta</a>
                        </div>
                      </div>
                    </div>
                    <table class="table table-striped" id="striped">
                      <thead>
                        <tr>
                          <th> Foto Bendungan </th>
                          <th> Lokasi </th>
                          <th> Longtitude </th>
                          <th> Latitude </th>
                          <th> Aksi </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($dam as $datas => $dt)
                        <tr>
                          <td class="py-1">
                          <img src="{{asset('Foto/Dam/'.$dt->path)}}"/>
                          </td>
                          <td> {{$dt->lokasi}}</td>
                          <td>{{$dt->longtitude}}</td>
                          <td>{{$dt->latitude}}</td>
                          <td>
                            <a href="#" id-dam="{{$dt->lokasi}}" id="{{$dt->id}}" class="btn btn-danger delete">Hapus</a>    
                            <a href="#" id-dam="{{$dt->id}}" class="btn btn-warning btn-edit">Update</a>
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
        <button type="button" class="close"  aria-label="Close">
          <span aria-hidden="true">×</span></button>
      </div>
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Bendungan</h4>
                    <p class="card-description" id="dam">Lokasi Bendungan</p>
                    <form action="#" method="post" id="myForm" class="form-sample" enctype="multipart/form-data">
                      @csrf
                      <p class="card-description">  </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Lokasi</label>
                            <div class="col-sm-9">
                              <select name="desa" class="form-control" required="">
                                <option value="">nama desa</option>
                              @foreach($village as $datas => $data)
                                <option value="{{$data->code}}">{{$data->desa}}</option>
                              @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Lokasi</label>
                            <div class="col-sm-9">
                              <input type="text" name="lokasi"class="form-control" placeholder="Lokasi Bendungan" required>
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                              <textarea type="text" name="keterangan"class="form-control" placeholder="Keterangan" required></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Upload Foto Bendungan</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="image" placeholder="Upload Foto Bendungan" type="file">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Latitude</label>
                            <div class="col-sm-9">
                              <input type="text" id="lat" name="latitude" class="form-control" placeholder="Latitude">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Longtitude</label>
                            <div class="col-sm-9">
                              <input class="form-control" id="long" name="longtitude"placeholder="Longtitude" >
                            </div>
                          </div>
                        </div>
                      </div>
                        <div id="mapid" style="width: 800px; height: 400px;"></div>
                        <input class="form-control" type="hidden" name="id">
                      
                      <button type="submit" class="btn btn-success mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
  </div>
   <!-- /.modal-content -->
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>

<script type="text/javascript" language="javascript">
    //Peta modal

   //button Update
      $('body').on('click','.btn-edit',function(e){
        var id = $(this).attr('id-dam');
        var input = "Update Data Bendungan Air";
        document.getElementById('dam').innerHTML = input;
        $.ajax({
      'type':'get',
      'url':"{{url('admin/bendungan/detail')}}"+'/'+id,
      success: function(data){
        console.log(data);
        $('#modal-edit').find("input[name='code']").val(data.code_bendungan);

        $('#modal-edit').find("textarea[name='keterangan']").val(data.keterangan);
        $('#modal-edit').find("select[name='desa']").val(data.desa);
        $('#modal-edit').find("input[name='latitude']").val(data.latitude);
        $('#modal-edit').find("input[name='lokasi']").val(data.lokasi);
        $('#modal-edit').find("input[name='longtitude']").val(data.longtitude);
        $('#modal-edit').find("input[name='id']").val(data.id);

        var mymap = L.map('mapid').setView([data.latitude, data.longtitude], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(mymap);

          L.marker([data.latitude, data.longtitude]).addTo(mymap)
            .bindPopup(data.lokasi).openPopup();
          var popup = L.popup();

            var url = "{{url('admin/bendungan/update')}}";
            $('#modal-edit').find('form').attr('action',url);
      }
    });
        $('#modal-edit').modal();
      });

      //button Input
      $('.btn-fw').click(function(e){
        e.preventDefault(); 
        var input = "Input Data Bendungan Air";
        document.getElementById('dam').innerHTML = input;
          var url = "{{url('admin/bendungan/input')}}";
            $('#modal-edit').find('form').attr('action',url);

        $('#modal-edit').modal();
      });

      //button dellete
    $('body').on('click','.delete',function(e){
      var id = $(this).attr('id');
      var dam = $(this).attr('id-dam');
      swal({
        title: "Apakah Yakin",
        text: "Menghapus Data Bendungan "+dam+"?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        console.log(willDelete);
        if (willDelete) {
          window.location ="/admin/bendungan/hapus/"+id+"";
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Your imaginary file is safe!");
        }
      });
    });

    //clear form
    $('body').on('click','.close',function(e){
      location.reload();
    });

    // //peta leaflet
    $('body').on('click', '.peta', function(){
     
     $.ajax({
       success: function(){
         var mapid = L.map('map').setView([-7.692339,111.472543], 13);

         L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
       attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
       }).addTo(mapid);

       var cordinate = {!!json_encode($dam)!!};
       for (i = 0; i < cordinate.length; i++){
         var data = cordinate[i];
         var long = data.longtitude;
         var lat  = data.latitude;
         var lok  = data.lokasi
       L.marker([lat,long]).addTo(mapid)
       .bindPopup(lok)
       .openPopup();
       }
       }
     });
     $('#modal-peta').modal('show');
   });

</script>
@endsection