@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">@lang('course.create_course.title')</h3>
      </div>
      <form>
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label>@lang('course.create_course.name')</label>
            <input type="text" class="form-control" placeholder="Add name course ...">
          </div>
          <div class="form-group">
            <label>@lang('course.create_course.parent')</label>
            <select class="form-control select2">
              <option></option>
            </select>
          </div>
          <div class="form-group">
            <label>@lang('course.create_course.flag')</label>
            <select class="form-control select2">
              <option>{{ config('define.courses.vip') }}</option>
              <option>{{ config('define.courses.trial') }}</option>
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
