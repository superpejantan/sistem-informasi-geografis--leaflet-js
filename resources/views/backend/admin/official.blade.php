@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Nama Petugas</h4>
                    <div class="card-description"> <a href="#" data-toggle="modal" class="btn btn-primary btn-fw" data-target="#modal-edit">
                            <i class="mdi mdi-star-outline"></i>Input Petugas</a> </div>
                    <table class="table table-striped" id="striped">
                      <thead>
                        <tr>
                          <th> NIP </th>
                          <th> Nama Petugas </th>
                          <th> Alamat </th>
                          <th> Jabatan </th>
                          <th> No Telepon </th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $datas =>$pgw)
                        <tr>
                          <td>{{$pgw->no_induk}}</td>
                          <td>{{$pgw->name}}</td>
                          <td>{{$pgw->alamat}}</td>
                          <td>{{$pgw->jabatan}}</td>
                          <td>{{$pgw->no_telepon}}</td>
                          <td>
                            <a href="#" id-official="{{$pgw->name}}" id-pgw="{{$pgw->id}}" class="btn btn-danger delete">Hapus</a>    
                            <a href="#" id-official="{{$pgw->id}}" class="btn btn-warning btn-edit">Update</a>
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
                    <h4 class="card-title">Data Petugas</h4>
                    <p class="card-description" id="official"></p>
                    <form action="#" method="post" id ="myForm" class="form-sample" enctype="multipart/form-data">
                      @csrf
                      <p class="card-description">  </p>
                      <div class="row">
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NO Induk </label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control"  name="code" placeholder="Nomer Induk Pegawai" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Petugas</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control"  name="nama" placeholder="Nama Pegawai" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                              <textarea type="text" name="alamat" class="form-control" placeholder="Alamat Lengkap"required></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jabatan</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="jabatan"placeholder="Jabatan" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="email"placeholder="Tahun Berdiri" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Passsword</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="password" name="password" placeholder="Password" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No Telepon</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="telepon" placeholder="No Telepon" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Foto Profil</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="file" name="image" placeholder="Foto Profil..">
                            </div>
                          </div>
                        </div>
                      </div>
                      <input  name="id" type="hidden">
                      <button type="submit" class="btn btn-success mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
    </div>
    <!-- /.modal-content -->
  </div>
    <!-- /.modal-content -->
  </div>
@endsection
@section('scripts')
  <script type="text/javascript">
    
    $(document).ready(function(){
        $('#striped').DataTable()

    });

    //button input
    $('.btn-fw').click(function(e){
    e.preventDefault();
    var official = "Input Data Petugas";
    document.getElementById('official').innerHTML = official;
    var url = "{{url('admin/penyuluh/input')}}";
    $('#modal-edit').find('form').attr('action',url);
    
    $('#modal-edit').modal();
   });

    //modal update
    $('.btn-edit').click(function(){
        var id = $(this).attr('id-official');
        $.ajax({
      'type':'get',
      'url':"{{url('admin/penyuluh/detail')}}"+'/'+id,
      success: function(data){
        console.log(data);
        $('#modal-edit').find("input[name='id']").val(data.id);
        $('#modal-edit').find("input[name='code']").val(data.no_induk);
        $('#modal-edit').find("input[name='nama']").val(data.nama);
        $('#modal-edit').find("input[name='jabatan']").val(data.jabatan);
        $('#modal-edit').find("textarea[name='alamat']").val(data.alamat);
        $('#modal-edit').find("input[name='telepon']").val(data.no_telepon);
        $('#modal-edit').find("input[name='email']").val(data.email);
        $('#modal-edit').find("input[name='password']").val(data.password);

            var url = "{{url('admin/penyuluh/input')}}";
            $('#modal-edit').find('form').attr('action',url);
      }
    });
        $('#modal-edit').modal();
      });

      //button delete
      $('body').on('click','.delete',function(e){
      var id = $(this).attr('id-pgw');
      var official = $(this).attr('id-official');
      swal({
        title: "Apakah Yakin",
        text: "Menghapus Data Petugas "+official+"?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        console.log(willDelete);
        if (willDelete) {
          window.location ="/admin/penyuluh/hapus/"+id+"";
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
      document.getElementById("myForm").reset();
    });
  </script>
@endsection