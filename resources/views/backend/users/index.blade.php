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
                        <tr class="row">
                            <th>{{ __('user.show_list_user.id') }}</th>
                            <th>{{ __('user.show_list_user.email') }}</th>
                            {{-- <th class="col-lg-4">{{ __('user.show_list_user.password') }}</th> --}}
                            <th>{{ __('user.show_list_user.role') }}</th>
                            <th>{{ __('user.show_list_user.show') }}</th>
                            <th>{{ __('user.show_list_user.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="row">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            {{-- <td>{{ $user->password }}</td> --}}
                            <td>{{ $user->role->name }}</td>
                            <td>
                                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-warning">@lang('common.detail')</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">@lang('common.edit')</a>
                                @if ($user->role->name != App\Models\Role::ROLE_ADMIN)
                                <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="inline" onsubmit="return confirmedDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger form-delete btn-delete-item" data-title="Delete User">@lang('common.delete')</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach 
                    </tbody>
                    </table>
                    <ul class="pagination pagination-sm no-margin pull-right text-center">
                        {{ $users->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
