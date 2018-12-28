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
            <th>ID</th>
            <th>Email</th>
            <th>Email Verifiled</th>
            <th>Password</th>
            <th>Role ID</th>
            <th>Create</th>
            <th>Update</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>    
    </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
    <ul class="pagination pagination-sm no-margin pull-right">
        <li><a href="#">&laquo;</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">&raquo;</a></li>
    </ul>
    </div>
</div>
@endsection
