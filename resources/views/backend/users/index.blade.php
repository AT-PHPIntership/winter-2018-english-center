@extends('backend.layouts.master')
@section('content')
<section class="content-header">
  <h1>@lang('user.show_list_user.title')</h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('admin.dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>@lang('layout_admin.home')
      </a>
    </li>

    <li class="active">@lang('user.show_list_user.title')</li>
  </ol>
</section>
<section class="content">
    <div class="row">
        @if (Session::has('success'))
        <div class="box-header with-border">
            <div class="col-md-6">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i>{{ Session::get('success') }}</h4>
            </div>
            </div>
        </div>
        @endif
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('user.show_list_user.id') }}</th>
                            <th>{{ __('user.show_list_user.email') }}</th>
                            <th>{{ __('user.show_list_user.password') }}</th>
                            <th>{{ __('user.show_list_user.role_id') }}</th>
                            <th>{{ __('user.show_list_user.show') }}</th>
                            <th>{{ __('user.show_list_user.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>
                            <td>{{ $user->role_id }}</td>
                            <td>
                                <a href="#" class="btn btn-warning">@lang('common.detail')</a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-warning">@lang('common.edit')</a>
                                @if ($user->role->name != App\Models\Role::ROLE_VIP)
                                <button type="button" class="btn btn-danger form-delete btn-delete-item">@lang('common.delete')</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach 
                    </tbody>
                    </table>
                    <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        {{ $users->links() }}
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
