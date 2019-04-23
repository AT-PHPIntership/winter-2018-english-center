@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content-header">
  <h1>@lang('course.create_course.title')</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
        <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>
    <li>
      <a href="{{ route('admin.courses.index') }}">@lang('course.list_course.courses')</a>
    </li>
    <li class="active">@lang('course.create_course.title')</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <form role="form" action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label>@lang('course.list_course.name')</label>
              <input name="name" type="text" class="form-control" placeholder="Add name course ..." value="{{old('name')}}">
              @if ($errors->has('name'))
              <span class="text-red help is-danger">* {{ $errors->first('name') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label>@lang('course.list_course.parent')</label>
              <select name="parent_id" class="form-control">
                <option value="">@lang('course.create_course.select')</option>
                @foreach ($courses as $course)
                <option value="{{$course->id}}">{{ $course->name }}</option>
                @endforeach
              </select>
              @if ($errors->has('parent_id'))
              <span class="text-red help is-danger">* {{ $errors->first('parent_id') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label>@lang('course.list_course.content')</label>
              <div class="box-body pad">
                <textarea class="ckeditor" name="content" rows="10" cols="80">
                </textarea>
              </div>
              @if ($errors->has('content'))
              <span class="text-red help is-danger">* {{ $errors->first('content') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="img">{{ __('lesson.create_lesson.image') }}</label>
              <input type="file" name="image" value="{{ old('image') }}">
              @if ($errors->has('image'))
              <span class="text-red help is-danger">* {{ $errors->first('image') }}</span>
              @endif
            </div>
          </div>
          <div class="box-footer">
            <a href="{{ route('admin.courses.index')}}" class="btn btn-info btn-default">@lang('course.create_course.back')</a>
            <button type="reset" class="btn btn-default pull-right">@lang('course.create_course.reset')</button>
            <button type="submit" class="btn btn-primary pull-right">@lang('course.create_course.btn')</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
