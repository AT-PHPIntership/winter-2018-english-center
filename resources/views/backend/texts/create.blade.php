@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content-header">
  <h1>@lang('text.create_text.title')</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>
    <li>
      <a href="{{ route('admin.texts.index') }}">@lang('text.show_list_text.title')</a>
    </li>
    <li class="active">@lang('text.create_text.title')</li>
  </ol>
</section>
<section class="content">
  <div class="col-md-12">
    <div class="box box-primary">
      <form action="{{ route('admin.texts.store') }}" method="POST">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label>@lang('text.show_list_text.content')</label>
            <div class="box box-info">
                <div class="box-header">
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body pad">
                    <form>
                        <textarea class="ckeditor" name="content" rows="10" cols="80">
                        </textarea>
                    </form>
                </div>
            </div>
            @if ($errors->has('content'))
              <span class="text-red help is-danger">* {{ $errors->first('content') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label>@lang('text.show_list_text.sound')</label>
            <input name="sound" type="text" class="form-control" placeholder="Add url sound...">
            @if ($errors->has('sound'))
              <span class="text-red help is-danger">* {{ $errors->first('sound') }}</span>
            @endif
          </div>
        </div>
        <div class="box-footer">
          <a href="{{ route('admin.texts.index')}}" class="btn btn-info btn-default">@lang('common.back')</a>
          <button type="reset" class="btn btn-default pull-right">@lang('common.reset')</button>
          <button type="submit" class="btn btn-primary pull-right">@lang('common.btn')</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
