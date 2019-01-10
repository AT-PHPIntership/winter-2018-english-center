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
            <h4>
              <i class="icon fa fa-check"></i>
              <p>* {{ Session::get('error') }}</p>
            </h4>
          </div>
        </div>
      </div>
      @endif
      <div id="accordion">
        <div class="col-md-10 card">
          <div class="panel panel-default" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-primary collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              {{ __('vocabulary.import_voca.voca_import') }}
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="panel panel-default collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="panel-body">
              <form class="form-horizontal" method="POST" action="{{ route('admin.vocabularies.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="csv_file" class="col-md-4 control-label">{{ __('vocabulary.import_voca.import_file') }}</label>
                  <div class="col-md-6">
                    <input id="csv_file" type="file" class="form-control" name="import_file" required>
                  </div>
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
        <div class="col-md-10 card">
          <div class="panel panel-default" id="heading">
            <h5 class="mb-0">
              <button class="btn btn-primary collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false" aria-controls="collapse">
              {{ __('vocabulary.import_voca.voca_create') }}
              </button>
            </h5>
          </div>
          <div id="collapse" class="panel panel-default collapse" aria-labelledby="heading" data-parent="#accordion">
            <div class="card-body">
              <div class="col-md">
                <div class="box box-primary">
                  <form action="" method="POST">
                    @csrf
                    <div class="box-body">
                      <div class="form-group">
                        <label>@lang('vocabulary.create_voca.vocabulary')</label>
                        <input name="title" type="text" class="form-control" placeholder="Add name vocabulary ...">
                      </div>
                      <div class="form-group">
                        <label>@lang('vocabulary.create_voca.word_type')</label>
                        <input name="title" type="text" class="form-control" placeholder="Word type ...">
                      </div>
                      <div class="form-group">
                        <label>@lang('vocabulary.create_voca.means')</label>
                        <input name="title" type="text" class="form-control" placeholder="Means ...">
                      </div>
                    </div>
                    <div class="box-footer">
                      <a href="#" class="btn btn-info btn-default">@lang('course.create_course.back')</a>
                      <button type="reset" class="btn btn-default pull-right">@lang('course.create_course.reset')</button>
                      <button type="submit" class="btn btn-primary pull-right">@lang('course.create_course.btn')</button>
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
</section>
@endsection
