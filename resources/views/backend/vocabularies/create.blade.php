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
      @if (Session::has('error'))
      <div class="box-header with-border">
        <div class="col-md-6">
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i>* {{ Session::get('error') }}</h4>
          </div>
        </div>
      </div>
      @endif
      <div class="row">
        <div class="col-md-10">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('vocabulary.create_voca.title')}}</h3>
            </div>
            <div class="box-body">
              <div class="box-group" id="accordion">
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                      {{ __('vocabulary.import_voca.voca_import') }}
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse">
                    <div class="box-body">
                      <form class="form-horizontal" method="POST" action="{{ route('admin.vocabularies.import') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="csv_file" class="col-md-4 control-label">{{ __('vocabulary.import_voca.import_file') }}</label>
                          <div class="col-md-6">
                            <input id="csv_file" type="file" class="form-control" name="import_file" required>
                          </div>
                          @if ($errors->has('import_file'))
                            <span class="text-red help is-danger">* {{ $errors->first('import_file') }}</span>
                          @endif
                        </div>
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
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                      {{ __('vocabulary.import_voca.voca_create') }}
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse in">
                    <div class="box-body">
                      <form action="{{ route('admin.vocabularies.store') }}" method="POST">
                        @csrf
                        <div class="box-body">
                          <div class="form-group">
                            <label>@lang('vocabulary.list_vocabulary.vocabulary')</label>
                            <input name="vocabulary" type="text" class="form-control" placeholder="Add name vocabulary ...">
                            @if ($errors->has('vocabulary'))
                              <span class="text-red help is-danger">* {{ $errors->first('vocabulary') }}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label>@lang('vocabulary.list_vocabulary.means')</label>
                            <input name="means" type="text" class="form-control" placeholder="Means ...">
                            @if ($errors->has('means'))
                              <span class="text-red help is-danger">* {{ $errors->first('means') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="box-footer">
                          <a href="{{ route('admin.vocabularies.index') }}" class="btn btn-info btn-default">@lang('course.create_course.back')</a>
                          <button type="reset" class="btn btn-default pull-right">@lang('course.create_course.reset')</button>
                          <button type="submit" class="btn btn-primary pull-right">{{ __('course.create_course.btn') }}</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
