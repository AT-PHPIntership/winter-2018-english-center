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
      <form action="{{ route('admin.vocabularies.update', $vocabulary->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label>@lang('vocabulary.list_vocabulary.vocabulary')</label>
            <input name="vocabulary" type="text" class="form-control" value="{{ $vocabulary->vocabulary }}">
            @if ($errors->has('vocabulary'))
              <span class="text-red help is-danger">* {{ $errors->first('vocabulary') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label>@lang('vocabulary.list_vocabulary.word_type')</label>
            <input name="word_type" type="text" class="form-control" value="{{ $vocabulary->word_type }}">
            @if ($errors->has('word_type'))
              <span class="text-red help is-danger">* {{ $errors->first('word_type') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label>@lang('vocabulary.list_vocabulary.means')</label>
            <input name="means" type="text" class="form-control" value="{{ $vocabulary->means }}">
            @if ($errors->has('means'))
              <span class="text-red help is-danger">* {{ $errors->first('means') }}</span>
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
</section>
@endsection
