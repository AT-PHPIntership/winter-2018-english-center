@extends('frontend.layouts.master')

@section('styles')
    <link rel="stylesheet" href="front_end/profile.css">
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form action="{{ route('user.profiles.update.pass') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
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
