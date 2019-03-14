@extends('backend.layouts.master')
@section('content')
<section class="content-header">
  <h1>@lang('layout_admin.slider.show.title')</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>

    <li class="active">@lang('layout_admin.slider.show.title')</li>
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
                            <th class="col-lg-1">{{ __('layout_admin.slider.show.id') }}</th>
                            <th class="col-lg-2">{{ __('layout_admin.slider.show.image') }}</th>
                            <th class="col-lg-2">{{ __('layout_admin.slider.show.name') }}</th>
                            <th class="col-lg-5">{{ __('layout_admin.slider.show.content') }}</th>
                            <th class="col-lg-2">{{ __('layout_admin.slider.show.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)
                        <tr class="row">
                            <td>{{ $slider->id }}</td>
                            <td>{{ $slider->image }}</td>
                            <td>{{ $slider->title }}</td>
                            <td>{!! $slider->content !!}</td>
                            <td>
                                <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-warning">@lang('common.edit')</a>
                                <form method="POST" action="{{ route('admin.sliders.destroy', $slider->id) }}" class="inline" onsubmit="return confirmedDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger form-delete btn-delete-item" data-title="Delete Slider">@lang('common.delete')</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
