@extends('backend.layouts.master')
@section('content')
<section class="content-header">
  <h1>@lang('layout_admin.system.show.title')</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>

    <li class="active">@lang('layout_admin.system.show.title')</li>
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
                            <th>{{ __('layout_admin.system.show.id') }}</th>
                            <th>{{ __('layout_admin.system.show.whyus') }}</th>
                            <th>{{ __('layout_admin.system.show.aboutus') }}</th>
                            <th>{{ __('layout_admin.system.show.phone') }}</th>
                            <th>{{ __('layout_admin.system.show.email') }}</th>
                            <th>{{ __('layout_admin.system.show.web') }}</th>
                            <th>{{ __('layout_admin.system.show.address') }}</th>
                            <th>{{ __('layout_admin.system.show.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="row">
                            <td>{{ $system->id }}</td>
                            <td>{!! $system->whyus !!}</td>
                            <td>{!! $system->aboutus !!}</td>
                            <td>{{ $system->phone }}</td>
                            <td>{{ $system->email }}</td>
                            <td>{{ $system->web }}</td>
                            <td>{{ $system->address }}</td>
                            <td>
                                <a href="{{ route('admin.systems.edit', $system->id) }}" class="btn btn-warning">@lang('common.edit')</a>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
