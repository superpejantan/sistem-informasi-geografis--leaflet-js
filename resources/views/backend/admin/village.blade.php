@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Nama Desa</h4>
                    
                    <div class="card-description">
                        <div class="row">
                          <div class="col-md-9">
                          <a href="#" data-toggle="modal" class="btn btn-primary btn-fw" data-target="#modal-edit">
                                <i class="mdi mdi-star-outline"></i>Input Desa</a>
                          </div>
                          <div class="col-md-3"> 
                          <a href="#" class="btn btn-success btn-fw peta">
                                <i class="mdi mdi-map-outline"></i>Lihat Peta</a>
                          </div>
                        </div>
                    </div>
                   
                    <table class="table table-striped" id="striped">
                      <thead>
                        <tr>
                          <th> Desa </th>
                          <th> Kepala Desa(Lurah) </th>
                          <th> Luas Wilayah </th>
                          <th> Jumlah Penduduk </th>
                          <th> Aksi </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $datas => $desa)
                          <tr>
                            <td>{{$desa->desa}}</td>
                            <td>{{$desa->kepala_desa}}</td>
                            <td>{{$desa->luas}}</td>
                            <td>{{$desa->jumlah_penduduk}}</td>
                            <td>
                              <a href="#" id="{{$desa->id}}" id-desa="{{$desa->desa}}" class="btn btn-danger delete">Hapus</a>    
                              <a href="#" id-village="{{$desa->id}}" class="btn btn-warning btn-edit">Update</a>
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
<!--modal input-->
<div class="modal modal-default fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
      </div>
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Nama Desa</h4>
        <p class="card-description"> Tambah Nama Desa</p>
        <form action="{{url('admin/desa/input')}}" method="post" class="form-sample" id="form-desa">
          @csrf
          <p class="card-description">  </p>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Desa</label>
                <div class="col-sm-9">
                  <input name="desa" id="nama" class="form-control" placeholder="Nama Desa" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Kepala Desa</label>
                <div class="col-sm-9">
                  <input type="text" name="kepala"class="form-control" required>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Luas Desa</label>
                <div class="col-sm-9">
                  <input type="text" name="luas"class="form-control" placeholder="Luas Desa" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Jumlah Penduduk</label>
                <div class="col-sm-9">
                  <input class="form-control" name="jumlah"placeholder="Jumlah Penduduk" required>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Latitude</label>
                <div class="col-sm-9">
                  <input class="form-control" id="lat" name="latitude" placeholder="Latitude" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Longtitude</label>
              <div class="col-sm-9">
                  <input class="form-control" id="long" name="longtitude"placeholder="Longtitude" required>  
              </div>
                </div>
            </div>
          </div>
          <div class="row">
          <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">No Telepon</label>
                <div class="col-sm-9">
                  <input class="form-control" name="telepon" placeholder="Latitude" required>
                </div>
              </div>
            </div>
          </div>
          <div id="map" style="width: 800px; height: 400px;"></div>
          <input type="hidden" class="form-control" name="code">
          <input type="hidden" class="form-control" name="id">
          <button type="submit" class="btn btn-success mr-2">Submit</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
    <!-- /.modal-content -->
</div>
</div>
  <!--modal peta-->
  <div class="modal modal-default fade" id="modal-peta">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
        </div>
          <div class="card">
            <div class="card-body">
            <h4 class="card-title">Peta Persebaran Desa</h4>
              <div class="col-md-12">
                <div id="mapid" style="width: 800px; height: 400px;"></div>
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
  <script type="text/javascript">
     
      $('body').on('click', '.peta', function(){
     
        $.ajax({
          success: function(){
            var mapid = L.map('mapid').setView([111.472464, -7.683083], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(mapid);

          var cordinate = {!!json_encode($data)!!};
          for (i = 0; i < cordinate.length; i++){
            var data = cordinate[i];
            var long = data.longtitude;
            var lat  = data.latitude;
            var des = data.desa;
            var penduduk = data.kepala_desa;
            

          L.marker([lat,long]).addTo(mapid)
          .bindPopup(des)
          .openPopup();
          }
          }
        });
        $('#modal-peta').modal('show');
      });
    
    
    $(document).ready(function(){
        $('#striped').DataTable()

    });
  
    
  $('.btn-edit').click(function(){
        var id = $(this).attr('id-village');
        $.ajax({
      'type':'get',
      'url':"{{url('admin/desa/detail')}}"+'/'+id,
      success: function(data){
        
        $('#modal-edit').find("input[name='id']").val(data.id);
        $('#modal-edit').find("input[name='code']").val(data.code);
        $('#modal-edit').find("input[name='desa']").val(data.desa);
        $('#modal-edit').find("input[name='kepala']").val(data.kepala_desa);
        $('#modal-edit').find("input[name='jumlah']").val(data.jumlah_penduduk);
        $('#modal-edit').find("input[name='luas']").val(data.luas);
        $('#modal-edit').find("input[name='longtitude']").val(data.longtitude);
        $('#modal-edit').find("input[name='telepon']").val(data.no_telepon);
        $('#modal-edit').find("input[name='latitude']").val(data.latitude);
           
        var mymap = L.map('map').setView([$("#lat").val(), $("#long").val()], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(mymap);

          L.marker([lat, long]).addTo(mymap)
            .bindPopup($("#nama").val()).openPopup();
          var popup = L.popup();
      }
    });
        $('#modal-edit').modal();
      });
  
      //button delete
      $('body').on('click','.delete',function(e){
          var id = $(this).attr('id');
          var desa = $(this).attr('id-desa');
          swal({
            title: "Apakah Yakin",
            text: "Menghapus Data Desa "+desa+"?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            console.log(willDelete);
            if (willDelete) {
              window.location ="/admin/desa/hapus/"+id+"";
              swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
              });
            } else {
              swal("Your imaginary file is safe!");
            }
          });
      });

      //click reload
      $('.close').click(function(e){
      
        location.reload(); 
      });
      
     
      </script>
@endsection