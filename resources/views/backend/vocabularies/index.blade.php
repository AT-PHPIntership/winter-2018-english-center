@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content-header">
  <h1>@lang('vocabulary.title')</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>
    <li class="active">@lang('vocabulary.title')</li>
  </ol>
</section>
<section class="content">
  <div class="row">
  @if (Session::has('success'))
  <div class="box-header with-border">
    <div class="col-md-6">
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i>@lang('course.list_course.success')</h4>
        <p>* {{ Session::get('success') }}</p>
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
              <th>@lang('vocabulary.list_vocabulary.id')</th>
              <th>@lang('vocabulary.list_vocabulary.title')</th>
              <th>@lang('vocabulary.list_vocabulary.content')</th>
              <th>@lang('vocabulary.list_vocabulary.sound')</th>
              <th>@lang('vocabulary.list_vocabulary.action')</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($vocabularies as $key => $vocabulary)
            <tr>
              <td>{{ $vocabulary->id }}</td>
              <td>{{ $vocabulary->title }}</td>
              <td>{{ $vocabulary->content }}</td>
              <td>{{ $vocabulary->sound }}</td>
              <td>
                <a href="#" class="btn btn-warning">@lang('course.list_course.edit')</a>
                <button type="button" class="btn btn-danger form-delete btn-delete-item">@lang('course.list_course.delete')
                </button>
              </td>
            </tr>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="box-footer clearfix">
          <ul class="pagination pagination-sm no-margin pull-right">
            {{-- {{ $vocabulary->links() }} --}}
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
