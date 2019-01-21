@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content-header">
  <h1>@lang('lesson.edit_lesson.title')</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>
    <li>
      <a href="{{ route('admin.lessons.index') }}">@lang('lesson.list_lesson.title')</a>
    </li>
    <li class="active">@lang('lesson.edit_lesson.title')</li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form action="{{ route('admin.lessons.update', $lesson->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">{{ __('lesson.create_lesson.name') }}</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name lesson" value="{{ $lesson->name }}">
                            @if ($errors->has('name'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('lesson.create_lesson.text') }}</label>
                            <textarea class="form-control" name="text">{{ $lesson->text }}</textarea>
                            @if ($errors->has('text'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('text') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="role">{{ __('lesson.create_lesson.role') }}</label>
                            <select class="form-control" name="role">
                                <option value="{{  App\Models\Lesson::TRIAL }}" <?php echo ($lesson->role == App\Models\Lesson::TRIAL) ? "selected" : " " ?>>{{ config('define.trial') }}</option>
                                <option value="{{  App\Models\Lesson::VIP }}" <?php echo ($lesson->role == App\Models\Lesson::VIP) ? "selected" : " " ?>>{{ config('define.vip') }}</option>
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
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}" <?php echo ($level->level == $lesson->level->level) ? "selected" : " " ?>>{{ $level->level }}</option>
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
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}" <?php echo ($course->title == $lesson->course->title) ? "selected" : " " ?>>{{ $course->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('course_id'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('course_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="vocabulary">{{ __('lesson.create_lesson.vocabulary') }}</label>
                            <select class="form-control select2" multiple="multiple" data-placeholder="  Select a Vocabulary" style="width: 100%;" name="vocabulary_id[]">
                                @php
                                    $vocabularyIds = [];
                                    foreach ($lesson->vocabularies as $oldVocabulary) {
                                        $vocabularyIds[] = $oldVocabulary->id;
                                    }
                                @endphp
                                @foreach ($vocabularies as $vocabulary)
                                <option {{(collect($vocabularyIds)->contains($vocabulary->id)) ? "selected": "" }} value="{{ $vocabulary->id }}">{{ $vocabulary->vocabulary }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('vocabulary_id'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('vocabulary_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="img">{{ __('lesson.create_lesson.image') }}</label>
                            <img class="profile-user-img img-responsive img-circle" src="storage/lesson/{{ $lesson->image }}" alt="">
                            <input type="file" name="image" value="{{ old('image') }}">
                            @if ($errors->has('image'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="video">{{ __('lesson.create_lesson.video') }}</label>
                            <input type="url" class="form-control" name="video" placeholder="Enter url video" value="{{ $lesson->video }}">
                            @if ($errors->has('video'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('video') }}</strong>
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
