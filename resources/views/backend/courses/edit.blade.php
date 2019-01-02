@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content">
  <div class="col-md-12">
    @include('backend.blocks.error')
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title" style="@lang('course.update_course.css')">@lang('course.update_course.title')</h3>
      </div>
      <form action="{{ route('admin.courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="box-body">
          <div class="form-group">
            <label>@lang('course.update_course.name')</label>
            <input name="title" type="text" class="form-control" value="{{ $course->title }}">
          </div>
          <div class="form-group">
            <label>@lang('course.update_course.parent')</label>
            <select name="parent_id" class="form-control select2">
                @if($course->parent_id == null)
                 <option value="" selected></option>
                 @foreach ($courses as $courseparent)
                     <option value="{{ $courseparent->id }}">{{ $courseparent->title }}</option>
                 @endforeach
                 @else
                 <option value=""></option>
                 @foreach ($courses as $courseparent)
                  <option value="{{ $courseparent->id }}" {{ $course->parent_id == $courseparent->id ? "selected": "" }}>{{ $courseparent->title }}</option>
                 @endforeach
                @endif
            </select>
          </div>
          <div class="form-group">
            <label>@lang('course.update_course.flag')</label>
            <select name="flag" class="form-control select2">
                <option>{{ config('define.edit_course.0') }}</option>
                <option>{{ config('define.edit_course.1') }}</option>
            </select>
          </div>
        </div>
        <div class="box-footer">
          <a href="{{ route('admin.courses.index')}}" class="btn btn-info btn-default">@lang('course.update_course.back')</a>
          <button type="reset" class="btn btn-default pull-right">@lang('course.update_course.reset')</button>
          <button type="submit" class="btn btn-primary pull-right">@lang('course.update_course.btn')</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
