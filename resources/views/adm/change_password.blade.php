@section('title')
Change Password
@endsection

@section('user')
{{ $user->full_name }}
@endsection

@section('css')

@endsection

        @extends('adm.index')
        @section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Change Password</h3><br>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                @if(Session::has('error'))
                  {!! session('error') !!}
                @endif
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Password</h2>
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
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ url('/dashboard/update-password') }}"> {{ csrf_field() }}

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current-password">Current Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="current-password" name="current_password" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_password">New Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="new_password" name="new_password" class="form-control col-md-7 col-xs-12">
                          <input type="hidden" name="id_user" value="{{ $user->id }}">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        @endsection

@section('js')

@endsection