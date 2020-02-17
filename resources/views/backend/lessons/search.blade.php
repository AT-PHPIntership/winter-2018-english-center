@extends('backend.layouts.master')
@section('content')
<section class="content-header">
  <h1>@lang('lesson.list_lesson.title') Search</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>
    <li class="active">@lang('lesson.list_lesson.title')</li>
  </ol>
</section>
<section class="content">
    <div class="row">
        @if (Session::has('success'))
        <div class="box-header with-border">
            <div class="col-md-6">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i>{{ Session::get('success') }}</h4>
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
                            <th class="col-lg-1">{{ __('lesson.list_lesson.id') }}</th>
                            <th class="col-lg-3">{{ __('lesson.list_lesson.name') }}</th>
                            <th class="col-lg-2">{{ __('lesson.list_lesson.course') }}</th>
                            <th class="col-lg-2">{{ __('lesson.list_lesson.level') }}</th>
                            <th class="col-lg-1">{{ __('lesson.list_lesson.show') }}</th>
                            <th class="col-lg-2">{{ __('lesson.list_lesson.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lessons as $lesson)
                        <tr class="row">
                            <td>{{ $lesson->id }}</td>
                            <td>{{ $lesson->name }}</td>
                            <td>{{ $lesson->course->name }}</td>
                            <td>{{ $lesson->level->level }}</td>
                            <td>
                                <a href="{{ route('admin.lessons.show', $lesson->id) }}" class="btn btn-warning">@lang('common.detail')</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.lessons.edit', $lesson->id) }}" class="btn btn-warning">@lang('common.edit')</a>
                                <form method="POST" action="{{ route('admin.lessons.destroy', $lesson->id) }}" class="inline" onsubmit="return confirmedDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger form-delete btn-delete-item" data-title="Delete User">@lang('common.delete')</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach 
                    </tbody>
                    </table>
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            {{ $lessons->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
