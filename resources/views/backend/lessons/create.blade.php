@extends('backend.layouts.master')
@section('content')
<section class="content-header">
  <h1>@lang('lesson.create_lesson.title')</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>
    <li><a href="{{ route('admin.lessons.index') }}">@lang('lesson.list_lesson.title')</a></li>
    <li class="active">@lang('lesson.create_lesson.title')</li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
                <form role="form" method="POST" action="{{ route('admin.lessons.store') }}" enctype="multipart/form-data">
                @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">{{ __('lesson.create_lesson.name') }}</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name lesson" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('lesson.create_lesson.text') }}</label>
                            <textarea class="form-control" name="text" placeholder="Enter text" value="{{ old('text') }}"></textarea>
                            @if ($errors->has('text'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('text') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="role">{{ __('lesson.create_lesson.role') }}</label>
                            <select class="form-control" name="role">
                                <option value="">Select Role</option>
                                <option value="{{  App\Models\Lesson::TRIAL }}">{{ config('define.trial') }}</option>
                                <option value="{{  App\Models\Lesson::VIP }}">{{ config('define.vip') }}</option>
                            </select>
                            @if ($errors->has('role'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('role') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="level">{{ __('lesson.create_lesson.level') }}</label>
                            <select class="form-control" name="level_id">
                                <option value="">Select Level</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->level }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('level_id'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('level_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="course">{{ __('lesson.create_lesson.course') }}</label>
                            <select class="form-control" name="course_id">
                                <option value="">Select Course</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('course_id'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('course_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="img">{{ __('lesson.create_lesson.image') }}</label>
                            <input type="file" name="image" value="{{ old('image') }}">
                            @if ($errors->has('image'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="video">{{ __('lesson.create_lesson.video') }}</label>
                            <input type="url" class="form-control" name="video" placeholder="Enter url video" value="{{ old('video') }}">
                            @if ($errors->has('video'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('video') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('admin.lessons.index')}}" class="btn btn-info btn-default">@lang('common.back')</a>
                        <button type="reset" class="btn btn-default pull-right">@lang('common.reset')</button>
                        <button type="submit" class="btn btn-primary pull-right">@lang('common.btn')</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection
