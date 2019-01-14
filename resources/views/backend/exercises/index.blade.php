@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content-header">
  <h1>@lang('exercise.title')</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>
    <li class="active">@lang('exercise.title')</li>
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
            <tr>
              <th>@lang('exercise.list_exercise.id')</th>
              <th>@lang('exercise.list_exercise.exercises')</th>
              <th>@lang('exercise.list_exercise.lessons')</th>
              <th>@lang('exercise.list_exercise.course')</th>
              <th>@lang('exercise.list_exercise.action')</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($exercises as $exercise)
            <tr>
              <td>{{ $exercise->id }}</td>
              <td><a href="#">{{ $exercise->title }}</a></td>
              <td>
                @if(!$exercise['lesson_id'])
                {{ 'none' }}
                @else
                {{ $exercise->lesson->name }}
                @endif
              </td>
              <td>{{ $exercise->lesson->course->title }}</td>
              <td>
                <a href="#" class="btn btn-warning">@lang('course.list_course.edit')</a>
                <form method="POST" action="#}" class="inline" onsubmit="return confirmedDelete()">
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
            {{ $exercises->links() }}
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
