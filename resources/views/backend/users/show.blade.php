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
                    <img class="profile-user-img img-responsive img-circle" src="{{ !(substr($user->userProfile->url,0,4) == 'http') ? 'storage/avatar/' .$user->userProfile->url : $user->userProfile->url }}" alt="">

                    <h3 class="profile-username text-center">{{ $user->userProfile->name }}</h3>

                    <p class="text-muted text-center">{{ $user->email }}</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item text-center">
                            <div class="row">
                                <b class="col-lg-6">@lang('user.show_list_user.show_user.birthday')</b>
                                <span class="col-lg-6">{{ $user->userProfile->birthday }}</span>
                            </div>
                        </li>
                        <li class="list-group-item text-center">
                            <div class="row">
                                <b class="col-lg-6">@lang('user.show_list_user.show_user.phone')</b>
                                <span class="col-lg-6">{{ $user->userProfile->phone }}</span>
                            </div>
                        </li>
                        <li class="list-group-item text-center">
                            <div class="row">
                                <b class="col-lg-6">@lang('user.show_list_user.show_user.course_learned')</b>
                                <span class="col-lg-6">
                                    @foreach($user->courses as $course)
                                    <a>{{ $course->name }}</a>&emsp;
                                    @endforeach
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item text-center">
                            <div class="row">
                                <b class="col-lg-6">@lang('user.show_list_user.show_user.lesson_learned')</b>
                                <span class="col-lg-6">
                                    @foreach($user->lessons as $lesson)
                                    <a>{{ $lesson->name }}</a>&emsp;
                                    @endforeach
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item text-center">
                            <div class="row">
                                <b class="col-lg-6">@lang('user.show_list_user.show_user.created_at')</b>
                                <span class="col-lg-6">{{ $user->userProfile->created_at }}</span>
                            </div>
                        </li>
                        <li class="list-group-item text-center">
                            <div class="row">
                                <b class="col-lg-6">@lang('user.show_list_user.show_user.updated_at')</b>
                                <span class="col-lg-6">{{ $user->userProfile->updated_at }}</span>
                            </div>
                        </li>
                    </ul>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary"><b>@lang('user.show_list_user.show_user.button')</b></a>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">@lang('common.edit')</a>
                    @if ($user->role->name != App\Models\Role::ROLE_ADMIN)
                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="inline" onsubmit="return confirmedDelete()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger form-delete btn-delete-item" data-title="Delete User">@lang('common.delete')</button>
                    </form>
                    @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </section>
@endsection
