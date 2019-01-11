@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content-header">
   <h1>{{ __('vocabulary.update_voca.title') }}</h1>
   <ol class="breadcrumb">
     <li>
       <a href="{{ route('admin.dashboard') }}">
       <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
       </a>
     </li>
     <li>
       <a href="{{ route('admin.courses.index') }}">{{ __('vocabulary.list_vocabulary.vocabularies') }}</a>
     </li>
     <li class="active">{{ __('vocabulary.update_voca.title') }}</li>
   </ol>
</section>
<section class="content">
  <div class="col-md-12">
    <div class="box box-primary">
      <form action="#" method="POST">
        @method('PUT')
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label>@lang('vocabulary.list_vocabulary.vocabulary')</label>
            <input name="vocabulary" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>@lang('vocabulary.list_vocabulary.word_type')</label>
            <input name="word_type" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>@lang('vocabulary.list_vocabulary.means')</label>
            <input name="means" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>@lang('vocabulary.list_vocabulary.sound')</label>
            <input name="sound" type="text" class="form-control">
          </div>
        </div>
        <div class="box-footer">
          <a href="{{ route('admin.courses.index')}}" class="btn btn-info btn-default">@lang('course.create_course.back')</a>
          <button type="reset" class="btn btn-default pull-right">@lang('course.create_course.reset')</button>
          <button type="submit" class="btn btn-primary pull-right">@lang('course.create_course.btn')</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
