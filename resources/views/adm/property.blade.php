@section('title')
Property
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

<!-- lightbox -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha256-HAaDW5o2+LelybUhfuk0Zh2Vdk8Y2W2UeKmbaXhalfA=" crossorigin="anonymous" />
@endsection

        @extends('adm.index')
        @section('content')
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left row" style="margin-bottom: 20px;">
                <div class="col-md-4">
                  <h3><i class="fa fa-building-o"></i> Property</h3>
                </div>
                <div class="col-md-3" style="padding-top: 5px;">
                  <a href="{{ url('/dashboard/property/add') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              @if(Session::has('error'))
                <div class="col-md-12">{!! session('error') !!}</div>
              @endif
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-th-list"></i> Details</h2>
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
                          <th>Property Name</th>
                          <th>City</th>
                          <th>Max Person</th>
                          <th>Total Room</th>
                          <th>Price</th>
                          <th>Owner</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($property as $p)
                        <tr>
                          <td>{{ $p->property_name }}</td>
                          <td>{{ $p->property_city->city_name }}</td>
                          <td>{{ $p->max_person }}</td>
                          <td>{{ $p->total_room }}</td>
                          <td>Rp. {{ number_format($p->price, 0, ".", ".") }}</td>
                          <td>{{ $p->property_user->full_name }}</td>
                          <td>
                            <a href="{{ url('/dashboard/property/edit/'.$p->uid) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</a>
                            <a href="{{ url('/dashboard/property/delete/'.$p->uid) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                          </td>
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
<!-- lightbox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js" integrity="sha256-jGAkJO3hvqIDc4nIY1sfh/FPbV+UK+1N+xJJg6zzr7A=" crossorigin="anonymous"></script>

<script>
  $(document).on("click", '[data-toggle="lightbox"]', function(event) {
  event.preventDefault();
  $(this).ekkoLightbox();
});
</script>
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