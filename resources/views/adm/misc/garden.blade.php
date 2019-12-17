@section('title')
Garden Photos
@endsection

@section('user')
{{ $user->full_name }}
@endsection

@section('css')
<style>
.thumbnail {
  height: auto !important;
  border: none;
}
.view {
  box-shadow: none !important;
}
</style>
<!-- light box -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" rel="stylesheet">
@endsection

        @extends('adm.index')
        @section('content')
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Garden Photos</h3><br>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-12">
                <div class="alert alert-warning">
                  <strong>Perhatian!</strong> Unggah poto proses pembuatan taman anda secara berkala
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Photos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a><i class="fa fa-star" style="cursor: not-allowed;"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @foreach($gambar as $photo)
                      <div class="col-md-55">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="{{ asset('photos/'.$photo->gambar) }}" alt="image" />
                            <div class="mask no-caption">
                              <div class="tools tools-bottom">
                                <a href="{{ asset('photos/'.$photo->gambar) }}" data-fancybox="gallery">
                                  <i class="fa fa-image"></i>
                                </a>
                                @if($photo->is_before == "1")
                                @else
                                <a href="{{ url('/1/2/3/delete-garden/'.$photo->id) }}"><i class="fa fa-times"></i></a>
                                @endif
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Upload Photo</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a><i class="fa fa-star" style="cursor: not-allowed;"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form action="{{ url('/1/2/3/upload-photo-garden') }}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <input type="file" class="form-control" name="photo">
                        <input type="hidden" name="fullname" value="{{ $user->full_name }}">
                        <input type="hidden" name="id_user" value="{{ $user->id }}">
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Upload</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endsection

@section('js')
<!-- light box -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
@endsection