@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content-header">
  <h1>@lang('vocabulary.import_voca.title')</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>
    <li>
      <a href="{{ route('admin.courses.index') }}">@lang('vocabulary.list_vocabulary.vocabularies')</a>
    </li>
    <li class="active">@lang('vocabulary.import_voca.title')</li>
  </ol>
</section>
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <div class="panel panel-default">
          <div class="panel-heading">{{ __('vocabulary.import_voca.voca_import') }}</div>
          <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('admin.vocabularies.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="csv_file" class="col-md-4 control-label">{{ __('vocabulary.import_voca.import_file') }}</label>
                <div class="col-md-6">
                  <input id="csv_file" type="file" class="form-control" name="import_file" required>
                </div>
              </div>
              {{-- <div class="form-group">
                <label class="col-md-4 control-label">{{ __('vocabulary.list_vocabulary.sound') }}</label>
                <div class="col-md-6">
                  <input name="sound" type="text" class="form-control" placeholder="Add name course ...">
                </div>
              </div> --}}
              <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                  {{ __('vocabulary.import_voca.submit') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
