<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

<title>Dashboard | {{auth::user()->full_name}}</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('dashboard/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dashboard/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light navbar-warning">
      <!-- Left navbar links -->
      
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">Home</a>
        </li>
      </ul>
  
      <!-- SEARCH FORM -->
 
  
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto nav-white ">
        <!-- Messages Dropdown Menu -->
 
      </ul>
    </nav>
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-orange elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
      <img src="{{asset('images/logov2.png')}}" alt="AdminLTE Logo" class="brand-image"
             >
      
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar sidebar-light-primary ">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            
                <li class="nav-item">
                  <a href="{{url('dashboard')}}" class="nav-link {{ Request::is('dashbaord') ?'active':''}}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                      Data transaksi
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('profile')}}" class="nav-link {{ Request::is('profile') ?'active':''}}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                      Profile
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('logout')}}" class="nav-link {{ Request::is('logout') ?'active':''}}">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                      Profile
                    </p>
                  </a>
                </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="card container-fluid">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>NO Transaksi</th>
                    <th>Nama Property</th>
                    <th>Jumlah kamar</th>
                    <th>Harga</th>
                    <th>Status Pembayran</th>
                    <th>Durasi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      @foreach ($property as $item)
                     @php
                      
                   $start = \Carbon\Carbon::parse($item->date_start);
                      $end = \Carbon\Carbon::parse($item->date_end);
               
                      $diff = $start->diffInDays($end);@endphp
                      <td>{{$item->id}}</td>
                      <td>{{$item->property_name}}</td>
                      <td>{{$item->jumlah_kamar}}</td>
                      <td>{{$item->amount}}</td>
                      <td>{{$item->status}}</td>
                      <td>{{$diff}} Hari</td>

                      @endforeach
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

  
  </div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('dashboard/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dashboard/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('dashboard/dist/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('dashboard/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('dashboard/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('dashboard/plugins/chart.js/Chart.min.js')}}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{asset('dashboard/dist/js/pages/dashboard2.js')}}"></script>
</body>
</html>
