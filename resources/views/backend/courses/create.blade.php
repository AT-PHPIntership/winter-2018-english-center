@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content">
  <div class="col-md-12">
    @include('backend.blocks.error')
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title" style="@lang('course.create_course.css')">@lang('course.create_course.title')</h3>
      </div>
      <form action="{{ route('admin.courses.store') }}" method="POST">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label>@lang('course.create_course.name')</label>
            <input name="title" type="text" class="form-control" placeholder="Add name course ...">
          </div>
          <div class="form-group">
            <label>@lang('course.create_course.parent')</label>
            <select name="parent_id" class="form-control select2">
              <option></option>
              @foreach ($courses as $course)
              <option value="{{ $course->id }}">{{ $course->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>@lang('course.create_course.flag')</label>
            <select name="flag" class="form-control select2">
              <option>0</option>
              <option>1</option>
            </select>
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
</section>
@endsection
