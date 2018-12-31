@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title" style="@lang('course.create_course.css')">@lang('course.create_course.title')</h3>
      </div>
      <div class="col align-self-center">
        <div class="box-body">
          <div class="form-group">
            <label>@lang('course.create_course.parent')</label>
            <select class="form-control select2">
              <option selected="selected">#</option>
              <option>#</option>
            </select>
          </div>
          <div class="form-group">
            <label>@lang('course.create_course.name')</label>
            <input type="text" class="form-control" placeholder="Add name course ...">
          </div>
          <div class="form-group">
            <label>@lang('course.create_course.flag')</label>
            <select class="form-control select2" style="width: 100%;">
              <option selected="selected">0</option>
              <option>1</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
