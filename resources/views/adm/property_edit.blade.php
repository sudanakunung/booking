@section('title')
Edit Property
@endsection

@section('user')
{{ $user->full_name }}
@endsection

@section('css')
<!-- iCheck -->
<link href="{{ asset('vendors/gentelella/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

<!-- lightbox -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha256-HAaDW5o2+LelybUhfuk0Zh2Vdk8Y2W2UeKmbaXhalfA=" crossorigin="anonymous" />

<style>
.ck-editor__editable {
  min-height: 300px;
}
#myMap {
  height: 50vh;
}
#infowindow-content {
  display: none;
}
#map #infowindow-content {
  display: inline;
}
#pac-input {
  background-color: #fff;
  border: 2px solid orange;
  font-family: Roboto;
  position: absolute;
  font-size: 15px;
  font-weight: 300;
  text-overflow: ellipsis;
  width: 220px;
  height: 25px;
  top: 0;
  left: 150px;
  z-index: 99;
}
.thumbnail {
    height: 175px !important;
}
</style>
@endsection

        @extends('adm.index')
        @section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-edit"></i> @yield('title')</h3><br>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ url('/dashboard/property/upload/edit') }}" enctype="multipart/form-data"> {{ csrf_field() }}
                @if(Session::has('error'))
                  <div class="col-md-12">{!! session('error') !!}</div>
                @endif
                <div class="col-md-8 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>General</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a><i class="fa fa-circle-o"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Property Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="property_name" id="property_name" onkeyup="createslug()" placeholder="Property name" value="{{ $property->property_name }}">
                          <input type="hidden" name="slug" id="slug">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea class="form-control" name="description" id="description" placeholder="Property Description">
                            {!! $property->description !!}
                          </textarea>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Address</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a><i class="fa fa-circle-o"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">City</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="city">
                            <option value="">- select -</option>
                            @foreach($city as $kota)
                            <option value="{{ $kota->id }}" @if($property->city_id == $kota->id) selected @endif>
                              {{ $kota->city_name }}
                            </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Search Area</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" id="search-area" placeholder="Search area">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Map</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <!-- <input id="pac-input" class="controls" type="text" placeholder="Search Box"> -->
                        <div id="myMap" class="col-md-12"></div>
                        <div id="infowindow-content">
                          <span id="place-name"  class="title"></span><br>
                          Place ID <span id="place-id"></span><br>
                          <span id="place-address"></span>
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea class="form-control" name="address" id="address" placeholder="Auto generate when choose location on maps above">{{ $property->address }}</textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Detail Address</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea class="form-control" name="detail_address" placeholder="e.g. Turn left on 3rd traffic light">{{ $property->detail_address }}</textarea>
                          <input type="hidden" name="longitude" id="longitude">
                          <input type="hidden" name="latitude" id="latitude">
                          <input type="hidden" name="old_longitude" value="{{ $property->longitude }}">
                          <input type="hidden" name="old_latitude" value="{{ $property->latitude }}">
                          <input type="hidden" name="place" id="place">
                        </div>
                      </div>
                    </div>
                  </div>
                
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Facilities</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a><i class="fa fa-circle-o"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="checkbox">
                        @php $ff = array(); foreach ($property_facility as $pf){ $ff[] = $pf->facility_id; } @endphp
                        @foreach($facility as $f)
                        <label style="margin-bottom: 10px;">
                          <input type="checkbox" class="flat" name="facility[]" value="{{ $f->id }}" 

                          @php 
                            if(in_array ($f->id, $ff)){ 
                              echo ' checked=\'checked\''.' disabled=\'disabled\''; 
                            } 
                          @endphp> {{ $f->facility_name }} 

                          @php 
                            if(in_array ($f->id, $ff)){ 
                              echo '
                              <a href="'.url('/dashboard/property-facility/delete/'.$property->uid.'/'.$f->id).'">
                                <i class="fa fa-trash" style="color:red"></i>
                              </a>'; 
                            } 
                          @endphp

                        </label>
                        @endforeach
                      </div>
                    </div>
                  </div>

                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Gallery</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a><i class="fa fa-circle-o"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="row">
                        @foreach($gallery as $g)
                        <div class="col-md-3">
                          <div class="panel panel-default">
                            <div class="panel-body" style="padding: 3px;">
                              <a href="{!! url('storage/property/'.str_replace('public/property/','',$g->gambar)) !!}" data-toggle="lightbox" data-gallery="gallery"><img src="{!! url('storage/property/'.str_replace('public/property/','',$g->gambar)) !!}" class="img-responsive"></a>
                            </div>
                            <div class="panel-footer text-center">
                              <a href="{{ url('/dashboard/property-gallery/delete/'.$property->uid.'/'.$g->id) }}" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Delete
                              </a>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Primary Image</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a><i class="fa fa-circle-o"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-body" style="padding: 3px;">
                            <a href="{!! url('storage/property/'.str_replace('public/property/','',$property->primary_image)) !!}" data-toggle="lightbox" data-gallery="primary_image"><img src="{!! url('storage/property/'.str_replace('public/property/','',$property->primary_image)) !!}" class="img-responsive"></a>
                          </div>
                          <div class="panel-footer text-center">
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="file" class="form-control" name="primary_image">
                          <input type="hidden" name="old_primary_image" value="{{ $property->primary_image }}">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Add Gallery</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a><i class="fa fa-circle-o"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="file" class="form-control" name="gallery[]" multiple="multiple">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Detail</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a><i class="fa fa-circle-o"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Person</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" class="form-control" name="max_person" placeholder="Max Person" value="{{ $property->max_person }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Room</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" class="form-control" name="total_room" placeholder="Total Room" value="{{ $property->total_room }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Price</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" class="form-control" name="price" placeholder="Price per Night" value="{{ $property->price }}">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-4 col-sm-3 col-xs-3 col-md-offset-3">
                          <button type="submit" class="btn btn-success" name="update"><i class="fa fa-refresh"></i> Update</button>
                        </div>
                        <div class="col-md-5 col-sm-6 col-xs-6">
                          <a href="{{ url('/dashboard/property') }}" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /page content -->
        @endsection

@section('js')
<!-- lightbox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js" integrity="sha256-jGAkJO3hvqIDc4nIY1sfh/FPbV+UK+1N+xJJg6zzr7A=" crossorigin="anonymous"></script>

<script>
  $(document).on("click", '[data-toggle="lightbox"]', function(event) {
  event.preventDefault();
  $(this).ekkoLightbox();
});
</script>

<!-- iCheck -->
<script src="{{ asset('vendors/gentelella/vendors/iCheck/icheck.min.js') }}"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
  .create( document.querySelector( '#description' ) )
  .then( editor => {
    console.log( editor );
  } )
  .catch( error => {
    console.error( error );
  config.height = 500; 
  } );
</script>

<!-- map lokasi -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6hoGyKmhX5TUFJB9ucNsNvb-wm8wZxfI&libraries=places&callback=initialize"></script>
<script>
  const address = document.getElementById('search-area');
  const ENTER = 13;
  address.addEventListener('keydown', function(e) {
    if (e.keyCode === ENTER) {
      e.preventDefault();
    }
  });
  function initialize(){
    var latlng = new google.maps.LatLng({!!json_encode($property->latitude)!!}, {!!json_encode($property->longitude)!!});
    var map = new google.maps.Map(document.getElementById('myMap'), {
      center: latlng,
      zoom: 15
    });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: true,
      anchorPoint: new google.maps.Point(0, -29)
    });
    var input = document.getElementById('search-area');
    // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    var geocoder = new google.maps.Geocoder();
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    var infowindow = new google.maps.InfoWindow();   
    autocomplete.addListener('place_changed', function() {
      infowindow.close();
      marker.setVisible(false);
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        window.alert("Autocomplete's returned place contains no geometry");
        return;
      }
      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);
      }

      marker.setPosition(place.geometry.location);
      marker.setVisible(true);          

      bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
      infowindow.setContent(place.formatted_address);
      infowindow.open(map, marker);
    });
    google.maps.event.addListener(marker, 'dragend', function() {
      geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {        
            bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng(),place.name);
            infowindow.setContent(results[0].formatted_address);
            infowindow.open(map, marker);
          }
        }
      });
    });
  }
  function bindDataToForm(address,lat,lng,place){
   document.getElementById('address').value = address;
   document.getElementById('latitude').value = lat;
   document.getElementById('longitude').value = lng;
   document.getElementById('place').value = place;
 }
</script>

<!-- slug -->
<script>
  function createslug(){
    var judul = $('#property_name').val();
    $('#slug').val(slugify(judul));
  }
  function slugify(string) {
    const a = 'àáäâãåăæąçćčđďèéěėëêęğǵḧìíïîįłḿǹńňñòóöôœøṕŕřßşśšșťțùúüûǘůűūųẃẍÿýźžż·/_,:;'
    const b = 'aaaaaaaaacccddeeeeeeegghiiiiilmnnnnooooooprrsssssttuuuuuuuuuwxyyzzz------'
    const p = new RegExp(a.split('').join('|'), 'g')

    return string.toString().toLowerCase()
            .replace(/\s+/g, '-') // Replace spaces with -
            .replace(p, c => b.charAt(a.indexOf(c))) // Replace special characters
            .replace(/&/g, '-and-') // Replace & with 'and'
            .replace(/[^\w\-]+/g, '') // Remove all non-word characters
            .replace(/\-\-+/g, '-') // Replace multiple - with single -
            .replace(/^-+/, '') // Trim - from start of text
            .replace(/-+$/, '') // Trim - from end of text
          }
        </script>
@endsection