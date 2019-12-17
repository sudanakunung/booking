@section('title')
{{ $property->property_name }}
@endsection

@section('properties')
active
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('vendors/hehehe/assets/css/lightslider.min.css') }}">
@endsection

@extends('frnt.index')
@section('content')

<div class="page-head"> 
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">{{ $property->property_name }}</h1>               
            </div>
        </div>
    </div>
</div>
<!-- property area -->
<div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">
        <div class="clearfix padding-top-40">
            <div class="col-md-8 single-property-content prp-style-1 ">
                <div class="row">
                    <div class="light-slide-item">            
                        <div class="clearfix">
                            <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                @foreach($gallery as $g)
                                <li data-thumb="{{ str_replace('/public/public/property','/public/storage/property', url($g->gambar)) }}"> 
                                    <img src="{{ str_replace('/public/public/property','/public/storage/property', url($g->gambar)) }}" />
                                </li>
                                @endforeach                                        
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="single-property-wrapper">
                    <div class="single-property-header">                                          
                        <h1 class="property-title pull-left">{{ $property->property_name }}</h1>
                        <span class="property-price pull-right">Rp. {{ number_format($property->price, 0, ".", ".") }}</span>
                    </div>

                    <div class="property-meta entry-meta clearfix">
                        <h4 class="s-property-title">Fasilitas</h4>
                        @php $ff = array(); foreach ($property_facility as $pf){ $ff[] = $pf->facility_id; } @endphp
                        @foreach($facility as $f)
                        @php if(in_array ($f->id, $ff)){ @endphp
                        <label style="margin-bottom: 10px; margin-left: 10px;">
                          <input type="checkbox" class="flat" name="facility[]" value="{{ $f->id }}" disabled="disabled" checked="checked"> {{ $f->facility_name }} 
                      </label>
                      @php } @endphp 
                      @endforeach
                  </div>

                  <div class="section">
                    <h4 class="s-property-title">Deskripsi</h4>
                    <div class="s-property-content">
                        <p>{!! $property->description !!}</p>
                    </div>
                </div>
                <div class="section">
                    <h4 class="s-property-title">Lokasi</h4>
                    <div class="s-property-content">
                        <div id="map" style="height: 450px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(session('tost_success'))
        <div class="alert alert-success">
            {{session('toast_success')}}
            @endif
            @include('sweetalert::alert')
        <div class="col-md-4 p0">
            <aside class="sidebar sidebar-property blog-asside-right">
                <!-- <div class="dealer-widget">
                    <div class="dealer-content">
                        <div class="inner-wrapper">

                            <div class="clear">
                                <div class="col-xs-4 col-sm-4 dealer-face">
                                    <a href="">
                                        <img src="{{ asset('/vendors/hehehe') }}/assets/img/client-face1.png" class="img-circle">
                                    </a>
                                </div>
                                <div class="col-xs-8 col-sm-8 ">
                                    <h3 class="dealer-name">
                                        <a href="">Nathan James</a>
                                        <span>Real Estate Agent</span>        
                                    </h3>
                                    <div class="dealer-social-media">
                                        <a class="twitter" target="_blank" href="">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a class="facebook" target="_blank" href="">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a class="gplus" target="_blank" href="">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                        <a class="linkedin" target="_blank" href="">
                                            <i class="fa fa-linkedin"></i>
                                        </a> 
                                        <a class="instagram" target="_blank" href="">
                                            <i class="fa fa-instagram"></i>
                                        </a>       
                                    </div>
                                </div>
                            </div>

                            <div class="clear">
                                <ul class="dealer-contacts">                                       
                                    <li><i class="pe-7s-map-marker strong"> </i> 9089 your adress her</li>
                                    <li><i class="pe-7s-mail strong"> </i> email@yourcompany.com</li>
                                    <li><i class="pe-7s-call strong"> </i> +1 908 967 5906</li>
                                </ul>
                                <p>Duis mollis  blandit tempus porttitor curabiturDuis mollis  blandit tempus porttitor curabitur , est non…</p>
                            </div>

                        </div>
                    </div>
                </div> -->
            

             
                    
             
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
                <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                    <div class="panel-heading">
                        <h3 class="panel-title">check availability</h3>
                    </div>
                    <div class="panel-body search-widget">
                        @if (session::has('berhasil'))
                            <fieldset>
                                <div class="row">
                                    <div class="col-xs-12">
                                        Hi, {{ Session::get('berhasil') }}
                                        {{session::get('full_name')}}
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <form action="{{ url('/order') }}" class="form-inline" method="post">@csrf 
                                <div class="row">
                                    <div class="col-xs-12">
                                        <input class="button btn largesearch-btn" value="Check Availability" type="submit">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="col-xs-12">
                                     
                                    </div>
                                </div>
                            </fieldset>
                        </form>

                        @else
                        <form action="{{ url('/check-availability') }}" class="form-inline" method="post">@csrf 
                            @if(Session::has('full_name'))
                            <fieldset>
                                <div class="row">
                                    <div class="col-xs-12">
                                        Hi, {{ Session::get('full_name') }}
                                    </div>
                                </div>
                            </fieldset>
                            @else
                            <fieldset>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <input type="text" class="form-control" placeholder="Full name" name="full_name">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <input type="text" class="form-control" placeholder="Email" name="email">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <input type="text" class="form-control" placeholder="Phone" name="phone">
                                    </div>
                                </div>
                            </fieldset>
                            @endif
                            <fieldset>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input type="date" class="form-control" placeholder="Check-in date" name="date_start">
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="date" class="form-control" placeholder="Check-out date" name="date_end">
                                    </div>
                                </div>
                            </fieldset>
                        <input type="hidden" class="form-control" placeholder="Check-out date" value="{{$property->id}}" name="id_property">
                 
                            <fieldset>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <select class="form-control" name="adult">
                                            <option>Adult</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <select class="form-control" name="child">
                                            <option>Child</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset >
                                <div class="row">
                                    <div class="col-xs-12">  
                                        <input class="button btn largesearch-btn" value="Check Availability" type="submit">
                                    </div>  
                                </div>
                            </fieldset>
                      
                    
                        </form>
                    </div>
                    @endif
                </div>   
            </aside>
        </div>
    </div>
    {{-- <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
        <div class="panel-heading">
            <h3 class="panel-title">check availability</h3>
        </div>
        <div class="panel-body search-widget">
            <form action="{{ url('/check-availability') }}" class="form-inline" method="post">@csrf 
         
                <fieldset>
                    <div class="row">
                        <div class="col-xs-6">
                            <input type="date" class="form-control" name="date_start" placeholder="Check-in date">
                        </div>
                        <div class="col-xs-6">
                            <input type="date" class="form-control" name="date_end" placeholder="Check-out date">
                        </div>
                    </div>
                </fieldset>
              
                <fieldset >
                    <div class="row">
                        <div class="col-xs-12">  
                            <input class="button btn largesearch-btn" value="Check Availability" type="submit">
                        </div>  
                    </div>
                </fieldset>  
            </form>
        </div>
    </div> --}}
    
