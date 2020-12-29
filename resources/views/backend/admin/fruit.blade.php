@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Buah dan Sayur</h4>
                    <div class="card-description"> <a href="#" data-toggle="modal" class="btn btn-primary btn-fw" data-target="#modal-edit">
                            <i class="mdi mdi-star-outline"></i>Input Hasil Buah dan Sayur</a> </div>
                    <table class="table table-striped" id="striped">
                      <thead>
                        <tr>
                          <th> User </th>
                          <th> First name </th>
                          <th> Progress </th>
                          <th> Amount </th>
                          <th> Deadline </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="py-1">
                            <img src="../../../assets/images/faces-clipart/pic-1.png" alt="image" /> </td>
                          <td> Herman Beck </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 77.99 </td>
                          <td> May 15, 2015 </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../../assets/images/faces-clipart/pic-2.png" alt="image" /> </td>
                          <td> Messsy Adam </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $245.30 </td>
                          <td> July 1, 2015 </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../../assets/images/faces-clipart/pic-3.png" alt="image" /> </td>
                          <td> John Richards </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $138.00 </td>
                          <td> Apr 12, 2015 </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../../assets/images/faces-clipart/pic-4.png" alt="image" /> </td>
                          <td> Peter Meggik </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 77.99 </td>
                          <td> May 15, 2015 </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../../assets/images/faces-clipart/pic-1.png" alt="image" /> </td>
                          <td> Edward </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 160.25 </td>
                          <td> May 03, 2015 </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../../assets/images/faces-clipart/pic-2.png" alt="image" /> </td>
                          <td> John Doe </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 123.21 </td>
                          <td> April 05, 2015 </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../../assets/images/faces-clipart/pic-3.png" alt="image" /> </td>
                          <td> Henry Tom </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 150.00 </td>
                          <td> June 16, 2015 </td>
                        </tr>
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
                    <h4 class="card-title">Buah dan Sayur</h4>
                    <p class="card-description"> Input Buah dan Sayur </p>
                    <form action="{{url('input/data/buah-sayur')}}" method="post"class="forms-sample">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Nama Desa</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="desa" placeholder="desa" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Luas Lahan/Sawah</label>
                        <input type="text" class="form-control" name="luas" placeholder="Luas Desa" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Komoditas</label>
                        <input type="text" class="form-control" name="longtitude" placeholder="Longtitude" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Luas Tanam</label>
                        <input type="text" class="form-control" name="luastanam" placeholder="Luas Tanam" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Luas Panen</label>
                        <input type="text" class="form-control" name="luaspanen" placeholder="Luas Panen" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Produktivitas(kw/ha)</label>
                        <input type="text" class="form-control" name="produk" placeholder="Produktivitas" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Produksi(ton)</label>
                        <input type="text" class="form-control" name="Produksi" placeholder="Produkdi(ton)" required>
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="file" class="file-upload-default" required>
                      </div>
                      
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
  </script>
@endsection