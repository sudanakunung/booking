@section('title')
Home Page
@endsection

@section('home')
active
@endsection

@section('css')
<style>
    .asd{
        position: relative;
        margin-top: 30px;
    }
    .img-overlay{
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
        display: block;
        width: 100%;
        height: auto;
    }
    .dsa {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      overflow: hidden;
      width: 100%;
      height: 0;
      transition: .5s ease;
      background: rgba(255, 255, 255, 0.8);
      border-radius: 5px;
  }
  .asd:hover .dsa {
      height: 100%;
  }
  .text {
      color: #000;
      font-size: 20px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      text-align: center;
  }
  .Welcome-area {
    background: #F3F3F3 url(images/desa-wisata.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    position: relative;
}
.slider-content h2 {
    color: #FC6E51;
}
.search-btn, .toggle-btn {
    background-color: #FC6E51;
}
.slider .owl-theme .owl-controls .owl-page span {
    background: #FC6E51;
}
.search-form .form-inline .form-group {
    width: 90%;
    text-align: left;
    letter-spacing: 0.5px;
}
</style>
@endsection

@extends('frnt.index')
@section('content')
<div class="slider-area">
    <div class="slider">
        <div id="bg-slider" class="owl-carousel owl-theme">

            <div class="item"><img src="{{ asset('vendors/hehehe/assets/img/slide1/slider-image-1.jpg') }}" alt=""></div>
            <div class="item"><img src="{{ asset('vendors/hehehe/assets/img/slide1/slider-image-2.jpg') }}" alt=""></div>
            <div class="item"><img src="{{ asset('vendors/hehehe/assets/img/slide1/slider-image-1.jpg') }}" alt=""></div>

        </div>
    </div>
    <div class="slider-content">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                <h2>property Searching Just Got So Easy</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi deserunt deleniti, ullam commodi sit ipsam laboriosam velit adipisci quibusdam aliquam teneturo!</p>
                <div class="search-form wow pulse" data-wow-delay="0.8s">

                    <form action="{{ url('area') }}" class="form-inline" method="get">
                        <div class="form-group">                                   
                            <select class="form-control" name="area" id="area">
                                <option>Select Area</option>
                                @foreach($city as $c)
                                <option value="{{ $c->slug }}">{{ $c->city_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- property area -->
<div class="content-area home-area-1 recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title wow fadeInDown" data-wow-delay="0.1s" data-wow-offset="100">
                <!-- /.feature title -->
                <h2>Tempat terfavorit</h2>
                <p>Berikut adalah tempat-tempat dengan keindahan alam dan pemandangan yang menakjubkan.</p>
            </div>
        </div>

        <div class="row">
            <div class="proerty-th">
                <div class="col-sm-6 col-md-3 p0 wow fadeInLeft" data-wow-delay="0.2s" data-wow-offset="100">
                    <div class="box-two proerty-item">
                        <div class="item-thumb">
                            <a href="property-1.html"><img src="{{ asset('vendors/hehehe/assets/img/demo/property-1.jpg') }}"></a>
                        </div>
                        <div class="item-entry overflow">
                            <h5><a href="property-1.html">Ubud, Bali</a></h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 p0 wow fadeInLeft" data-wow-delay="0.3s" data-wow-offset="100">
                    <div class="box-two proerty-item">
                        <div class="item-thumb">
                            <a href="property-1.html"><img src="{{ asset('vendors/hehehe/assets/img/demo/property-1.jpg') }}"></a>
                        </div>
                        <div class="item-entry overflow">
                            <h5><a href="property-1.html">Pecatu, Bali</a></h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 p0 wow fadeInLeft" data-wow-delay="0.4s" data-wow-offset="100">
                    <div class="box-two proerty-item">
                        <div class="item-thumb">
                            <a href="property-1.html"><img src="{{ asset('vendors/hehehe/assets/img/demo/property-1.jpg') }}"></a>
                        </div>
                        <div class="item-entry overflow">
                            <h5><a href="property-1.html">Nusa Penida, Bali</a></h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 p0 wow fadeInLeft" data-wow-delay="0.5s" data-wow-offset="100">
                    <div class="box-tree more-proerty text-center">
                        <div class="item-tree-icon">
                            <i class="fa fa-th"></i>
                        </div>
                        <div class="more-entry overflow">
                            <h5><a href="property-1.html">CAN'T DECIDE ? </a></h5>
                            <h5 class="tree-sub-ttl">Show all areas</h5>
                            <button class="btn border-btn more-black" value="All properties">All areas</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!--Welcome area -->
<div class="Welcome-area" style="padding-bottom: 50px; padding-top: 30px">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center" style="color: #fff;">
                <h2 class="wow fadeInDown" data-wow-delay="0.1s" data-wow-offset="100">DESA WISATA DI BALI YANG POPULER DAN MENDUNIA</h2>
                <p class="wow fadeInDown" data-wow-delay="0.2s" data-wow-offset="100">Anda sedang mencari tempat wisata populer di Bali? Inilah daftar desa wisata yang terkenal bahkan sudah mendunia yang selama ini merupakan destinasi desa wisata yang populer yang menawarkan originalitas tempat wisata budaya, adat istiadat atau tradisi Bali.</p>
                <div class="col-md-3 col-6 wow fadeInLeft" data-wow-delay="0.4s" data-wow-offset="100">
                    <div class="asd">
                        <img src="{{ asset('vendors/hehehe/assets/img/demo/property-1.jpg') }}" class="img-overlay img-rounded">
                        <div class="dsa">
                            <div class="text" style="color: #FC6E51">asdasd</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6 wow fadeInLeft" data-wow-delay="0.5s" data-wow-offset="100">
                    <div class="asd">
                        <img src="{{ asset('vendors/hehehe/assets/img/demo/property-1.jpg') }}" class="img-overlay img-rounded">
                        <div class="dsa">
                            <div class="text" style="color: #FC6E51">asdasd</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6 wow fadeInLeft" data-wow-delay="0.6s" data-wow-offset="100">
                    <div class="asd">
                        <img src="{{ asset('vendors/hehehe/assets/img/demo/property-1.jpg') }}" class="img-overlay img-rounded">
                        <div class="dsa">
                            <div class="text" style="color: #FC6E51">asdasd</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6 wow fadeInLeft" data-wow-delay="0.7s" data-wow-offset="100">
                    <div class="asd">
                        <img src="{{ asset('vendors/hehehe/assets/img/demo/property-1.jpg') }}" class="img-overlay img-rounded">
                        <div class="dsa">
                            <div class="text" style="color: #FC6E51">asdasd</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 wow fadeInUp" data-wow-delay="0.2s" data-wow-offset="100" style="padding-top: 50px;">
                    <a href="{{ url('/desa-wisata') }}" class="navbar-btn nav-button login">Lihat Semua</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!--TESTIMONIALS -->
<div class="testimonial-area recent-property" style="background-color: #FCFCFC; padding-bottom: 15px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                <!-- /.feature title -->
                <h2>Latest Blog</h2> 
            </div>
        </div>

        <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
            <div class="col-md-3 col-6">
                <div class="card">
                    <a href="#"><img src="https://via.placeholder.com/500x300.jpg" class="card-img-top"></a>
                    <div class="card-body" style="border: 1px solid #ccc; padding: 5px;">
                        <h5 class="card-title"><a href="#">Card title</a></h5>
                        <ul class="list-inline">
                            <li class="list-inline-item"><small><i class="fa fa-clock-o"> Nov 11, 2019</i></small></li>
                            <li class="list-inline-item"><small><i class="fa fa-user"> Admin</i></small></li>
                        </ul>
                        <p class="card-text">Some quick example text to build on the card title and make... <a href="#">Read more <i class="fa fa-arrow-right"></i></a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card">
                    <a href="#"><img src="https://via.placeholder.com/500x300.jpg" class="card-img-top"></a>
                    <div class="card-body" style="border: 1px solid #ccc; padding: 5px;">
                        <h5 class="card-title"><a href="#">Card title</a></h5>
                        <ul class="list-inline">
                            <li class="list-inline-item"><small><i class="fa fa-clock-o"> Nov 11, 2019</i></small></li>
                            <li class="list-inline-item"><small><i class="fa fa-user"> Admin</i></small></li>
                        </ul>
                        <p class="card-text">Some quick example text to build on the card title and make... <a href="#">Read more <i class="fa fa-arrow-right"></i></a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card">
                    <a href="#"><img src="https://via.placeholder.com/500x300.jpg" class="card-img-top"></a>
                    <div class="card-body" style="border: 1px solid #ccc; padding: 5px;">
                        <h5 class="card-title"><a href="#">Card title</a></h5>
                        <ul class="list-inline">
                            <li class="list-inline-item"><small><i class="fa fa-clock-o"> Nov 11, 2019</i></small></li>
                            <li class="list-inline-item"><small><i class="fa fa-user"> Admin</i></small></li>
                        </ul>
                        <p class="card-text">Some quick example text to build on the card title and make... <a href="#">Read more <i class="fa fa-arrow-right"></i></a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card">
                    <a href="#"><img src="https://via.placeholder.com/500x300.jpg" class="card-img-top"></a>
                    <div class="card-body" style="border: 1px solid #ccc; padding: 5px;">
                        <h5 class="card-title"><a href="#">Card title</a></h5>
                        <ul class="list-inline">
                            <li class="list-inline-item"><small><i class="fa fa-clock-o"> Nov 11, 2019</i></small></li>
                            <li class="list-inline-item"><small><i class="fa fa-user"> Admin</i></small></li>
                        </ul>
                        <p class="card-text">Some quick example text to build on the card title and make... <a href="#">Read more <i class="fa fa-arrow-right"></i></a></p>
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