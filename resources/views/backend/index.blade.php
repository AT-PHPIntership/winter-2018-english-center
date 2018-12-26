@extends('backend.layouts.master')

@section('title', 'HOME')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    @lang('layout_admin.dashboard')
    <small>@lang('layout_admin.control_panel')</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> @lang('layout_admin.home')</a></li>
    <li class="active"> @lang('layout_admin.dashboard')</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>150</h3>
          <p>New Orders</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>
          <p>Bounce Rate</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>44</h3>
          <p>User Registrations</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>65</h3>
          <p>Unique Visitors</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable ui-sortable">
      <!-- TO DO List -->
      <div class="box box-primary">
        <div class="box-header ui-sortable-handle" style="cursor: move;">
          <i class="ion ion-clipboard"></i>
          <h3 class="box-title">To Do List</h3>
          <div class="box-tools pull-right">
            <ul class="pagination pagination-sm inline">
              <li><a href="#">«</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">»</a></li>
            </ul>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
          <ul class="todo-list ui-sortable">
            <li>
              <!-- drag handle -->
              <span class="handle ui-sortable-handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
              </span>
              <!-- checkbox -->
              <input type="checkbox" value="">
              <!-- todo text -->
              <span class="text">Design a nice theme</span>
              <!-- Emphasis label -->
              <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
              <!-- General tools such as edit or delete-->
              <div class="tools">
                <i class="fa fa-edit"></i>
                <i class="fa fa-trash-o"></i>
              </div>
            </li>
            <li>
              <span class="handle ui-sortable-handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
              </span>
              <input type="checkbox" value="">
              <span class="text">Make the theme responsive</span>
              <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
              <div class="tools">
                <i class="fa fa-edit"></i>
                <i class="fa fa-trash-o"></i>
              </div>
            </li>
            <li>
              <span class="handle ui-sortable-handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
              </span>
              <input type="checkbox" value="">
              <span class="text">Let theme shine like a star</span>
              <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
              <div class="tools">
                <i class="fa fa-edit"></i>
                <i class="fa fa-trash-o"></i>
              </div>
            </li>
            <li>
              <span class="handle ui-sortable-handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
              </span>
              <input type="checkbox" value="">
              <span class="text">Let theme shine like a star</span>
              <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
              <div class="tools">
                <i class="fa fa-edit"></i>
                <i class="fa fa-trash-o"></i>
              </div>
            </li>
            <li>
              <span class="handle ui-sortable-handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
              </span>
              <input type="checkbox" value="">
              <span class="text">Check your messages and notifications</span>
              <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
              <div class="tools">
                <i class="fa fa-edit"></i>
                <i class="fa fa-trash-o"></i>
              </div>
            </li>
            <li>
              <span class="handle ui-sortable-handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
              </span>
              <input type="checkbox" value="">
              <span class="text">Let theme shine like a star</span>
              <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
              <div class="tools">
                <i class="fa fa-edit"></i>
                <i class="fa fa-trash-o"></i>
              </div>
            </li>
          </ul>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix no-border">
          <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
        </div>
      </div>
      <!-- /.box -->
      <!-- quick email widget -->
      <div class="box box-info">
        <div class="box-body">
          <form action="#" method="post">
            <div>
              <textarea class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;" placeholder="Message"></textarea><input type="hidden" name="_wysihtml5_mode" value="1"><iframe class="wysihtml5-sandbox" security="restricted" allowtransparency="true" frameborder="0" width="0" height="0" marginwidth="0" marginheight="0" style="display: inline-block; background-color: rgb(255, 255, 255); border-collapse: separate; border-color: rgb(221, 221, 221); border-style: solid; border-width: 1px; clear: none; float: none; margin: 0px; outline: rgb(51, 51, 51) none 0px; outline-offset: 0px; padding: 10px; position: static; top: auto; left: auto; right: auto; bottom: auto; z-index: auto; vertical-align: baseline; text-align: start; box-sizing: border-box; box-shadow: none; border-radius: 0px; width: 100%; height: 125px;"></iframe>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- /.Left col -->
  </div>
  <!-- /.row (main row) -->
</section>
<!-- /.content -->
<div class="control-sidebar-bg"></div>
<!-- ./wrapper -->
@endsection
