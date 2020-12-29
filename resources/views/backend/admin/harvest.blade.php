@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Produksi Hasil Pertanian</h4>
            <div class="card-description"> 
              <div class="row">
                  <div class="col-md-9">
                  <a href="#" data-toggle="modal" class="btn btn-primary btn-fw" data-target="#modal-edit">
                        <i class="mdi mdi-star-outline"></i>Input Hasil Pertanian
                      </a>
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
                    <th>No</th>
                    <th>Hasil Pertanian</th>
                    <th>Nama Desa</th>
                    <th>Nama Dusun</th>
                    <th>Luas Tanam/ha</th>
                    <th>Luas Panen/ha</th>
                    <th>Produktivitas/kw</th>
                    <th>Produksi/ton</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                  ?>
                  @foreach($harvests as $harvest)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$harvest->produk}}</td>
                    <td>{{$harvest->desa}}</td>
                    <td>{{$harvest->dusun}}</td>
                    <td>{{$harvest->luas_tanam}}</td>
                    <td>{{$harvest->luas_panen}}</td>
                    <td>{{$harvest->produktivitas_kw_ha}}</td>
                    <td>{{$harvest->produksi_ton}}</td>
                    <td>
                    <a href="#" class="btn btn-danger delete" url="{{url('admin/hasil/pertanian/hapus', $harvest->code_harvest)}}" harvest="{{$harvest->produk}}">Hapus</a>    
                    <a href="#" id="{{$harvest->code_harvest}}" class="btn btn-warning btn-edit">Update</a>
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
        <button type="button" class="close" aria-label="Close">
          <span aria-hidden="true">×</span></button>
      </div>
      
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data Hasil Pertanian</h4>
                    <p class="card-description" id="kelompok"></p>
                    <form action="" method="post" id="myForm"class="form-sample" enctype="multipart/form-data">
                      @csrf
                      <p class="card-description">  </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Desa</label>
                            <div class="col-sm-9">
                             <select name="desa" class="form-control" required="">
                                <option value="">Nama Desa</option>
                                @foreach($villages as $desa)
                                <option value="{{$desa->code_desa}}">{{$desa->desa}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kelompok Tani</label>
                            <div class="col-sm-9">
                              <select name="farmer" class="form-control" required="">
                                <option value="">Nama kelompok tani</option>
                              @foreach($farmers as $datas => $data)
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
                            <label class="col-sm-3 col-form-label">Produk</label>
                            <div class="col-sm-9">
                              <input type="text" value="" id="produk" name="produk" class="form-control" placeholder="Hasil Pertanian" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Komoditas</label>
                            <div class="col-sm-9">
                            <select  value="" name="komoditas" class="form-control" required>
                              <option></option>
                              <option value="cmd001">pangan</option>
                              <option value="cmd002">sayur</option>
                              <option value="cmd003">buah</option>
                            </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Luas Panen</label>
                            <div class="col-sm-9">
                              <input value="" class="form-control" name="panen"placeholder="Luas Panen" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Luas Tanam</label>
                            <div class="col-sm-9">
                              <input value="" class="form-control" name="luas"placeholder="Luas Lahan" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Latitude</label>
                            <div class="col-sm-9">
                              <input value="" type="text" name="latitude" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Produktivitas/kwintal</label>
                            <div class="col-sm-9">
                              <input value="" class="form-control" name="kwintal"placeholder="Produk perkwintal" required>  
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Longtitude</label>
                            <div class="col-sm-9">
                              <input type="text" value="" name="longtitude"class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Produksi/ton</label>
                            <div class="col-sm-9">
                              <input  value="" type="text" name="ton"class="form-control" required>
                            </div>
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
    <!-- /.modal-content -->
  </div>
    <!-- /.modal-content -->
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
           title:'<center>Daftar Hasil Pertanian</center>',
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

    var url = "{{url('admin/hasil/pertanian/input')}}";
        $('#modal-edit').find('form').attr('action',url);
    
    $('#modal-edit').modal();
   });

   //button update
   $('body').on('click','.btn-edit',function(e){
      var code = $(this).attr('id');
      $.ajax({
      'type':'get',
      'url':"{{url('admin/hasil/pertanian/detail')}}"+'/'+code,
      success: function(data){  
        console.log(data);
        $('#modal-edit').find("input[name='id']").val(data.id);
        $('#modal-edit').find("select[name='farmer']").val(data.kelompok);
        $('#modal-edit').find("select[name='desa']").val(data.desa);
        $('#modal-edit').find("input[name='luas']").val(data.luas);
        $('#modal-edit').find("input[name='luas']").val(data.luas);
        $('#modal-edit').find("input[name='panen']").val(data.desa);
        $('#modal-edit').find("input[name='produk']").val(data.produk);
        $('#modal-edit').find("input[name='ton']").val(data.ton);
        $('#modal-edit').find("input[name='kwintal']").val(data.kwintal);
        $('#modal-edit').find("input[name='longtitude']").val(data.longtitude);
        $('#modal-edit').find("input[name='latitude']").val(data.latitude);

        var mymap = L.map('mapid').setView([data.latitude,data.longtitude], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(mymap);

        L.marker([data.latitude, data.longtitude]).addTo(mymap)
        .bindPopup ("lokasi penanaman"+data.produk) .openPopup();


        var popup = L.popup();
        
      }
    });
        $('#modal-edit').modal();
      });
    
    //Button Delete
    $('body').on('click','.delete',function(e){
      var harvest = $(this).attr('harvest');
      var url = $(this).attr('url');
      swal({
        title: "Apakah Yakin",
        text: "Menghapus Data Hasil Pertanian"+harvest+"?",
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
    $('.close').click(function(e){
      document.getElementById("myForm").reset(); 
      location.reload(); 
    });

    // //peta leaflet
    $('body').on('click', '.peta', function(){
     
     $.ajax({
       success: function(){
         var mapid = L.map('map').setView([111.472464, -7.683083], 13);

         L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
       attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
       }).addTo(mapid);

       var cordinate ={!!json_encode($harvests)!!};
       for (i = 0; i < cordinate.length; i++){
         var data = cordinate[i];
         var long = data.longtitude;
         var lat  = data.latitude;
        
       L.marker([lat,long]).addTo(mapid)
       .bindPopup ("lokasi penanaman " +data.produk+ " di desa " +data.desa ) .openPopup();
       }
       }
     });
     $('#modal-peta').modal('show');
   });
                

  
  
</script>
@endsection
@endsection