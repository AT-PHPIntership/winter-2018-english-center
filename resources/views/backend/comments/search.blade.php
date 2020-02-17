@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content-header">
  <h1>List Comments</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>
    <li class="active">List Comments Search</li>
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
              <th>@lang('course.list_course.id')</th>
              <th>@lang('comment.user_name')</th>
              <th>@lang('comment.course_name')</th>
              <th>@lang('comment.content')</th>
              <th>@lang('course.list_course.action')</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($comments as $key => $comment)
            <tr>
              <td>{{ $comment->id }}</td>
              <td>{{ $comment->name }}</td>
              <td>{{ $comment->commentable->name }}</td>
              <td width="300px">{{ $comment->content }}</td>
              <td>
                <a href="{{ route('admin.comments.show', $comment->id) }}" class="btn btn-warning">@lang('comment.detail')</a>
                <form method="POST" action="{{ route('admin.comments.destroy', $comment->id) }}" class="inline" onsubmit="return confirmedDelete()">
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
        <div class="box-footer clearfix" id="pagination">
          <ul class="pagination pagination-sm no-margin pull-right">
            {{ $comments->links() }}
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
