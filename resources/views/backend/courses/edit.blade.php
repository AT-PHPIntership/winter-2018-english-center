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
            <input name="name" type="text" class="form-control" value="{{ $course->name }}">
            @if ($errors->has('name'))
              <span class="text-red help is-danger">* {{ $errors->first('name') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label>@lang('course.list_course.parent')</label>
            <select name="parent_id" class="form-control">
                @if($course->parent_id == null)
                 <option value="" selected disabled hidden>@lang('course.create_course.select')</option>
                 @foreach ($courses as $courseparent)
                    <option value="{{ $courseparent->id }}">{{ $courseparent->name }}</option>
                 @endforeach
                 @else
                 <option value=""></option>
                 @foreach ($courses as $courseparent)
                  <option value="{{ $courseparent->id }}" {{ $course->parent_id == $courseparent->id ? "selected": "" }}>{{ $courseparent->name }}</option>
                 @endforeach
                @endif
            </select>
          </div>
          <div class="form-group">
            <label>@lang('course.list_course.content')</label>
                <div class="box-body pad">
                    <textarea class="ckeditor" name="content" rows="10" cols="80">{{ $course->content }}</textarea>
                </div>
             @if ($errors->has('content'))
              <span class="text-red help is-danger">* {{ $errors->first('content') }}</span>
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
