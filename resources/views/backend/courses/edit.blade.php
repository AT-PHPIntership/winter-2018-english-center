@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content-header">
   <h1>@lang('course.update_course.title')</h1>
   <ol class="breadcrumb">
     <li>
       <a href="{{ route('admin.dashboard') }}">
       <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
       </a>
     </li>
     <li>
       <a href="{{ route('admin.courses.index') }}">@lang('course.list_course.courses')</a>
     </li>
     <li class="active">@lang('course.update_course.title')</li>
   </ol>
</section>
<section class="content">
  <div class="col-md-12">
    <div class="box box-primary">
      <form action="{{ route('admin.courses.update', $course->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label>@lang('course.list_course.name')</label>
            <input name="title" type="text" class="form-control" value="{{ $course->title }}">
            @if ($errors->has('title'))
              <span class="text-red help is-danger">* {{ $errors->first('title') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label>@lang('course.list_course.parent')</label>
            <select name="parent_id" class="form-control select2">
                @if($course->parent_id == null)
                 <option value="0" selected disabled hidden>@lang('course.update_course.select')</option>
                 @foreach ($courses as $courseparent)
                    <option value="{{ $courseparent->id }}">{{ $courseparent->title }}</option>
                 @endforeach
                 @else
                 <option value="0"></option>
                 @foreach ($courses as $courseparent)
                  <option value="{{ $courseparent->id }}" {{ $course->parent_id == $courseparent->id ? "selected": "" }}>{{ $courseparent->title }}</option>
                 @endforeach
                @endif
            </select>
          </div>
          <div class="form-group">
            <label>@lang('course.list_course.flag')</label>
            <select name="flag" class="form-control select2">
              <option value="{{ \App\Models\Course::VIP }}" {{ $course->flag ? 'selected' : ''}}>{{ config('define.courses.vip') }}</option>
              <option value="{{ \App\Models\Course::TRIAL }}" {{ $course->flag ? '' : 'selected'}}>{{ config('define.courses.trial') }}</option>
            </select>
            @if ($errors->has('flag'))
              <span class="text-red help is-danger">* {{ $errors->first('flag') }}</span>
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
</section>
@endsection
