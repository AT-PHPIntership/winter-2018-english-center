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
  <!-- Info boxes -->
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-pricetag-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Courses</span>
          <span class="info-box-number">{{ $statisticals['totalCourses'] }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="ion ion-ios-book-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Lessons</span>
          <span class="info-box-number">{{ $statisticals['totalLessons'] }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Likes</span>
          <span class="info-box-number">41,410</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">New Members</span>
          <span class="info-box-number">{{ $statisticals['totalUsers'] }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <div class="col-md-7">
      <!-- TABLE: LATEST ORDERS -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Latest Orders</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
              <tr>
                <th>Order ID</th>
                <th>Item</th>
                <th>Status</th>
                <th>Popularity</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                <td>Call of Duty IV</td>
                <td><span class="label label-success">Shipped</span></td>
                <td>
                  <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR1848</a></td>
                <td>Samsung Smart TV</td>
                <td><span class="label label-warning">Pending</span></td>
                <td>
                  <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                <td>iPhone 6 Plus</td>
                <td><span class="label label-danger">Delivered</span></td>
                <td>
                  <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                <td>Samsung Smart TV</td>
                <td><span class="label label-info">Processing</span></td>
                <td>
                  <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR1848</a></td>
                <td>Samsung Smart TV</td>
                <td><span class="label label-warning">Pending</span></td>
                <td>
                  <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                <td>iPhone 6 Plus</td>
                <td><span class="label label-danger">Delivered</span></td>
                <td>
                  <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                <td>Call of Duty IV</td>
                <td><span class="label label-success">Shipped</span></td>
                <td>
                  <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
          <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

    <div class="col-md-5">
        
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Browser Usage</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-7">
              <div class="chart-responsive">
                <canvas id="pieChart" height="155" width="192" style="width: 192px; height: 155px;"></canvas>
              </div>
              <!-- ./chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-5">
              <ul class="chart-legend clearfix">
                <li><i class="fa fa-circle-o text-red"></i> {{ $statisticals['maxLessonUser'][0]->name }}</li>
                <li><i class="fa fa-circle-o text-green"></i> {{ $statisticals['maxLessonUser'][1]->name }}</li>
                <li><i class="fa fa-circle-o text-yellow"></i> {{ $statisticals['maxLessonUser'][2]->name }}</li>
                <li><i class="fa fa-circle-o text-aqua"></i> {{ $statisticals['maxLessonUser'][3]->name }}</li>
                <li><i class="fa fa-circle-o text-light-blue"></i> {{ $statisticals['maxLessonUser'][4]->name }}</li>
              </ul>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- Info Boxes Style 2 -->
      <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Inventory</span>
          <span class="info-box-number">5,200</span>

          <div class="progress">
            <div class="progress-bar" style="width: 50%"></div>
          </div>
          <span class="progress-description">
                50% Increase in 30 Days
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Mentions</span>
          <span class="info-box-number">92,050</span>

          <div class="progress">
            <div class="progress-bar" style="width: 20%"></div>
          </div>
          <span class="progress-description">
                20% Increase in 30 Days
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-aqua">
        <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Direct Messages</span>
          <span class="info-box-number">163,921</span>

          <div class="progress">
            <div class="progress-bar" style="width: 40%"></div>
          </div>
          <span class="progress-description">
                40% Increase in 30 Days
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<div class="control-sidebar-bg"></div>
<!-- ./wrapper -->
<script type="text/javascript">
    var lesson1 = {!! json_encode($statisticals['maxLessonUser'][0]) !!};
    var lesson2 = {!! json_encode($statisticals['maxLessonUser'][1]) !!};
    var lesson3 = {!! json_encode($statisticals['maxLessonUser'][2]) !!};
    var lesson4 = {!! json_encode($statisticals['maxLessonUser'][3]) !!};
    var lesson5 = {!! json_encode($statisticals['maxLessonUser'][4]) !!};
    console.log(lesson1, lesson2, lesson3, lesson4, lesson5);
</script>
@endsection
