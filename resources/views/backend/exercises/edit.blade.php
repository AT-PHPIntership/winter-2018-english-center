@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content-header">
  <h1>@lang('exercise.update_exercise.title')</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>
    <li>
      <a href="{{ route('admin.exercises.index') }}">@lang('exercise.list_exercise.exercises')</a>
    </li>
    <li class="active">@lang('exercise.update_exercise.title')</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <form action="{{ route('admin.exercises.update', $exercise->id) }}" method="POST">
          @method('PUT')
          @csrf
          <div class="box-body">
            <div class="form-group exercise">
              <label>@lang('exercise.list_exercise.exercises')</label>
              <input name="title" type="text" class="form-control title" value="{{ $exercise->title }}">
              @if ($errors->has('title'))
              <span class="text-red help is-danger">* {{ $errors->first('title') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label>@lang('exercise.list_exercise.lessons')</label>
              <select name="lesson_id" class="form-control lesson">
                @if( $exercise->lesson_id == null)
                <option value="">@lang('course.create_course.select')</option>
                @foreach ($lessons as $lesson)
                <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                @endforeach
                @else
                <option value=""></option>
                @foreach ($lessons as $lesson)
                <option {{ $exercise->lesson_id == $lesson->id ? "selected" : "" }} value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                @endforeach
                @endif
              </select>
                @if ($errors->has('lesson_id'))
                <span class="text-red help is-danger">* {{ $errors->first('lesson_id') }}</span>
                @endif
            </div>
            <div class="form-group">
              <button type='button' id="add-questions" class="btn btn-default">+</button>
            </div>
            <div id="question" class="col-md-10 col-xs-offset-1">
              @if($exercise->questions != null)
              @foreach ($exercise->questions as $a => $question)
              <div class="box box-info">
                <button style="margin-top: -15px; margin-right: -15px " type='button' id="remove-questions" class="btn btn-default pull-right">x</button>
                <div class="box-body box-question">
                  <div class="form-group">
                    <label>{{ __('exercise.update_exercise.question') }}</label>
                    <input type="hidden" name="questions[{{$a}}][id]" class="form-control" value="{{ $question->id }}">
                    <input name="questions[{{$a}}][content]" class="form-control questions" value="{{ $question->content }}">
                  </div>
                  @foreach ($question->answers as $key => $answers)
                  <div class="form-group">
                    <label class="col-sm-2 col-xs-offset-2 control-label">Answer {{ $key + 1 }}</label>
                    <div class="col-lg-6">
                      <div class="input-group">
                        <input name="questions[{{ $a }}][answers][]" type="text" class="form-control answer answers-key" value="{{ $answers->answers }}">
                        <span class="input-group-addon">
                        <input {{ $answers->status ? "checked" : "" }} type="radio" name="questions[{{ $a }}][status]" class="radio" value="{{ $key }}">
                        </span>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              @endforeach
              @endif
            </div>
          </div>
          <div class="box-footer">
            <a href="{{ route('admin.exercises.index') }}" class="btn btn-info btn-default">@lang('course.create_course.back')</a>
            <button type="reset" class="btn btn-default pull-right">@lang('course.create_course.reset')</button>
            <button type="submit" class="btn btn-primary pull-right edit-exercise">@lang('course.create_course.btn')</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- add answers template -->
<div hidden>
  @include('backend.exercises.sub-template.answer')
</div>
@endsection
