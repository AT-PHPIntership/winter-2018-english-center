<!DOCTYPE html>
<html>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="text-align: center;">
	                <h2>{{ __('layout_user.register.activation.title') }}</h2>
	                <div>
	                	<p>{{ __('layout_user.register.activation.link') }}</p>
	                	<button style="background-color: #008CBA;padding: 15px 32px;text-align: center;display: inline-block;font-size: 16px;border-radius: 12px;"><a href="{{ route('user.activation', $user['link'])}}" style="text-decoration: none;color: white; ">{{ __('layout_user.register.activation.btn') }}</a></button>
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
