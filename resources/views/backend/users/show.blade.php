@extends('backend.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ __('user.show_list_user.show_user.title') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>@lang('layout_admin.home')  </a></li>
        <li><a href="{{ route('admin.users.index') }}">@lang('user.show_list_user.title')</a></li>
        <li class="active">{{ __('user.show_list_user.show_user.title') }}</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ $user->userProfile->url }}" alt="User profile picture">

                    <h3 class="profile-username text-center">{{ $user->userProfile->name }}</h3>

                    <p class="text-muted text-center">{{ $user->email }}</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item text-center">
                        <b>@lang('user.show_list_user.show_user.age')</b> <a>{{ $user->userProfile->age }}</a>
                        </li>
                        <li class="list-group-item text-center">
                        <b>@lang('user.show_list_user.show_user.birthday')</b> <a>{{ $user->userProfile->birthday }}</a>
                        </li>
                        <li class="list-group-item text-center">
                        <b>@lang('user.show_list_user.show_user.phone')</b> <a>{{ $user->userProfile->phone }}</a>
                        </li>
                        <li class="list-group-item text-center">
                        <b>@lang('user.show_list_user.show_user.course_level')</b> <a>{{ $user->userProfile->course_level }}</a>
                        </li>
                        <li class="list-group-item text-center">
                        <b>@lang('user.show_list_user.show_user.lession_level')</b> <a>{{ $user->userProfile->lession_level }}</a>
                        </li>
                        <li class="list-group-item text-center">
                        <b>@lang('user.show_list_user.show_user.created_at')</b> <a>{{ $user->userProfile->created_at }}</a>
                        </li>
                        <li class="list-group-item text-center">
                        <b>@lang('user.show_list_user.show_user.updated_at')</b> <a>{{ $user->userProfile->updated_at }}</a>
                        </li>
                    </ul>

                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary"><b>@lang('user.show_list_user.show_user.button')</b></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </section>
@endsection