</aside>
</div>
</div>
</div>
</div>

@include('sweetalert::alert')
@endsection

@section('js')
<script src="{{ asset('vendors/hehehe/assets/js/lightslider.min.js') }}" type="text/javascript"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6hoGyKmhX5TUFJB9ucNsNvb-wm8wZxfI&callback=initMap"></script>
<script>
    $(document).ready(function () {

        $('#image-gallery').lightSlider({
            gallery: true,
            item: 1,
            thumbItem: 9,
            slideMargin: 0,
            speed: 500,
            auto: false,
            loop: true,
            onSliderLoad: function () {
                $('#image-gallery').removeClass('cS-hidden');
            }
        });
    });
</script>
<script>
    var citymap = {
        chicago: {
          center: {lat: {!! $property->latitude !!}, lng: {!! $property->longitude !!}},
          population: 20
      }
  };

  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: {lat: {!! $property->latitude !!}, lng: {!! $property->longitude !!}},
        mapTypeId: 'terrain'
    });
    for (var city in citymap) {
        var cityCircle = new google.maps.Circle({
            strokeColor: '#FC6E51',
            strokeOpacity: 0.6,
            strokeWeight: 2,
            fillColor: '#FC6E51',
            fillOpacity: 0.35,
            map: map,
            center: citymap[city].center,
            radius: Math.sqrt(citymap[city].population) * 100
        });
    }
}
</script>
@endsection