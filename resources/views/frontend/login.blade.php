@extends('frontend.layouts.master')
@section('styles')
	<!--===============================================================================================-->	
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="bower_components/font-awesome/css/font-awesome.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="bower_components/select2/dist/css/select2.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
@endsection
@section('content')
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form" method="POST" action="{{ route('user.login') }}">
				@csrf
				@if (session('warning'))
                    <div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert">
							<i class="ace-icon fa fa-times"></i>
						</button>
                        {{ session('warning') }}
                    </div>
				@endif
				@if (session('message'))
                    <div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert">
							<i class="ace-icon fa fa-times"></i>
						</button>
                        {{ session('message') }}
                    </div>
                @endif
					<span class="login100-form-title p-b-55">
						@lang('layout_user.login.title')
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "@lang('layout_user.login.email_validate')">
						<input class="input100" type="text" name="email" placeholder="@lang('layout_user.login.email_placeholder')">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
						@if ($errors->has('email'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "@lang('layout_user.login.pass_validate')">
						<input class="input100" type="password" name="password" placeholder="@lang('layout_user.login.pass_placeholder')">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
						@if ($errors->has('password'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>

					<div class="contact100-form-checkbox m-l-4">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							@lang('layout_user.login.remember_me')
						</label>
					</div>
					
					<div class="container-login100-form-btn p-t-25">
						<button type="submit" class="login100-form-btn">
							@lang('layout_user.login.title')
						</button>
					</div>

					<div class="text-center w-full p-t-42 p-b-22">
						<span class="txt1">
							@lang('layout_user.login.login_with')
						</span>
					</div>

					<a href="{{route('user.social', ['provider'=>'facebook'])}}" class="btn-face m-b-10">
						<i class="fa fa-facebook-official"></i>
						@lang('layout_user.login.facebook')
					</a>

					<a href="{{route('user.social', ['provider'=>'google'])}}" class="btn-google m-b-10">
						<img src="images/icons/icon-google.png" alt="GOOGLE">
						@lang('layout_user.login.google')
					</a>

					<div class="text-center w-full p-t-115">
						<span class="txt1">
							@lang('layout_user.login.not_member')
						</span>

						<a class="txt1 bo1 hov1" href="{{ route('user.register') }}">
							@lang('layout_user.login.sign_up')						
						</a>
					</div>
				</form>
			</div>
		</div>
	<div>
@endsection
@section('scripts')
	<!--===============================================================================================-->
		<script src="bower_components/jquery/dist/jquery.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/bootstrap/js/popper.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
		<script src="bower_components/select2/dist/js/select2.min.js"></script>
	<!--===============================================================================================-->
		<script src="js/login/main.js"></script>
	<!--===============================================================================================-->
@endsection
