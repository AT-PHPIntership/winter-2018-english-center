@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content-header">
  <h1>@lang('course.list_course.title') Search</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>
    <li class="active">@lang('course.list_course.title')</li>
  </ol>
</section>
<section class="content">
  <div class="row">
  @if (Session::has('success'))
  <div class="box-header with-border">
    <div class="col-md-6">
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i>* {{ Session::get('success') }}</h4>
      </div>
    </div>
  </div>
  @endif
  <div class="col-xs-12">
    <div class="box">
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr class="row">
              <th class="col-md-1" style="text-align: center;">@lang('course.list_course.id')</th>
              <th class="col-md-2" style="text-align: center;">@lang('course.list_course.name')</th>
              <th class="col-md-2" style="text-align: center;">@lang('course.list_course.parent')</th>
              <th class="col-md-1" style="text-align: center;">@lang('course.list_course.count_view')</th>
              <th class="col-md-1" style="text-align: center;">@lang('course.list_course.average')</th>
              <th class="col-md-3" style="text-align: center;">@lang('course.list_course.content')</th>
              <th class="col-md-2" style="text-align: center;">@lang('course.list_course.action')</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($courses as $key => $course)
            <tr class="row">
              <td style="text-align: center;">{{ $course->id }}</td>
              <td style="text-align: center;">{{ $course->name }}</td>
              <td style="text-align: center;">
                @if(!$course['parent_id'])
                {{ 'none' }}
                @else
                {{ $course->parent->name }}
                @endif
              </td style="text-align: center;">
              <td style="text-align: center;">{{ $course->count_view }}</td>
              <td style="text-align: center;">{{ $course->average }}</td>
              <td width="300px"  style="text-align: center;">
                @if(!$course['parent_id'])
                {{ 'none' }}
                @else
                {!! str_limit($course->content, 160) !!}
                @endif
              </td>
              <td style="text-align: center;">
                <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-warning">@lang('course.list_course.edit')</a>
                <form method="POST" action="{{ route('admin.courses.destroy', $course->id) }}" class="inline" onsubmit="return confirmedDelete()">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger form-delete btn-delete-item" data-title="Delete Course">@lang('course.list_course.delete')
                    </button>
                </form>
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
