@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content-header">
  <h1>@lang('exercise.create_exercise.title')</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>
    <li>
      <a href="{{ route('admin.exercises.index') }}">@lang('exercise.list_exercise.exercises')</a>
    </li>
    <li class="active">@lang('exercise.create_exercise.title')</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <form action="{{ route('admin.exercises.store') }}" method="POST">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label>@lang('exercise.list_exercise.exercises')</label>
              <input name="title" type="text" class="form-control" placeholder="Add name exercise ...">
              @if ($errors->has('title'))
              <span class="text-red help is-danger">* {{ $errors->first('title') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label>@lang('exercise.list_exercise.lessons')</label>
              <select name="lesson" class="form-control select2">
                <option value="">@lang('course.create_course.select')</option>
                @foreach ($lessons as $lesson)
                <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                @endforeach
              </select>
              @if ($errors->has('lesson'))
              <span class="text-red help is-danger">* {{ $errors->first('lesson') }}</span>
              @endif
            </div>
            <div class="form-group">
              <button type='button' id="add-questions" class="btn btn-default">+</button>
              <button type='button' id="remove-questions" class="btn btn-default">x</button>
            </div>
            <div id="question" class="col-md-10 col-xs-offset-1">
            </div>
          </div>
          <div class="box-footer">
            <a href="#" class="btn btn-info btn-default">@lang('course.create_course.back')</a>
            <button type="reset" class="btn btn-default pull-right">@lang('course.create_course.reset')</button>
            <button type="submit" class="btn btn-primary pull-right">@lang('course.create_course.btn')</button>
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
