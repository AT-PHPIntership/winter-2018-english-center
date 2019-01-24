@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content-header">
  <h1>@lang('question.title')</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>
    <li class="active">@lang('question.title')</li>
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
  <div class="col-xs-10 col-xs-offset-1">
    <div class="box">
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>@lang('question.list_question.id')</th>
              <th>@lang('question.list_question.question')</th>
              <th>@lang('question.list_question.answer')</th>
              <th>@lang('question.list_question.action')</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($exercises as $exercise)
            @foreach ($exercise->questions as $question)
            <tr>
              <td>{{ $question->id }}</td>
              <td>{{ $question->content }}</a></td>
              <td>
                <div class="form-group">
                  @foreach ($question->answers as $key => $answer)
                    @if($answer->status == 1)
                      <div>
                        <label name="{{ $key }}" value="{{ $answer->id }}">
                            {{ $answer->answers }}
                            <img src="images/icons/active.gif">
                        </label>
                      </div>
                    @else
                    <div>
                        <label name="{{ $key }}" value="{{ $answer->id }}">
                            {{ $answer->answers }}
                        </label>
                      </div>
                    @endif
                  @endforeach
                </div>
              </td>
              <td>
                <a href="{{ route('admin.exercises.edit', $exercise->id) }}" class="btn btn-warning">@lang('course.list_course.edit')</a>
                <form method="POST" action="#}" class="inline" onsubmit="return confirmedDelete()">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger form-delete btn-delete-item" data-title="Delete Course">@lang('course.list_course.delete')
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
            @endforeach
          </tbody>
        </table>
        <div class="box-footer clearfix">
          <ul class="pagination pagination-sm no-margin pull-right">
            {{ $exercises->links() }}
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
