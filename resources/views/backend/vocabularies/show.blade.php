@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content-header">
  <h1>@lang('vocabulary.show_vocabulary.title')</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>
    <li>
      <a href="{{ route('admin.vocabularies.index') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('vocabulary.title')
      </a>
    </li>
    <li class="active">@lang('vocabulary.show_vocabulary.title')</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    @if (Session::has('success'))
    <div class="box-header with-border">
      <div class="col-md-6">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i>* {{ Session::get('success') }}</h4>
          
        </div>
      </div>
    </div>
    @endif
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body">
          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <div class="row">
                    <b class="col-lg-2">{{ __('vocabulary.list_vocabulary.id') }}</b>
                    <span class="col-lg-10">{{ $vocabulary->id }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <b class="col-lg-2">{{ __('vocabulary.list_vocabulary.vocabulary') }}</b>
                    <span class="col-lg-10">{{ $vocabulary->vocabulary }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <b class="col-lg-2">{{ __('vocabulary.list_vocabulary.word_type') }}</b>
                    <span class="col-lg-10">{{ $vocabulary->word_type }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <b class="col-lg-2">{{ __('vocabulary.list_vocabulary.means') }}</b>
                    <span class="col-lg-10">{{ $vocabulary->means }}</span>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <b class="col-lg-2">{{ __('vocabulary.list_vocabulary.sound') }}</b>
                    <span class="col-lg-10">
                      <td style="cursor:pointer;text-align: center;">
                        <a type="button" class="uba_audioButton" >
                          <audio>
                            <source src="{{$vocabulary->sound}}" type="audio/mpeg">
                          </audio>
                        </a>
                      </td>
                    </span>
                </div>
            </li>
          </ul>
          <a href="{{ route('admin.vocabularies.index') }}" class="btn btn-primary"><b>@lang('common.back')</b></a>
          <a href="{{ route('admin.vocabularies.edit', $vocabulary->id) }}" class="btn btn-warning">@lang('course.list_course.edit')</a>
          <form method="POST" action="{{ route('admin.vocabularies.destroy', $vocabulary->id) }}" class="inline" onsubmit="return confirmedDelete()">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger form-delete btn-delete-item" data-title="Delete Course">@lang('course.list_course.delete')
              </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
