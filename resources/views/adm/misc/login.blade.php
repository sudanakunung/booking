<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kamartamu - Login</title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/gentelella/') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/gentelella/') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/gentelella/') }}/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('vendors/gentelella/') }}/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('vendors/gentelella/') }}/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="{{ url('/log-in') }}"> {{ csrf_field() }}
              <h1>HGIFC Login</h1>
              @if(Session::has('error'))
                {!! session('error') !!}
              @endif
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" name="email" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
              </div>
              <div>
                <select name="category" class="form-control" style="border-radius: 3px;
    -ms-box-shadow: 0 1px 0 #fff,0 -2px 5px rgba(0,0,0,.08) inset;
    -o-box-shadow: 0 1px 0 #fff,0 -2px 5px rgba(0,0,0,.08) inset;
    box-shadow: 0 1px 0 #fff, 0 -2px 5px rgba(0,0,0,.08) inset;
    border: 1px solid #c8c8c8;
    color: #777;
    margin: 0 0 20px;
    width: 100%;">
                  <option value="0">-Select Category-</option>
                  <option value="1">Personal</option>
                  <option value="2">School</option>
                </select>
              </div>
              <div>
                <input type="submit" class="btn btn-default submit" value="Log in">

              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <a href="{{ url('/') }}" class="btn btn-default submit">go to Home</a>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
  <script src="{{ asset('vendors/gentelella/') }}/vendors/jquery/dist/jquery.min.js"></script>
  <script src="{{ asset('vendors/gentelella/') }}/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
      });
    }, 3000);
  </script>
</html>
