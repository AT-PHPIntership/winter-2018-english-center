@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content">
  <div class="row">
  @if (Session::has('success'))
  <div class="box-header with-border">
    <div class="col-md-6">
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        <p>* {{ Session::get('success') }}</p>
      </div>
    </div>
  </div>
  @endif
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">@lang('course.title')</h3>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>@lang('course.list_course.id')</th>
              <th>@lang('course.list_course.title')</th>
              <th>@lang('course.list_course.parent')</th>
              <th>@lang('course.list_course.count_view')</th>
              <th>@lang('course.list_course.total_rating')</th>
              <th>@lang('course.list_course.average')</th>
              <th>@lang('course.list_course.flag')</th>
              <th>@lang('course.list_course.action')</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($courses as $key => $course)
            <tr>
              <td>{{ $course->id }}</td>
              <td>{{ $course->title }}</td>
              <td>
                @if(!$course['parent_id'])
                {{ 'none' }}
                @else
                {{ $course->parent->title }}
                @endif
              </td>
              <td>{{ $course->count_view }}</td>
              <td>{{ $course->total_rating }}</td>
              <td>{{ $course->average }}</td>
              <td>{{ $course->flag }}</td>
              <td>
                <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-warning">@lang('course.update_course.edit')</a>
                <button type="button" class="btn btn-danger form-delete btn-delete-item">   Delete
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="box-footer clearfix">
          <ul class="pagination pagination-sm no-margin pull-right">
            {{ $courses->links() }}
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
