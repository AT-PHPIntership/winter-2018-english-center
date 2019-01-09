@extends('backend.layouts.master')
@section('title', 'HOME')
@section('content')
<section class="content-header">
  <h1>@lang('level.list_level.title')</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>
    <li class="active">@lang('level.list_level.title')</li>
  </ol>
</section>
<section class="content">
  <div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>@lang('level.list_level.id')</th>
              <th>@lang('level.list_level.level')</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($levels as $key => $level)
            <tr>
              <td>{{ $level->id }}</td>
              <td>{{ $level->level }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection
