@section('title')
Properties
@endsection

@section('properties')
active
@endsection

@section('css')
<style>
    .proerty-th .proerty-item .item-thumb img {
        min-width: 0 !important;
        min-height: 0 !important;
    }
</style>
@endsection

@extends('frnt.index')
@section('content')
<div class="page-head"> 
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">List Layout With Sidebar</h1>
            </div>
        </div>
    </div>
</div>
<!-- End page header -->

<!-- property area -->
<div class="properties-area recent-property" style="background-color: #FFF;">
    <div class="container"> 
        <div class="row  pr0 padding-top-40 properties-page">
            <div class="col-md-12 padding-bottom-40 large-search"> 
                <div class="search-form wow pulse">
                    <form action="{{ url('area') }}" method="get">
                        <div class="col-md-12">
                            <div class="form-group" style="margin-bottom: 0;">                                   
                                <select class="form-control" name="area" id="area">
                                    <option>Select Area</option>
                                    @foreach($cities as $c)
                                    <option value="{{ $c->slug }}">{{ $c->city_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                  
                    </form>
                </div>
            </div>
            <div class="col-md-12 clear "> 
                <div id="list-type" class="proerty-th">
                    @foreach($properties as $p)
                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="{{ url('/property/'.$p->slug) }}" >
                                    <img src="{{ str_replace('/public/public/property','/public/storage/property', url($p->primary_image)) }}">
                                    <!-- <img src="https://via.placeholder.com/304x248"> -->
                                </a>
                            </div>

                            <div class="item-entry overflow">
                                <h5><a href="{{ url('/property/'.$p->slug) }}">{{ $p->property_name }}</a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b> Area :</b> 120m </span>
                                <span class="proerty-price pull-right">Rp. {{ number_format($p->price, 0, ".", ".") }}</span>
                                <p style="display: none;">Suspendisse ultricies Suspendisse ultricies Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium ...</p>
                                <div class="property-icon">
                                    <img src="{{ url('/vendors/hehehe/') }}/assets/img/icon/bed.png">[5]
                                    <img src="{{ url('/vendors/hehehe/') }}/assets/img/icon/shawer.png">[2]
                                    <img src="{{ url('/vendors/hehehe/') }}/assets/img/icon/cars.png">[1]  
                                </div>
                            </div>

                        </div>
                    </div> 
                    @endforeach
                </div>
            </div>

            <div class="col-md-12 clear"> 
                <div class="pull-right">
                    <div class="pagination">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>                
            </div>
        </div>                
    </div>
</div>
@endsection

@section('js')
<script>
    $(function(){
      $('#area').on('change', function () {
          var slug = $(this).val(); // get selected value
          if (slug) { 
              window.location = "{{ url('/') }}/area/"+slug; 
          }
          return false;
      });
  });
</script>
@endsection