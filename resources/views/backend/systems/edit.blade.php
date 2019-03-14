@extends('backend.layouts.master')
@section('content')
<section class="content-header">
  <h1>@lang('layout_admin.system.edit.title')</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>
    <li>
      <a href="{{ route('admin.systems.index') }}">@lang('layout_admin.system.show.title')</a>
    </li>
    <li class="active">@lang('layout_admin.system.edit.title')</li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form action="{{ route('admin.systems.update', $system->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label>@lang('layout_admin.system.edit.whyus')</label>
                            <div class="box box-info">
                                <div class="box-header">
                                    <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body pad">
                                    <textarea class="ckeditor" name="whyus" rows="10" cols="80">
                                        {{ $system->whyus }}
                                    </textarea>
                                </div>
                            </div>
                            @if ($errors->has('whyus'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('whyus') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>@lang('layout_admin.system.edit.aboutus')</label>
                            <div class="box box-info">
                                <div class="box-header">
                                    <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body pad">
                                    <textarea class="ckeditor" name="aboutus" rows="10" cols="80">
                                        {{ $system->aboutus }}
                                    </textarea>
                                </div>
                            </div>
                            @if ($errors->has('aboutus'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('aboutus') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone">{{ __('layout_admin.system.edit.phone') }}</label>
                            <input type="text" class="form-control" name="phone" value="{{ $system->phone }}">
                            @if ($errors->has('phone'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('layout_admin.system.edit.email') }}</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ $system->email }}">
                            @if ($errors->has('email'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('layout_admin.system.edit.web') }}</label>
                            <input type="text" class="form-control" name="web" placeholder="Enter url" value="{{ $system->web }}">
                            @if ($errors->has('web'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('web') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('layout_admin.system.edit.address') }}</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter address" value="{{ $system->address }}">
                            @if ($errors->has('address'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{ URL::previous() }}" class="btn btn-info btn-default">@lang('common.back')</a>
                        <button type="reset" class="btn btn-default pull-right">@lang('common.reset')</button>
                        <button type="submit" class="btn btn-primary pull-right">@lang('common.btn')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
