@extends('backend.layouts.master')
@section('content')
<section class="content-header">
  <h1>@lang('text.show_list_text.title')</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>

    <li class="active">@lang('text.show_list_text.title')</li>
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
                            <th class="col-lg-1">{{ __('text.show_list_text.id') }}</th>
                            <th class="col-lg-5">{{ __('text.show_list_text.content') }}</th>
                            <th class="col-lg-4">{{ __('text.show_list_text.sound') }}</th>
                            <th class="col-lg-2">{{ __('text.show_list_text.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($texts as $text)
                        <tr class="row">
                            <td>{{ $text->id }}</td>
                            <td>{{ $text->content }}</td>
                            <td>{{ $text->sound }}</td>
                            <td>
                                <a href="" class="btn btn-warning">@lang('common.edit')</a>
                                <form method="POST" action="" class="inline" onsubmit="return confirmedDelete()">
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
                        {{ $texts->links() }}
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
