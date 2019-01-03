@extends('backend.layouts.master')
@section('content')
<!-- general form elements -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title" style="margin-left: 400px;font-weight: bold;text-transform: uppercase;">{{ __('user.create_user.title') }}</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form">
        <div class="box-body">
            <div class="form-group">
                <label for="name">{{ __('user.create_user.name') }}</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="email">{{ __('user.create_user.email') }}</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">{{ __('user.create_user.password') }}</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password">
            </div>
            <div class="form-group">
                <label for="confirm_password">{{ __('user.create_user.confirm_pass') }}</label>
                <input type="password" class="form-control" id="confirm_password" placeholder="Enter confirm password">
            </div>
            <div class="form-group">
                <label for="age">{{ __('user.create_user.age') }}</label>
                <input type="text" class="form-control" id="age" placeholder="Enter age">
            </div>
            <div class="form-group">
                <label for="birthday">{{ __('user.create_user.birthday') }}</label>
                <input type="date" class="form-control" id="age">
            </div>
            <div class="form-group">
                <label for="phone">{{ __('user.create_user.phone') }}</label>
                <input type="text" class="form-control" id="phone">
            </div>
            <div class="form-group">
                <label for="role">{{ __('user.create_user.role.name') }}</label>
                <select class="form-control">
                    <option>{{ __('user.create_user.role.admin') }}</option>
                    <option>{{ __('user.create_user.role.trial') }}</option>
                    <option>{{ __('user.create_user.role.vip') }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="url">{{ __('user.create_user.url') }}</label>
                <input type="file" id="url">
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
