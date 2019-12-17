@section('title')
Booking
@endsection

@section('user')
{{ $user->full_name }}
@endsection

@section('css')
<!-- Datatables -->
    <link href="{{ asset('vendors/gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
@endsection

        @extends('adm.index')
        @section('content')
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Booking</h3><br>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              @if(Session::has('error'))
                {!! session('error') !!}
              @endif

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Details</h2>
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
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Guest name</th>
                          <th>Booking no.</th>
                          <th>Property name</th>
                          <th>Arrival</th>
                          <th>Departure</th>
                          <th>Person</th>
                          <th>Booking date</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($booking as $data)
                        <tr>
                          <td>{{ $data->booking_user->full_name }}</td>
                          <td>{{ $data->booking_no }}</td>
                          <td>{{ $data->booking_property->property_name }}</td>
                          <td>
                            @php
                              $arrival = date_create($data->arrival);
                              echo date_format($arrival,"d-M-Y");
                            @endphp
                          </td>
                          <td>
                            @php
                              $departure = date_create($data->departure);
                              echo date_format($departure,"d-M-Y");
                            @endphp
                          </td>
                          <td>{{ $data->person }}</td>
                          <td>
                            @php
                              $created_at = date_create($data->created_at);
                              echo date_format($created_at,"d-M-Y");
                            @endphp
                          </td>
                          <td>
                            @if($data->status == "tentative")
                              <span class="label label-warning">Tentative</span>
                            @elseif($data->status == "paid")
                              <span class="label label-success">Paid</span>
                            @endif
                          </td>
                          <td><a href="{{ url('/') }}" class="btn btn-primary btn-xs">View</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
          
          
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endsection

@section('js')
<!-- Datatables -->
    <script src="{{ asset('vendors/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendors/gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('vendors/gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('vendors/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('vendors/gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('vendors/gentelella/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/gentelella/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/gentelella/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
@endsection