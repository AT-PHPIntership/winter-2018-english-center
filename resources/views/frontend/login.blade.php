@extends('frontend.layouts.master')
@section('content')
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-55">
						@lang('layout_user.login.title')
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "@lang('layout_user.login.email_validate')">
						<input class="input100" type="text" name="email" placeholder="@lang('layout_user.login.email_placeholder')">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "@lang('layout_user.login.pass_validate')">
						<input class="input100" type="password" name="pass" placeholder="@lang('layout_user.login.pass_placeholder')">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>

					<div class="contact100-form-checkbox m-l-4">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							@lang('layout_user.login.remember_me')
						</label>
					</div>
					
					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn">
							@lang('layout_user.login.title')
						</button>
					</div>

					<div class="text-center w-full p-t-42 p-b-22">
						<span class="txt1">
							@lang('layout_user.login.login_with')
						</span>
					</div>

					<a href="#" class="btn-face m-b-10">
						<i class="fa fa-facebook-official"></i>
						@lang('layout_user.login.facebook')
					</a>

					<a href="#" class="btn-google m-b-10">
						<img src="images/icons/icon-google.png" alt="GOOGLE">
						@lang('layout_user.login.google')
					</a>

					<div class="text-center w-full p-t-115">
						<span class="txt1">
							@lang('layout_user.login.not_member')
						</span>

						<a class="txt1 bo1 hov1" href="#">
							@lang('layout_user.login.sign_up')						
						</a>
					</div>
				</form>
			</div>
		</div>
	<div>
@endsection
