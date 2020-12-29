@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Distributor Pupuk</h4>
                    <div class="card-description"> <a href="#" data-toggle="modal" class="btn btn-primary btn-fw" data-target="#modal-edit">
                            <i class="mdi mdi-star-outline"></i>Input Distributor</a> </div>
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
                    <h4 class="card-title">Basic form</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form action="{{url('input/data/toko')}}" method="post"class="forms-sample">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Nama Pemilik</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="pemilik" placeholder="Nama Pemilik" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Nama Toko/Distributor</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="toko" placeholder="Nama Toko/Distributor" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Daya Tampung Pupuk</label>
                        <input type="text" class="form-control" name="pupuk" placeholder="Daya Tampung Pupuk" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Longtitude</label>
                        <input type="text" class="form-control" name="longtitude" placeholder="Longtitude" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Latitude</label>
                        <input type="text" class="form-control" name="latitude" placeholder="Latitude" required>
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="file" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">No Telepon</label>
                        <input type="text" class="form-control" name="telepon"  placeholder="No Telepon" required>
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