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
      <form>
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label>@lang('course.list_course.name')</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>@lang('course.list_course.parent')</label>
            <select class="form-control select2">
              <option></option>
            </select>
          </div>
          <div class="form-group">
            <label>@lang('course.create_course.flag')</label>
            <select name="flag" class="form-control select2">
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
