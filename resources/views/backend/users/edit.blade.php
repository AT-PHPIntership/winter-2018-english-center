@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content-header">
  <h1>@lang('user.edit_user.title')</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>
    <li>
      <a href="{{ route('admin.users.index') }}">@lang('user.show_list_user.title')</a>
    </li>
    <li class="active">@lang('user.edit_user.title')</li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">{{ __('user.create_user.name') }}</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ $user->userProfile->name }}">
                            @if ($errors->has('name'))
                            <span class="help-block col-sm-12">
                                <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('user.create_user.email') }}</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ $user->email }}">
                            @if ($errors->has('email'))
                            <span class="help-block col-sm-12">
                                <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="age">{{ __('user.create_user.age') }}</label>
                            <input type="text" class="form-control" name="age" placeholder="Enter age" value="{{ $user->userProfile->age }}">
                            @if ($errors->has('age'))
                            <span class="help-block col-sm-12">
                                <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('age') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="birthday">{{ __('user.create_user.birthday') }}</label>
                            <input type="date" class="form-control" name="birthday" value="{{ $user->userProfile->birthday }}">
                            @if ($errors->has('birthday'))
                            <span class="help-block col-sm-12">
                                <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('birthday') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ __('user.create_user.phone') }}</label>
                            <input type="text" class="form-control" name="phone" value="{{ $user->userProfile->phone }}">
                            @if ($errors->has('phone'))
                            <span class="help-block col-sm-12">
                                <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="role">{{ __('user.create_user.role.name') }}</label>
                            <select class="form-control" name="role_id">
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}" <?php echo ($role->name == $user->role->name) ? "selected" : " " ?>>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('role_id'))
                            <span class="help-block col-sm-12">
                                <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('role_id') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="url">{{ __('user.create_user.url') }}</label>
                            <img class="profile-user-img img-responsive img-circle" src="{{ !(substr($user->userProfile->url,0,4) == 'http') ? 'storage/avatar/' .$user->userProfile->url : $user->userProfile->url }}" alt="">
                            <input type="file" name="url" value="{{ $user->userProfile->url }}">
                            @if ($errors->has('url'))
                            <span class="help-block col-sm-12">
                                <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('url') }}</strong>
                            </span>
                        @endif
                        </div>     
                    </div>
                    <div class="box-footer">
                        <a href="{{ URL::previous() }}" class="btn btn-info btn-default">@lang('common.back')</a>
                        <button type="reset" class="btn btn-default pull-right">@lang('common.reset')</button>
                        <button type="submit" class="btn btn-primary pull-right">@lang('common.btn')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
