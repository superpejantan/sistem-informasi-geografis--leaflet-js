@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Kegiatan Pertanian</h4>
                    <div class="card-description"> 
                    <div class="row">
                          <div class="col-md-9">
                          <a href="#" data-toggle="modal" data-target="#modal-edit" class="btn btn-primary btn-fw" >
                                <i class="mdi mdi-star-outline"></i>Input Galery</a>
                          </div>
                          <div class="col-md-3"> 
                          <a href="#" class="btn btn-success peta">
                                <i class="mdi mdi-map-outline"></i>Lihat Peta</a>
                          </div>
                        </div>
                     </div>
                     <div style="overflow-x: auto">
                      <table class="table table-striped" id="striped">
                        <thead>
                          <tr>
                            <th> Foto Kegiatan</th>
                            <th> Lokasi </th>
                            <th> Kelompok Tani</th>
                            <th> Keterangan </th>
                            <th> Aksi </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($data as $datas => $act)
                          <tr>
                            <td class="py-1">
                            <img src="{{asset('Foto/Activity/'.$act->path)}}"/>
                              </td>
                            <td> {{$act->desa->desa}}</td>
                            <td>{{$act->farmer->nama_kelompok}}</td>
                            <td>{{$act->keterangan}}</td>
                            <td>
                              <a href="#" id-act="{{$act->id}}" class="btn btn-danger delete">Hapus</a>    
                              <a href="#" id-act="{{$act->id}}" class="btn btn-warning btn-edit">Update</a>
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
        </div>
<!--modal-->
<div class="modal modal-default fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" aria-label="Close">
          <span aria-hidden="true">×</span></button>
      </div>
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Kegiatan Pertanian</h4>
          <p class="card-description"> Input Lokasi Kegiatan Pertanian </p>
          <form action=" " id="myForm" method="post" class="form-sample" enctype="multipart/form-data">
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
                  <label class="col-sm-3 col-form-label">Kelompok Tani</label>
                  <div class="col-sm-9">
                    <select name="kelompok" class="form-control" required="">
                      <option value="">nama Kelompok</option>
                        @foreach($farmer as $datas => $data)
                      <option value="{{$data->code}}">{{$data->nama_kelompok}}</option>
                        @endforeach
                    </select>
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
                    <input class="form-control" name="image" placeholder="Upload Foto Bendungan" type="file" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Latitude</label>
                  <div class="col-sm-9">
                    <textarea type="text" name="latitude" class="form-control" placeholder="Keterangan" required></textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Longtitude</label>
                  <div class="col-sm-9">
                    <input class="form-control" name="longtitude" placeholder="Longtitude" type="text" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Tanggal Pelaksanaan</label>
                  <div class="col-sm-9">
                    <input type="date" name="tanggal"class="form-control" placeholder="Tanggal Pelaksanaan" required></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div id="mapid" style="width: 800px; height: 400px;"></div>
            <input  name="id" type="hidden">
            <button type="submit" class="btn btn-success mr-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-default fade" id="modal-peta">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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

    <!-- /.modal-content -->
    
    <!---->
  
@endsection
@section('scripts')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>

<script type="text/javascript">
    
    $(document).ready(function(){
        $('#striped').DataTable()

    });

   $('.btn-edit').click(function(){
        var id = $(this).attr('id-act');
        $.ajax({
      'type':'get',
      'url':"{{url('admin/kegiatan/detail')}}"+'/'+id,
      success: function(data){
        console.log(data);
        $('#modal-edit').find("input[name='id']").val(data.id);
        $('#modal-edit').find("textarea[name='keterangan']").val(data.keterangan);
        $('#modal-edit').find("input[name='image']").val(data.path);
        $('#modal-edit').find("select[name='desa']").val(data.desa);
        $('#modal-edit').find("select[name='kelompok']").val(data.kelompok);
        $('#modal-edit').find("input[name='latitude']").val(data.latitude);
        $('#modal-edit').find("input[name='longtitude']").val(data.longtitude);
        
        var mymap = L.map('mapid').setView([data.latitude, data.longtitude], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(mymap);

          L.marker([data.latitude, data.longtitude]).addTo(mymap)
            .bindPopup(data,Kelompok).openPopup();
          var popup = L.popup();

            $('#modal-edit').find('form').attr('action',url);
            var url = "{{url('admin/kegiatan/input')}}";
      }
    });
        $('#modal-edit').modal();
      });
    
     //button dellete
     $('body').on('click','.delete',function(e){
      var id = $(this).attr('id-act');
      swal({
        title: "Apakah Yakin",
        text: "Menghapus Gambar ini?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        console.log(willDelete);
        if (willDelete) {
          window.location ="/admin/kegiatan/hapus/"+id+"";
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Your imaginary file is safe!");
        }
      });
    });

    //peta leaflet
    $('body').on('click', '.peta', function(){
     
     $.ajax({
       success: function(){
         var mapid = L.map('map').setView([111.472464, -7.683083], 13);

         L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
       attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
       }).addTo(mapid);

       var cordinate = {!!json_encode($data)!!};
       for (i = 0; i < cordinate.length; i++){
         var data = cordinate[i];
         var long = data.longtitude;
         var lat  = data.latitude;
         var nama = data.nama_kelompol
         

       L.marker([lat,long]).addTo(mapid)
       .bindPopup(nama)
       .openPopup();
       }
       }
     });
     $('#modal-peta').modal('show');
   });

    //clear form
    $('body').on('click','.close',function(e){
      location.reload();
    });
</script>
@endsection