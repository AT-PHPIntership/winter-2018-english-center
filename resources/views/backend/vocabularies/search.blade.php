@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content-header">
  <h1>@lang('vocabulary.title') Search</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>
    <li class="active">@lang('vocabulary.title')</li>
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
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr class="row">
              <th style="text-align: center;">@lang('vocabulary.list_vocabulary.id')</th>
              <th style="text-align: center;">@lang('vocabulary.list_vocabulary.vocabulary')</th>
              <th style="text-align: center;">@lang('vocabulary.list_vocabulary.phonetic_spelling')</th>
              <th style="text-align: center;">@lang('vocabulary.list_vocabulary.word_type')</th>
              <th style="text-align: center;">@lang('vocabulary.list_vocabulary.means')</th>
              <th style="text-align: center;">@lang('vocabulary.list_vocabulary.sound')</th>
              <th style="text-align: center;">@lang('vocabulary.list_vocabulary.show')</th>
              <th style="text-align: center;">@lang('vocabulary.list_vocabulary.action')</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($vocabularies as $key => $vocabulary)
            <tr class="row">
              <td style="text-align: center;">{{ $vocabulary->id }}</td>
              <td style="text-align: center;">{{ $vocabulary->vocabulary }}</td>
              <td style="text-align: center;">{{ $vocabulary->phonetic_spelling }}</td>
              <td style="text-align: center;">{{ $vocabulary->word_type }}</td>
              <td style="text-align: center;">{{ $vocabulary->means }}</td>
              <td style="cursor:pointer;text-align: center;">
                <a type="button" class="uba_audioButton" >
                  <audio>
                    <source src="{{$vocabulary->sound}}" type="audio/mpeg">
                  </audio>
                </a>
              </td>
              <td style="text-align: center;">
                <a href="{{ route('admin.vocabularies.show', $vocabulary->id) }}" class="btn btn-warning">@lang('common.detail')</a>
              </td>
              <td style="text-align: center;">
                <a href="{{ route('admin.vocabularies.edit', $vocabulary->id) }}" class="btn btn-warning">@lang('course.list_course.edit')</a>
                <form method="POST" action="{{ route('admin.vocabularies.destroy', $vocabulary->id) }}" class="inline" onsubmit="return confirmedDelete()">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger form-delete btn-delete-item" data-title="Delete Course">@lang('course.list_course.delete')
                    </button>
                </form>
              </td>
            </tr>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="box-footer clearfix">
          <ul class="pagination pagination-sm no-margin pull-right">
            {{ $vocabularies->links() }}
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
