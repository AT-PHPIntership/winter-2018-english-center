@extends('backend.layouts.master')
@section('content')
<!-- general form elements -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title" style="margin-left: 400px;font-weight: bold;text-transform: uppercase;">{{ __('user.create_user.title') }}</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="POST" action="{{ route('admin.users.store') }}">
    @csrf
        <div class="box-body">
            <div class="form-group">
                <label for="name">{{ __('user.create_user.name') }}</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ old('name') }}">
                @if ($errors->has('name'))
                 <span class="help-block col-sm-12">
                     <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('name') }}</strong>
                 </span>
               @endif
            </div>
            <div class="form-group">
                <label for="email">{{ __('user.create_user.email') }}</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                 <span class="help-block col-sm-12">
                     <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('email') }}</strong>
                 </span>
               @endif
            </div>
            <div class="form-group">
                <label for="password">{{ __('user.create_user.password') }}</label>
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
                <input type="text" class="form-control" name="age" placeholder="Enter age" value="{{ old('age') }}">
                @if ($errors->has('age'))
                 <span class="help-block col-sm-12">
                     <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('age') }}</strong>
                 </span>
               @endif
            </div>
            <div class="form-group">
                <label for="birthday">{{ __('user.create_user.birthday') }}</label>
                <input type="date" class="form-control" name="birthday" value="{{ old('birthday') }}">
                @if ($errors->has('birthday'))
                 <span class="help-block col-sm-12">
                     <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('birthday') }}</strong>
                 </span>
               @endif
            </div>
            <div class="form-group">
                <label for="phone">{{ __('user.create_user.phone') }}</label>
                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                @if ($errors->has('phone'))
                 <span class="help-block col-sm-12">
                     <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('phone') }}</strong>
                 </span>
               @endif
            </div>
            <div class="form-group">
                <label for="role">{{ __('user.create_user.role.name') }}</label>
                <select class="form-control" name="role" value="{{ old('role') }}">
                    @foreach ($roles as $role)
                    <option  <?php echo ($role->name == 'Trial') ? "selected" : " " ?>>{{ $role->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('role'))
                 <span class="help-block col-sm-12">
                     <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('role') }}</strong>
                 </span>
               @endif
            </div>
            <div class="form-group">
                <label for="url">{{ __('user.create_user.url') }}</label>
                <input type="file" name="url" value="{{ old('url') }}">
                @if ($errors->has('url'))
                 <span class="help-block col-sm-12">
                     <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('url') }}</strong>
                 </span>
               @endif
            </div>
            
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
        <button type="submit" class="btn btn-primary">{{ __('user.create_user.button') }}</button>
        </div>
    </form>
</div>
<!-- /.box -->
@endsection