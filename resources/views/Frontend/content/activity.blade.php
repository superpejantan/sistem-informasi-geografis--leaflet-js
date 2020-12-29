@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.navigation')
<section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="inner-heading">
              <ul class="breadcrumb">
                <li><a href="index.html">Home</a> <i class="icon-angle-right"></i></li>
                <li class="active">{{$title}}</li>
              </ul>
              <h2>{{$title}}</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="clearfix"></div>
            <div class="row">
              <section id="projects">
                <div class="restaurant-info">
                  @foreach($activity as $act=>$img)
                    <!-- Item Project and Filter Name -->
                    <div class="image-group">
                        <img src="{{asset('Foto/Activity/'.$img->path)}}" class="peta" id="{{$img->id}}" alt="" />
                    </div>
                    <!-- End Item Project -->
                    @endforeach
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
      <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <a href="{{url('/gallery/kegiatan')}}" class="close" aria-label="Close">
        <span aria-hidden="true">×</span></a>
      <h3 id="myModalLabel">Hasil pertanian</h3>
    </div>
    <div class="modal-body">
        <p class="card-description">  </p>
          <form action="#" id="myform" method="post" class="form-inlane" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="span4 control-group">
                  <label>Hasil pertanian</label>
                  <input type="text" id="nama" name="kelompok"  class="span4" disabled>
                </div>
                <div class="span4 control-group">
                  <label>Jenis</label>
                  <input type="text" name="desa" class="span4" disabled>
                </div>
              </div>
              <div class="row">
                <div class="span4 control-group">
                  <label>Desa</label>
                  <input type="text" id="nama" name="keterangan"  class="span4" disabled>
                </div>
                <div class="span4 control-group">
                  <label>Luas tanam</label>
                  <input type="text" name="tanggal" class="span4" disabled>
                </div>
              </div>
            <div id="mapid" style="width: 920px; height: 400px;"></div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
              <button class="btn btn-primary">Save changes</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
    </section>
@include('frontend.layouts.footer')
@endsection
@section('scripts')
    <script type="text/javascript" language="javascript">
      $('.peta').click(function(e){
        e.preventDefault();
        var code = $(this).attr('id');
        $.ajax({
        'type':'get',
        'url':"{{url('/gallery/kegiatan/get')}}"+'/'+code,
        success: function(Data){ 
          console.log(Data);

          $('#myModal').find("input[name='keterangan']").val(Data.keterangan);
          $('#myModal').find("input[name='kelompok']").val(Data.kelompok);
          $('#myModal').find("input[name='desa']").val(Data.desa);
          $('#myModal').find("input[name='tanggal']").val(Data.tanggal); 

          var mymap = L.map('mapid').setView([Data.latitude, Data.longtitude], 12);

          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(mymap);

          L.marker([Data.latitude, Data.longtitude]).addTo(mymap)
          .bindPopup ("lokasi pegambilan foto" +Data.kelompok).openPopup();


          var popup = L.popup();
          
        }
      });
          $('#myModal').modal();
        });
    </script>

@endsection
