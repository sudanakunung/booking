<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Super Admin</title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/gentelella/') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/gentelella/') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/gentelella/') }}/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('vendors/gentelella/') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{ asset('vendors/gentelella/') }}/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('vendors/gentelella/') }}/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('vendors/gentelella/') }}/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('vendors/gentelella/') }}/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('vendors/gentelella/') }}/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('vendors/gentelella/') }}/build/css/custom.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" rel="stylesheet">
    <style>
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

      .thumbnail {
        height: auto !important;
        border: none;
      }
      .view {
        box-shadow: none !important;
      }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><img src="https://hanginggardensofbali.com/wp-content/uploads/2018/11/logo-gold.png" width="200px" class="img-responsive" style="margin-top: 5px"></a>
            </div>

            <div class="clearfix"></div>

            <br /><br>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Administrator
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{ url('/1/2/3/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Administrator Page</h3><br>
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
                    <h2>Participant Data</h2>
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
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Full Name</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>City</th>
                          <th>State</th>
                          <th>Address</th>
                          <th>Category</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($user as $participant)
                        <tr>
                          <td>{{ $participant->full_name }}</td>
                          <td>{{ $participant->phone }}</td>
                          <td>{{ $participant->email }}</td>
                          <td>{{ $participant->city }}</td>
                          <td>{{ $participant->state }}</td>
                          <td>{{ $participant->address }}</td>
                          <td>
                            @if($participant->kategori == "2")
                            School
                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $participant->id }}" role="dialog">
                              <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"><strong>School Information</strong></h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-3">
                                        School Name
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->school_name }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-3">
                                        School Permit
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->school_permit }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-3">
                                        Phone
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->school_phone }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-3">
                                        Address
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->school_address }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-3">
                                        City
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->school_city }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-3">
                                        State / Province
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->school_state }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="padding-top:10px; padding-bottom:15px">
                                      <div class="col-md-3">
                                        Postal Code
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->school_postal_code }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-12">
                                        <h4><strong>Representative Information</strong></h4>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-3">
                                        Full Name
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->full_name }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-3">
                                        KTP / ID
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->ktp }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-3">
                                        Birthdate
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->birthdate }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-3">
                                        Phone
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->phone }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-3">
                                        Address
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->address }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-3">
                                        City
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->city }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-3">
                                        State / Province
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->state }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="padding-top:10px; padding-bottom:15px">
                                      <div class="col-md-3">
                                        Postal Code
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->postal_code }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-12">
                                        <h4><strong>Garden Photos</strong></h4>
                                      </div>
                                    </div>
                                    <div class="row" style="padding-top:10px; padding-bottom:5px">
                                      @foreach($participant->m_gambar as $photo)
                                      <div class="col-md-55">
                                        <div class="thumbnail"  style="border:1px solid #e5e5e5;">
                                          <div class="image view view-first">
                                            <img style="width: 100%; display: block;" src="{{ asset('photos/'.$photo->gambar) }}" alt="image" />
                                            <div class="mask no-caption">
                                              <div class="tools tools-bottom">
                                                <a href="{{ asset('photos/'.$photo->gambar) }}" data-fancybox="gallery">
                                                  <i class="fa fa-image"></i>
                                                </a>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      @endforeach
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>  
                              </div>
                            </div>
                            @else
                            Personal
                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $participant->id }}" role="dialog">
                              <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"><strong>Personal Information</strong></h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-3">
                                        Full Name
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->full_name }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-3">
                                        KTP / ID
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->ktp }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-3">
                                        Birthdate
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->birthdate }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-3">
                                        Phone
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->phone }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-3">
                                        Address
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->address }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-3">
                                        City
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->city }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-3">
                                        State / Province
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->state }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="padding-top:10px; padding-bottom:15px">
                                      <div class="col-md-3">
                                        Postal Code
                                      </div>
                                      <div class="col-md-9">
                                        <strong>{{ $participant->postal_code }}</strong>
                                      </div>
                                    </div>
                                    <div class="row" style="border-bottom:1px solid #e5e5e5; padding-top:10px; padding-bottom:5px">
                                      <div class="col-md-12">
                                        <h4><strong>Garden Photos</strong></h4>
                                      </div>
                                    </div>
                                    <div class="row" style="padding-top:10px; padding-bottom:5px">
                                      @foreach($participant->m_gambar as $photo)
                                      <div class="col-md-55">
                                        <div class="thumbnail" style="border: 1px solid #e5e5e5">
                                          <div class="image view view-first">
                                            <img style="width: 100%; display: block;" src="{{ asset('photos/'.$photo->gambar) }}" alt="image" />
                                            <div class="mask no-caption">
                                              <div class="tools tools-bottom">
                                                <a href="{{ asset('photos/'.$photo->gambar) }}" data-fancybox="gallery">
                                                  <i class="fa fa-image"></i>
                                                </a>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      @endforeach
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>  
                              </div>
                            </div>
                            @endif
                          </td>
                          <td><a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal{{ $participant->id }}"><i class="fa fa-external-link"></i> View Detail</a></td>
                        </tr>

                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Gallery Upload</h2>
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
                    <form action="{{ url('/1/2/3/super-adm-pst') }}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                    <div class="form-group">
                      <label for="image">Image</label>
                      <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="form-group">
                      <label for="category">Category</label>
                      <input type="text" class="form-control" id="category" name="category">
                    </div>
                    <div class="ln_solid"></div>
                    <input type="submit" name="gallery" value="Upload" class="btn btn-primary">
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Press Post</h2>
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
                    <form action="{{ url('/1/2/3/super-adm-pst') }}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" id="judul" name="title" onkeyup="createslug()">
                      <input type="hidden" id="slug" name="slug">
                    </div>
                    <div class="form-group">
                      <label for="content">Content</label>
                      <textarea class="form-control" id="content" name="content"></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Post Detail</h2>
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
                    <div class="form-group">
                      <label for="feature_image">Feature Image</label>
                      <input type="file" class="form-control" id="feature_image" name="feature_image">
                    </div>
                    <div class="ln_solid"></div>
                    <input type="submit" name="blog" value="Post" class="btn btn-primary">
                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Made with <i class="fa fa-heart"></i> by Angga
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('vendors/gentelella/') }}/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendors/gentelella/') }}/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="{{ asset('vendors/gentelella/') }}/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="{{ asset('vendors/gentelella/') }}/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="{{ asset('vendors/gentelella/') }}/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="{{ asset('vendors/gentelella/') }}/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('vendors/gentelella/') }}/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="{{ asset('vendors/gentelella/') }}/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('vendors/gentelella/') }}/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="{{ asset('vendors/gentelella/') }}/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('vendors/gentelella/') }}/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('vendors/gentelella/') }}/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('vendors/gentelella/') }}/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="{{ asset('vendors/gentelella/') }}/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('vendors/gentelella/') }}/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('vendors/gentelella/') }}/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="{{ asset('vendors/gentelella/') }}/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="{{ asset('vendors/gentelella/') }}/vendors/jszip/dist/jszip.min.js"></script>
    <script src="{{ asset('vendors/gentelella/') }}/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('vendors/gentelella/') }}/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('vendors/gentelella/') }}/build/js/custom.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

        <script>
            function createslug()
            {
                var judul = $('#judul').val();
                $('#slug').val(slugify(judul));
            }
            function slugify(text)
            {
                return text.toString().toLowerCase()
                        .replace(/\s+/g, '-')           // Replace spaces with -
                        .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                        .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                        .replace(/^-+/, '')             // Trim - from start of text
                        .replace(/-+$/, '');            // Trim - from end of text
            }
        </script>

  <script>
    CKEDITOR.replace('content', {
      height: 400
    });
  </script>

  <script>
      window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove(); 
        });
      }, 3000);
    </script>

  </body>
</html>