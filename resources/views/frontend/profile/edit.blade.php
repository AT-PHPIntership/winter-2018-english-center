@extends('frontend.layouts.master')

@section('styles')
    <link rel="stylesheet" href="front_end/profile.css">
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form action="{{ route('user.profiles.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">{{ __('user.create_user.name') }}</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ Auth::user()->userProfile->name }}">
                            @if ($errors->has('name'))
                            <span class="help-block col-sm-12">
                                <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('user.create_user.email') }}</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ Auth::user()->email }}">
                            @if ($errors->has('email'))
                            <span class="help-block col-sm-12">
                                <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('user.create_user.old_password') }}</label>
                            <input type="password" class="form-control" name="old_password" placeholder="Enter password">
                            @if ($errors->has('old_password'))
                            <span class="help-block col-sm-12">
                                <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('old_password') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('user.create_user.new_password') }}</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                            @if ($errors->has('password'))
                            <span class="help-block col-sm-12">
                                <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">{{ __('user.create_user.confirm_pass') }}</label>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Enter confirm password">
                            @if ($errors->has('confirm_password'))
                            <span class="help-block col-sm-12">
                                <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('confirm_password') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="age">{{ __('user.create_user.age') }}</label>
                            <input type="text" class="form-control" name="age" placeholder="Enter age" value="{{ Auth::user()->userProfile->age }}">
                            @if ($errors->has('age'))
                            <span class="help-block col-sm-12">
                                <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('age') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="birthday">{{ __('user.create_user.birthday') }}</label>
                            <input type="date" class="form-control" name="birthday" value="{{ Auth::user()->userProfile->birthday }}">
                            @if ($errors->has('birthday'))
                            <span class="help-block col-sm-12">
                                <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('birthday') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ __('user.create_user.phone') }}</label>
                            <input type="text" class="form-control" name="phone" value="{{ Auth::user()->userProfile->phone }}">
                            @if ($errors->has('phone'))
                            <span class="help-block col-sm-12">
                                <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="url">{{ __('user.create_user.url') }}</label>
                            <img class="profile-user-img img-responsive img-circle" src="storage/avatar/{{ Auth::user()->userProfile->url }}" alt="">
                            <input type="file" name="url" value="{{ Auth::user()->userProfile->url }}">
                            @if ($errors->has('url'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('url') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{ route('user.profiles.show') }}" class="btn btn-info btn-default">@lang('common.back')</a>
                        <button type="reset" class="btn btn-default pull-right">@lang('common.reset')</button>
                        <button type="submit" class="btn btn-primary pull-right">@lang('common.btn')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
