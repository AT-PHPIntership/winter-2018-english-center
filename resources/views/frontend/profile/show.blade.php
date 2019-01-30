@extends('frontend.layouts.master')

@section('styles')
    <link rel="stylesheet" href="front_end/profile.css">
@endsection

@section('content')
    <section class="content">
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="storage/avatar/{{ Auth::user()->userProfile->url }}" alt="">

                <h3 class="profile-username text-center">{{ Auth::user()->userProfile->name }}</h3>

                <p class="text-muted text-center">{{ Auth::user()->email }}</p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item text-center">
                        <div class="row">
                            <b class="col-lg-6">@lang('user.show_list_user.show_user.age')</b>
                            <span class="col-lg-6">{{ Auth::user()->userProfile->age }}</span>
                        </div>
                    </li>
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
                    <li class="list-group-item text-center">
                        <div class="row">
                            <b class="col-lg-6">@lang('user.show_list_user.show_user.course_learned')</b>
                            <span class="col-lg-6">
                                @foreach(Auth::user()->courses as $course)
                                <a>{{ $course->title }}</a>&emsp;
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
                    </li>
                    <li class="list-group-item text-center">
                        <div class="row">
                            <b class="col-lg-6">@lang('user.show_list_user.show_user.created_at')</b>
                            <span class="col-lg-6">{{ Auth::user()->userProfile->created_at }}</span>
                        </div>
                    </li>
                </ul>
                <a href="{{ route('user.profiles.edit') }}" class="btn btn-warning">@lang('common.edit')</a>
            </div>
        </div>
    </section>
@endsection
