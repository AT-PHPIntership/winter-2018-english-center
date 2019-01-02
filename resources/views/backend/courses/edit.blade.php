@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title" style="@lang('course.update_course.css')">@lang('course.update_course.title')</h3>
      </div>
      <form>
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label>@lang('course.update_course.name')</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>@lang('course.update_course.parent')</label>
            <select class="form-control select2">
              <option></option>
            </select>
          </div>
          <div class="form-group">
            <label>@lang('course.update_course.flag')</label>
            <select name="flag" class="form-control select2">
              <option>0</option>
              <option>1</option>
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
