@extends('backend.layouts.master')
@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title" style="margin-left: 400px;font-weight: bold;text-transform: uppercase;">List Users</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <table class="table table-bordered">
        <tr>
            <th>{{ __('common.show_list_user.id') }}</th>
            <th>{{ __('common.show_list_user.email') }}</th>
            <th>{{ __('common.show_list_user.email_verified_at') }}</th>
            <th>{{ __('common.show_list_user.password') }}</th>
            <th>{{ __('common.show_list_user.role_id') }}</th>
            <th>{{ __('common.show_list_user.created_at') }}</th>
            <th>{{ __('common.show_list_user.updated_at') }}</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->email_verified_at }}</td>
            <td>{{ $user->password }}</td>
            <td>{{ $user->role_id }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
        </tr>
        @endforeach    
    </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix" style="margin-left: 400px;">
        <div class="row">
            <div class="col-md-12">
            {{$users->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
