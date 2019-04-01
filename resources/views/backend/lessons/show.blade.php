@extends('backend.layouts.master')
@section('content')
<section class="content-header">
  <h1>@lang('lesson.list_lesson.show_lesson.title')</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>
    <li>
      <a href="{{ route('admin.lessons.index') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('lesson.list_lesson.title')
      </a>
    </li>
    <li class="active">@lang('lesson.list_lesson.show_lesson.title')</li>
  </ol>
</section>
<section class="content">
    <div class="row">
        @if (Session::has('success'))
        <div class="box-header with-border">
            <div class="col-md-6">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i>{{ Session::get('success') }}</h4>
            </div>
            </div>
        </div>
        @endif
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-lg-2">{{ __('lesson.list_lesson.id') }}</b>
                                <span class="col-lg-10">{{ $lesson->id }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-lg-2">{{ __('lesson.list_lesson.name') }}</b>
                                <span class="col-lg-10">{{ $lesson->name }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-lg-2">{{ __('lesson.list_lesson.show_lesson.img') }}</b>
                                <img class="profile-user-img img-responsive img-circle col-lg-10" src="/storage/lesson/{{ $lesson->image }}" alt="">
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-lg-2">{{ __('lesson.list_lesson.show_lesson.video') }}</b>
                                <span class="col-lg-10">
                                    <iframe src="{{ $lesson->video }}" controls allowfullscreen>
                                    </iframe>
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-lg-2">{{ __('lesson.list_lesson.show_lesson.text') }}</b>
                                <span class="col-lg-10">{!! $lesson->text !!}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-lg-2">{{ __('lesson.list_lesson.course') }}</b>
                                <span class="col-lg-10">{{ $lesson->course->name }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-lg-2">{{ __('lesson.list_lesson.level') }}</b>
                                <span class="col-lg-10">{{ $lesson->level->level }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-lg-2">{{ __('lesson.list_lesson.show_lesson.exercise') }}</b>
                                <span class="col-lg-10">
                                    @foreach($lesson->exercises as $exercise)
                                    <a>{{ $exercise->title }}</a>&emsp;
                                    @endforeach
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-lg-2">{{ __('lesson.list_lesson.show_lesson.vocabularies') }}</b>
                                <span class="col-lg-10">
                                    @foreach($lesson->vocabularies as $vocabulary)
                                    <a href="{{ route('admin.vocabularies.show', $vocabulary->id) }}">{{ $vocabulary->vocabulary }}</a>&emsp;
                                    @endforeach
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-lg-2">{{ __('lesson.list_lesson.show_lesson.count_view') }}</b>
                                <span class="col-lg-10">{{ $lesson->count_view }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-lg-2">{{ __('lesson.list_lesson.show_lesson.total_rating') }}</b>
                                <span class="col-lg-10">{{ $lesson->total_rating }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-lg-2">{{ __('lesson.list_lesson.show_lesson.average') }}</b>
                                <span class="col-lg-10">{{ $lesson->average }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-lg-2">{{ __('lesson.list_lesson.show_lesson.created_at') }}</b>
                                <span class="col-lg-10">{{ $lesson->created_at }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-lg-2">{{ __('lesson.list_lesson.show_lesson.updated_at') }}</b>
                                <span class="col-lg-10">{{ $lesson->updated_at }}</span>
                            </div>
                        </li>
                    </ul>
                    <a href="{{ URL::previous() }}" class="btn btn-primary"><b>@lang('common.back')</b></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
