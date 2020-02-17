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
		<link rel="stylesheet" href="front_end/style.css">
	<!--===============================================================================================-->
@endsection
@section('content')
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
                @if(session('warning'))
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                        {{session('warning')}}
                </div>
                @endif
				<form class="login100-form validate-form" method="POST" action="{{ route('user.register') }}">
					<span class="login100-form-title p-b-55">
						@lang('layout_user.register.title')
					</span>
                    @csrf
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "@lang('layout_user.register.name_validate')">
						<input class="input100" type="text" name="name" placeholder="@lang('layout_user.register.username_placeholder')">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-user"></span>
						</span>
						@if ($errors->has('name'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
						@endif
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "@lang('layout_user.register.email_validate')">
						<input class="input100" type="text" name="email" placeholder="@lang('layout_user.register.email_placeholder')">
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

					<div class="wrap-input100 validate-input m-b-16" data-validate = "@lang('layout_user.register.pass_validate')">
						<input class="input100" type="password" name="password" placeholder="@lang('layout_user.register.pass_placeholder')">
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

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "@lang('layout_user.register.confirmpass_validate')">
						<input class="input100" type="password" name="confirm_password" placeholder="@lang('layout_user.register.passconfirm_placeholder')">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
						@if ($errors->has('confirm_password'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('confirm_password') }}</strong>
							</span>
						@endif
                    </div>

					<input class="input100" type="hidden" name="role_id"  value='2'>
					<input class="input100" type="hidden" name="is_actived"  value='0'>
                    
					<div class="container-login100-form-btn p-t-25">
						<button type="submit" class="login100-form-btn">
							@lang('layout_user.register.btn')
						</button>
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
