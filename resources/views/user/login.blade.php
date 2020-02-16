
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('user/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('user/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('user/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('user/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--======================================================user/=========================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('user/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('user/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('user/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
    <div class="limiter" id="login">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset('user/SVG/login.svg')}}" alt="IMG">
				</div>
				@if(session()->has('change_password'))
				<form class="login100-form validate-form" action="change" method="POST">
					@csrf
					@method('POST');
				<span class="login100-form-title">
					Change password
				</span>
				@isset($email)
			<input class="input100" style="display:none" type="password" name="email" placeholder="New password" value="{{$email}}" required>
			@endisset	
			<div class="wrap-input100 validate-input" data-validate = "Password is required">
					<input class="input100" type="password" name="new_password" placeholder="New password" required>
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Password is required">
					<input class="input100" type="password" name="confirm_password" placeholder=" Confirm Password" required>
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>
				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn">
						Send
					</button>
				</div>
				</form>
				@elseif(session('sukses'))
				<form class="login100-form validate-form" action="change_password" method="POST">
					@csrf
					@method('POST')
				<span class="login100-form-title">
					Member Login
				</span>
				<div class="wrap-input100 validate-input" data-validate = "Password is required">
					@isset($email)
				<input style="display:none" class="input100"  type="email" name="email" placeholder="Password" value="{{$email}}">
				@endisset
					<input class="input100"  type="password" name="password" placeholder="Password" required>
				</div>
				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn">
						Send
					</button>
				</div>
				</form>
				@else
				<form class="login100-form validate-form" action="login" method="POST">
                    @csrf
                    @method('POST')
					<span class="login100-form-title">
						Member Login
					</span>
                    @IF(session('gagal'))
                    <div class="alert alert-danger">
                    {{session('gagal')}}
                    </div>
                    @endif

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
                        <button id="get_password" type="button">Belum memiliki password</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
    </div>
    <div class="limiter" id="password" style="display:none">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset('user/SVG/login.svg')}}" alt="IMG">
				</div>

            <form class="login100-form validate-form" action="getpassword" method="POST">
                    @csrf
                    @method('POST')
					<span class="login100-form-title">
						Member Get password
					</span>

					<div class="wrap-input100 validate-input "  data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
                   
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Send mail
						</button>
					</div>
					<div class="text-center p-t-12">
					<button type="button" id="back">Back to login</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	@endif

	
<!--===============================================================================================-->	
	<script src="{{asset('user/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('user/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('user/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('user/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('user/vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
  $("button#get_password").click(function(){
    $("button#get_password").hide();
    $("#back").show();
    $("#login").hide();
    $("#password").show();
  });
  $("button#back").click(function(){
    $("button#get_password").show();
    $("#back").hide();
    $("#login").show();
    $("#password").hide();

  });
});
    </script>
</body>
</html>