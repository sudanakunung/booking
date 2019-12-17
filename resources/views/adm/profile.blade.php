@section('title')
Profile
@endsection

@section('user')
{{ $user->full_name }}
@endsection

@section('css')
<style>
.row-centered {
    text-align:center;
    padding-bottom: 30px;
}
.col-centered {
    display:inline-block;
    float:none;
    /* reset the text-align */
    text-align:left;
    /* inline-block space fix */
    margin-right:-4px;
}

table {
  width: 100%;
}
tr {
  border-bottom: 1px solid #aaa;
}

td:last-child {
  text-align: right;
}

td{
  padding-top: 20px;
  padding-bottom: 10px;
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
                <h3>Profile</h3><br>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">

              @if($user->kategori == "2")
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>School Information</h2>
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
                    <div class="row row-centered">
                      <div class="col-md-8 col-centered">
                        <table>
                          <tr>
                            <td>School Name</td>
                            <td><strong>{{ $user->school_name }}</strong></td>
                          </tr>
                          <tr>
                            <td>School Phone</td>
                            <td><strong>{{ $user->school_phone }}</strong></td>
                          </tr>
                          <tr>
                            <td>School Address</td>
                            <td><strong>{{ $user->school_address }}</strong></td>
                          </tr>
                          <tr>
                            <td>School City</td>
                            <td><strong>{{ $user->school_city }}</strong></td>
                          </tr>
                          <tr>
                            <td>School State / Province</td>
                            <td><strong>{{ $user->school_state }}</strong></td>
                          </tr>
                          <tr>
                            <td>School Postal Code</td>
                            <td><strong>{{ $user->school_postal_code }}</strong></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endif

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>
                      @if($user->kategori == "2")
                        Representative Information
                      @else
                        Personal Information
                      @endif
                    </h2>
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
                    <div class="row row-centered">
                      <div class="col-md-8 col-centered">
                        <table>
                          <tr>
                            <td>Full Name</td>
                            <td><strong>{{ $user->full_name }}</strong></td>
                          </tr>
                          <tr>
                            <td>ID / KTP</td>
                            <td><strong>{{ $user->ktp }}</strong></td>
                          </tr>
                          <tr>
                            <td>Birthdate</td>
                            <td><strong>{{ $user->birthdate }}</strong></td>
                          </tr>
                          <tr>
                            <td>Phone</td>
                            <td><strong>{{ $user->phone }}</strong></td>
                          </tr>
                          <tr>
                            <td>Full Address</td>
                            <td><strong>{{ $user->address }}</strong></td>
                          </tr>
                          <tr>
                            <td>City</td>
                            <td><strong>{{ $user->city }}</strong></td>
                          </tr>
                          <tr>
                            <td>State / Province</td>
                            <td><strong>{{ $user->state }}</strong></td>
                          </tr>
                          <tr>
                            <td>Postal Code</td>
                            <td><strong>{{ $user->postal_code }}</strong></td>
                          </tr>
                        </table>
                      </div>
                    </div>
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