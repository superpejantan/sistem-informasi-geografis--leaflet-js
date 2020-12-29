@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Kelompok Tani</h4>
                    <div class="card-description"> 
                      <div class="row">
                          <div class="col-md-9">
                          <a href="#" data-toggle="modal" class="btn btn-primary btn-fw" data-target="#modal-edit">
                                <i class="mdi mdi-star-outline"></i>Input Kelompok Tani</a>
                          </div>
                          <div class="col-md-3"> 
                          <a href="#" class="btn btn-success peta">
                                <i class="mdi mdi-map-outline"></i>Lihat Peta</a>
                          </div>
                        </div>
                     </div>
                     <div style="overflow-x: auto">
                        <table class="table table-bordered" id="table-role">
                          <thead>
                            <tr>
                              <th style="width: 50px;"> Kelompok Tani </th>
                              <th> Dusun </th>
                              <th>Desa</th>
                              <th> Komoditas Unggulan</th>
                              <th> Aksi </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($Farmer as $ds)
                            <tr>
                              <td>{{$ds->nama_kelompok}}</td>
                              <td>{{$ds->dusun}}</td>
                              <td>{{$ds->desa->desa}}</td>
                              <td>{{$ds->komoditas_unggulan}}</td>
                              <td>
                                <a href="#" class="btn btn-danger delete" id="{{$ds->nama_kelompok}}" url="{{url('admin/kelompok/tani/hapus', $ds->code)}} ">Hapus</a>    
                                <a href="#" id-farmer="{{$ds->code}}" class="btn btn-warning btn-edit">Update</a>
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
        <a href="#" class="close">
          <span aria-hidden="true">×</span></a>
      </div>
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Kelompok Tani</h4>
          <p class="card-description" id="kelompok"></p>
          <form action="" method="post" id="myForm"class="form-sample" enctype="multipart/form-data">
            @csrf
            <p class="card-description">  </p>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama Desa</label>
                  <div class="col-sm-9">
                    <select  value="" id="lokasi" name="desa"class="form-control" required>
                      <option>Nama Desa</option>
                      @foreach($village as $datas => $data)
                      <option id="lokasi" value="{{$data->code_desa}}">{{$data->desa}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Komoditas Unggulan</label>
                  <div class="col-sm-9">
                    <input type="text" value="" name="komoditas"class="form-control" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Kelompok Tani</label>
                  <div class="col-sm-9">
                    <input type="text" value="" id="nama" name="kelompok" class="form-control" placeholder="Kelompok Tani" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Alamat</label>
                  <div class="col-sm-9">
                    <input value="" class="form-control" name="alamat"placeholder="Alamat" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Tahun Berdiri</label>
                  <div class="col-sm-9">
                    <input value="" class="form-control" name="tahun"placeholder="Tahun Berdiri" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Jumlah Anggota</label>
                <div class="col-sm-9">
                    <input value="" class="form-control" name="jumlah"placeholder="Tahun Berdiri" required>  
                </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Ketua Kelompok Tani</label>
                  <div class="col-sm-9">
                    <input value="" type="text" name="ketua" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama Penyuluh</label>
                  <div class="col-sm-9">
                    <select  value="" name="penyuluh"class="form-control" required>
                      <option>Nama Penyuluh</option>
                      @foreach($official as $datas => $data)
                      <option value="{{$data->code}}">{{$data->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  </div>
                </div>
              </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Sekretaris</label>
                  <div class="col-sm-9">
                    <input type="text" value="" name="sekretaris"class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Latitude</label>
                  <div class="col-sm-9">
                    <input type="text" id="lat" value="latitude" name="latitude" class="form-control" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Bendahara</label>
                  <div class="col-sm-9">
                    <input type="text" value="" name="bendahara" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Longtitude</label>
                  <div class="col-sm-9">
                  <input type="text" value="longtitude" id="long" name="longtitude" class="form-control">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-success mr-2">Submit</button>
              <div id="mapid" style="width: 800px; height: 400px;"></div>
            <input type="hidden" value="" name="id" class="form-control">
            
          </form>
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
  </div>
</div>
</div>

@section('scripts')
<script type="text/javascript" language="javascript">
     $(document).ready(function() {
    $('#table-role').DataTable( {
        dom: 'Bfrtip',
        buttons: [
          
          {
           extend: 'print',
           footer: true,
           title:'<center>Daftar Kelompok Tani</center>',
           customize: function(win) {
              $(win.document.body).find('table')
                .addClass('compact')
                .css('width', '1000pt');

              $().find('title')
              .addClass('compact')
              .css('position', 'center');
            },
           exportOptions: {
                columns: [0,1,2,3]
            }
        
          },
          {
           extend: 'excel',
           footer: true,
           exportOptions: {
                columns: [0,1,2,3]
            }
          },
          {
           extend: 'pdf',
           footer: true,
           exportOptions: {
                columns: [0,1,2,3]
            }
          },
            
        ]
    });
    });

   //button input
   $('.btn-fw').click(function(e){
    e.preventDefault();
    var input = "Input Data Kelompok Tani";
    document.getElementById('kelompok').innerHTML = input;
    
    $('#modal-edit').modal();
   });

   //button update
   $('body').on('click','.btn-edit',function(e){
      var code = $(this).attr('id-farmer');
      var input = "Update Data Kelompok Tani";
      document.getElementById('kelompok').innerHTML = input;
      $.ajax({
      'type':'get',
      'url':"{{url('admin/kelompok/tani/detail')}}"+'/'+code,
      success: function(data){
        
        $('#modal-edit').find("input[name='id']").val(data.id);
        $('#modal-edit').find("input[name='kelompok']").val(data.nama);
        $('#modal-edit').find("input[name='bendahara']").val(data.bendahara);
        $('#modal-edit').find("input[name='ketua']").val(data.ketua);
        $('#modal-edit').find("input[name='sekretaris']").val(data.sekretaris);
        $('#modal-edit').find("input[name='jumlah']").val(data.jumlah);
        $('#modal-edit').find("input[name='komoditas']").val(data.komoditas);
        $('#modal-edit').find("select[name='penyuluh']").val(data.penyuluh);
        $('#modal-edit').find("input[name='alamat']").val(data.alamat);
        $('#modal-edit').find("select[name='desa']").val(data.desa);
        $('#modal-edit').find("input[name='code']").val(data.code);
        $('#modal-edit').find("input[name='tahun']").val(data.tahun);
        $('#modal-edit').find("input[value='longtitude']").val(data.longtitude);
        $('#modal-edit').find("input[value='latitude']").val(data.latitude);

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
    
    //Button Delete
    $('body').on('click','.delete',function(e){
      var kelompok = $(this).attr('id');
      var url = $(this).attr('url');
      swal({
        title: "Apakah Yakin",
        text: "Menghapus Data Kelompok Tani "+kelompok+"?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        console.log(willDelete);
        if (willDelete) {
          window.location = url;
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Your imaginary file is safe!");
        }
      });
    });
    
    //clear Form
    //clear form
    $('body').on('click','.close',function(e){
      document.getElementById("myForm").reset(); 
      location.reload();
    });

    // //peta leaflet
    $('body').on('click', '.peta', function(){
     
     $.ajax({
       success: function(){
         var mapid = L.map('map').setView([-7.663814, 111.5047222,], 13);

         L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
       attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
       }).addTo(mapid);

       var cordinate = {!!json_encode($Farmer)!!};
       for (i = 0; i < cordinate.length; i++){
         var data = cordinate[i];
         var long = data.longtitude;
         var lat  = data.latitude;
         var des  = data.nama_kelompok;
        
         

       L.marker([lat,long]).addTo(mapid)
       .bindPopup(des)
       .openPopup();
       }
       }
     });
     $('#modal-peta').modal('show');
   });

  
  
</script>
@endsection
@endsection