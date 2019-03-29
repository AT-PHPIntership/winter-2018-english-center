@extends('frontend.layouts.master')

@section('styles')
    <link rel="stylesheet" href="front_end/profile.css">
@endsection

@section('content')
    <section class="content">
        <div class="box box-primary">
            @if (session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    {{ session('success') }}
                </div>
            @endif
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{ !(substr(Auth::user()->userProfile->url,0,4) == 'http') ? 'storage/avatar/' .Auth::user()->userProfile->url : Auth::user()->userProfile->url }}" alt="">

                <h3 class="profile-username text-center">{{ Auth::user()->userProfile->name }}</h3>

                <p class="text-muted text-center">{{ Auth::user()->email }}</p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item text-center">
                        <div class="row">
                            <b class="col-lg-6">@lang('user.show_list_user.show_user.birthday')</b>
                            <span class="col-lg-6">{{ Auth::user()->userProfile->birthday }}</span>
                        </div>
                    </li>
                    <li class="list-group-item text-center">
                        <div class="row">
                            <b class="col-lg-6">@lang('user.show_list_user.show_user.phone')</b>
                            <span class="col-lg-6">{{ Auth::user()->userProfile->phone }}</span>
                        </div>
                    </li>
                   {{--  <li class="list-group-item text-center">
                        <div class="row">
                            <b class="col-lg-6">@lang('user.show_list_user.show_user.course_learned')</b>
                            <span class="col-lg-6">
                                @foreach(Auth::user()->courses as $course)
                                <a>{{ $course->name }}</a>&emsp;
                                @endforeach
                            </span>
                        </div>
                    </li>
                    <li class="list-group-item text-center">
                        <div class="row">
                            <b class="col-lg-6">@lang('user.show_list_user.show_user.lesson_learned')</b>
                            <span class="col-lg-6">
                                @foreach(Auth::user()->lessons as $lesson)
                                <a>{{ $lesson->name }}</a>&emsp;
                                @endforeach
                            </span>
                        </div>
                    </li> --}}
                    <li class="list-group-item text-center">
                        <div class="row">
                            <b class="col-lg-6">@lang('user.show_list_user.show_user.created_at')</b>
                            <span class="col-lg-6">{{ Auth::user()->userProfile->created_at }}</span>
                        </div>
                    </li>
                </ul>
                <div class="box-footer">
                    <a href="{{ route('user.profiles.edit') }}" class="btn btn-warning">@lang('common.edit')</a>
                    @if(Auth::user()->password != null)
                    <a href="{{ route('user.profiles.changePass') }}" class="btn btn-warning btn-changePass">@lang('common.changePass')</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
