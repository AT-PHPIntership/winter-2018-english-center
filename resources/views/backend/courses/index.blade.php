@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">@lang('course.title')</h3>
                </div>
                <!-- /.box-header -->
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
                                <td>
                                    <a href="#" class="btn btn-warning">Edit</a>
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
    </div>
</section>
@endsection
