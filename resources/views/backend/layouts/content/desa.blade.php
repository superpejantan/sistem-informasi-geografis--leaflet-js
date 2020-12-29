@extends('layouts.app')
@section('content')
<div class="content-wrapper">
            <div class="row page-title-header">
              <div class="col-md-12">
                <div class="page-header-toolbar">
                  <div class="btn-group toolbar-item" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary"><i class="mdi mdi-chevron-left"></i></button>
                    <button type="button" class="btn btn-secondary">03/02/2019 - 20/08/2019</button>
                    <button type="button" class="btn btn-secondary"><i class="mdi mdi-chevron-right"></i></button>
                  </div>
                  <div class="filter-wrapper">
                    <div class="dropdown toolbar-item">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownsorting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Day</button>
                      <div class="dropdown-menu" aria-labelledby="dropdownsorting">
                        <a class="dropdown-item" href="#">Last Day</a>
                        <a class="dropdown-item" href="#">Last Month</a>
                        <a class="dropdown-item" href="#">Last Year</a>
                      </div>
                    </div>
                    <a href="#" class="advanced-link toolbar-item">Advanced Options</a>
                  </div>
                  <div class="sort-wrapper">
                    <button type="button" class="btn btn-primary toolbar-item" data-toggle="modal" data-target="#modal-edit">New</button>
                    <div class="dropdown ml-lg-auto ml-3 toolbar-item">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownexport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</button>
                      <div class="dropdown-menu" aria-labelledby="dropdownexport">
                        <a class="dropdown-item" href="#">Export as PDF</a>
                        <a class="dropdown-item" href="#">Export as DOCX</a>
                        <a class="dropdown-item" href="#">Export as CDR</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body pb-0">
                        <div class="d-flex justify-content-between">
                          <h4 class="card-title mb-0">Total Revenue</h4>
                          <p class="font-weight-semibold mb-0">+1.37%</p>
                        </div>
                        <h3 class="font-weight-medium mb-4">184.42K</h3>
                      </div>
                      <canvas class="mt-n4" height="90" id="total-revenue"></canvas>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
      </div>
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data Penyuluh</h4>
                    <p class="card-description"> Tambah Penyuluh
                    </p>
                    <form action="{{url('input/desa')}}" method="post"class="forms-sample">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Nama Desa Binaan</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="desa" placeholder="desa">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Luas Desa</label>
                        <input type="text" class="form-control" name="luas" placeholder="Luas Desa">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Luas Sawah/Lahan</label>
                        <input type="text" class="form-control" name="sawah" placeholder="Luas Sawah/Lahan">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Longtitude</label>
                        <input type="text" class="form-control" name="longtitude" placeholder="Longtitude">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Latitude</label>
                        <input type="text" class="form-control" name="latitude" placeholder="Latitude">
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="file" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">No Telepon</label>
                        <input type="text" class="form-control" name="telepon"  placeholder="No Telepon">
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