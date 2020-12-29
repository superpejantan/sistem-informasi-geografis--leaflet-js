@extends('frontend.layouts.theme')
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
<div class="container">
<div class="row">
          <div class="span12">
            <div class="tabbable tabs-left">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#topone" data-toggle="tab"> Peta Lokasi Toko Pertanian</a></li>
                <li><a href="#topthree" data-toggle="tab">Daftar Toko Pertanian</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="topone">
                  <div id="mapid" style="width: 1000px; height: 400px;"></div>
                </div>
                <div class="tab-pane" id="topthree">
                   <table class="table table-condensed">
                    <thead>
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          First Name
                        </th>
                        <th>
                          Last Name
                        </th>
                        <th>
                          Username
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          1
                        </td>
                        <td>
                          Mark
                        </td>
                        <td>
                          Otto
                        </td>
                        <td>
                          @mdo
                        </td>
                      </tr>
                      <tr>
                        <td>
                          2
                        </td>
                        <td>
                          Jacob
                        </td>
                        <td>
                          Thornton
                        </td>
                        <td>
                          @fat
                        </td>
                      </tr>
                      <tr>
                        <td>
                          3
                        </td>
                        <td colspan="2">
                          Larry the Bird
                        </td>
                        <td>
                          @twitter
                        </td>
                      </tr>
                      <tr>
                        <td>
                          1
                        </td>
                        <td>
                          Mark
                        </td>
                        <td>
                          Otto
                        </td>
                        <td>
                          @mdo
                        </td>
                      </tr>
                      <tr>
                        <td>
                          2
                        </td>
                        <td>
                          Jacob
                        </td>
                        <td>
                          Thornton
                        </td>
                        <td>
                          @fat
                        </td>
                      </tr>
                      <tr>
                        <td>
                          3
                        </td>
                        <td colspan="2">
                          Larry the Bird
                        </td>
                        <td>
                          @twitter
                        </td>
                      </tr>
                      <tr>
                        <td>
                          1
                        </td>
                        <td>
                          Mark
                        </td>
                        <td>
                          Otto
                        </td>
                        <td>
                          @mdo
                        </td>
                      </tr>
                      <tr>
                        <td>
                          2
                        </td>
                        <td>
                          Jacob
                        </td>
                        <td>
                          Thornton
                        </td>
                        <td>
                          @fat
                        </td>
                      </tr>
                      <tr>
                        <td>
                          3
                        </td>
                        <td colspan="2">
                          Larry the Bird
                        </td>
                        <td>
                          @twitter
                        </td>
                      </tr>
                      <tr>
                        <td>
                          1
                        </td>
                        <td>
                          Mark
                        </td>
                        <td>
                          Otto
                        </td>
                        <td>
                          @mdo
                        </td>
                      </tr>
                      <tr>
                        <td>
                          2
                        </td>
                        <td>
                          Jacob
                        </td>
                        <td>
                          Thornton
                        </td>
                        <td>
                          @fat
                        </td>
                      </tr>
                      <tr>
                        <td>
                          3
                        </td>
                        <td colspan="2">
                          Larry the Bird
                        </td>
                        <td>
                          @twitter
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>

@endsection
@section('scripts')
<script type="text/javascript">
  var mymap = L.map('mapid').setView([51.505, -0.09], 13);

  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11'
  }).addTo(mymap);

  L.marker([51.5, -0.09]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

  L.circle([51.508, -0.11], 500, {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5
  }).addTo(mymap).bindPopup("I am a circle.");

  L.polygon([
    [51.509, -0.08],
    [51.503, -0.06],
    [51.51, -0.047]
  ]).addTo(mymap).bindPopup("I am a polygon.");


  var popup = L.popup();
  </script>
@endsection
