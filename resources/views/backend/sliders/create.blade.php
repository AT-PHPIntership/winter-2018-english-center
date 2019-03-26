@extends('backend.layouts.master')
@section('content')
<section class="content-header">
  <h1>@lang('layout_admin.slider.create.title')</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>
    <li>
      <a href="{{ route('admin.sliders.index') }}">@lang('layout_admin.slider.show.title')</a>
    </li>
    <li class="active">@lang('layout_admin.slider.create.title')</li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">

                        <div class="form-group">
                            <label for="title">@lang('layout_admin.slider.create.name')</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter title slider" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>@lang('layout_admin.slider.create.content')</label>
                            <div class="box box-info">
                                <div class="box-header">
                                    <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body pad">
                                    <textarea class="ckeditor" name="content" rows="10" cols="80">
                                    </textarea>
                                </div>
                            </div>
                            @if ($errors->has('content'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="image">@lang('layout_admin.slider.create.image')</label>
                            <!-- <img class="profile-user-img img-responsive img-circle" src="" alt=""> -->
                            <input type="file" name="image" value="">
                            @if ($errors->has('image'))
                                <span class="help-block col-sm-12">
                                    <strong class="col-xs-12 col-sm-12 text-danger">{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>
                    <div class="box-footer">
                        <a href="{{ route('admin.sliders.index')}}" class="btn btn-info btn-default">@lang('common.back')</a>
                        <button type="reset" class="btn btn-default pull-right">@lang('common.reset')</button>
                        <button type="submit" class="btn btn-primary pull-right">@lang('common.btn')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
